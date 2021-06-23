<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getLocationsAllShowList() {
        return view ('locations.index');
    }

    public function getAllLocations() {
   
        $myLocations = Location::get();

        return response([
            'data' => $myLocations,
            'success' => true,
        ]);

    }

    public function locationStore(Request $request) {

        $myLocation = Location::create([
            'nombre' => $request->name,
            'tipo_ubicacion_id' => $request->tipo_ubicacion_id
        ]);
      
        return response([
            'success' => true,
        ]);

    }


    public function locationEdit(Request $request) {
        $myId =  $request->locationId;

        $myLocation = Location::where('id',$myId)
        ->update([
            'nombre' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }

    public function deleteLocation(Request $request) {
        $data = Location::find($request->locationId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }        
}
