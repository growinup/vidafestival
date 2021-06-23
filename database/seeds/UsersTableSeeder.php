<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            // see test admin
        User::create([
            'name' => 'George',
            'email' => 'info@growinup.net',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => 'RRPP',
            'department_id' => 1
        ]);
        
        User::create([
            'name' => 'Cristina',
            'email' => 'cristina@ainasg.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => 'RRPP',
            'department_id' => 1,
        ]);

        User::create([
            'name' => 'Usuari Test',
            'email' => 'test@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => 'RRPP',
            'department_id' => 1,
        ]);
        
        User::create([
            'name' => 'Carlos',
            'email' => 'carlos@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'department_id' => 1,
            'dep' => 'Dept comercial'            
        ]);        
        

         User::create([
            'name' => 'Maria',
            'email' => 'peticionario@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'department_id' => 1,
            'dep' => 'Dept contabilidad'            
        ]);      


        // ***************

        User::create([
            'name' => 'Peticionari',
            'email' => 'peticionari@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'department_id' => 1,
            'dep' => 'Dept 1'
        ]);


        User::create([
            'name' => 'Autoritzador',
            'email' => 'autoritzador@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'department_id' => 1,
            'dep' => 'Dept 2'
        ]);


        User::create([
            'name' => 'Logistica',
            'email' => 'logistica@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'department_id' => 1,
            'dep' => ''
        ]);
        
        
        User::create([
            'name' => 'Gestor',
            'email' => 'gestor@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'department_id' => 1,
            'dep' => ''
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => 'Staff',
            'department_id' => 1,
        ]);        


     
    }
}
