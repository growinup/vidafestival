<?php

namespace App\Http\Controllers;

use App\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index($id)
    {
        $myZones = Zone::where('sector_id',$id)->orderBy('nombre')->get();
        return response(['data' => $myZones]);
    }




    public function getZonasShowList() {
        return view ('zones.index');
    }

    public function getAllZonas() {
        $mySectors = Zone::orderBy('nombre')
        ->leftJoin('sectors', 'sectors.id', '=', 'zones.sector_id')       
        ->select('zones.id','zones.nombre','zones.sector_id', 'sectors.location_id')
        ->get();

        return response(
            [
                'success'    => true,
                'data' => $mySectors
            ]
        );
    }


        public function zonaStore(Request $request) {
        
        $mySector = Zone::create([
            'nombre' => $request->name,
            'sector_id' => $request->sectorId,
        ]);
      
        return response([
            'success' => true,
        ]);

    }
    

    public function zonaEdit(Request $request) {
        $myId =  $request->zonaId;

        $myZona = Zone::where('id',$myId)
        ->update([
            'nombre' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }    
    
    public function deleteZona(Request $request) {
        $data = Zone::find($request->zonaId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }             





}
