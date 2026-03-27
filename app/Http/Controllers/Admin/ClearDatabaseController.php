<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Artisan;
use Illuminate\Http\Request;
use Illuminate\View\View;
use File;
use Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;



class ClearDatabaseController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:database clear']);
    }

    function index() : View {
        return view('admin.clear-database.index');
    }

    function clearDatabase() {
        try {
            // wipe database
            Artisan::call('migrate:fresh');
            // seed default data
            Artisan::call('db:seed', ['--class' => 'RolePermissionSeeder']);
            Artisan::call('db:seed', ['--class' => 'AdminSeeder']);
            Artisan::call('db:seed', ['--class' => 'SiteSettingSeeder']);
            Artisan::call('db:seed', ['--class' => 'MenuSeeder']);
            Artisan::call('db:seed', ['--class' => 'PaymentSettingSeeder']);

            // delete files
            $this->deleteFiles();

            return response(['message' => 'Database wiped successfully!']);

        } catch(\Exception $e) {
            throw $e;
        }
    }

    function deleteFiles() : void {
        $path = public_path('uploads');
        $allFlies = File::allFiles($path);

        foreach($allFlies as $file) {
            $filename = $file->getFilename();

            File::delete($filename);
        }
    }
//     function exportDatabase() {
//     try {
//         $databaseName = DB::getConnection()->getDatabaseName();
//         $exportPath = storage_path('app/database_backup.sql');

//         // Export the database using mysqldump command
//         $process = new Process(['mysqldump', '-u', env('DB_USERNAME'), '-p' . env('DB_PASSWORD'), $databaseName, '>', $exportPath]);
//         $process->mustRun();

//         // Download the exported database file
//         return response()->download($exportPath)->deleteFileAfterSend(true);
//     } catch (ProcessFailedException $exception) {
//         throw $exception;
//     }
// }



//Ketach yalew betam truw nw database 16 is better

// function exportDatabase() {
//     try {
//         // Set export path
//         $exportPath = storage_path('app/database_backup.sql');

//         // Open a file handle
//         $handle = fopen($exportPath, 'w');

//         // Get table names
//         $tables = DB::select('SHOW TABLES');

//         // Iterate over each table
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table structure
//             $tableStructure = DB::select("SHOW CREATE TABLE $tableName")[0]->{'Create Table'};

//             // Modify the data types for specific columns if necessary
//             if ($tableName === 'admin_menu_items') {
//                 $tableStructure = str_replace(
//                     '`menu_id` bigint(20) unsigned NOT NULL,',
//                     '`menu_id` bigint(20) unsigned NOT NULL,',
//                     $tableStructure
//                 );
//             }

//             // Write the table structure to the file
//             fwrite($handle, $tableStructure . ";\n\n");
//         }

//         // Iterate over each table again to export data
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table data
//             $tableData = DB::table($tableName)->get()->toArray();

//             // Insert the data into the file
//             foreach ($tableData as $row) {
//                 $rowValues = implode("', '", (array)$row);
//                 fwrite($handle, "INSERT INTO `$tableName` VALUES ('$rowValues');\n");
//             }

//             // Add a new line after each table's data
//             fwrite($handle, "\n");
//         }

//         // Close the file handle
//         fclose($handle);

//         // Download the exported database file
//         return response()->download($exportPath)->deleteFileAfterSend(true);
//     } catch (\Exception $exception) {
//         throw $exception;
//     }
// }


//Yihe eski lemoker demo


