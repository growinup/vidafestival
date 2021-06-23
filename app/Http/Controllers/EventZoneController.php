<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventZoneController extends Controller
{

    public function index($eventId) {
        
        $sectorId = 0;

        if ($sectorId <> 0) {
        
       $myData = DB::table('event_zone')
        ->join('zones', 'event_zone.zone_id', '=', 'zones.id')
        ->where('event_zone.event_id',$eventId)
        ->where('zones.sector_id','=',$sectorId)
        ->select('event_zone.*','zones.nombre','zones.sector_id')->distinct()
        ->get();       
        
        } else {

            $myData = DB::table('event_zone')
            ->join('zones', 'event_zone.zone_id', '=', 'zones.id')
            ->where('event_zone.event_id',$eventId)
            ->select('event_zone.*','zones.nombre','zones.sector_id')->distinct()
            ->get();       

        }

        return response(['data' => $myData]);
    }




    public function event_department_zone_index ($eventId, $areaId, $sectorId) {

        // Event_Zone - zonas por evento , precio y cupo
        
       $myData = DB::table('event_department_zone')
        ->join('zones', 'event_department_zone.zone_id', '=', 'zones.id')
        ->join('departments', 'event_department_zone.department_id', '=', 'departments.id')
        ->where('event_department_zone.event_id',$eventId)
        ->where('departments.area_id',$areaId)
        ->where('zones.sector_id','=',$sectorId)
        ->select('event_department_zone.*','zones.nombre as nombreZona','zones.sector_id','departments.nombre as nombreDepartamento')->distinct()
        ->get();        


        $myZones = DB::table('event_department_zone')
        ->join('zones', 'event_department_zone.zone_id', '=', 'zones.id')
        ->join('departments', 'event_department_zone.department_id', '=', 'departments.id')
        ->where('event_department_zone.event_id',$eventId)
        ->where('zones.sector_id','=',$sectorId)
        ->where('event_department_zone.department_id','=',1)
        ->select('zones.nombre as nombreZona','zones.sector_id','departments.nombre')->distinct()
        ->get();     

        return response([
            'data' => $myData,
            'zones' => $myZones
            ]);
        
    }    


    public function event_department_zone_all_records ($eventId) {


        $myData = DB::table('event_department_zone')
        ->join('zones', 'event_department_zone.zone_id', '=', 'zones.id')
        ->join('departments', 'event_department_zone.department_id', '=', 'departments.id')
        ->where('event_department_zone.event_id',$eventId)
        ->select('event_department_zone.*','zones.nombre as nombreZona','zones.sector_id','departments.nombre as nombreDepartamento','departments.area_id as area_id')->distinct()
        ->get();        

      
        $myNumZones = DB::table('event_department_zone')
        ->join('zones', 'event_department_zone.zone_id', '=', 'zones.id')
        ->where('event_department_zone.event_id',$eventId)
        ->select('event_department_zone.*','zones.nombre as nombreZona','zones.sector_id')->distinct()
        ->get()->groupBy('zone_id')->count();     


        $myDepartments = DB::table('event_department_zone')
        ->join('zones', 'event_department_zone.zone_id', '=', 'zones.id')
        ->where('event_department_zone.event_id',$eventId)
        ->select('event_department_zone.*')->distinct()
        ->get()->groupBy('department_id')->count();     

        return response ([
            'data' => $myData,
            'zones' => $myNumZones,
            'departments' => $myDepartments,
            'success' => true
            ]);

    }
    

    public function event_department_all_records ($eventId) {

        $myData = DB::table('event_department_generic')
        ->join('departments', 'event_department_generic.department_id', '=', 'departments.id')
        ->where('event_department_generic.event_id',$eventId)
        ->select('event_department_generic.*','departments.nombre as nombreDepartamento','departments.area_id as area_id')->distinct()
        ->get();        

        $myDepartments = DB::table('event_department_generic')
        ->join('departments', 'event_department_generic.department_id', '=', 'departments.id')
        ->where('event_department_generic.event_id',$eventId)
        ->select('event_department_generic.*')->distinct()
        ->get()->groupBy('department_id')->count();     

        return response ([
            'data' => $myData,
            'departments' => $myDepartments,
            'success' => true
            ]);

    }



    public function event_department_cupo ($eventId, $departmentId) {

        $myData = DB::table('event_department_generic')
        ->join('departments', 'event_department_generic.department_id', '=', 'departments.id')
        ->where('event_department_generic.event_id',$eventId)
        ->where('event_department_generic.department_id',$departmentId)
        ->select('event_department_generic.*','departments.nombre as nombreDepartamento','departments.area_id as area_id')->distinct()
        ->get();        


        return response ([
            'data' => $myData,
            'success' => true
            ]);

    }    


    // peticions tipo 2 , cupo por zona y por departamento


    public function event_department_zone_cupo ($eventId, $departmentId) {

        // Event_Zone - zonas por evento , precio y cupo
     
        // $myZones = DB::table('event_department_zone')
        // ->join('zones', 'event_department_zone.zone_id', '=', 'zones.id')
        // ->join('event_zone', 'event_department_zone.zone_id', '=', 'event_zone.zone_id')
        // ->join('departments', 'event_department_zone.department_id', '=', 'departments.id')
        // ->where('event_department_zone.event_id',$eventId)
        // ->where('event_department_zone.department_id',$departmentId)
        // ->select('event_department_zone.*','zones.nombre','event_zone.price')->distinct()
        // ->get();     

        // return response([
        //     'zones' => $myZones
        //     ]);




        $myZones = DB::table('event_department_zone')
        ->join('zones', 'event_department_zone.zone_id', '=', 'zones.id')
        // ->join('event_zone', 'event_department_zone.event_id', '=', 'event_zone.event_id')
        ->join('departments', 'event_department_zone.department_id', '=', 'departments.id')
        ->where('event_department_zone.event_id',$eventId)
        ->where('event_department_zone.department_id',$departmentId)
        ->select('event_department_zone.*','zones.nombre')
        ->get();     


        $myZonesPrice = DB::table('event_zone')
        ->where('event_zone.event_id',$eventId)
        ->select('event_zone.*','event_zone.price')
        ->get();     


        //  $myZones =  $myZones->unique('id') ;
        return response()->json([
            'zones' => $myZones,
            'prices' => $myZonesPrice
            ]);
        



        
    }    

}
