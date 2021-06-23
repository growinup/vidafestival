<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventDepartmentGenericController extends Controller
{
   
    public function event_department_generic_index ( $eventId,$departmentId ) {

        $myDepartment = DB::table('event_department_generic')
        ->where('event_department_generic.event_id',$eventId)
        ->where('event_department_generic.department_id','=',$departmentId)
        ->get();     

        return response([
            'data' => $myDepartment,
            'success' => true
            ]);


    }
}