function exportDatabase() {
    try {
        $timestamp = date('Y-m-d_H-i-s');
        // Set export path
        $exportPath = storage_path("app/database_backup_{$timestamp}.sql");

        // Open a file handle
        $handle = fopen($exportPath, 'w');

        // Get table names
        $tables = DB::select('SHOW TABLES');

        // Iterate over each table
        foreach ($tables as $table) {
            $tableName = reset($table);

            // Retrieve the table structure
            $tableStructureResult = DB::select("SHOW CREATE TABLE `$tableName`");
            $tableStructure = $tableStructureResult[0]->{'Create Table'};

            // Write the table structure to the file
            fwrite($handle, $tableStructure . ";\n\n");

            // Retrieve the table data
            $tableDataResult = DB::table($tableName)->get();

            // Insert the data into the file
            foreach ($tableDataResult as $row) {
                $rowValues = [];
                foreach ((array)$row as $value) {
                    $rowValues[] = is_null($value) ? 'NULL' : "'" . addslashes($value) . "'";
                }
                $rowValuesString = implode(', ', $rowValues);
                fwrite($handle, "INSERT INTO `$tableName` VALUES ($rowValuesString);\n");
            }

            // Add a new line after each table's data
            fwrite($handle, "\n");
        }

        // Close the file handle
        fclose($handle);

        // Download the exported database file
        return response()->download($exportPath)->deleteFileAfterSend(true);
    } catch (\Exception $exception) {
        // Log the exception
        \Log::error("Error exporting database: " . $exception->getMessage());
        
        // Return a response indicating the failure
        return response()->json(['error' => 'Failed to export database.'], 500);
    }
}


// function exportDatabase() {
//     try {
//         // Set export path
//         $exportPath = storage_path('app/database_backup.sql');

//         // Open a file handle
//         $handle = fopen($exportPath, 'w');

//         // Get table names
//         $tables = DB::select('SHOW TABLES');

//         // Iterate over each table
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table structure
//             $tableStructure = DB::select("SHOW CREATE TABLE $tableName")[0]->{'Create Table'};

//             // Modify the data types for specific columns if necessary
//             if ($tableName === 'admin_menu_items') {
//                 // Modify the foreign key constraint
//                 $tableStructure = str_replace(
//                     'CONSTRAINT `admin_menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
//                     '',
//                     $tableStructure
//                 );
//             }

//             // Write the table structure to the file
//             fwrite($handle, $tableStructure . ";\n\n");
//         }

//         // Iterate over each table again to export data
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table data
//             $tableData = DB::table($tableName)->get()->toArray();

//             // Insert the data into the file
//             foreach ($tableData as $row) {
//                 $rowValues = implode("', '", (array)$row);
//                 fwrite($handle, "INSERT INTO `$tableName` VALUES ('$rowValues');\n");
//             }

//             // Add a new line after each table's data
//             fwrite($handle, "\n");
//         }

//         // Close the file handle
//         fclose($handle);

//         // Download the exported database file
//         return response()->download($exportPath)->deleteFileAfterSend(true);
//     } catch (\Exception $exception) {
//         throw $exception;
//     }
// }




// function exportDatabase() {
//     try {
//         // Set export path
//         $exportPath = storage_path('app/database_backup.sql');

//         // Open a file handle
//         $handle = fopen($exportPath, 'w');

//         // Get table names
//         $tables = DB::select('SHOW TABLES');

//         // Iterate over each table
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table structure
//             $tableStructure = DB::select("SHOW CREATE TABLE $tableName")[0]->{'Create Table'};

//             // Modify the data types for specific columns if necessary
//             if ($tableName === 'admin_menu_items') {
//                 // Modify the foreign key constraint
//                 $tableStructure = preg_replace('/,\s+?\)$/', ')', $tableStructure);
//             }

//             // Write the table structure to the file
//             fwrite($handle, $tableStructure . ";\n\n");
//         }

//         // Iterate over each table again to export data
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table data
//             $tableData = DB::table($tableName)->get()->toArray();

//             // Insert the data into the file
//             foreach ($tableData as $row) {
//                 $rowValues = implode("', '", (array)$row);
//                 fwrite($handle, "INSERT INTO `$tableName` VALUES ('$rowValues');\n");
//             }

//             // Add a new line after each table's data
//             fwrite($handle, "\n");
//         }

//         // Close the file handle
//         fclose($handle);

//         // Download the exported database file
//         return response()->download($exportPath)->deleteFileAfterSend(true);
//     } catch (\Exception $exception) {
//         throw $exception;
//     }
// }


// function exportDatabase() {
//     try {
//         // Set export path
//         $exportPath = storage_path('app/database_backup.sql');

//         // Open a file handle
//         $handle = fopen($exportPath, 'w');

//         // Get table names
//         $tables = DB::select('SHOW TABLES');

