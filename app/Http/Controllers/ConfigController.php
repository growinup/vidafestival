<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class ConfigController extends Controller
{
    public function index() {
        return view('config.index');
    }

    public function importExcel(Request $request) {
      $file = $request->file('file');
    
      Excel::import(new UsersImport,$file);

      return back()->with('nessage','Importacion de bans completada');

    }
}
