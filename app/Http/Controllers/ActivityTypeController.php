<?php

namespace App\Http\Controllers;

use App\ActivityType;
use Illuminate\Http\Request;

class ActivityTypeController extends Controller
{

    public function index()
    {
        $mySectors = ActivityType::orderBy('nombre')->get();
        return response([
            'success' => true,
            'data' => $mySectors
        ]);
    }

    public function getTipoActividadShowList() {
        return view ('activity-type.index');
    }

    public function getAllTipoActividad() {
        $myActivities = ActivityType::orderBy('name')->get();
        return response(
            [
                'success' => true,
                'data' => $myActivities
            ]
        );
    }

    public function getTipoActividad($actividadID) {
        $myActivities = ActivityType::where('activity_id',$actividadID)->orderBy('name')->get();
        return response(
            [
                'success' => true,
                'data' => $myActivities
            ]
        );
    }    

    


        public function tipoactividadStore(Request $request) {
        
        $mySector = ActivityType::create([
            'name' => $request->name,
            'location_id' => 1,
            'activity_id' => $request->activityId,
        ]);
      
        return response([
            'success' => true,
        ]);

    }
    

    public function tipoactividadEdit(Request $request) {
        $myId =  $request->activityTypeId;

        $myActivityType = ActivityType::where('id',$myId)
        ->update([
            'name' => $request->name,
        ]);
      
        return response([
            'success' => true,
        ]);
    }    
    
    public function deleteTipoActividad(Request $request) {
        $data = ActivityType::find($request->activityTypeId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }             



}