//         // Iterate over each table
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table structure from information schema
//             $tableStructureQuery = "SELECT table_name, column_name, column_default, is_nullable, data_type, character_maximum_length, numeric_precision, numeric_scale, column_type, column_key, extra FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = '$tableName'";
//             $tableStructureResult = DB::select($tableStructureQuery);

//             // Write the table structure to the file
//             fwrite($handle, "CREATE TABLE `$tableName` (\n");
//             foreach ($tableStructureResult as $column) {
//                 fwrite($handle, "  `$column->column_name` $column->column_type");
//                 if ($column->column_default !== null) {
//                     fwrite($handle, " DEFAULT '$column->column_default'");
//                 }
//                 if ($column->is_nullable === 'NO') {
//                     fwrite($handle, " NOT NULL");
//                 }
//                 if ($column->extra === 'auto_increment') {
//                     fwrite($handle, " AUTO_INCREMENT");
//                 }
//                 fwrite($handle, ",\n");
//             }

//             // Add primary key constraint
//             fwrite($handle, "  PRIMARY KEY (`id`),\n");

//             // Add foreign key constraints if any
//             if ($tableName === 'admin_menu_items') {
//                 fwrite($handle, "  CONSTRAINT `admin_menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE\n");
//             }

//             // Finish table definition
//             fwrite($handle, ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\n\n");
//         }

//         // Iterate over each table again to export data
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table data
//             $tableData = DB::table($tableName)->get()->toArray();

//             // Insert the data into the file
//             foreach ($tableData as $row) {
//                 $rowValues = implode("', '", (array)$row);
//                 fwrite($handle, "INSERT INTO `$tableName` VALUES ('$rowValues');\n");
//             }

//             // Add a new line after each table's data
//             fwrite($handle, "\n");
//         }

//         // Close the file handle
//         fclose($handle);

//         // Download the exported database file
//         return response()->download($exportPath)->deleteFileAfterSend(true);
//     } catch (\Exception $exception) {
//         throw $exception;
//     }




// function exportDatabase() {
//     try {
//         // Set export path
//         $exportPath = storage_path('app/database_backup.sql');

//         // Open a file handle
//         $handle = fopen($exportPath, 'w');

//         // Get table names
//         $tables = DB::select('SHOW TABLES');

//         // Iterate over each table
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table structure from information schema
//             $tableStructureQuery = "SELECT table_name, column_name, column_default, is_nullable, data_type, character_maximum_length, numeric_precision, numeric_scale, column_type, column_key, extra FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = '$tableName'";
//             $tableStructureResult = DB::select($tableStructureQuery);

//             // Write the table structure to the file
//             fwrite($handle, "CREATE TABLE `$tableName` (\n");
//             foreach ($tableStructureResult as $column) {
//                 fwrite($handle, "  `$column->column_name` $column->column_type");
//                 if ($column->column_default !== null) {
//                     fwrite($handle, " DEFAULT '$column->column_default'");
//                 }
//                 if ($column->is_nullable === 'NO') {
//                     fwrite($handle, " NOT NULL");
//                 }
//                 if ($column->extra === 'auto_increment') {
//                     fwrite($handle, " AUTO_INCREMENT");
//                 }
//                 fwrite($handle, ",\n");
//             }

//             // Add primary key constraint
//             fwrite($handle, "  PRIMARY KEY (`id`)\n");

//             // Finish table definition
//             fwrite($handle, ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\n\n");
//         }

//         // Iterate over each table again to export data
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table data
//             $tableData = DB::table($tableName)->get()->toArray();

//             // Insert the data into the file
//             foreach ($tableData as $row) {
//                 $rowValues = implode("', '", (array)$row);
//                 fwrite($handle, "INSERT INTO `$tableName` VALUES ('$rowValues');\n");
//             }

//             // Add a new line after each table's data
//             fwrite($handle, "\n");
//         }

//         // Close the file handle
//         fclose($handle);

//         // Download the exported database file
//         return response()->download($exportPath)->deleteFileAfterSend(true);
//     } catch (\Exception $exception) {
//         throw $exception;
//     }
// }



// function exportDatabase() {
//     try {
//         // Set export path
//         $exportPath = storage_path('app/database_backup.sql');

