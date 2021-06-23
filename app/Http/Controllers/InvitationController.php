<?php

namespace App\Http\Controllers;

use App\User;
use App\Guest;
use Carbon\Carbon;
use App\Department;
use App\Area;
use App\Zone;
use App\Event;
use App\EmailTemplate;
use App\Invitation;
use App\EditPurpose;
use App\Nationality;
use App\InvitationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GuestsExport;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('invitation.new');
    }

    public function store(Request $request)
    {
        $myArrayAsistentes = [];
        $myArrayMails = [];
        $myArrayData = [];

        $user = User::findOrFail($request->user_id);

        $myInvitation = Invitation::create([
            'estado' => $request->estado,
            'codigo' => 0,
            'fecha_peticion' =>  Carbon::createFromFormat('d/m/Y', $request->datePeticio ),
            'cantidad' => $request->quantitatInvitacions,
            'zona_id' =>  $request->zona_id,
            'user_id' => $request->user_id,
            'price' =>  $request->price,
            'en_nombre_de' =>  $request->en_nombre_de,
            'finalidad_id' =>  $request->finalidad_id,
            'tipo_invitacion_id' =>  $request->tipo_invitacion_id,
            'event_id' =>  $request->event_id,
            'email_secundario_peticion'  => $request->email_secundario_peticion,
            'tipo_cupo' => $request->tipo_cupo,
            'language_id' => $request->idioma_peticion
        ]);

        $myInvitation->codigo = $myInvitation->id;
        $myInvitation->save();

        $myInvitation->details()->create([
            'boca' => '',
            'fila' => '',
            'asiento' => '',
            'zona_id' => 0,
            'descripcion' => 'probando'
        ]);

        $prueba1 = Invitation::find( $myInvitation->id );
        
        $prueba1->details()->update([
                'descripcion' => ''
        ]);
         

        // update record tipo cupo 1

        if ($request->tipo_cupo == 1) {
            $affected = DB::table('event_department_generic')
            ->where('event_id', $request->event_id)
            ->where('department_id', $request->department_id)
            ->update(['cupo' => $request->nuevo_cupo]);
        }    

        if ($request->tipo_cupo == 2) {
            $affected = DB::table('event_department_zone')
            ->where('event_id', $request->event_id)
            ->where('department_id', $request->department_id)
            ->where('zone_id', $request->zona_id)
            ->update(['cupo' => $request->nuevo_cupo]);
        }


        // añadir invitadcos a tabla invitados

        // 'nombre'
        // 'apellidos'
        // 'dni'
        // 'email'
        // 'fecha_nacimiento'
        // 'nacionalidad'
        $myEvent = Event::find($request->event_id);        
        
        $myUserAppId = 0;
        foreach ($request->listadoAsistentes as $asistente) {

            try {
                $myGoodDate = Carbon::createFromFormat('d/m/Y',$asistente['fecha_nacimiento'] );
            } catch (\Throwable $th) {
                $myGoodDate = null;
            }
        
            // si existe editarlo
            
            $myGuest = Guest::where('email', $asistente['email'])->first();
                    
            if ($myGuest == null) {

                    // si no existe crearlo 
                    $myGuest = Guest::create([
                        'nombre' => $asistente['nombre'],
                        'apellidos' => $asistente['apellidos'],
                        'dni' => $asistente['dni'],
                        'email' => $asistente['email'],
                        'phone' => $asistente['asistenteTelefono'],
                        'fecha_nacimiento' => $myGoodDate,
                        'nationality_id' => $asistente['nationality_id'],
                        'es_menor' => $asistente['es_menor']
                    ]);

            } else {
                 Guest::where('email', $myGuest->dni)
                    ->update([
                        'nombre' => $asistente['nombre'],
                        'apellidos' => $asistente['apellidos'],
                        'dni' => $asistente['dni'],
                        'email' => $asistente['email'],
                        'phone' => $asistente['asistenteTelefono'],
                        'fecha_nacimiento' => $myGoodDate,
                        'nationality_id' => $asistente['nationality_id'],
                        'es_menor' => $asistente['es_menor']                                
                    ]);
                $myGuest = Guest::where('email', $asistente['email'])->first();
            }

                 
            // crear usuario en la app
            // crear usuario

            // if ($request->level != 0) {
 
                $existeUser = ( new UserController)->checkUserEmailApp( $asistente['email'] ) ;
                if ($existeUser == -1) {
                    
                    $res = ( new UserController)->createAppUser (
                            $asistente['email'],
                            $asistente['nombre'],
                            $asistente['apellidos'],
                            $asistente['dni'],
                            $myGoodDate );


                    if (is_integer($res)) {

                        if ($res == -1) {   
                
                        }

                    } else {
                        $myNewUserActivated =  ( new UserController)->createAppUserAccount( $res->user_id,$asistente['email'] );
                    }

                    // return response ([
                    //     'existe' => $existeUser,
                    //     'res' => $res,                    
                    // ]);

                    // actualizar id de user en la app
                    $myGuest->app_user_id = $res->user_id;
                    $myGuest->save();

                } else {
                    // usuario ya en la app
                    $myGuest->app_user_id = $existeUser;
                    $myGuest->save();
                }

            // }   
                        
            // add to guest_invitations
            
            // $myGuestUserToSendEmailToCheck = Guest::where('email',$myEmail)->first();                                   
            $myAppUserId = $myGuest->app_user_id;

            $myQR = Str::random(64);

            try {
                $myZonaName = "";
                $myZonaName = Zone::find( $request->zona_id )->nombre;
                
            } catch (\Throwable $th) {
                $myZonaName = "";
            }

            try {
                // generar fichero QR 
                $image = QrCode::format('png')                 
                ->size(200)->errorCorrection('H')
                ->generate( $myQR );
                $output_file = 'qrcodes/qr-' . time() . '.png';
                // Guardar QR en storage
                Storage::disk('local')->put('public'.'/' . $output_file, $image); //storage/app/public/img/qr-code/img-1557309130.png                           
            } catch (\Throwable $th) {
                $output_file = 'Not Valid';
            }

            // crear ticket app    
            $myTicket = ( new UserController)->createAppEventUserTicket($myAppUserId ,$myEvent->app_event_id ,$myEvent->app_schedule_id, $myQR,$myZonaName);                       

            array_push($myArrayAsistentes, $myGuest->id);
            array_push(
                $myArrayMails,
                [
                    'email' => $myGuest->email,
                    'send_email' => $asistente['send_email'],
                    'es_principal' => $asistente['asistente_principal'],
                    'app_ticket_id' => $myTicket->ticket_id,
                    'ticket_qrcode' => $myQR,
                    'qr_path' => $output_file 
                ]
            );
        }

        $myArrayData = array_combine($myArrayAsistentes, $myArrayMails);

        $myInvitation->guests()->sync($myArrayData);

        // enviar email!!

        if ($request->level == 0) {
        
            // enviar mail a cada asistente

            $myInvitation->guests;
            
            $myEmail = $request->email;
            $mySubject =  $request->asunto;
            $myHtml = $request->body;
            $user = $request->userName;

            foreach ($request->contenidoEnvio as $contenidoMail) {
            
                // enviar mail
                        
                $mySubject =  $request->asunto;
                $emailSecundario = $request->emailsecundario;
                $myEmail = $contenidoMail['email'];
                $myHtml = $contenidoMail['content'];
                $user = $contenidoMail['nombre'];

                // check path 

                // $myArrayMails,
                // [
                //     'email' => $myGuest->email,                 
                //     'qr_path' => $output_file 
                // ]

                $baseQrPath = asset('storage');

                $myImageTag = '';

                foreach ($myArrayMails as $value) {
                    if ($value['email'] == $contenidoMail['email'] ) {
                        $myImageTag = "<img src=".$baseQrPath."/".$value['qr_path'].">";
                    }
                }

                $myHtml= str_replace("{{QR_CODE}}", $myImageTag , $contenidoMail['content']);

                Mail::send([], [], function($message) use ($myEmail, $mySubject, $myHtml, $user, $emailSecundario)
                {                  
                    $message->to($myEmail)   
                    ->subject($mySubject)
                    ->setBody( $myHtml ,'text/html');    
                });
          
            }

        }

        return response([
            'success' => true,
            'data' => $myInvitation,
            'codigopeticion' => $myInvitation->codigo,
            'asistentes' => $myInvitation->guests(),
            'combined' => $myArrayData,
            'app_event_id' => $myEvent->app_event_id ,
            'app_schedule_id' => $myEvent->app_schedule_id
        ]);
    }

    public function edit(Request $request)
    {
        $myArrayAsistentes = [];
        $myArrayMails = [];
        $myArrayData = [];

        $user = User::findOrFail($request->user_id);

        $myInvitation = Invitation::findOrFail($request->IDPeticion);

        // $myInvitation->motivo_edicion_descripcion  = '';
        // $myInvitation->tipo_edicion  = 0;

        $myInvitation->estado = $request->estado;
        $myInvitation->cantidad = $request->quantitatInvitacions;
        $myInvitation->zona_id =  $request->zona_id;

        $myInvitation->price =  $request->price;
        $myInvitation->en_nombre_de =  $request->en_nombre_de;

        $myInvitation->finalidad_id =  $request->finalidad_id;

        $myInvitation->tipo_invitacion_id = $request->tipo_invitacion_id;

        $myInvitation->email_secundario_peticion  = $request->email_secundario_peticion;

        $myInvitation->codigo = $myInvitation->id;

        $myInvitation->language_id = $request->idioma_peticion;
        $myInvitation->editada = 0; 


        $myInvitation->save();



        // update record tipo cupo 1

        if ($request->tipo_cupo == 1) {
            $affected = DB::table('event_department_generic')
            ->where('event_id', $request->event_id)
            ->where('department_id', $request->department_id)
            ->update(['cupo' => $request->nuevo_cupo]);
        }    

        if ($request->tipo_cupo == 2) {
            $affected = DB::table('event_department_zone')
            ->where('event_id', $request->event_id)
            ->where('department_id', $request->department_id)
            ->where('zone_id', $request->zona_id)
            ->update(['cupo' => $request->nuevo_cupo]);
        }



        // añadir invitadcos a tabla invitados

        // 'nombre'
        // 'apellidos'
        // 'dni'
        // 'email'
        // 'fecha_nacimiento'
        // 'nacionalidad'

        foreach ($request->listadoAsistentes as $asistente) {

  
            try {
                $myGoodDate = Carbon::createFromFormat('d/m/Y',$asistente['fecha_nacimiento'] );
            } catch (\Throwable $th) {
                $myGoodDate = null;
            }
            

            // si existe editarlo
            
            $myGuest = Guest::where('dni', $asistente['dni'])->first();
                    
            if ($myGuest == null) {

                    // si no existe crearlo 
                    $myGuest = Guest::create([
                        'nombre' => $asistente['nombre'],
                        'apellidos' => $asistente['apellidos'],
                        'dni' => $asistente['dni'],
                        'email' => $asistente['email'],
                        'phone' => $asistente['asistenteTelefono'],
                        'fecha_nacimiento' => $myGoodDate,
                        'nationality_id' => $asistente['nationality_id'],
                        'es_menor' => $asistente['es_menor']
                    ]);

            } else {
                 Guest::where('dni', $myGuest->dni)
                    ->update([
                        'nombre' => $asistente['nombre'],
                        'apellidos' => $asistente['apellidos'],
                        'dni' => $asistente['dni'],
                        'email' => $asistente['email'],
                        'phone' => $asistente['asistenteTelefono'],
                        'fecha_nacimiento' => $myGoodDate,
                        'nationality_id' => $asistente['nationality_id'],
                        'es_menor' => $asistente['es_menor']                                
                    ]);
                    $myGuest = Guest::where('dni', $asistente['dni'])->first();

            }


            // add to guest_invitations

            array_push($myArrayAsistentes, $myGuest->id);
            array_push(
                $myArrayMails,
                [
                    'email' => $myGuest->email,
                    'send_email' => $asistente['send_email'],
                    'es_principal' => $asistente['asistente_principal']
                ]
            );
        }

        $myArrayData = array_combine($myArrayAsistentes, $myArrayMails);

        $myInvitation->guests()->sync($myArrayData);

        return response([
            'success' => true,
            'codigopeticion' => $myInvitation->codigo,
            'asistentes' => $myInvitation->guests(),
            'combined' => $myArrayData
        ]);
    }

    public function getInvitations($userId)
    {
        // $data = Invitation::where('user_id',$userId)->get();

        $myData = DB::table('invitations')
        ->join('events', 'invitations.event_id', '=', 'events.id')
        ->join('zones', 'invitations.zona_id', '=', 'zones.id')
        ->where('invitations.user_id',$userId)
        ->select('invitations.*','events.nombre as nombre_evento','events.activity_id', 
        'events.fecha as fecha_evento', 'events.hora as hora_evento','zones.nombre as zona',
        'events.not_confirmed_date' )
        ->get();      

        return response(['data' => $myData]);
    }

    public function getInvitationsAutorizador($userId)
    {

        $arrayAreasToAuto = [];

        $myUserToCheck = User::find($userId);
        $isDoubleAuth = $myUserToCheck->authleveltwo;

        $areasToAuth = $myUserToCheck->areas;

        if ($myUserToCheck->hasRole('superadmin' ) ) {
            $areasToAuth = Area::all();
        }

        foreach($areasToAuth as $areaToAuth) {
            array_push($arrayAreasToAuto, $areaToAuth->id);
        }


        $myDepartmentToCheck = Department::find($myUserToCheck->department_id);
        $myAreaToCheck = Area::find($myDepartmentToCheck->area_id);
        
        $myAreaForAutorizador = $myAreaToCheck->id;

        if ( $isDoubleAuth == 0) {
            $myData = DB::table('invitations')
            ->join('events', 'invitations.event_id', '=', 'events.id')
            ->join('zones', 'invitations.zona_id', '=', 'zones.id')
            ->join('users', 'invitations.user_id', '=', 'users.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->join('areas', 'departments.area_id', '=', 'areas.id')
            ->join('purposes', 'invitations.finalidad_id', '=', 'purposes.id')
            ->join('invitation_types', 'invitations.tipo_invitacion_id', '=', 'invitation_types.id')
            // ->where('areas.id','=' ,$myAreaForAutorizador )
            ->whereIn('areas.id', $arrayAreasToAuto )
            ->where(function($query) {
                $query->where('invitations.estado','=' ,1 )                
                ->orWhere('invitations.estado','=' ,3 )
                ->orWhere('invitations.estado','=' ,4 )
                ->orWhere('invitations.estado','=' ,5 )
                ->orWhere('invitations.estado','=' ,6 )
                ->orWhere('invitations.estado','=' ,7 )
                ->orWhere('invitations.estado','=' ,10 );
            })
            // ->where('editada','=' ,0 )
            ->select('invitations.*','events.nombre as nombre_evento','events.activity_id','events.level',
            'events.fecha as fecha_evento','events.not_confirmed_date', 'events.hora as hora_evento','zones.nombre as zona',
            'departments.nombre as user_dep','users.name as user_name',
            'purposes.name as finalidad','invitation_types.nombre as tipo_invitacion' ,
            )
            ->get();      
        }
        

        // peticiones para que las vea el doble autorizador
        if ( $isDoubleAuth == 1) {
            $myData = DB::table('invitations')
            ->join('events', 'invitations.event_id', '=', 'events.id')
            ->join('zones', 'invitations.zona_id', '=', 'zones.id')
            ->join('users', 'invitations.user_id', '=', 'users.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->join('areas', 'departments.area_id', '=', 'areas.id')
            ->join('purposes', 'invitations.finalidad_id', '=', 'purposes.id')
            ->join('invitation_types', 'invitations.tipo_invitacion_id', '=', 'invitation_types.id')
            // ->where('areas.id','=' ,$myAreaForAutorizador )
            ->whereIn('areas.id', $arrayAreasToAuto )
            ->where(function($query) {
                $query->where('invitations.estado','=' ,100 )
                // ->orWhere('invitations.estado','=' ,3 )
                // ->orWhere('invitations.estado','=' ,4 )
                // ->orWhere('invitations.estado','=' ,5 )
                ->orWhere('invitations.estado','=' ,10 );
            })
            ->where('editada','=' ,0 )
            ->select('invitations.*','events.nombre as nombre_evento','events.activity_id','events.level',
            'events.fecha as fecha_evento','events.not_confirmed_date', 'events.hora as hora_evento','zones.nombre as zona',
            'departments.nombre as user_dep','users.name as user_name',
            'purposes.name as finalidad','invitation_types.nombre as tipo_invitacion' ,
            )
            ->get();      
        }
     
        return response(
            ['data' => $myData]);

    }

    public function getInvitationsLogistica()
    {

        $myData = DB::table('invitations')
        ->join('events', 'invitations.event_id', '=', 'events.id')
        ->join('zones', 'invitations.zona_id', '=', 'zones.id')
        ->join('users', 'invitations.user_id', '=', 'users.id')
        ->join('departments', 'users.department_id', '=', 'departments.id')
        ->join('purposes', 'invitations.finalidad_id', '=', 'purposes.id')
        ->join('invitation_types', 'invitations.tipo_invitacion_id', '=', 'invitation_types.id')
        ->where('invitations.estado','=' ,5 )
        // ->orWhere('invitations.estado','=' ,1 )
        ->orWhere('invitations.estado','=' ,3 )
        ->orWhere('invitations.estado','=' ,4 )
        ->orWhere('invitations.estado','=' ,6 )
        ->orWhere('invitations.estado','=' ,7 )
        ->select('invitations.*','events.nombre as nombre_evento','events.activity_id', 'events.type_id',
        'events.fecha as fecha_evento','events.not_confirmed_date', 'events.hora as hora_evento','zones.nombre as zona',
        'departments.nombre as user_dep','users.name as user_name',
        'purposes.name as finalidad','invitation_types.nombre as tipo_invitacion' ,
        )
        ->get();      
     
        return response(
            ['data' => $myData]);


    }


    public function getInvitationsGestor()
    {

        $myData = DB::table('invitations')
        ->join('events', 'invitations.event_id', '=', 'events.id')
        ->join('zones', 'invitations.zona_id', '=', 'zones.id')
        ->join('users', 'invitations.user_id', '=', 'users.id')
        ->join('departments', 'users.department_id', '=', 'departments.id')
        ->join('purposes', 'invitations.finalidad_id', '=', 'purposes.id')
        ->join('invitation_types', 'invitations.tipo_invitacion_id', '=', 'invitation_types.id')
        ->where('invitations.estado','=' ,5 )
        ->orWhere('invitations.estado','=' ,1 )
        ->orWhere('invitations.estado','=' ,3 )
        ->orWhere('invitations.estado','=' ,4 )
        ->orWhere('invitations.estado','=' ,6 )
        ->orWhere('invitations.estado','=' ,7 )
        ->orWhere('invitations.estado','=' ,10 )
        ->select('invitations.*','events.nombre as nombre_evento','events.activity_id', 'events.type_id',
        'events.fecha as fecha_evento','events.not_confirmed_date', 'events.hora as hora_evento','zones.nombre as zona',
        'departments.nombre as user_dep','users.name as user_name',
        'purposes.name as finalidad','invitation_types.nombre as tipo_invitacion' ,
        )
        ->get();      
     
        return response(
            ['data' => $myData]);


    }


    



    public function pendientesautorizar()
    {
        return view('layouts.autorizar_peticiones');
    }


    public function pendientesasignar()
    {
        return view('layouts.asignar_peticiones');
    }


    public function dashboardgestor()
    {
        return view('layouts.dashboard_gestor');
    }



    public function autorizarpeticion(Request $request)
    {

        // comprobar si es evento de doble autorizacion o simple autorizacion, nivel 1 o nivel 2
        
        $data = Invitation::find($request->IDPeticion);

        if ($request->level == 0) {
            $data->estado = 5;
        }

        if ($request->level == 1) {
            $data->estado = 5;
        }

        if ($request->level == 2) {
            if (  ($data->estado == 10) ) {
                $data->estado = 5;
            } else 
            {
                $data->estado = 10;
            }
        }



        $data->save();

        return  response(['success' => true, 'data' => $data->id]);
    }


    public function editarpeticionautorizador(Request $request)
    {

        $data = Invitation::find($request->IDPeticion);

        $myUserEdicionName = User::find($data->user_edicion_id);
        $myUserData = User::find($data->user_id);

        if ($myUserEdicionName) {
            $userEdicionFinalName = $myUserEdicionName->name;
        } else {
            $userEdicionFinalName = '';
        }

        $myGuests = $data->guests()->get();
        $myDetails = $data->details()->get();

        $nationalities = Nationality::get();

        $editPurposes = EditPurpose::get();

        return  response(
            [
                'success' => true,
                'data' => $data,
                'guests' => $myGuests,
                'nationalities' => $nationalities,
                'editpurposes' => $editPurposes,
                'user_edicion_name' => $userEdicionFinalName,
                'details' =>  $myDetails,
                'user' => $myUserData
            ]
        );
    }


    public function editarpeticionpeticionario(Request $request)
    {

        $data = Invitation::find($request->IDPeticion);
        $myEventLevelForInvitation = Event::find($data->event_id);

        $myUserEdicionName = User::find($data->user_edicion_id);

        if ($myUserEdicionName) {
            $userEdicionFinalName = $myUserEdicionName->name;
        } else {
            $userEdicionFinalName = '';
        }

        $myGuests = $data->guests()->get();

        $editPurposes = EditPurpose::get();

        return  response(
            [
                'success' => true,
                'level' => $myEventLevelForInvitation->level,

                'nombre' => $myEventLevelForInvitation->nombre,
                'fecha' => $myEventLevelForInvitation->fecha,
                'hora' => $myEventLevelForInvitation->hora,
                'not_confirmed_date' => $myEventLevelForInvitation->not_confirmed_date,

                'type_id' => $myEventLevelForInvitation->type_id,
                'event_id' => $myEventLevelForInvitation->id,
                'activity_id' => $myEventLevelForInvitation->activity_id,
                'data' => $data,
                'guests' => $myGuests,
                'editpurposes' => $editPurposes,
                'user_edicion_name' =>  $userEdicionFinalName
            ]
        );
    }

    

    public function modificarpeticion(Request $request)
    {
        $data = Invitation::find($request->IDPeticion);
        $data->estado = 3;
        $data->tipo_edicion  = 1;
        $data->editada  = 1;
        
        $data->motivo_edicion_id = $request->motivo_edicion_id;
        $data->motivo_edicion_descripcion = $request->motivo_edicion_descripcion;
        
        $data->user_edicion_id = $request->userId;
        $data->user_edicion_rol = $request->role;

        $data->save();

        return  response(
            [
                'success' => true,
                'data' => $data,
            ]
        );
    }

    public function savepeticionlogistica(Request $request)
    {

        $data = Invitation::find($request->IDPeticion);
        $data->estado = 6;
        $data->save();

        $data->details()->update([
            'zona_id' => $request->zona_id,
            'boca' => $request->boca,
            'fila' => $request->fila,
            'asiento' => $request->asiento,
            'descripcion' => $request->descripcion,
        ]);

        return  response(
            [
                'success' => true,
                'data' => $data,
            ]
        );
    }

    public function enviarpeticionlogistica(Request $request)
    {

        $myAppUserId = 0;
        
        $myUserToCheck = Guest::find($request->guestId);
        $myAppUserId = $myUserToCheck->app_user_id;

        $data = Invitation::find($request->IDPeticion);
        $data->estado = 7;

        $myDetails = $data->details->update([
            'boca' => $request->boca,
            'fila' =>  $request->fila,
            'asiento' =>  $request->asiento,
            'descripcion' =>  $request->descripcion
        ]);
        
        $data->save();

        $myEvent = Event::find($data->event_id);
        
        // $myAppUserId = $contenidoMail['app_user_id'];

        // enviar mail
        
        $myEmail = $request->email;
        $mySubject =  $request->asunto;
        $myHtml = $request->body;
        $user = $request->userName;
        $emailSecundario = $request->emailsecundario;

        Mail::send([], [], function($message) use ($myEmail, $mySubject, $myHtml, $user, $emailSecundario)
        {                  
            if ($emailSecundario != '' ) {
                $message->to($myEmail)   
                        ->cc( $emailSecundario )
                        ->subject($mySubject)
                        ->setBody( $myHtml ,'text/html');
            } else {
                $message->to($myEmail)   
                ->subject($mySubject)
                ->setBody( $myHtml ,'text/html');
            }

        });


        // crear ticket app

        $myTicket = ( new UserController)->createAppEventUserTicket($myAppUserId ,$myEvent->app_event_id);        
         

        return response ([
            'success' => true,
            'details' => $myDetails,
            "ticket" =>  $myTicket,
            "app_user_id" => $myAppUserId,
            "app_event_id" => $myEvent
           ]);


        return  response(
            [
                'success' => true,
                'data' => $data,
          
            ]
        );
    }

    public function cancelarpeticionautorizador(Request $request)
    {
        $data = Invitation::find($request->IDPeticion);
        $data->estado = 4;
        $data->tipo_edicion  = 2;        
        $data->editada  = 0;        
        
        $data->motivo_edicion_id = $request->motivo_edicion_id;
        $data->motivo_edicion_descripcion = $request->motivo_edicion_descripcion;
        
        $data->user_edicion_id = $request->userId;
        $data->user_edicion_rol = $request->role;
        
        $data->save();

        // implementar reponer stock

        return  response(
            [
                'success' => true,
                'data' => $data,
            ]
        );
    }

    public function eliminarpeticion(Request $request)
    {
       $myCupo = 0;
       $data = Invitation::find($request->IDPeticion);
       $myUser = User::find($data->user_id);

       // reponer stock de la peticion
       // update record tipo cupo 1

       $myNewCupo = 0;

       if ($data->tipo_cupo == 1) {

            $myDbCupo = DB::table('event_department_generic')
            ->where('event_id', $data->event_id)
            ->where('department_id', $myUser->department_id)
            ->select('cupo')->get();
       
            foreach($myDbCupo as $i)
            {
                $myCupo = $i->cupo;
            }
      
            $myNewCupo = $myCupo +  $data->cantidad;

            $affected = DB::table('event_department_generic')
            ->where('event_id', $data->event_id)
            ->where('department_id', $myUser->department_id)
            ->update(['cupo' => $myNewCupo]);

        }    


        if ($data->tipo_cupo == 2) {

            $myDbCupo = DB::table('event_department_zone')
            ->where('event_id', $data->event_id)
            ->where('department_id', $myUser->department_id)
            ->where('zone_id', $data->zona_id)
            ->select('cupo')->get();
              
            foreach($myDbCupo as $i)
            {
                $myCupo = $i->cupo;
            }
      
            $myNewCupo = + $myCupo +  $data->cantidad;

            $affected = DB::table('event_department_zone')
            ->where('event_id', $data->event_id)
            ->where('department_id', $myUser->department_id)
            ->where('zone_id', $data->zona_id)
            ->update(['cupo' => $myNewCupo]);
            
        }    
        
        $data->destroy($data->id);

        return  response(['success' => true, 'data' => $data->id]);
    }



    public function cancelarpeticion(Request $request)
    {

        $data = Invitation::find($request->IDPeticion);
        $data->estado = 4;
        $data->save();

        return  response(['success' => true, 'data' => $data->id]);
    }

    public function checkinvitationscounterpeticionario($id)
    {
        
        $myUser = User::find($id);
        $myDepartment = $myUser->department_id; 

        $pendientes = DB::table('invitations')
            ->where('estado', '=', 1)
            ->where('user_id','=' ,$id)
            ->get()->count();
        $modificadas = DB::table('invitations')
            ->where('estado', '=', 3)
            ->where('user_id','=' ,$id)
            ->get()->count();
        $canceladas = DB::table('invitations')
            ->where('estado', '=', 4)
            ->where('user_id','=' ,$id)
            ->get()->count();
        $autorizadas = DB::table('invitations')
            ->where('estado', '=', 5)
            ->where('user_id','=' ,$id)            
            ->get()->count();
        $enviadas = DB::table('invitations')
            ->where('estado', '=', 7)
            ->where('user_id','=' ,$id)
            ->get()->count();



        $num_dept = DB::table('invitations')
        ->join('users', 'invitations.user_id', '=', 'users.id')
        ->where('users.department_id','=' ,$myDepartment )
        ->where('estado', '<>', 2)     
        ->select('invitations.*' ,
        )->get()->count();


        return  response([
            'success' => true,
            'pendientes' => $pendientes,
            'modificadas' => $modificadas,
            'canceladas' => $canceladas,
            'autorizadas' => $autorizadas,
            'enviadas' => $enviadas,
            'num_dept' => $num_dept
        ]);
    }
    

    public function checkinvitationscounterautorizador($id)
    {
   


        $arrayAreasToAuto = [];

        $myUserToCheck = User::find($id);
        $isDoubleAuth = $myUserToCheck->authleveltwo;

        
        
        if ($myUserToCheck->hasRole('superadmin' ) ) {
            $areasToAuth = Area::all();
        } else {
            $areasToAuth = $myUserToCheck->areas;
        }
        
        foreach($areasToAuth as $areaToAuth) {
            array_push($arrayAreasToAuto, $areaToAuth->id);
        }

        // return response (['areas' => $areasToAuth]);
     
        $myDepartmentToCheck = Department::find($myUserToCheck->department_id);
        $myAreaToCheck = Area::find($myDepartmentToCheck->area_id);
        
        $myAreaForAutorizador = $myAreaToCheck->id;

        //---
        
        // $myUser = User::find($id);
        // $myDepartment =  $myUser->department_id;

        // $myDepartmentObject =  Department::find( $myUser->department_id );
   
        // $myArea = $myDepartmentObject->area_id;

        // $arrayAreasToAuto = [];
        // $arrayAreasToAuto = [14,5,3,4];

        $pendientes = DB::table('invitations')
        ->join('events', 'invitations.event_id', '=', 'events.id')
        ->join('users', 'invitations.user_id', '=', 'users.id')
        ->join('departments', 'users.department_id', '=', 'departments.id')
        
        ->whereIn('departments.area_id', $arrayAreasToAuto )
        ->where('estado', '=', 1)     
        ->select('invitations.*' ,
        )->get()->count();


        $modificadas = DB::table('invitations')
        ->join('events', 'invitations.event_id', '=', 'events.id')
        ->join('users', 'invitations.user_id', '=', 'users.id')
        ->join('departments', 'users.department_id', '=', 'departments.id')
        ->whereIn('departments.area_id', $arrayAreasToAuto )
        ->where('estado', '=', 3)     
        // ->where('departments.area_id','=' ,$myArea )
        ->select('invitations.*' ,
        )->get()->count();

        $canceladas = DB::table('invitations')
        ->join('events', 'invitations.event_id', '=', 'events.id')
        ->join('users', 'invitations.user_id', '=', 'users.id')
        ->join('departments', 'users.department_id', '=', 'departments.id')
        ->whereIn('departments.area_id', $arrayAreasToAuto )
        ->where('estado', '=', 4)     
        // ->where('departments.area_id','=' ,$myArea )
        ->select('invitations.*' ,
        )->get()->count();
        
        $autorizadas = DB::table('invitations')
        ->join('events', 'invitations.event_id', '=', 'events.id')
        ->join('users', 'invitations.user_id', '=', 'users.id')
        ->join('departments', 'users.department_id', '=', 'departments.id')
        ->whereIn('departments.area_id', $arrayAreasToAuto )
        ->where('estado', '=', 5)     
        // ->where('departments.area_id','=' ,$myArea )
        ->select('invitations.*' ,
        )->get()->count();
        
        $enviadas = DB::table('invitations')
        ->join('events', 'invitations.event_id', '=', 'events.id')
        ->join('users', 'invitations.user_id', '=', 'users.id')
        ->join('departments', 'users.department_id', '=', 'departments.id')
        ->whereIn('departments.area_id', $arrayAreasToAuto )
        ->where('estado', '=', 7)     
        // ->where('departments.area_id','=' ,$myArea )
        ->select('invitations.*' ,
        )->get()->count();    
        

        $num_area  = DB::table('invitations')
        ->join('users', 'invitations.user_id', '=', 'users.id')
        ->join('departments', 'departments.id', '=', 'users.department_id')
        ->join('areas', 'areas.id', '=', 'departments.area_id')
        ->whereIn('departments.area_id', $arrayAreasToAuto )
        
        // ->where('departments.area_id' ,'=' ,$myArea )
        ->where('estado', '<>', 2)     
        ->select('invitations.*' ,
        )->get()->count();


        return  response([
            'success' => true,
            'pendientes' => $pendientes,
            'modificadas' => $modificadas,
            'canceladas' => $canceladas,
            'autorizadas' => $autorizadas,
            'enviadas' => $enviadas,
            'num_area' =>  $num_area
        ]);
    }
    

    public function checkinvitationscountergestor()
    {
        // $pendientes = DB::table('invitations')->where('estado', '=', 1)        
        // ->get()->count();

        // $modificadas = DB::table('invitations')->where('estado', '=', 3)        
        // ->get()->count();
        
        // $canceladas = DB::table('invitations')->where('estado', '=', 4)        
        // ->get()->count();
        
        // $autorizadas = DB::table('invitations')->where('estado', '=', 5)        
        // ->get()->count();
        
        // $enviadas = DB::table('invitations')->where('estado', '=', 7)        
        // ->get()->count();    

      
        $pendientes = DB::table('invitations')
        ->where('estado', '=', 1)             
        ->select('invitations.*' ,
        )->get()->count();


        $modificadas = DB::table('invitations')
        ->where('estado', '=', 3)     
        ->select('invitations.*' ,
        )->get()->count();

        $canceladas = DB::table('invitations')
        ->where('estado', '=', 4)     
        ->select('invitations.*' ,
        )->get()->count();
        
        $autorizadas = DB::table('invitations')
        ->where('estado', '=', 5)     
        ->select('invitations.*' ,
        )->get()->count();

        $pendientes_enviar = DB::table('invitations')
        ->where('estado', '=', 6)     
        ->select('invitations.*' ,
        )->get()->count();     

        
        $total_enviadas = DB::table('invitations')
        ->where('estado', '=', 7)     
        ->select('invitations.*' ,
        )->get()->count();        
        

 
        return  response([
            'success' => true,
            'pendientes' => $pendientes,
            'modificadas' => $modificadas,
            'canceladas' => $canceladas,
            'autorizadas' => $autorizadas,
            'pendientes_enviar' => $pendientes_enviar,
            'total_enviadas' => $total_enviadas,
            
        ]);
    }

    public function crearPlantillasIniciales() {
           // asignar plantillas a todos los eventos 

           $numEventos = Event::all()->count();

           $templateES = EmailTemplate::where('id',3)->get();
           $templateEN = EmailTemplate::where('id',5)->get();
           $templateAC = EmailTemplate::where('id',4)->get();
    
           for ($r=1; $r <=$numEventos ; $r++) { 
               $myArrayTemplates = [];
               $myArrayTemplateDetails = [];
   
               array_push($myArrayTemplates, $templateES[0]->id);
               array_push(
                   $myArrayTemplateDetails,
                   [
                       'content' => $templateES[0]->content,
                       'subject' => $templateES[0]->subject,
                       'name' => $templateES[0]->name,
                       'activity_id' => $templateES[0]->activity_id ,
                       'activity_type_id' => $templateES[0]->activity_type_id,
                       'invitation_type_id' => $templateES[0]->invitation_type_id,
                       'language_id' => $templateES[0]->language_id,                
                   ]
              );
   
               $myArrayData = array_combine($myArrayTemplates, $myArrayTemplateDetails);
               
               $myEvent = Event::find($r);                 
               $myEvent->templates()->sync($myArrayData);        
   
           }
    }

    public function pruebaevento ($eventId) {
        
        $myEvent = Event::find($eventId);
        
        $sites = collect();

        $myInvitations = Invitation::select('invitations.event_id', 'invitations.id', 'invitations.estado','zones.nombre as zoneName','zones.id as zoneId')
                ->leftjoin('zones', 'zones.id', '=', 'invitations.zona_id','invitations.zona_id' )                
                ->where('event_id',$myEvent->id)->get();
                            
        //  dd($myTestInvitation[0]->zoneName);
       
        
        $sites->add( ["Nombre del evento ","Id evento","Zona/Sector","nombre y apellidos","dni","email", "barcode","tipo de entrada","valido"]);
       
        foreach ($myInvitations as $invitation) {
            //  dd($test->guests[0]);
            //   dd ( $test->guests[0]->dni );
            // dd ($test->nombre, $test->guests[0]->nombre, $test->guests[0]->pivot->ticket_qrcode);
                
            $myInvitationEstado = 0;
            $myInvitationEstado = $invitation->estado;

            $codigoValido = '';
            if ($myInvitationEstado == 4) {
                $codigoValido = 'cancelado';
            } else {
                $codigoValido = 'ok';
            }

            foreach($invitation->guests as $guest) {

                $sites->add( 
                    [
                        $myEvent->nombre,
                        $myEvent->id,
                        $invitation->zoneName,
                        $guest->nombre . " " . $guest->apellidos,
                        $guest->pivot->dni,
                        $guest->pivot->email,
                        $guest->pivot->ticket_qrcode,
                        "1",
                        $codigoValido
                    ] 
                );

            }

        }

        return Excel::download(new GuestsExport($sites), 'marenostrum-qr.csv');

    }

    public function testguestinvitation() {

        $myInvitations = Invitation::select('invitations.event_id', 'invitations.id','zones.nombre as zoneName','zones.id as zoneId')
                ->leftjoin('zones', 'zones.id', '=', 'invitations.zona_id','invitations.zona_id' )                
                ->get();
                            
       
        $myLoop = 1;

        echo "iniciando proceso";
        
        foreach ($myInvitations as $invitation) {
            //  dd($test->guests[0]);
            //   dd ( $test->guests[0]->dni );
            // dd ($test->nombre, $test->guests[0]->nombre, $test->guests[0]->pivot->ticket_qrcode);
                
            foreach($invitation->guests as $guest) {
  
                $myQrCodeToSave = $guest->pivot->ticket_qrcode;
                
                echo $myLoop;
                echo "<br>";

                try {
                    $image = QrCode::format('png')                 
                        ->size(200)->errorCorrection('H')
                        ->generate( $myQrCodeToSave );
                    $output_file = 'qrcodes/qr-' . time() . '.png';
    
                    Storage::disk('local')->put('public'.'/' . $output_file, $image); //storage/app/public/img/qr-code/img-1557309130.png                   
                
                } catch (\Throwable $th) {
                    $output_file = 'not valid'    ;
                }
                $invitation->guests()->updateExistingPivot($guest, ['qr_path' => $output_file]);

                sleep(1);

                $myLoop++;
                 
            }

        }

        echo "proceso finalizado";
        return "hecho";
        

    }
}
