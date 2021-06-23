<?php

namespace App\Http\Controllers;

use App\Event;
use App\Zone;
use App\Area;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        
        $data = Event::whereDate('fecha', '>=', now())
            ->get();

        // $data = Event::all();

        return response(['data' => $data]);
    }

    // listado eventos gestor eventos
    public function show() {
        return view('events.index');
    }


    public function createevent(Request $request) {

        $myZones = Zone::get()->count();
        $myDepartments = Department::get()->count();


        $event = Event::create([
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => $request->nombre,
            'jornada' => 1,
            'fecha'  =>  $request->fechaevento ? Carbon::createFromFormat('d/m/Y',  $request->fechaevento) : null,
            'hora'  => $request->horaevento ? Carbon::createFromFormat('H:i', $request->horaevento ) : null,
            'not_confirmed_date' => $request->fecha_confirmada,
            'id_competicion' => 1,
            'ubicacion_id' => $request->ubicacion,
            'activo' => 1,
            'emitiendo' => 1,
            'codigo' => 'codigo por definir',
            'excluido' => 1,
            'tipo_cupo' => 1,
            'activity_id' => $request->actividad,
            'type_id' => $request->tipoActividad,
            'level' => 1,
        ]);

        $myEventId = $event->id;
        
        $myCupo = 1;

            // crea zonas para el evento, con myzones tenemos todas las zonas disponibles
            for ($i=1; $i<= $myZones ; $i++) { 

                DB::table('event_zone')->insert([
                    [
                        'event_id' => $myEventId, 
                        'zone_id' => $i,
                        'cupo' => 0,
                        'price' => 0,
                    ]
                ]);

            }                 

            // crea tabla zonas por departamento
            for ($d=1; $d<= $myDepartments ; $d++) { 
                for ($z=1; $z <=$myZones ; $z++) { 
                    $myCupo = 0;
                    DB::table('event_department_zone')->insert([    
                        [
                            'event_id' => $myEventId, 
                            'zone_id' => $z,
                            'department_id' => $d,
                            'cupo' => $myCupo,        
                        ]
                    ]);
                    $myCupo++;
                 }

            }           
                    
        
            // crea tabla departamento generico
            for ($d=1; $d<= $myDepartments ; $d++) { 
                DB::table('event_department_generic')->insert([
                    [
                        'event_id' => $myEventId, 
                        'department_id' => $d,
                        'cupo' => 0,
                    ]
                ]);
            }

        // $event->fecha = Carbon::createFromFormat('Y-m-d', $event->fecha)->toDateString();

        
        
        return response ([
            'event' => $myEventId,
            'eventData' => $event,
            'fecha' => Carbon::parse($event->fecha)->format('Y-m-d'),
            'hora' => Carbon::parse($event->hora)->format('H:i'),
            'success' => true
           ]);

    }

    
    public function crearEventoManual() {

        echo "inicio";
        echo "<br>";

        $myCreatedEvent = Event::create([
            'app_event_id' => 173,
            'app_schedule_id' => 557,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'CREW',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,4),
            'hora' => '08:00',
            'not_confirmed_date' => 0,
            'id_competicion' => 1,
            'ubicacion_id' => 1,
            'activo' => 1,
            'emitiendo' => 1,
            'codigo' => '',
            'excluido' => 1,
            'activity_id' => 1,
            'type_id' => 1,
            'tipo_cupo' => 2,
            'level' => 0,
        ]);        