//         // Open a file handle
//         $handle = fopen($exportPath, 'w');

//         // Get table names
//         $tables = DB::select('SHOW TABLES');

//         // Iterate over each table
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table structure from information schema
//             $tableStructureQuery = "SELECT table_name, column_name, column_default, is_nullable, data_type, character_maximum_length, numeric_precision, numeric_scale, column_type, column_key, extra FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = '$tableName'";
//             $tableStructureResult = DB::select($tableStructureQuery);

//             // Write the table structure to the file
//             fwrite($handle, "CREATE TABLE `$tableName` (\n");
//             foreach ($tableStructureResult as $column) {
//                 fwrite($handle, "  `$column->column_name` $column->column_type");
//                 if ($column->column_default !== null) {
//                     fwrite($handle, " DEFAULT '$column->column_default'");
//                 }
//                 if ($column->is_nullable === 'NO') {
//                     fwrite($handle, " NOT NULL");
//                 }
//                 if ($column->extra === 'auto_increment') {
//                     fwrite($handle, " AUTO_INCREMENT");
//                 }
//                 fwrite($handle, ",\n");
//             }

//             // Add primary key constraint
//             fwrite($handle, "  PRIMARY KEY (`id`)\n");

//             // Finish table definition
//             fwrite($handle, ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\n\n");
//         }

//         // Iterate over each table again to export data
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table data
//             $tableData = DB::table($tableName)->get()->toArray();

//             // Insert the data into the file
//             foreach ($tableData as $row) {
//                 $rowValues = implode("', '", (array)$row);
//                 fwrite($handle, "INSERT INTO `$tableName` VALUES ('$rowValues');\n");
//             }

//             // Add a new line after each table's data
//             fwrite($handle, "\n");
//         }

//         // Close the file handle
//         fclose($handle);

//         // Download the exported database file
//         return response()->download($exportPath)->deleteFileAfterSend(true);
//     } catch (\Exception $exception) {
//         throw $exception;
//     }
// }

// function exportDatabase() {
//     try {
//         // Set export path
//         $exportPath = storage_path('app/database_backup.sql');

//         // Open a file handle
//         $handle = fopen($exportPath, 'w');

//         // Get table names
//         $tables = DB::select('SHOW TABLES');

//         // Iterate over each table
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table structure from information schema
//             $tableStructureQuery = "SELECT table_name, column_name, column_default, is_nullable, data_type, character_maximum_length, numeric_precision, numeric_scale, column_type, column_key, extra FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = '$tableName'";
//             $tableStructureResult = DB::select($tableStructureQuery);

//             // Write the table structure to the file
//             fwrite($handle, "CREATE TABLE `$tableName` (\n");
//             foreach ($tableStructureResult as $column) {
//                 fwrite($handle, "  `$column->column_name` $column->column_type");
//                 if ($column->column_default !== null) {
//                     fwrite($handle, " DEFAULT '$column->column_default'");
//                 }
//                 if ($column->is_nullable === 'NO') {
//                     fwrite($handle, " NOT NULL");
//                 }
//                 if ($column->extra === 'auto_increment') {
//                     fwrite($handle, " AUTO_INCREMENT");
//                 }
//                 fwrite($handle, ",\n");
//             }

//             // Add primary key constraint
//             fwrite($handle, "  PRIMARY KEY (`id`)\n");

//             // Finish table definition
//             fwrite($handle, ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;\n\n");
//         }

//         // Iterate over each table again to export data
//         foreach ($tables as $table) {
//             $tableName = reset($table);

//             // Retrieve the table data
//             $tableData = DB::table($tableName)->get()->toArray();

//             // Insert the data into the file
//             foreach ($tableData as $row) {
//                 $rowValues = implode("', '", (array)$row);
//                 fwrite($handle, "INSERT INTO `$tableName` VALUES ('$rowValues');\n");
//             }

//             // Add a new line after each table's data
//             fwrite($handle, "\n");
//         }

//         // Close the file handle
//         fclose($handle);

//         // Download the exported database file
//         return response()->download($exportPath)->deleteFileAfterSend(true);
//     } catch (\Exception $exception) {
//         throw $exception;
//     }
// }







}


