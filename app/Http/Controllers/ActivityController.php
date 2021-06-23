<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function index()
    {
        $mySectors = Activity::orderBy('nombre')->get();
        return response([
            'success' => true,
            'data' => $mySectors
        ]);
    }

    public function getActividadShowList() {
        return view ('activity.index');
    }

    public function getAllActividad() {
        $myActivities = Activity::orderBy('name')->get();
        return response(
            [
                'success' => true,
                'data' => $myActivities
            ]
        );
    }

    public function getActividadesUbicacion($ubicvacionID) {

        $myActivities = Activity::where('location_id',$ubicvacionID)->orderBy('name')->get();
        return response(
            [
                'success' => true,
                'data' => $myActivities
            ]
        );
    }    

    

        public function actividadStore(Request $request) {

        $mySector = Activity::create([
            'name' => $request->name,
            'location_id' => $request->locationId,
        ]);

        return response([
            'success' => true,
        ]);

    }


    public function actividadEdit(Request $request) {
        $myId =  $request->activityId;

        $mySector = Activity::where('id',$myId)
        ->update([
            'name' => $request->name,
        ]);

        return response([
            'success' => true,
        ]);
    }


    public function deleteActividad(Request $request) {
        $data = Activity::find($request->activityId);

        $data->destroy($data->id);

        return  response(['success' => true, 'data' => $data->id]);
    }





}