//        return $myCreatedEvent->id;


        // ---------- INICIO creacion tablas intermedias y asignacion cupos -----
        // -------------------------------------------------------------------            
    
        $numZonas = Zone::all()->count();
        $numDepartments = Department::all()->count();
        
            for ($j=1; $j <=3 ; $j++) { 
                DB::table('event_invitation_type')->insert([
                    [
                        'event_id' => $myCreatedEvent->id, 
                        'invitation_type_id' => $j,
                    ]
                ]);
            }    

        // tabla de event_zone todas las zonas
            
            for ($j=1; $j <= $numZonas ; $j++) { 
                DB::table('event_zone')->insert([
                    [
                        'event_id' => $myCreatedEvent->id, 
                        'zone_id' => $j,
                        'cupo' => 20,
                        'price' => 0,
                    ]
                ]);
            }
            

        // tabla de event_department_zone para  todas las zonas y departamentos
                        
            for ($i=1; $i <=$numDepartments ; $i++) { 
                for ($j=1; $j <=$numZonas ; $j++) { 

                    DB::table('event_department_zone')->insert([
                            [                           
                                'event_id' => $myCreatedEvent->id, 
                                'department_id' => $i,
                                'zone_id' => $j,
                                'cupo' => 0,        
                            ]
                    ]);                   

                }    
            }  
        

            // Fox
            $affected = DB::table('event_department_zone')
            ->where('event_id', $myCreatedEvent->id)
            ->where('department_id', 24)  
            ->where('zone_id', 22)
            ->update(['cupo' => 100]);          

            $affected = DB::table('event_department_zone')
            ->where('event_id', $myCreatedEvent->id)
            ->where('department_id', 24)  
            ->where('zone_id', 43)
            ->update(['cupo' => 100]);                 
            
            $affected = DB::table('event_department_zone')
            ->where('event_id', $myCreatedEvent->id)
            ->where('department_id', 24)  
            ->where('zone_id', 44)
            ->update(['cupo' => 100]);        
            
            // barras

            $affected = DB::table('event_department_zone')
            ->where('event_id', $myCreatedEvent->id)
            ->where('department_id', 25)  
            ->where('zone_id', 22)
            ->update(['cupo' => 100]);          

            $affected = DB::table('event_department_zone')
            ->where('event_id', $myCreatedEvent->id)
            ->where('department_id', 25)  
            ->where('zone_id', 43)
            ->update(['cupo' => 100]);                 
            
            $affected = DB::table('event_department_zone')
            ->where('event_id', $myCreatedEvent->id)
            ->where('department_id', 25)  
            ->where('zone_id', 44)
            ->update(['cupo' => 100]);      

            // azafatas
            $affected = DB::table('event_department_zone')
            ->where('event_id', $myCreatedEvent->id)
            ->where('department_id', 26)  
            ->where('zone_id', 22)
            ->update(['cupo' => 100]);          

            $affected = DB::table('event_department_zone')
            ->where('event_id', $myCreatedEvent->id)
            ->where('department_id', 26)  
            ->where('zone_id', 43)
            ->update(['cupo' => 100]);                 
            
            $affected = DB::table('event_department_zone')
            ->where('event_id', $myCreatedEvent->id)
            ->where('department_id', 26)  
            ->where('zone_id', 44)
            ->update(['cupo' => 100]);      

        
            // for ($j=1; $j <=$numZonas ; $j++) { 
            //     // Invitaciones
            //     $affected = DB::table('event_department_zone')
            //     ->where('event_id', $myCreatedEvent->id)
            //     ->where('department_id', 27)  
            //     ->where('zone_id', $j)
            //     ->update(['cupo' => 15]);                          
            // }
        

        // fin cupos

        // cupos para departamento invitaciones para todos los eventos

        for ($d=1; $d<= $numDepartments ; $d++) { 
            DB::table('event_department_generic')->insert([
                [
                    'event_id' => $myCreatedEvent->id, 
                    'department_id' => $d,
                    'cupo' => 20,
                ]
            ]);
        }
        

        // ---------- fin creacion tablas intermedias y asignacion cupos -----
        // -------------------------------------------------------------------

        echo "<br>";
        echo "creado";
        echo "<br>";
        echo $myCreatedEvent->id;
    }




    public function showeventcreateform() {
        return view('events.create');
    }


    // edicion de evento
    public function edit(Event $event) {
        return view('events.edit',compact('event'));
    }    

    // guardar nuevo evento
    public function gestorstoreevent(Request $request) {
 
        $event = (int) $request->eventID;
        $zonas = (int) $request->zonas;
        $departamentos = (int) $request->departamentos;

        $myData = $request->data;

        $myZonas =  array();
        $myZonaName = '';
        
        $myNewCupo = 0;
        $myZoneId = 0;

        $myModalidadCupo = $request->modalidadcupo;
        $myDataGeneric = $request->datadepartamentogenerico;
        $myDataZone = $request->datacuposyentradas;

     
        $myArrayTemplates = [];
        $myArrayTemplateDetails = [];
        $myArrayData = [];

        
        if ($myModalidadCupo == 2) {

            foreach ($myData as $departamento) {

                for ($i=1; $i <= $zonas ; $i++) { 
                    $myZonaName = 'zona'.$i;

                    $myNewCupo = (int) $departamento[$myZonaName]['cupo'];
                    $myZoneId =  (int) $departamento[$myZonaName]['id'];

                    array_push($myZonas,  $myZoneId );

                    // update record
                    $affected = DB::table('event_department_zone')
                        ->where('id', $myZoneId)
                        ->update(['cupo' => $myNewCupo]);
                }
            }
        } else {
            foreach ($myDataGeneric as $departamento) {

                    $myNewCupo = (int) $departamento['cupo'];
                    $myId =  (int) $departamento['id'];

                    // update record
                    $affected = DB::table('event_department_generic')
                        ->where('id', $myId)
                        ->update(['cupo' => $myNewCupo]);
            
            }
        }


        foreach ($myDataZone as $zone) {

            $myNewCupo = (int) $zone['cupo'];
            $myNewprice = (int) $zone['price'];
            $myId =  (int) $zone['id'];

            // update record
            $affected = DB::table('event_zone')
                ->where('id', $myId)
                ->update(
                    [
                        'cupo' => $myNewCupo,
                        'price' => $myNewprice
                        ]                
                );
    
    }

        $myEventId = $request->eventID;

      // update record

      $dateNotConfirmed = 0;
      if ($request->fechanoconfirmada == true) {
        $dateNotConfirmed = 1;
      } else {
        $dateNotConfirmed = 0;
      }
      $affected = DB::table('events')
      ->where('id', $myEventId)
      ->update(
          [
            'nombre' => $request->nombreevento,
            'not_confirmed_date' => $dateNotConfirmed,
            'fecha'  =>  $request->fechaevento ? Carbon::createFromFormat('d/m/Y',  $request->fechaevento) : null,
            'hora'  => $request->horaevento ? Carbon::createFromFormat('H:i', $request->horaevento ) : null,

            'jornada'  => $request->jornadaevento,
            'id_aforo'  => $request->aforoevento,
            'ubicacion_id'  => $request->ubicacion,
            'activity_id'  => $request->activity,
            'type_id'  => $request->type,
            'level'  => $request->nivellCmb,
            'tipo_cupo'  => $myModalidadCupo,
           ]                
      );

      // sincronizacion de plantillas para este evento en concreto

      foreach ($request->listadoCompletoPlantillas as $template) {
          
            array_push($myArrayTemplates, $template['id']);
            array_push(
                $myArrayTemplateDetails,
                [
                    'content' => $template['content'],
                    'subject' => $template['subject'],
                    'name' => $template['name'],
                    'activity_id' => $request->activity ,
                    'activity_type_id' => $request->type,
                    'invitation_type_id' => $template['invitation_type_id'],
                    'language_id' => $template['language_id'],                
                ]
            );

        }

        $myArrayData = array_combine($myArrayTemplates, $myArrayTemplateDetails);

        $myEvent = Event::find($myEventId);
        
        $myEvent->templates()->sync($myArrayData);


        return response ([
             'zonas' => $zonas,
             'departamentos' => $departamentos,
             'event' => $event,
             'success' => true
            ]);

    }

    public function getEventTemplate($activity_id,$activity_type_id,$invitation_type_id,$lang_id,$event_id) {
        $event = Event::find($event_id);
        
        // $template = $event->templates()->where('activity_id',$activity_id)
      
        $template = DB::table('email_template_event')
                            ->where('event_id',$event_id)
                            ->where('activity_id',$activity_id)
                            ->where('activity_type_id',$activity_type_id)
                            ->where('invitation_type_id',$invitation_type_id)
                            ->where('language_id',$lang_id)
                            ->select('content','subject')->get();

    return response ([
        'template' => $template,

        'success' => true
        ]);
    }

    public function getEventTemplatesAll($event_id) {

        $event = Event::find($event_id);
        $templates = $event->templates;
        
        return response ([
            'templates' => $templates,
            'success' => true
            ]);

    }

    public function getEventTemplateById($event_id,$template_id) {

        $template = DB::table('email_template_event')
        ->where('event_id',$event_id)
        ->where('email_template_id',$template_id)
        ->select('content','subject')->get();
        
        return response ([
            'template' => $template,
            'success' => true
            ]);

    }


    public function deleteEvent(Request $request) {

        $data = Event::find($request->eventId);
    
        $data->destroy($data->id);
 
        // eliminar referencias en event zone

        DB::table('event_zone')->where('event_id', '=', $request->eventId)->delete();

        // eliminar referencias en event department zone
        DB::table('event_department_zone')->where('event_id', '=', $request->eventId)->delete();

        // eliminar referencias en event department generic
        DB::table('event_department_generic')->where('event_id', '=', $request->eventId)->delete();

        return  response(['success' => true, 'data' => $data->id]);    
        
    }


    public function exportEventQRCodes ($eventId) {
        // exportar los codigos de todas las invitaciones del evento enviado por parametro

        
    }
    
}
