<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportDatabase
{
    public function export()
    {
        // Retrieve all table names from the database
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        $spreadsheet = new Spreadsheet();

        foreach ($tables as $table) {
            // Create a new worksheet for each table
            $sheet = $spreadsheet->createSheet();
            $sheet->setTitle($table);

            // Get the table data
            $data = DB::table($table)->get()->toArray();

            if (!empty($data)) {
                // Get the table columns
                $columns = array_keys((array) $data[0]);

                // Set the column headers
                $columnIndex = 1;
                foreach ($columns as $column) {
                    $sheet->setCellValueByColumnAndRow($columnIndex, 1, $column);
                    $columnIndex++;
                }

                // Set the data rows
                $row = 2;
                foreach ($data as $item) {
                    $itemArray = (array) $item;
                    $columnIndex = 1;
                    foreach ($columns as $column) {
                        $sheet->setCellValueByColumnAndRow($columnIndex, $row, $itemArray[$column]);
                        $columnIndex++;
                    }
                    $row++;
                }
            }
        }

        // Create a writer object
        $writer = new Xlsx($spreadsheet);

        // Set the output file path and save the file
        $filePath = storage_path('app/database_export.xlsx');
        $writer->save($filePath);

        return $filePath;
    }
}