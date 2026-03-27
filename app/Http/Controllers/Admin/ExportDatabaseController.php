<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class ExportDatabaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:database export']);
    }

    public function index() : View
    {
        return view('admin.exports-database.index');
    }

public function exportDatabase(Request $request)
{
    try {
            $exportDatabase = new ExportDatabase();
            $filePath = $exportDatabase->export();

            return new BinaryFileResponse($filePath);
        } catch (\Exception $e) {
            throw $e;
        }
}
}