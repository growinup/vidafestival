<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $mySectors = Sector::orderBy('nombre')->get();
        return response([
            'success' => true,
            'data' => $mySectors
        ]);
    }



    public function getSectorsShowList() {
        return view ('sectors.index');
    }

    public function getAllSectors() {
        $mySectors = Sector::orderBy('nombre')->get();
        return response(
            [
                'success'    => true,
                'data' => $mySectors
            ]
        );
    }


        public function sectorStore(Request $request) {
        
        $mySector = Sector::create([
            'nombre' => $request->name,
            'location_id' => $request->locationId,
        ]);
      
        return response([
            'success' => true,
        ]);

    }
    

    public function sectorEdit(Request $request) {
        $myId =  $request->sectorId;

        $mySector = Sector::where('id',$myId)
        ->update([
            'nombre' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }    
    
    public function deleteSector(Request $request) {
        $data = Sector::find($request->sectorId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }             



}
