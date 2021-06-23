<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $myAreas = Area::orderBy('nombre')->get();
        return response(
            [
                'success'    => true,
                'data' => $myAreas
            ]
        );
    }

    public function getAllAreas() {
        $myAreas = Area::orderBy('nombre')->get();
        return response(
            [
                'success'    => true,
                'data' => $myAreas
            ]
        );
    }

    public function getAreasShowList() {
        return view ('areas.index');
    }

    public function areaStore(Request $request) {
        
        $myArea = Area::create([
            'nombre' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);

    }

    public function areaEdit(Request $request) {
        $myId =  $request->areaId;

        $myArea = Area::where('id',$myId)
        ->update([
            'nombre' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }

    public function deleteArea(Request $request) {
        $data = Area::find($request->areaId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }            
    
}
