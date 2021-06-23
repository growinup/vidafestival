<?php

namespace App\Http\Controllers;

use App\User;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Psr7\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return response(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    public function manageusers () {
        return view('users.index');
    }


    // public function testusuarios () {
    //     return view('users.create');
    // }

    public function getAllUsers() {
  

        $myUsers = DB::table('users')
        ->join('role_user', 'role_user.user_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->join('departments', 'departments.id', '=', 'users.department_id')
        ->where('role_user.role_id','<>','1')   
        ->where('role_user.role_id','<>','2')   
        //  ->where('users.id','role_user.user_id')   
        
        ->select('users.id', 'users.name as name','users.email', 'users.authleveltwo', 'departments.area_id', 'roles.name as role_name','users.department_id','role_user.role_id')->distinct()
        ->orderBy('id')->get();    
        return response ([
            'data' => $myUsers,
        ]);
    }
    
    public function getSystemUserAreas(Request $request) {
        $myUser = User::find($request->userId);
        $myUserAreas = $myUser->areas;
        return response (['userareas' => $myUserAreas]);        
    }


    
    public function crearUsuarioSistema(Request $request) {

        $myArrayAuthZones = [];
        
        $userDepartment = Department::find($request->departmentID);

        $isAuthSecondlevel = false;
        $isAuthSecondlevel = $request->isAuthSecondLevel;

        if ($request->roleID != 4) {
            $isAuthSecondlevel = false;
        }

        $myUser = User::create([
            'name' => $request->userName,
            'email' => $request->emailUsuario,
            'password' => bcrypt($request->passwordUsuario),
            'api_token' => Str::random(64),
            'dep' => $userDepartment->nombre,
            'department_id' => $request->departmentID,
            'authleveltwo' => $isAuthSecondlevel
        ]);

        if ($request->roleID == 1) {
            $myUser->assignRoles( 'admin');
        }
        if ($request->roleID == 2) {
            $myUser->assignRoles( 'gestor');
        }
        if ($request->roleID == 3) {
            $myUser->assignRoles( 'peticionario');
        }
        if ($request->roleID == 4) {
            $myUser->assignRoles( 'autorizador');
        }        
        if ($request->roleID == 5) {
            $myUser->assignRoles( 'logistica');
        }        
      

        foreach ($request->selectedAuthAreas as $areaToAuth) {
            array_push($myArrayAuthZones, $areaToAuth);
        }      

        $myUser->areas()->sync( $myArrayAuthZones );

        return response([
            'success' => true,
        ]);



    }


    public function editarUsuarioSistema(Request $request) {
        
        $myArrayAuthZones = [];

        $myId =  $request->userId;
        $userDepartment = Department::find($request->departmentID);

        $isAuthSecondlevel = false;
        $isAuthSecondlevel = $request->isAuthSecondLevel;

        if ($request->roleID != 4) {
            $isAuthSecondlevel = false;
        }

        $myUserToEdit = User::where('id',$myId)
        ->update([
            'name' => $request->userName,
            'email' => $request->emailUsuario,
            'dep' => $userDepartment->nombre,
            'department_id' => $request->departmentID,
            'authleveltwo' => $isAuthSecondlevel
        ]);

        $myUser = User::find($request->userId);
        // $myUser->removeRoles('admin');
        // $myUser->assignRoles('admin');
     
        if ($request->roleID == 1) {
            $myUser->syncRoles( 'admin' );
        }
        if ($request->roleID == 2) {
            $myUser->syncRoles( 'gestor' );
        }
        if ($request->roleID == 3) {
            $myUser->syncRoles( 'peticionario' );
        }
        if ($request->roleID == 4) {
            $myUser->syncRoles( 'autorizador' );
        }        
        if ($request->roleID == 5) {
            $myUser->syncRoles( 'logistica' );
        }        

        foreach ($request->selectedAuthAreas as $areaToAuth) {
            array_push($myArrayAuthZones, $areaToAuth);
        }      

        $myUser->areas()->sync( $myArrayAuthZones );

      
        return response([
            'success' => true,
        ]);
    }    

    


    public function deleteSystemUser(Request $request) {
        $data = User::find($request->userId);
    
        $data->destroy($data->id);
 
        return  response(['success' => true, 'data' => $data->id]);        
    }          


    // --- importado desde marenostrum 
    // ----------- integracion API App ----------------------------


     public function testusuarios () {

        // crear ticket con id user y id event de la app


        // crear cuenta
        // $myNewUserActivated = $this->createAppUserAccount(867,'test59@test.com');
        // dd($myNewUserActivated);


        // crear ticket
        $myTicket = $this->createAppEventUserTicket(867,14);
        dd ($myTicket);


        // crear usuario
        $res = $this->createAppUser ('test59@test.com');

        if (is_integer($res)) {

            if ($res == -1) {   
                dd("error creando usuario");
            }

        } else {
            dd ($res->user_id);
            // actualizar registro BBDD usuario con su ID en la App

        }
     

    }

    public function createAppUser($userEmail,$userName,$userLastName,$userDNI,$userBirthDate) {

        $client = new Client([
            'headers' => [ 
                'Content-Type' => 'application/json', 
                'Accept'  => 'application/json',                
            ]
        ]);

        try {
            
                $response = $client->post('https://app.marenostrumfuengirola.com/api/v1/users',
                    ['json' => [
                    'email' => $userEmail,
                    'first_name' => $userName,
                    'last_name' => $userLastName,
                    // 'nif' => $userDNI,
                    // 'address' => [
                    //     [
                    //         'postcode' => '',
                    //         'street' => '',
                    //         'region' => '',
                    //         'town' => '',
                    //         'country' => '',
                    //     ]
                    // ],
                    // 'phone' => '',
                    'birthday' => $userBirthDate,
                    'role' => '4740',
                    'created_method' => 'A'      
                    ]]
            
                );

                $array = json_decode($response->getBody()->getContents());

                // return response()->json($array);

                return $array;
                // dd($response->getBody()->getContents()); 

                // ----------- post

        } catch (\Throwable $th) {
                return -1;
        }


    }

    public function createAppUserAccount($my_user_id, $my_email) {

        /*
            https://app.marenostrumfuengirola.com/api/v1/auth/register/
                 
             Request:
                {
                "user_id": 1,
                "username": "prova1@example.com",
                "password": "1234",
                “enabled”: 1
                }
            Response:
                {
                "user_id": "1"
                }
        */

        $client = new Client([
            'headers' => [ 
                'Content-Type' => 'application/json', 
                'Accept'  => 'application/json',                
            ]
        ]);

        try {
            
                $response = $client->post('https://app.marenostrumfuengirola.com/api/v1/auth/register/',

                    ['json' => [
                        'user_id' => $my_user_id,
                        "username" => $my_email,
                        "password" =>  "123456",
                        'enabled' => 1,
                    ]]
            
                );

                $array = json_decode($response->getBody()->getContents());

                return $array;
  
        } catch (\Throwable $th) {
                return -1;
        }
        
    }

    public function createAppEventUserTicket($my_user_id,$app_event_id, $app_schedule_id, $myQR,$zonaName) {

        // $sector = "1";
         $zona = $zonaName;
        // $fila = "10";
        // $asiento = "15";



        /*
        https://app.marenostrumfuengirola.com/api/v1/users/tickets

                    {
                    "user_id": 1,
                    "event_id": 1,
                    "enabled": 1
                    }
        */

        $client = new Client([
            'headers' => [ 
                'Content-Type' => 'application/json', 
                'Accept'  => 'application/json',                
            ]
        ]);

        try {
            
                $response = $client->post('https://app.marenostrumfuengirola.com/api/v1/users/tickets',
                    ['json' => [
                    'user_id' => $my_user_id,
                    'event_id' => $app_event_id,
                    'schedule_id' => $app_schedule_id,
                    // "sector" => $sector,
                    "zone" => $zona,
                    // "row" => $fila,
                    // "seat" => $asiento,
                    "ticket" => $myQR,
                    'enabled' => 1,
                    ]]
            
                );

                $array = json_decode($response->getBody()->getContents());

                return $array;
  
        } catch (\Throwable $th) {
                return $th;
        }
        
    }


    public function checkUserEmail() {   
    
       $appUserID = $this->checkUserEmailApp ('test215@test.com');
    
       if ( $appUserID == -1 ){
           return "el email no existe " . $appUserID;
       } else {

            return "el mail SI EXISTE" . $appUserID;
       }

    }


  
    public function testphp() {

        phpinfo();
    }
    public function checkUserEmailApp($userEmailToCheck) {

        
        //  Email:   https://app.marenostrumfuengirola.com/api/v1/users/?email=test117@test.com
        //  NIF:     https://app.marenostrumfuengirola.com/api/v1/users/?nif=00000004G
        
        $myBaseUrl = 'https://app.marenostrumfuengirola.com/api/v1/users/?email=';
        $myUserEmailToCheck = $userEmailToCheck;
        $myUrl = $myBaseUrl . $myUserEmailToCheck;
        
        $myAppUserId  = 0;

        $client = new Client([
            'headers' => [ 
                'Content-Type' => 'application/json', 
                'Accept'  => 'application/json',                
            ]
        ]);

        try {
            // phpinfo();
            $response = $client->get( $myUrl ,[
                
            ] );

            
            $array = json_decode($response->getBody()->getContents(),true);
            
            // dd($array);
                                
            if ( $array['recordsTotal'] <= 0 ) {
                // user id encontrado
                $myAppUserId  = -1;     // $array['data']['id'];
            }
            else {
                $myAppUserId  =  $array['data'][0]["id"];
            }
    
            return $myAppUserId;
                
                
        } catch (\Throwable $th) {
            // return $th;
            return -1;
        }

    }




    public function pruebas($myparam) {
        dd ('probando' . $myparam);
    }




    public function createUserApp (Request $request) {

        // crear usuario
        // $res = $this->createAppUser ($request->user);

        // if (is_integer($res)) {

        //     if ($res == -1) {   
                
        //     }

        // } else {
 
        //     $myNewUserActivated = $this->createAppUserAccount( $res->user_id,$request->user);
        
 
        // }


          // crear cuenta
        // $myNewUserActivated = $this->createAppUserAccount(867,'test59@test.com');
        // dd($myNewUserActivated);        


        
        // crear ticket
        // $myTicket = $this->createAppEventUserTicket($res->user_id,14);
        $myTicket = $this->createAppEventUserTicket(1655,6);
        // dd ($myTicket);        



        return response([
            'myuser' => $request->user,
            // 'user_id' => $res->user_id,
            'ticket_id' => $myTicket->ticket_id,
            'success' => true
        ]);
    }






    public function oldTestUsers() {
          return view('users.create');



            //  get
            // $client = new Client([
            //     'headers' => [ 'Content-Type' => 'application/json' ]
            // ]);

            // $url = "https://testapp.marenostrumfuengirola.com/api/v1/users/145";
 
            // $request = $client->get('https://app.marenostrumfuengirola.com/api/v1/users/2');
                        
           
            // dd($request->getBody()->getContents());

            // ---------- post

            // $client = new Client([
            //     'headers' => [ 
            //         // 'Content-Type' => 'application/json',        
            //         'Accept'  => 'application/json',                        
            //     ]
            // ]);

         
            // $response = $client->post('https://app.marenostrumfuengirola.com/api/v1/users',
            //     ['json' => [
            //     'email' => 'test38@test.com',
            //     'first_name' => 'Test name',
            //     'last_name' => 'Test last name',
            //      //'nif' => '00000027A',
            //     'address' => [
            //         [
            //             'postcode' => '08021',
            //             'street' => 'Muntaner',
            //             'region' => 'Barcelona',
            //             'town' => 'Barcelona',
            //             'country' => 'Spain',
            //         ]
            //     ],
            //     'phone' => '933933933',
            //     'birthday' => '2012-04-23',
            //     'role' => '4740',
            //     'created_method' => 'A'
                
            //     ]]

          
            // );

            // // $res = json_encode(simplexml_load_string($response->getBody()));
            
            // //dd ($res);
            // $array = json_decode($response->getBody()->getContents());
    
            // return response()->json($array);
            // dd($response->getBody()->getContents()); 

            // ----------- post


    }
}
