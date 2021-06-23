<?php

use App\Area;
use App\User;
use App\Zone;
use App\Event;
use App\Guest;
use App\Sector;
use App\Activity;
use App\Location;
use Carbon\Carbon;
use App\Department;
use App\Invitation;
use App\EditPurpose;
use App\EmailTemplate;
use App\InvitationType;
use App\ActivityType;
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
  
        Activity::create([
            'name' => 'Conciertos',
            'location_id' => 1
        ]);
      
   
        // roles

        Role::create([
            'name' => 'Super Admin',
            'slug' => 'superadmin',
            'description' => 'Super Administrador',
            'special' => 'all-access'
        ]);        

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrador',
            'special' => 'all-access'
        ]);

        Role::create([
            'name' => 'Gestor',
            'slug' => 'gestor',
            'description' => 'Gestor',
        ]);        

        Role::create([
            'name' => 'Peticionario',
            'slug' => 'peticionario',
            'description' => 'Peticionari',
        ]);        

        Role::create([
            'name' => 'Autorizador',
            'slug' => 'autorizador',
            'description' => 'Autorizador',
        ]);        

        Role::create([
            'name' => 'Logistica',
            'slug' => 'logistica',
            'description' => 'Logística',
        ]);        

  
       // creacion de areas y departamentos

       $myArea = Area::create([
        'nombre' => 'Ayuntamiento Fuengirola',
        ]);        

        Department::create([
            'nombre' => 'ayuntamiento fuengirola1',
            'area_id' => $myArea->id
        ]);        
    
        Department::create([
            'nombre' => 'ayuntamiento fuengirola2',
            'area_id' => $myArea->id
        ]);        
        
        Department::create([
            'nombre' => 'ayuntamiento fuengirola3',
            'area_id' => $myArea->id
        ]);        
        

        $myArea = Area::create([
            'nombre' => 'Unicaja',
        ]);        

        Department::create([
            'nombre' => 'Unicaja ',
            'area_id' => $myArea->id
        ]);                

        Department::create([
            'nombre' => 'Unicaja2',
            'area_id' => $myArea->id
        ]);                        

        $myArea = Area::create([
            'nombre' => 'Junta Andalucía',
        ]);        

        Department::create([
            'nombre' => 'Junta Andalucía',
            'area_id' => $myArea->id
        ]);             
        

        $myArea = Area::create([
            'nombre' => 'Urbania',
        ]);        

        Department::create([
            'nombre' => 'Urbania',
            'area_id' => $myArea->id
        ]);             

        $myArea = Area::create([
            'nombre' => 'Probisa',
        ]);        

        Department::create([
            'nombre' => 'Probisa',
            'area_id' => $myArea->id
        ]);             
        
        $myArea = Area::create([
            'nombre' => 'Hormacesa',
        ]);        

        Department::create([
            'nombre' => 'Hormacesa',
            'area_id' => $myArea->id
        ]);             
        
        $myArea = Area::create([
            'nombre' => 'Cruzcampo',
        ]);        

        Department::create([
            'nombre' => 'Cruzcampo',
            'area_id' => $myArea->id
        ]);             
        
        $myArea = Area::create([
            'nombre' => 'Maxxium',
        ]);        

        Department::create([
            'nombre' => 'Maxxium',
            'area_id' => $myArea->id
        ]);             
        
        $myArea = Area::create([
            'nombre' => 'Prensa',
        ]);        

        Department::create([
            'nombre' => 'Prensa palco',
            'area_id' => $myArea->id
        ]);                     
             
        $myArea = Area::create([
            'nombre' => 'Burger King',
        ]);        

        Department::create([
            'nombre' => 'Burger King Palco',
            'area_id' => $myArea->id
        ]);         

        Department::create([
            'nombre' => 'Burger King Mediabox',
            'area_id' => $myArea->id
        ]);                 

        $myArea = Area::create([
            'nombre' => 'El Corte Inglés',
        ]);        

        Department::create([
            'nombre' => 'ECI Palco',
            'area_id' => $myArea->id
        ]);      

        Department::create([
            'nombre' => 'ECI MediaBox',
            'area_id' => $myArea->id
        ]);              
        
        $myArea = Area::create([
            'nombre' => 'BMW',
        ]);        

        Department::create([
            'nombre' => 'BMW Palco',
            'area_id' => $myArea->id
        ]);      

        Department::create([
            'nombre' => 'BMW MediaBox',
            'area_id' => $myArea->id
        ]);    

        
        $myArea = Area::create([
            'nombre' => 'GMG (Mupis)',
        ]);        

        Department::create([
            'nombre' => 'GMG (Mupis)',
            'area_id' => $myArea->id
        ]);      
        
        $myArea = Area::create([
            'nombre' => 'Gestagua',
        ]);        

        Department::create([
            'nombre' => 'Gestagua',
            'area_id' => $myArea->id
        ]);      

        $myArea = Area::create([
            'nombre' => 'Venta',
        ]);        

        Department::create([
            'nombre' => 'Venta 1',
            'area_id' => $myArea->id
        ]);      
        
        Department::create([
            'nombre' => 'Venta 2',
            'area_id' => $myArea->id
        ]);      
        
        
        $myArea = Area::create([
            'nombre' => 'Sponsory',
        ]);        

        Department::create([
            'nombre' => 'Sponsory',
            'area_id' => $myArea->id
        ]);      
        
        $myArea = Area::create([
            'nombre' => 'Fox',
        ]);        

        Department::create([
            'nombre' => 'Fox',
            'area_id' => $myArea->id
        ]);      

        $myArea = Area::create([
            'nombre' => 'Interno',
        ]);        

        Department::create([
            'nombre' => 'Barras',
            'area_id' => $myArea->id
        ]);      

        Department::create([
            'nombre' => 'Azafatas',
            'area_id' => $myArea->id
        ]);      

        Department::create([
            'nombre' => 'Invitaciones',
            'area_id' => $myArea->id
        ]);      
        

        $myArea = Area::create([
            'nombre' => 'Cope',
        ]);        

        Department::create([
            'nombre' => 'Cope',
            'area_id' => $myArea->id
        ]);             
     
        $myArea = Area::create([
            'nombre' => 'Onda Cero',
        ]);        

        Department::create([
            'nombre' => 'Onda Cero',
            'area_id' => $myArea->id
        ]);        

        $myArea = Area::create([
            'nombre' => 'Ser Marbella',
        ]);        

        Department::create([
            'nombre' => 'Ser Marbella',
            'area_id' => $myArea->id
        ]);        

        $myArea = Area::create([
            'nombre' => 'Diario Sur',
        ]);        

        Department::create([
            'nombre' => 'Diario Sur',
            'area_id' => $myArea->id
        ]);            

        $myArea = Area::create([
            'nombre' => 'X Magazine',
        ]);        

        Department::create([
            'nombre' => 'X Magazine',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => "O'clock",
        ]);        

        Department::create([
            'nombre' => "O'clock",
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'La Opinión',
        ]);        

        Department::create([
            'nombre' => 'La Opinión',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Málaga Hoy ',
        ]);        

        Department::create([
            'nombre' => 'Málaga Hoy ',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'ABC',
        ]);        

        Department::create([
            'nombre' => 'ABC',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Mundo',
        ]);        

        Department::create([
            'nombre' => 'Mundo',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'DKV',
        ]);        

        Department::create([
            'nombre' => 'DKV',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Box A',
        ]);        

        Department::create([
            'nombre' => 'Box A',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Box B',
        ]);        

        Department::create([
            'nombre' => 'Box B',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Riff Music',
        ]);        

        Department::create([
            'nombre' => 'Riff Music',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Planet Events',
        ]);        

        Department::create([
            'nombre' => 'Planet Events',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Concert Tour Gestiones S.L.',
        ]);        

        Department::create([
            'nombre' => 'Concert Tour Gestiones S.L.',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Ninona Producciones & Management S.L.',
        ]);        

        Department::create([
            'nombre' => 'Ninona Producciones & Management S.L.',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Filomena Cultura Iae',
        ]);        

        Department::create([
            'nombre' => 'Filomena Cultura Iae',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'L.A Rock Entertainment',
        ]);        

        Department::create([
            'nombre' => 'L.A Rock Entertainment',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Ritmo Amigo S.L.',
        ]);        

        Department::create([
            'nombre' => 'Ritmo Amigo S.L.',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Ruzvan Comunicaciones',
        ]);        

        Department::create([
            'nombre' => 'Ruzvan Comunicaciones',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Pádel Cubierto Arcos',
        ]);        

        Department::create([
            'nombre' => 'Pádel Cubierto Arcos',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Green Cow Producciones Iae',
        ]);        

        Department::create([
            'nombre' => 'Green Cow Producciones Iae',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'TERRITORIO MUSICAL',
        ]);        

        Department::create([
            'nombre' => 'TERRITORIO MUSICAL',
            'area_id' => $myArea->id
        ]);       

        

        $myArea = Area::create([
            'nombre' => 'Tras La Cortina Sc.',
        ]);        

        Department::create([
            'nombre' => 'Tras La Cortina Sc.',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'Producciones La Cochera',
        ]);        

        Department::create([
            'nombre' => 'Producciones La Cochera',
            'area_id' => $myArea->id
        ]);       

        $myArea = Area::create([
            'nombre' => 'HENRIK ANDERSEN',
        ]);        

        Department::create([
            'nombre' => 'HENRIK ANDERSEN',
            'area_id' => $myArea->id
        ]);               


        // ---------  fin seed areas y zonas        


            // inicio sectores
            
            $myLocation = Location::create([
                'nombre' => "PARQUE MARENOSTRUM FUENGIROLA",
                'tipo_ubicacion_id' => 1,
                'tipo_ubicacion_nombre' => "Marenostrum",
                'direccion' => "",
                'ciudad' => "Fuengirola",
                'pais' => "España",
            ]);        
    
            $mySector = Sector::create([
                'nombre' => 'Palco 2 Ayuntamiento Fuengirola',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 2A - Ayuntamiento Fuengirola 1',
                'sector_id' => $mySector->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 2B- Ayuntamiento Fuengirola 2',
                'sector_id' => $mySector->id
            ]); 
            
            Zone::create([
                'nombre' => 'Palco 2C - Ayuntamiento Fuengirola 3',
                'sector_id' => $mySector->id
            ]); 
                  
            //-------------

            $mySector = Sector::create([
                'nombre' => 'Palco 3 Unicaja',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 3A- Unicaja',
                'sector_id' => $mySector->id
            ]);                   

            Zone::create([
                'nombre' => 'Palco 3B - Unicaja 2',
                'sector_id' => $mySector->id
            ]);                   
               

            $mySector = Sector::create([
                'nombre' => 'Palco 4',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 4A - Junta Andalucía',
                'sector_id' => $mySector->id
            ]);                   

            Zone::create([
                'nombre' => 'Palco 4B - Promotor',
                'sector_id' => $mySector->id
            ]);                   
    
            Zone::create([
                'nombre' => 'Palco 4C - Urbania',
                'sector_id' => $mySector->id
            ]);                             
            
            $mySector = Sector::create([
                'nombre' => 'Palco 5',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 5A - Probisa',
                'sector_id' => $mySector->id
            ]);                   

            Zone::create([
                'nombre' => 'Palco 5B - Hormacesa',
                'sector_id' => $mySector->id
            ]);                   
    
            Zone::create([
                'nombre' => 'Palco 5C - Cruzcampo',
                'sector_id' => $mySector->id
            ]);                             

            $mySector = Sector::create([
                'nombre' => 'Palco 6',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 6A - MAXXIUM',
                'sector_id' => $mySector->id
            ]);                   

            Zone::create([
                'nombre' => 'Palco 6B - BurgerKing',
                'sector_id' => $mySector->id
            ]);                   
    
            Zone::create([
                'nombre' => 'Palco 6C  Prensa',
                'sector_id' => $mySector->id
            ]);                             


            $mySector = Sector::create([
                'nombre' => 'Palco 7- ECI',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 7 - El Corte Inglés',
                'sector_id' => $mySector->id
            ]);                

            $mySector = Sector::create([
                'nombre' => 'Palco 8 - BMW',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 8 BMW',
                'sector_id' => $mySector->id
            ]);                   

            $mySector = Sector::create([
                'nombre' => 'Palco 9 - GMG',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 9 - GMG (Mupis)',
                'sector_id' => $mySector->id
            ]);                   

            $mySector = Sector::create([
                'nombre' => 'Palco 10 - Gestagua',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 10 - Gestagua',
                'sector_id' => $mySector->id
            ]);                   

            $mySector = Sector::create([
                'nombre' => 'Palco 11- Venta',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 11- Venta',
                'sector_id' => $mySector->id
            ]);                   

            $mySector = Sector::create([
                'nombre' => 'Palco 12 - Venta',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 12 - Venta',
                'sector_id' => $mySector->id
            ]);                   

            $mySector = Sector::create([
                'nombre' => 'Palco 13 - Sponsory',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 13 - Sponsory',
                'sector_id' => $mySector->id
            ]);                   

            $mySector = Sector::create([
                'nombre' => 'Palco 14 - Fox',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Palco 14 - FOX',
                'sector_id' => $mySector->id
            ]);                   

            
            $mySector = Sector::create([
                'nombre' => 'Media Box - COPE',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box - COPE',
                'sector_id' => $mySector->id
            ]);                 
            
            $mySector = Sector::create([
                'nombre' => 'Media Box- Onda Cero',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box- Onda Cero',
                'sector_id' => $mySector->id
            ]);                 

            $mySector = Sector::create([
                'nombre' => 'Media Box- SER Marbella',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box- SER Marbella',
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => 'Media Box - ECI',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box - ECI',
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => 'Media Box - BMW',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box - BMW',
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => 'Media Box - Burger King',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box - Burger King',
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => 'Media box- Diario Sur',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media box- Diario Sur',
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => 'Media Box- X Magazine',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box- X Magazine',
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => "Media box- o'clock",
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => "Media box- o'clock",
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => 'Media Box- La Opinión',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box- La Opinión',
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => 'Media Box- Málaga Hoy',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box- Málaga Hoy',
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => 'Media Box - ABC',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box - ABC',
                'sector_id' => $mySector->id
            ]);                 
            $mySector = Sector::create([
                'nombre' => 'Media Box- Mundo',
                'location_id' => $myLocation->id
            ]);             
            Zone::create([
                'nombre' => 'Media Box- Mundo',
                'sector_id' => $mySector->id
            ]);                 
            

            
            $mySector = Sector::create([
                'nombre' => 'Box A',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Box A-1',
                'sector_id' => $mySector->id
            ]);                      
            
            Zone::create([
                'nombre' => 'Box A-2',
                'sector_id' => $mySector->id
            ]);                     
            
            Zone::create([
                'nombre' => 'Box A-3',
                'sector_id' => $mySector->id
            ]);                     
  
            $mySector = Sector::create([
                'nombre' => 'Box B',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Box B-1',
                'sector_id' => $mySector->id
            ]);                      
            
            Zone::create([
                'nombre' => 'Box B-2',
                'sector_id' => $mySector->id
            ]);                     
            
            Zone::create([
                'nombre' => 'Box B-3',
                'sector_id' => $mySector->id
            ]);                     
            
            $mySector = Sector::create([
                'nombre' => 'Box DKV',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Box DKV',
                'sector_id' => $mySector->id
            ]);               

            
            $mySector = Sector::create([
                'nombre' => 'Barra Palco',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Barra Palco',
                'sector_id' => $mySector->id
            ]);                      
     
            $mySector = Sector::create([
                'nombre' => 'Azafatas',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'Azafatas',
                'sector_id' => $mySector->id
            ]);                    


            $mySector = Sector::create([
                'nombre' => 'Sector extra 1',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'zona 1 Sector extra 1',
                'sector_id' => $mySector->id
            ]);                      
            
            Zone::create([
                'nombre' => 'zona 2 Sector extra 1',
                'sector_id' => $mySector->id
            ]);                                 



            $mySector = Sector::create([
                'nombre' => 'Sector extra 2',
                'location_id' => $myLocation->id
            ]); 

            Zone::create([
                'nombre' => 'zona 1 Sector extra 2',
                'sector_id' => $mySector->id
            ]);                      
            
            Zone::create([
                'nombre' => 'zona 2 Sector extra 2',
                'sector_id' => $mySector->id
            ]);                                 



            //******************************** */
            // *** CREACION EVENTOS
            //******************************** */


        Event::create([
            'app_event_id' => 43,
            'app_schedule_id' => 363,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ARA MALIKIAN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,4),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 97,
            'app_schedule_id' => 429,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'MARÍA JOSÉ LLERGO',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,5),
            'hora' => '22:00',
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
      

        Event::create([
            'app_event_id' => 99,
            'app_schedule_id' => 431,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'NIÑA PASTORI – Gira 25 años',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,11),
            'hora' => '22:00',
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
        

        Event::create([
            'app_event_id' => 101,
            'app_schedule_id' => 433,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'MARTITA DE GRANÁ',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,12),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 103,
            'app_schedule_id' => 435,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'JUANCHO MARQUÉS + INVITADOS ',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,13),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 105,
            'app_schedule_id' => 437,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'SOHAIL JAZZ & WORLD MUSIC EXPERIENCE',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,17),
            'hora' => '20:30',
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

        Event::create([
            'app_event_id' => 105,
            'app_schedule_id' => 439,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'SOHAIL JAZZ & WORLD MUSIC EXPERIENCE',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,18),
            'hora' => '20:30',
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
        
        Event::create([
            'app_event_id' => 105,
            'app_schedule_id' => 441,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'SOHAIL JAZZ & WORLD MUSIC EXPERIENCE',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,19),
            'hora' => '20:30',
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
        
        Event::create([
            'app_event_id' => 105,
            'app_schedule_id' => 443,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'SOHAIL JAZZ & WORLD MUSIC EXPERIENCE',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,20),
            'hora' => '20:30',
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


        Event::create([
            'app_event_id' => 109,
            'app_schedule_id' => 447,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'IZAL',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,26),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 111,
            'app_schedule_id' => 449,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'CALIFATO ¾ + INVITADOS',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,6,27),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 111,
            'app_schedule_id' => 449,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'Juanito Makande',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,2),
            'hora' => '22:00',
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

        
        
        Event::create([
            'app_event_id' => 165,
            'app_schedule_id' => 543,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'VICENTE AMIGO – Memoria de los Sentidos',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,3),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 115,
            'app_schedule_id' => 455,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ROCK EN FAMILIA – ENCUENTRO ANUAL PARA FAMILIAS ROCKERAS',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,4),
            'hora' => '21:00',
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

        Event::create([
            'app_event_id' => 163,
            'app_schedule_id' => 539,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'TWO DOOR CINEMA CLUB',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,8),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 111,
            'app_schedule_id' => 449,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'Noche Rosa',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,10),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 117,
            'app_schedule_id' => 457,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'RECYCLED J + INVITADOS',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,11),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 119,
            'app_schedule_id' => 459,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'CAMELA 25+1',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,15),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 167,
            'app_schedule_id' => 545,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'HIJA DE LA LUNA',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,17),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 121,
            'app_schedule_id' => 461,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'PACO CANDELA «ALMA DE PURA RAZA TOUR»',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,18),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 123,
            'app_schedule_id' => 463,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'JUANLU MONTOYA',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,23),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 125,
            'app_schedule_id' => 465,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ANFITRIÓN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,26),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 125,
            'app_schedule_id' => 467,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ANFITRIÓN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,27),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 125,
            'app_schedule_id' => 469,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ANFITRIÓN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,28),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 125,
            'app_schedule_id' => 471,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ANFITRIÓN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,29),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 127,
            'app_schedule_id' => 473,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'PRE-COSQUIN – LA M.O.D.A',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,30),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 129,
            'app_schedule_id' => 475,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'PRE-COSQUIN SIDECARS',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,7,31),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 131,
            'app_schedule_id' => 477,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'CABARET FESTIVAL – CANTAJUEGO',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,1),
            'hora' => '21:00',
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

        Event::create([
            'app_event_id' => 133,
            'app_schedule_id' => 479,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'CABARET FESTIVAL – EL KANKA',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,2),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 135,
            'app_schedule_id' => 481,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'CABARET FESTIVAL – LOS MORANCOS',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,3),
            'hora' => '22:30',
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
        
        Event::create([
            'app_event_id' => 137,
            'app_schedule_id' => 483,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'CABARET FESTIVAL – GOD SAVE THE QUEEN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,4),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 139,
            'app_schedule_id' => 485,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'LUNA SUR FESTIVAL',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,5),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 139,
            'app_schedule_id' => 487,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'LUNA SUR FESTIVAL',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,6),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 139,
            'app_schedule_id' => 489,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'LUNA SUR FESTIVAL',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,7),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 139,
            'app_schedule_id' => 491,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'LUNA SUR FESTIVAL',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,8),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 141,
            'app_schedule_id' => 493,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ANFITRIÓN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,9),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 141,
            'app_schedule_id' => 495,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ANFITRIÓN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,10),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 141,
            'app_schedule_id' => 497,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ANFITRIÓN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,11),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 141,
            'app_schedule_id' => 499,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ANFITRIÓN',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,12),
            'hora' => '22:00',
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



        Event::create([
            'app_event_id' => 143,
            'app_schedule_id' => 531,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'MÓNICA NARANJO',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,13),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 145,
            'app_schedule_id' => 503,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'HOMBRES G',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,16),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 147,
            'app_schedule_id' => 505,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ULTRA BEACH COSTA DEL SOL',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,21),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 149,
            'app_schedule_id' => 507,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'KUTXI ROMERO',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,24),
            'hora' => '22:00',
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


        Event::create([
            'app_event_id' => 151,
            'app_schedule_id' => 509,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'DERBY MOTORETA’S BURRITO KACHIMBA',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,26),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 169,
            'app_schedule_id' => 547,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'AMODEO – EL JUICIO FINAL',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,27),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 153,
            'app_schedule_id' => 521,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'METAL PARADISE',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,28),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 153,
            'app_schedule_id' => 523,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'METAL PARADISE',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,8,29),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 155,
            'app_schedule_id' => 515,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'IGNATIUS',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,9,2),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 157,
            'app_schedule_id' => 517,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'MIGUEL POVEDA',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,9,4),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 171,
            'app_schedule_id' => 549,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'SOFIA ELLAR – Cancha y Gasolina',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,9,5),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 159,
            'app_schedule_id' => 519,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'THOMAS HELMIG',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,9,11),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 161,
            'app_schedule_id' => 525,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'COSQUIN ROCK',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,9,23),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 161,
            'app_schedule_id' => 527,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'COSQUIN ROCK',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,9,24),
            'hora' => '22:00',
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
        
        Event::create([
            'app_event_id' => 161,
            'app_schedule_id' => 529,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'COSQUIN ROCK',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2021,9,25),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 107,
            'app_schedule_id' => 541,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => '*APLAZAMIENTO GIRA “OPUS TOUR” – MARC ANTHONY*',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2022,6,25),
            'hora' => '22:00',
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

        Event::create([
            'app_event_id' => 113,
            'app_schedule_id' => 451,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ALEJANDRO SANZ',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2022,7,1),
            'hora' => '22:30',
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

        Event::create([
            'app_event_id' => 113,
            'app_schedule_id' => 453,
            'id_partido' => 1,
            'id_aforo' => 1,
            'nombre' => 'ALEJANDRO SANZ',
            'jornada' => 8,
            'fecha' => Carbon::createFromDate(2022,7,2),
            'hora' => '22:30',
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

            //********************************* */
         
            InvitationType::create([
                'nombre' => 'Invitación',
            ]);   

            InvitationType::create([
                'nombre' => 'Prensa',
            ]);   
            
            InvitationType::create([
                'nombre' => 'Acreditación - Staff',
            ]);        
            

    // ---------- INICIO creacion tablas intermedias y asignacion cupos -----
    // -------------------------------------------------------------------            

            $numEventos = Event::all()->count();
            $numZonas = Zone::all()->count();
            $numDepartments = Department::all()->count();


            for ($i=1; $i <=$numEventos ; $i++) { 
                for ($j=1; $j <=3 ; $j++) { 
                    DB::table('event_invitation_type')->insert([
                        [
                            'event_id' => $i, 
                            'invitation_type_id' => $j,
                        ]
                    ]);
                }
            }

            // tabla de event_zone todas las zonas
           
                for ($i=1; $i<= $numEventos ; $i++) { 
                    for ($j=1; $j <= $numZonas ; $j++) { 
                        DB::table('event_zone')->insert([
                            [
                                'event_id' => $i, 
                                'zone_id' => $j,
                                'cupo' => 20,
                                'price' => 0,
                            ]
                        ]);
                    }
                }

         // tabla de event_department_zone para  todas las zonas y departamentos
                    
        for ($r=1; $r <= $numEventos ; $r++) { 
            for ($i=1; $i <=$numDepartments ; $i++) { 
                for ($j=1; $j <=$numZonas ; $j++) { 

                    DB::table('event_department_zone')->insert([
                             [                           
                                 'event_id' => $r, 
                                 'department_id' => $i,
                                 'zone_id' => $j,
                                 'cupo' => 0,        
                             ]
                    ]);                   

                }    
            }  
        }

        for ($r=1; $r <= $numEventos ; $r++) { 
            
           // ayuntamiento fuengirola1
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 1)  
            ->where('zone_id', 1)
            ->update(['cupo' => 8]);

            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 1)  
            ->where('zone_id', 2)
            ->update(['cupo' => 8]);

            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 1)  
            ->where('zone_id', 3)
            ->update(['cupo' => 8]);

            // Unicaja 
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 4)  
            ->where('zone_id', 4)
            ->update(['cupo' => 8]);

            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 4)  
            ->where('zone_id', 5)
            ->update(['cupo' => 8]);

            //Junta de Andalucía
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 6)  
            ->where('zone_id', 6)
            ->update(['cupo' => 6]);

            //Urbania
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 7)  
            ->where('zone_id', 8)
            ->update(['cupo' => 6]);   
                
            //Probisa
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 8)  
            ->where('zone_id', 9)
            ->update(['cupo' => 6]);   
           
            //Hormacesa
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 9)  
            ->where('zone_id', 10)
            ->update(['cupo' => 6]);   

                
            //Cruzcampo
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 10)  
            ->where('zone_id', 11)
            ->update(['cupo' => 6]);   
                   
            
            //Maxxium
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 11)  
            ->where('zone_id', 12)
            ->update(['cupo' => 6]);   


            //Burger King Mediabox
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 14)  
            ->where('zone_id', 28)
            ->update(['cupo' => 10]);   

            //Burger King palco
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 13)  
            ->where('zone_id', 13)
            ->update(['cupo' => 6]);   

            //Prensa palco
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 12)  
            ->where('zone_id', 14)
            ->update(['cupo' => 6]);      
            
            //ECI Palco
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 15)  
            ->where('zone_id', 15)
            ->update(['cupo' => 6]);           
            
            //BMW Palco
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 17)  
            ->where('zone_id', 16)
            ->update(['cupo' => 6]);                           

            //GMG (Mupis)
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 19)  
            ->where('zone_id', 17)
            ->update(['cupo' => 6]);       

            //Gestagua
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 20)  
            ->where('zone_id', 18)
            ->update(['cupo' => 6]);         
            
            //venta 1
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 21)  
            ->where('zone_id', 19)
            ->update(['cupo' => 6]);             
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 21)  
            ->where('zone_id', 20)
            ->update(['cupo' => 6]);         
            
            // Sponsory
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 23)  
            ->where('zone_id', 21)
            ->update(['cupo' => 6]);           

            // Fox
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 24)  
            ->where('zone_id', 22)
            ->update(['cupo' => 6]);          

            // Barras
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 25)  
            ->where('zone_id', 43)
            ->update(['cupo' => 100]);                 
            
            // Azafatas
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 26)  
            ->where('zone_id', 44)
            ->update(['cupo' => 50]);        
            
            // DKV
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 38)  
            ->where('zone_id', 72)
            ->update(['cupo' => 70]);                       

            // Box A
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 39)  
            ->where('zone_id', 36)
            ->update(['cupo' => 20]);        
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 39)  
            ->where('zone_id', 37)
            ->update(['cupo' => 20]);      
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 39)  
            ->where('zone_id', 38)
            ->update(['cupo' => 20]);                                              


            // Box b
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 40)  
            ->where('zone_id', 39)
            ->update(['cupo' => 20]);        
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 40)  
            ->where('zone_id', 40)
            ->update(['cupo' => 20]);       
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 40)  
            ->where('zone_id', 41)
            ->update(['cupo' => 20]);                   
            
            // ECI MediaBox
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 16)  
            ->where('zone_id', 26)
            ->update(['cupo' => 4]);           
            
            // BMW MediaBox
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 18)  
            ->where('zone_id', 27)
            ->update(['cupo' => 8]);             
            
            // Cope
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 28)  
            ->where('zone_id', 23)
            ->update(['cupo' => 10]);                
            
            // Onda Cero
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 29)  
            ->where('zone_id', 24)
            ->update(['cupo' => 6]);          
            
            //Ser Marbella
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 30)  
            ->where('zone_id', 25)
            ->update(['cupo' => 4]);         
            
            //Diario Sur
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 31)  
            ->where('zone_id', 29)
            ->update(['cupo' => 10]);       
            
            //X Magazine
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 32)  
            ->where('zone_id', 30)
            ->update(['cupo' => 2]);           
            
            //O'clock
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 33)  
            ->where('zone_id', 31)
            ->update(['cupo' => 2]);                  
            
            //La Opinión
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 34)  
            ->where('zone_id', 32)
            ->update(['cupo' => 4]);                 
            
            //Málaga Hoy 
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 35)  
            ->where('zone_id', 33)
            ->update(['cupo' => 4]);                  
            
            //ABC
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 36)  
            ->where('zone_id', 34)
            ->update(['cupo' => 4]);            
            
            //Mundo
            $affected = DB::table('event_department_zone')
            ->where('event_id', $r)
            ->where('department_id', 37)  
            ->where('zone_id', 35)
            ->update(['cupo' => 4]);                        

        }                  


        for ($r=1; $r <= $numEventos ; $r++) { 
            for ($j=1; $j <=$numZonas ; $j++) { 
                // Invitaciones
                $affected = DB::table('event_department_zone')
                ->where('event_id', $r)
                ->where('department_id', 27)  
                ->where('zone_id', $j)
                ->update(['cupo' => 15]);                          
            }
        }

    // fin cupos
        
    // cupos para departamento invitaciones para todos los eventos
    for ($r=1; $r <=$numEventos ; $r++) { 
        for ($d=1; $d<= $numDepartments ; $d++) { 
            DB::table('event_department_generic')->insert([
                [
                    'event_id' => $r, 
                    'department_id' => $d,
                    'cupo' => 20,
                ]
            ]);
        }
    }

    // ---------- fin creacion tablas intermedias y asignacion cupos -----
    // -------------------------------------------------------------------


        DB::table('languages')->insert([
            [
                'name' => 'Castellano',
            ]
        ]);        

        DB::table('languages')->insert([
            [
                'name' => 'Inglés',
            ]
        ]);        

        DB::table('purposes')->insert([
            [
                'name' => 'Compromiso departamento',
            ]
        ]);        

        DB::table('purposes')->insert([
            [
                'name' => 'Contrato',
            ]
        ]);        

        DB::table('purposes')->insert([
            [
                'name' => 'Compromiso personal',
            ]
        ]);        
        DB::table('purposes')->insert([
            [
                'name' => 'Proveedor',
            ]
        ]);        

        DB::table('purposes')->insert([
            [
                'name' => 'Convenio',
            ]
        ]);        
        
        DB::table('purposes')->insert([
            [
                'name' => 'Posible cliente',
            ]
        ]);                

        DB::table('purposes')->insert([
            [
                'name' => 'Otros',
            ]
        ]);                

        DB::table('nationalities')->insert([
            [
                'name' => 'Española',
            ]
        ]);          

        DB::table('nationalities')->insert([
            [
                'name' => 'Francesa',
            ]
        ]);          

        DB::table('nationalities')->insert([
            [
                'name' => 'Alemana',
            ]
        ]);          

        DB::table('nationalities')->insert([
            [
                'name' => 'Italiana',
            ]
        ]);          


        EditPurpose::create([
            'name' => "Falta stock"
        ]);

        EditPurpose::create([
            'name' => "Petición duplicada"
        ]);

        EditPurpose::create([
            'name' => "Informació, Incorrecta"
        ]);

        EditPurpose::create([
            'name' => "Falta información"
        ]);

        EditPurpose::create([
            'name' => "Otros"
        ]);


        // invitado test dni


        $myGuest = Guest::create([
            'nombre' => 'Nombre test',
            'apellidos' => 'Apellidos test',
            'dni' => '12345678a',
            'email' => 'test@test.com',
            'fecha_nacimiento' => Carbon::createFromDate(1975,9,26),
            'nationality_id' => 3,
            'es_menor' => 0
        ]);


        // crear plantillas de prueba

        $plantillaPrueba = '<p>&nbsp;</p>

        <table align="center" cellpadding="0" cellspacing="0" style="background-color:white; height:300px; margin:0 auto 0 auto; width:550px">
            <tbody>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><img alt="" src="https://marenostrum.appcess.es/storage/uploads/marenostrum1_1620108797.jpg" style="width:650px" /></td>
                </tr>
                <tr>
                    <td style="text-align:center">&nbsp;
                    <h2><strong>{{NOMBRE_EVENTO}}</strong></h2>
        
                    <h2><strong>{{FECHA_EVENTO}} - {{HORA_EVENTO}}</strong></h2>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <h2><strong><span style="font-size:24px">&iexcl;EST&Aacute;S INVITADO!</span></strong></h2>
        
                    <h3>Hola {{NOMBRE_INVITADO}}</h3>
        
                    <h2><span style="font-size:18px"><strong>Tienes tu entrada en nuestra app</strong></span></h2>
        
                    <h2><strong>ENTRADA:</strong>&nbsp;{{NUMERO_ENTRADAS_PETICION}}</h2>
        
                    <h3><strong>ZONA:&nbsp;</strong>{{NOMBRE_ZONA_PETICION}}&nbsp;&nbsp;</h3>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">&nbsp;
                    <hr />
                    <h2>&nbsp;Si a&uacute;n no te has registrado,</h2>
        
                    <h2>Desc&aacute;rgate nuestra app para ver tu entrada</h2>
        
                    <p><a href="https://app.marenostrumfuengirola.com/" target="_blank">DESCARGAR APP</a></p>
        
                    <p>{{HEADER_USER_APP}}<br />
                    {{LOGIN_USER_APP}}<br />
                    {{PASSWORD_USER_APP}}</p>
        
                    <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;
                    <hr /></td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p><strong>Textos legales</strong></p>
        
                    <p style="text-align:start"><span style="font-size:small"><span style="color:#222222"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff"><span style="font-size:9pt"><span style="font-family:&quot;Calibri Light&quot;,sans-serif"><span style="color:#595959">Este mensaje est&aacute; dirigido a su destinatario exclusivamente y puede contener informaci&oacute;n PRIVILEGIADA y CONFIDENCIAL. Si Ud. no es el destinatario pretendido, por la presente le notificamos que cualquier difusi&oacute;n de esta comunicaci&oacute;n o de su contenido est&aacute; totalmente prohibida. Si ha recibido esta comunicaci&oacute;n por error, por favor borre todas las copias de este mensaje y de sus anexos y notif&iacute;quenos de inmediato.&nbsp;</span></span></span><span style="font-size:9pt"><span style="font-family:&quot;Calibri Light&quot;,sans-serif"><span style="color:#595959">Gracias.</span></span></span></span></span></span></span></p>
        
                    <p style="text-align:start"><span style="font-size:small"><span style="color:#222222"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff"><span style="font-size:9pt"><span style="font-family:&quot;Calibri Light&quot;,sans-serif"><span style="color:#595959">This message is intended only for the use of the addressee and may contain information that is PRIVILEGED and CONFIDENTIAL. If you are not the intended recipient, you are hereby notified that any dissemination of this communication is strictly prohibited. If you have received this communication in error, please erase all copies of this message and its attachments and notify us immediately.&nbsp;</span></span></span><span style="font-size:9pt"><span style="font-family:&quot;Calibri Light&quot;,sans-serif"><span style="color:#595959">Thank you.</span></span></span></span></span></span></span></p>
                    </td>
                </tr>
                <tr>
                    <td><img alt="" src="https://marenostrum.appcess.es/files/assets/templates/template-marenostrum-footer.jpg" style="width:650px" /></td>
                </tr>
            </tbody>
        </table>
        
        <p>&nbsp;</p>        
        ';

        // invitaciones 
        $plantillaSubject = 'Su invitación';

        $myTemplate = EmailTemplate::create([
            'name' => 'INVITACION CAST SENTADO',
            'subject' => $plantillaSubject,
            'content' => $plantillaPrueba,
            'language_id' => 1,
            'location_id' => 1,
            'activity_id' => 1,
            'activity_type_id' => 1,
            'invitation_type_id' => 1,
        ]); 
    

        
        $plantillaPrueba = '<p>&nbsp;</p>

        <table align="center" cellpadding="0" cellspacing="0" style="background-color:white; height:300px; margin:0 auto 0 auto; width:550px">
            <tbody>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><img alt="" src="https://marenostrum.appcess.es/storage/uploads/marenostrum1_1620108797.jpg" style="width:650px" /></td>
                </tr>
                <tr>
                    <td style="text-align:center">&nbsp;
                    <h2><strong>{{NOMBRE_EVENTO}}</strong></h2>
        
                    <h2><strong>{{FECHA_EVENTO}} - {{HORA_EVENTO}}</strong></h2>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <h2><strong><span style="font-size:24px">&iexcl;TU ACREDITACI&Oacute;N!</span></strong></h2>
        
                    <h3>Hola {{NOMBRE_INVITADO}}</h3>
        
                    <h2><span style="font-size:18px"><strong>Tienes tu acreditacion en nuestra app</strong></span></h2>
        
                    <h2><strong>ACREDITACI&Oacute;N:</strong>&nbsp; &nbsp;</h2>
        
                    <h3><strong>ZONA:</strong>&nbsp; {{NOMBRE_ZONA_PETICION}}</h3>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">&nbsp;
                    <hr />
                    <h2>&nbsp;Si a&uacute;n no te has registrado,</h2>
        
                    <h2>Desc&aacute;rgate nuestra app para ver tu entrada</h2>
        
                    <p><a href="https://app.marenostrumfuengirola.com/" target="_blank">DESCARGAR APP</a></p>
        
                    <p>{{HEADER_USER_APP}}<br />
                    {{LOGIN_USER_APP}}<br />
                    {{PASSWORD_USER_APP}}</p>
        
                    <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;
                    <hr /></td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p>&nbsp;</p>
        
                    <p style="text-align:start"><span style="font-size:small"><span style="color:#222222"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff"><span style="font-size:9pt"><span style="font-family:&quot;Calibri Light&quot;,sans-serif"><span style="color:#595959">Este mensaje est&aacute; dirigido a su destinatario exclusivamente y puede contener informaci&oacute;n PRIVILEGIADA y CONFIDENCIAL. Si Ud. no es el destinatario pretendido, por la presente le notificamos que cualquier difusi&oacute;n de esta comunicaci&oacute;n o de su contenido est&aacute; totalmente prohibida. Si ha recibido esta comunicaci&oacute;n por error, por favor borre todas las copias de este mensaje y de sus anexos y notif&iacute;quenos de inmediato.&nbsp;</span></span></span><span style="font-size:9pt"><span style="font-family:&quot;Calibri Light&quot;,sans-serif"><span style="color:#595959">Gracias.</span></span></span></span></span></span></span></p>
        
                    <p style="text-align:start"><span style="font-size:small"><span style="color:#222222"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff">&nbsp;</span></span></span></span></p>
        
                    <p style="text-align:start"><span style="font-size:small"><span style="color:#222222"><span style="font-family:Arial,Helvetica,sans-serif"><span style="background-color:#ffffff"><span style="font-size:9pt"><span style="font-family:&quot;Calibri Light&quot;,sans-serif"><span style="color:#595959">This message is intended only for the use of the addressee and may contain information that is PRIVILEGED and CONFIDENTIAL. If you are not the intended recipient, you are hereby notified that any dissemination of this communication is strictly prohibited. If you have received this communication in error, please erase all copies of this message and its attachments and notify us immediately.&nbsp;</span></span></span><span style="font-size:9pt"><span style="font-family:&quot;Calibri Light&quot;,sans-serif"><span style="color:#595959">Thank you.</span></span></span></span></span></span></span></p>
                    </td>
                </tr>
                <tr>
                    <td><img alt="" src="https://marenostrum.appcess.es/files/assets/templates/template-marenostrum-footer.jpg" style="width:650px" /></td>
                </tr>
            </tbody>
        </table>
        
        <p>&nbsp;</p>
        ';

        // invitaciones 
        $plantillaSubject = 'Tu acreditación';

        $myTemplate = EmailTemplate::create([
            'name' => 'ACREDITACION STAFF FESTIVAL',
            'subject' => $plantillaSubject,
            'content' => $plantillaPrueba,
            'language_id' => 1,
            'location_id' => 1,
            'activity_id' => 1,
            'activity_type_id' => 1,
            'invitation_type_id' => 3,
        ]); 
    

        

        $plantillaPrueba = '<p>&nbsp;</p>

        <table align="center" cellpadding="0" cellspacing="0" style="background-color:white; height:300px; margin:0 auto 0 auto; width:550px">
            <tbody>
                <tr>
                    <td style="text-align:center">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center"><img alt="" src="https://marenostrum.appcess.es/storage/uploads/logo color 2 1_1622099842.jpg" style="height:245px; width:640px" /></td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p>&nbsp;</p>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16.0pt">Tenemos el placer de invitarle a Marenostrum Fuengirola al concierto de:</span></span></p>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><strong>{{NOMBRE_EVENTO}}</strong></span></h2>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><strong>{{FECHA_EVENTO}} - {{HORA_EVENTO}}</strong></span></h2>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:large"><strong>APERTURA DE PUERTAS: 19:00h</strong></span></span></p>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px"><strong>ZONA:</strong>&nbsp; {{NOMBRE_ZONA_PETICION}}</span></span></p>
        
                    <h2><span style="font-size:18px"><strong><span style="font-family:Arial,Helvetica,sans-serif">ACCESO: BMW ///M Protocolo</span>&nbsp;</strong></span><img alt="" src="https://marenostrum.appcess.es/storage/uploads/BMW_M_Grey-Colour_CMYK_1621959921.jpg" style="height:35px; width:100px" /></h2>
        
                    <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <div>&nbsp;</div>
        
                    <div style="margin-left:40px">&nbsp;</div>
        
                    <div style="margin-left:40px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">Le invitamos a que acceda al recinto Marenostrum Fuengirola </span><span style="font-size:18px">con&nbsp;<strong>antelaci&oacute;n</strong> y </span><span style="font-size:18px">disfrute de una experiencia inolvidable&nbsp;del atardecer, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;con los&nbsp;</span><span style="font-size:18px">mejores <strong>c&oacute;cteles </strong>y degustando las deliciosas y originales propuestas culinarias que ofrecen los <strong>Foodtrucks </strong>en la </span></span></div>
        
                    <div style="margin-left:40px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px"><strong>Terraza Marenostrum Fuengirola.</strong></span></span></div>
        
                    <div>&nbsp;</div>
        
                    <div>&nbsp;</div>
        
                    <div><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">Esperamos que disfrute de la experiencia <strong>Marenostrum Fuengirola</strong>.</span></span></div>
        
                    <div><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">Con nuestros mejores deseos.</span></span></div>
        
                    <div>&nbsp;</div>
        
                    <h3>&nbsp;</h3>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <div style="text-align:center">&nbsp;</div>
        
                    <div style="text-align:center">&nbsp;</div>
        
                    <div style="text-align:center"><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif">Para garantizar la seguridad en los flujos de acceso, </span></span></div>
        
                    <div style="text-align:center"><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="color:#2980b9"><strong>las puertas del recinto se cerrar&aacute;n a las 21:30h.</strong></span> </span></span></div>
        
                    <div><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif">Una vez realizado el cierre de estas <u><strong>no podr&aacute; acceder al recinto</strong></u>. </span></span></div>
        
                    <div><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif">Rogamos m&aacute;xima puntualidad.</span></span><br />
                    &nbsp;</div>
        
                    <div>&nbsp;</div>
        
                    <hr />
                    <h2><span style="font-family:Arial,Helvetica,sans-serif">&nbsp;<br />
                    <span style="font-size:18px">Para acceder a su invitaci&oacute;n debe <strong>descargarse </strong></span></span></h2>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="font-size:18px">la App de&nbsp;Marenostrum en el m&oacute;vil.</span></strong></span></h2>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">Este es su usuario y contrase&ntilde;a para acceder a la App y a su invitaci&oacute;n.</span></span></h2>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif">{{HEADER_USER_APP}}<br />
                    {{LOGIN_USER_APP}}<br />
                    {{PASSWORD_USER_APP}}</span><br />
                    &nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">&nbsp;<br />
                    Consulte&nbsp;la ubicaci&oacute;n de la puerta de acceso a su zona:</span></span></p>
        
                    <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px"><strong>ZONA:</strong>&nbsp; {{NOMBRE_ZONA_PETICION}}</span></span></p>
        
                    <p>&nbsp;</p>
        
                    <p style="text-align:center"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt="" src="https://marenostrum.appcess.es/storage/uploads/MARNEOSTRUM PLANO LOMA_1622027724.jpg" style="height:357px; width:500px" /></span></p>
        
                    <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p><img alt="" src="https://marenostrum.appcess.es/storage/uploads/lgos faldon_1622111056.jpg" style="height:82px; width:400px" /></p>
                    </td>
                </tr>
                <tr>
                    <td>
                    <h5 style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><strong>Pol&iacute;tica de privacidad</strong></span></span></h5>
        
                    <h5 style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><span style="color:#7f8c8d">En cumplimiento de lo establecido en el RGPD y la LOPD-GDD, le informamos que los datos personales recabados por el Ayuntamiento de Fuengirola mediante los formularios extendidos en su p&aacute;gina y/o App m&oacute;vil quedar&aacute;n incorporados y ser&aacute;n tratados en nuestro ficheros con el fin de poder facilitar, agilizar y cumplir los compromisos establecidos entre el Ayuntamiento de Fuengirola y el Usuario o el mantenimiento de la relaci&oacute;n que se establezca en los formularios que este rellene, o para atender una solicitud o consulta del mismo. Asimismo, de conformidad con lo previsto en el RGPD y la LOPD-GDD, salvo que sea de aplicaci&oacute;n la excepci&oacute;n prevista en el art&iacute;culo 30.5 del RGPD, se mantiene un registro de actividades de tratamiento que especifica, seg&uacute;n sus finalidades, las actividades de tratamiento llevadas a cabo y las dem&aacute;s circunstancias establecidas en el RGPD. Si considera que sus datos personales no han sido tratados conforme a la normativa, puede contactar con el responsable dirigiendo un escrito a la siguiente direcci&oacute;n: Plaza de Espa&ntilde;a 1, 29640 Fuengirola (M&aacute;laga) o al siguiente correo electr&oacute;nico:</span><span style="color:#000000"><span style="color:#5b9bd5"> direcci&oacute;ncultura@fuengirola.org&nbsp;</span></span><span style="color:#7f8c8d">Para m&aacute;s informaci&oacute;n</span><span style="color:#000000"><span style="color:#5b9bd5">: <a href="https://marenostrumfuengirola.com/aviso-legal/">pol&iacute;tica de privacidad y protecci&oacute;n de datos</a></span></span></span></span></h5>
        
                    <h5 style="text-align:center"><span style="color:#7f8c8d"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px">Este mensaje est&aacute; dirigido a su destinatario exclusivamente y puede contener informaci&oacute;n PRIVILEGIADA y CONFIDENCIAL. Si Ud. no es el destinatario pretendido, por la presente le notificamos que cualquier difusi&oacute;n de esta comunicaci&oacute;n o de su contenido est&aacute; totalmente prohibida. Si ha recibido esta comunicaci&oacute;n por error, por favor borre todas las copias de este mensaje y de sus anexos y notif&iacute;quenos de inmediato.&nbsp;Gracias.</span></span></span></h5>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p>&nbsp;</p>
        
        <p>&nbsp;</p>
        ';

        // invitaciones 
        $plantillaSubject = 'Su invitación';

        $myTemplate = EmailTemplate::create([
            'name' => 'Plantilla Invitación Castellano',
            'subject' => $plantillaSubject,
            'content' => $plantillaPrueba,
            'language_id' => 1,
            'location_id' => 1,
            'activity_id' => 1,
            'activity_type_id' => 1,
            'invitation_type_id' => 1,
        ]); 


        $plantillaPrueba = '<p>&nbsp;</p>

        <table align="center" cellpadding="0" cellspacing="0" style="background-color:white; height:300px; margin:0 auto 0 auto; width:550px">
            <tbody>
                <tr>
                    <td style="text-align:center">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center"><img alt="" src="https://marenostrum.appcess.es/storage/uploads/logo color 2 1_1622099842.jpg" style="height:245px; width:640px" /></td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p>&nbsp;</p>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16.0pt">Bienvenido al equio de&nbsp;Marenostrum Fuengirola.</span></span></p>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><strong>{{NOMBRE_EVENTO}}</strong></span></h2>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><strong>{{FECHA_EVENTO}} - {{HORA_EVENTO}}</strong></span></h2>
        
                    <h2><span style="font-size:18px"><strong><span style="font-family:Arial,Helvetica,sans-serif">ACCESO: RECEPCI&Oacute;N CREW</span>&nbsp;</strong>(junto acceso B1)</span></h2>
        
                    <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <div>&nbsp;</div>
        
                    <div style="margin-left:40px">&nbsp;</div>
        
                    <div style="margin-left:40px"><span style="font-family:Arial,Helvetica,sans-serif; font-size:18px">Para acceder a la acreditaci&oacute;n, debes descargarte&nbsp;</span><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="font-size:18px">la App de&nbsp;Marenostrum en el m&oacute;vil.&nbsp;</span></strong></span></div>
        
                    <div>
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">Este es su usuario y contrase&ntilde;a.</span></span></h2>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif">{{HEADER_USER_APP}}<br />
                    {{LOGIN_USER_APP}}<br />
                    {{PASSWORD_USER_APP}}</span></p>
                    </div>
        
                    <div>&nbsp;</div>
        
                    <div><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">En el apartado <strong>Mis Entradas de la App</strong>, encontrar&aacute;s tu acreditaci&oacute;n Qr v&aacute;lido para todos los d&iacute;as que te hayan asignado.</span></span></div>
        
                    <div>&nbsp;</div>
        
                    <div><span style="font-family:Arial,Helvetica,sans-serif; font-size:large">Esperamos que disfrutes de la experiencia <strong>Marenostrum Fuengirola.</strong></span></div>
        
                    <div>&nbsp;</div>
        
                    <div>&nbsp;</div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <div style="text-align:center">&nbsp;</div>
        
                    <div style="text-align:center">&nbsp;</div>
        
                    <div style="text-align:center"><span style="color:#2980b9"><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif">Tu QR dejar&aacute; de ser</span></span><strong><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif"> v&aacute;lido 15 minutos </span></span></strong><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif">antes<strong><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif"> </span></span></strong>de tu hora de entrada asignada.</span></span></span></div>
        
                    <div><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif">Pasados esos minutos,&nbsp;<u><strong>no podr&aacute;s acceder al recinto</strong></u>. </span></span></div>
        
                    <div><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif">Rogamos m&aacute;xima puntualidad.</span></span><br />
                    &nbsp;</div>
        
                    <div><span style="font-family:Arial,Helvetica,sans-serif">&nbsp;</span></div>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">&nbsp;<br />
                    Consulta&nbsp;la ubicaci&oacute;n de la puerta de acceso </span></span></p>
        
                    <p style="text-align:center"><strong><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">RECEPCI&Oacute;N&nbsp;CREW.</span></span></strong></p>
        
                    <p>&nbsp;</p>
        
                    <p style="text-align:center"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt="" src="https://marenostrum.appcess.es/storage/uploads/MARNEOSTRUM PLANO LOMA_1622027724.jpg" style="height:357px; width:500px" /></span></p>
        
                    <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p><img alt="" src="https://marenostrum.appcess.es/storage/uploads/lgos faldon_1622111440.jpg" style="height:82px; width:400px" /></p>
                    </td>
                </tr>
                <tr>
                    <td>
                    <h5 style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><strong>Pol&iacute;tica de privacidad</strong></span></span></h5>
        
                    <h5 style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><span style="color:#000000"><span style="color:#595959">E</span></span><span style="color:#7f8c8d">n cumplimiento de lo establecido en el RGPD y la LOPD-GDD, le informamos que los datos personales recabados por el Ayuntamiento de Fuengirola mediante los formularios extendidos en su p&aacute;gina y/o App m&oacute;vil quedar&aacute;n incorporados y ser&aacute;n tratados en nuestro ficheros con el fin de poder facilitar, agilizar y cumplir los compromisos establecidos entre el Ayuntamiento de Fuengirola y el Usuario o el mantenimiento de la relaci&oacute;n que se establezca en los formularios que este rellene, o para atender una solicitud o consulta del mismo. Asimismo, de conformidad con lo previsto en el RGPD y la LOPD-GDD, salvo que sea de aplicaci&oacute;n la excepci&oacute;n prevista en el art&iacute;culo 30.5 del RGPD, se mantiene un registro de actividades de tratamiento que especifica, seg&uacute;n sus finalidades, las actividades de tratamiento llevadas a cabo y las dem&aacute;s circunstancias establecidas en el RGPD. Si considera que sus datos personales no han sido tratados conforme a la normativa, puede contactar con el responsable dirigiendo un escrito a la siguiente direcci&oacute;n: Plaza de Espa&ntilde;a 1, 29640 Fuengirola (M&aacute;laga) o al siguiente correo electr&oacute;nico</span><span style="color:#000000"><span style="color:#5b9bd5">: direcci&oacute;ncultura@fuengirola.org&nbsp;</span></span></span></span><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><span style="color:#7f8c8d">Para m&aacute;s informaci&oacute;n:</span><span style="color:#000000"><span style="color:#5b9bd5"> <a href="https://marenostrumfuengirola.com/aviso-legal/">pol&iacute;tica de privacidad y protecci&oacute;n de datos</a></span></span></span></span></h5>
        
                    <h5 style="text-align:center"><span style="color:#7f8c8d"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px">Este mensaje est&aacute; dirigido a su destinatario exclusivamente y puede contener informaci&oacute;n PRIVILEGIADA y CONFIDENCIAL. Si Ud. no es el destinatario pretendido, por la presente le notificamos que cualquier difusi&oacute;n de esta comunicaci&oacute;n o de su contenido est&aacute; totalmente prohibida. Si ha recibido esta comunicaci&oacute;n por error, por favor borre todas las copias de este mensaje y de sus anexos y notif&iacute;quenos de inmediato.&nbsp;Gracias.</span></span></span></h5>
        
                    <p>&nbsp;</p>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p>&nbsp;</p>
        ';

        // invitaciones 
        $plantillaSubject = 'Bienvenido al equipo Marenostrum Fuengirola';

        $myTemplate = EmailTemplate::create([
            'name' => 'Plantilla acreditación castellano',
            'subject' => $plantillaSubject,
            'content' => $plantillaPrueba,
            'language_id' => 1,
            'location_id' => 1,
            'activity_id' => 1,
            'activity_type_id' => 1,
            'invitation_type_id' => 3,
        ]);         
            

        $plantillaPrueba = '<p>&nbsp;</p>

        <table align="center" cellpadding="0" cellspacing="0" style="background-color:white; height:300px; margin:0 auto 0 auto; width:550px">
            <tbody>
                <tr>
                    <td style="text-align:center">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align:center"><img alt="" src="https://marenostrum.appcess.es/storage/uploads/logo color 2 1_1622099842.jpg" style="height:245px; width:640px" /></td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p>&nbsp;</p>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16.0pt">We are honoured to invite you to&nbsp;Marenostrum Fuengirola to the show:</span></span></p>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><strong>{{NOMBRE_EVENTO}}</strong></span></h2>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><strong>{{FECHA_EVENTO}} - {{HORA_EVENTO}}</strong></span></h2>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:large"><strong>DOOR OPENING: 19:00h</strong></span></span></p>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px"><strong>AREA:</strong>&nbsp; {{NOMBRE_ZONA_PETICION}}</span></span></p>
        
                    <h2><span style="font-size:18px"><strong><span style="font-family:Arial,Helvetica,sans-serif">ACCESS: BMW ///M Protocolo</span>&nbsp;</strong></span><img alt="" src="https://marenostrum.appcess.es/storage/uploads/BMW_M_Grey-Colour_CMYK_1621959921.jpg" style="height:35px; width:100px" /></h2>
        
                    <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <div>&nbsp;</div>
        
                    <div style="margin-left:40px">&nbsp;</div>
        
                    <div style="margin-left:40px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">We invite you&nbsp;to come to&nbsp; Marenostrum Fuengirola <strong>early</strong>&nbsp;</span></span></div>
        
                    <div style="margin-left:40px"><span style="font-family:Arial,Helvetica,sans-serif; font-size:18px">to enjoy an unforgettable sunset experience, with the best <strong>cocktails and the trendiest</strong>&nbsp;culinary proposals offered by our &quot;Food &amp; Love&quot;</span></div>
        
                    <div style="margin-left:40px"><span style="font-family:Arial,Helvetica,sans-serif; font-size:18px">&nbsp;<strong>Foodtrucks</strong>&nbsp;at the amazing </span><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px"><strong>Marenostrum Fuengirola Terrace.</strong></span></span></div>
        
                    <div>&nbsp;</div>
        
                    <div>&nbsp;</div>
        
                    <div><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">Enjoy your <strong>Marenostrum Fuengirola</strong> experience.</span></span></div>
        
                    <div>&nbsp;</div>
        
                    <h3>&nbsp;</h3>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <div style="text-align:center">&nbsp;</div>
        
                    <div style="text-align:center">&nbsp;</div>
        
                    <div style="text-align:center"><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif">Please take our best advice,&nbsp;&nbsp;</span></span></div>
        
                    <div style="text-align:center"><span style="font-size:18px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="color:#2980b9"><strong>doors will close at 21:30 p.m.</strong></span></span></span></div>
        
                    <div><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">Be punctual.</span></span></div>
        
                    <hr />
                    <h2><span style="font-family:Arial,Helvetica,sans-serif">&nbsp;<br />
                    <span style="font-size:18px">To access to your invitation, you <strong>must</strong> </span><span style="font-size:22px"><strong>download.</strong></span></span></h2>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><strong><span style="font-size:18px">the Marenostrum</span><span style="font-size:22px"> </span><span style="font-size:20px"><span style="font-size:22px">App</span> </span><span style="font-size:18px">on </span><span style="font-size:22px">your mobile </span><span style="font-size:20px"><span style="font-size:22px">device</span>.</span></strong></span></h2>
        
                    <h2><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">This is&nbsp; your username and password to access it.</span></span></h2>
        
                    <p><span style="font-family:Arial,Helvetica,sans-serif">{{HEADER_USER_APP}}<br />
                    {{LOGIN_USER_APP}}<br />
                    {{PASSWORD_USER_APP}}</span><br />
                    &nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px">&nbsp;<br />
                    Check the location of the access&nbsp;door&nbsp;to your area:</span></span></p>
        
                    <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:18px"><strong>AREA:</strong>&nbsp; {{NOMBRE_ZONA_PETICION}}</span></span></p>
        
                    <p>&nbsp;</p>
        
                    <p style="text-align:center"><span style="font-size:16px">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt="" src="https://marenostrum.appcess.es/storage/uploads/MARNEOSTRUM PLANO LOMA_1622027724.jpg" style="height:357px; width:500px" /></span></p>
        
                    <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center">
                    <p><img alt="" src="https://marenostrum.appcess.es/storage/uploads/lgos faldon_1622111355.jpg" style="height:82px; width:400px" /></p>
                    </td>
                </tr>
                <tr>
                    <td>
                    <h5 style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><strong>Privacy and protection policy</strong></span></span></h5>
        
                    <h5 style="text-align:center"><span style="color:#7f8c8d"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px">In compliance with the provisions of the RGPD and the LOPD-GDD, we inform you that the personal data collected by the&nbsp;Ayuntamiento de Fuengirola through the forms provided on its page and / or mobile App will be incorporated and will be treated in our files in order to be able to facilitate, expedite and fulfill the commitments&nbsp;established between the Fuengirola City Council and the User or the maintenance of the relationship established in the forms that he / she fills out, or to attend to a request or query from the User. Likewise, in accordance with the provisions of the RGPD and the LOPD-GDD,unless the exception provided for in article 30.5 of the RGPD applies, a record of treatment activities is kept that specifies, according to their purposes, the treatment activities carried out and the other circumstances established in the RGPD. If you consider that your personal data has not been processed in accordance with the regulations, you can contact the person in charge by writing to the following address: Plaza de Espa&ntilde;a 1, 29640 Fuengirola (M&aacute;laga) or to the following email:&nbsp;</span></span></span><span style="color:#2980b9"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><u>direcci&oacute;ncultura@fuengirola.org</u></span></span></span><span style="color:#7f8c8d"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px">.&nbsp;</span></span></span><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px"><span style="color:#7f8c8d">More<span style="color:#000000"><span style="color:#595959"> </span></span>information</span><span style="color:#000000"><span style="color:#5b9bd5">: <a href="https://marenostrumfuengirola.com/aviso-legal/">pol&iacute;tica de privacidad y protecci&oacute;n de datos</a></span></span></span></span></h5>
        
                    <h5 style="text-align:center"><span style="color:#7f8c8d"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:10px">This message is intended only for the use of the addressee and may contain information that is PRIVILEGED and CONFIDENTIAL. If you are not the intended recipient, you are hereby notified that any dissemination of this communication is strictly prohibited. If you have received this communication in error, please erase all copies of this message and its attachments and notify us immediately.&nbsp;Thank you</span></span></span></h5>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <p>&nbsp;</p>
        ';

        // invitaciones 
        $plantillaSubject = 'Your Invitation';

        $myTemplate = EmailTemplate::create([
            'name' => 'Plantilla Invitación Inglés',
            'subject' => $plantillaSubject,
            'content' => $plantillaPrueba,
            'language_id' => 2,
            'location_id' => 1,
            'activity_id' => 1,
            'activity_type_id' => 1,
            'invitation_type_id' => 1,
        ]);                 
        // fin creacion plantillas


        
        //****************** */


      ActivityType::create([
        'name' => 'Conciertos',
        'activity_id' => 1,
        'location_id' => 1,
      ]);

      $activitytest = ActivityType::create([
        'name' => 'Test',
        'activity_id' => 1,
        'location_id' => 1,
      ]);

      ActivityType::create([
        'name' => 'Otro',
        'activity_id' => 1,
        'location_id' => 1,
      ]);

      $activitytest->delete();

    
        // creacion de usuarios 

        User::create([
            'name' => 'George',
            'email' => 'info@growinup.net',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 1
        ]);
        
        User::create([
            'name' => 'Cristina',
            'email' => 'cristina@ainasg.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 1,
        ]);

        User::create([
            'name' => 'Usuario Test',
            'email' => 'test@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 1,
        ]);
        
        User::create([
            'name' => 'Carlos',
            'email' => 'carlos@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 1,
        ]);        
        

         User::create([
            'name' => 'Maria',
            'email' => 'peticionario@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 1,      
        ]);      


        // ***************

        User::create([
            'name' => 'Peticionario',
            'email' => 'peticionari@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 21,
        ]);


        User::create([
            'name' => 'Daphne',
            'email' => 'info@foxgroup.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 27,
        ]);


        User::create([
            'name' => 'Maeva LB',
            'email' => 'aa@foxgroup.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 27,
        ]);
        
        
        User::create([
            'name' => 'Jason Fox',
            'email' => 'jasonfox@fox-industries.net',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 27,
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@appcess.es',
            'password' => bcrypt('123456789'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 1,
        ]);        


        $myUser = User::find(1);
        $myUser->assignRoles( 'superadmin');

        $myUser = User::find(2);
        $myUser->assignRoles( 'superadmin');

        $myUser = User::find(3);
        $myUser->assignRoles( 'superadmin');

        $myUser = User::find(4);
        $myUser->assignRoles('admin');

        $myUser = User::find(5);
        $myUser->assignRoles('peticionario');        

        // ** usuarios test  **
        $myUser = User::find(6);
        $myUser->assignRoles('peticionario');      
        $myUser = User::find(7);
        $myUser->assignRoles('gestor');       
        $myUser = User::find(8);
        $myUser->assignRoles('gestor');       
        $myUser = User::find(9);
        $myUser->assignRoles('gestor');         
        
        $myUser = User::find(10);
        $myUser->assignRoles('peticionario');              

        // ***
        // usuarios marenostrum

        User::create([
            'name' => 'Prensa palco',
            'email' => 'prensa@appcess.es',
            'password' => bcrypt('Prensa'),
            'api_token' => Str::random(64),
            'dep' => Department::find(12)->nombre,
            'department_id' => 12,
        ]);        

        User::create([
            'name' => 'Burger King Palco',
            'email' => 'gestorburgerking@appcess.es',
            'password' => bcrypt('Burgerking'),
            'api_token' => Str::random(64),
            'dep' => Department::find(13)->nombre,
            'department_id' => 13,
        ]);        

        User::create([
            'name' => 'Burger King Mediabox',
            'email' => 'gestorburgerking2@appcess.es',
            'password' => bcrypt('Burgerking2'),
            'api_token' => Str::random(64),
            'dep' => Department::find(14)->nombre,
            'department_id' => 14,
        ]);        

        User::create([
            'name' => 'Maxxium',
            'email' => 'gestormaxxium@appcess.es',
            'password' => bcrypt('Maxxium'),
            'api_token' => Str::random(64),
            'dep' => Department::find(11)->nombre,
            'department_id' => 11,
        ]);        

        User::create([
            'name' => 'Cruzcampo',
            'email' => 'gestorcruzcampo@appcess.es',
            'password' => bcrypt('Cruzcampo'),
            'api_token' => Str::random(64),
            'dep' => Department::find(10)->nombre,
            'department_id' => 10,
        ]);        

        User::create([
            'name' => 'Hormacesa',
            'email' => 'gestorhormacesa@appcess.es',
            'password' => bcrypt('Hormacesa'),
            'api_token' => Str::random(64),
            'dep' => Department::find(9)->nombre,
            'department_id' => 9,
        ]);        

        User::create([
            'name' => 'Probisa',
            'email' => 'gestorprobisa@appcess.es',
            'password' => bcrypt('Probisa'),
            'api_token' => Str::random(64),
            'dep' => Department::find(8)->nombre,
            'department_id' => 8,
        ]);        

        User::create([
            'name' => 'Urbania',
            'email' => 'gestorurbania@appcess.es',
            'password' => bcrypt('Urbania'),
            'api_token' => Str::random(64),
            'dep' => Department::find(7)->nombre,
            'department_id' => 7,
        ]);        

        User::create([
            'name' => 'Junta de Andalucía',
            'email' => 'junta@appcess.es',
            'password' => bcrypt('Junta'),
            'api_token' => Str::random(64),
            'dep' => Department::find(6)->nombre,
            'department_id' => 6,
        ]);        

        User::create([
            'name' => 'Unicaja',
            'email' => 'gestorunicaja@appcess.es',
            'password' => bcrypt('Unicaja'),
            'api_token' => Str::random(64),
            'dep' => Department::find(4)->nombre,
            'department_id' => 4,
        ]);        

        User::create([
            'name' => 'ayuntamiento fuengirola1',
            'email' => 'rodrigo@appcess.es',
            'password' => bcrypt('Ayuntamiento'),
            'api_token' => Str::random(64),
            'dep' => Department::find(1)->nombre,
            'department_id' => 1,
        ]);        

        User::create([
            'name' => 'ECI Palco',
            'email' => 'gestoreci@appcess.es',
            'password' => bcrypt('Elcorteingles'),
            'api_token' => Str::random(64),
            'dep' => Department::find(15)->nombre,
            'department_id' => 15,
        ]);        

        User::create([
            'name' => 'ECI MediaBox',
            'email' => 'gestoreci2@appcess.es',
            'password' => bcrypt('Elcorteingles2'),
            'api_token' => Str::random(64),
            'dep' => Department::find(16)->nombre,
            'department_id' => 16,
        ]);        

        User::create([
            'name' => 'BMW Palco',
            'email' => 'gestorbmw@appcess.es',
            'password' => bcrypt('BMW'),
            'api_token' => Str::random(64),
            'dep' => Department::find(17)->nombre,
            'department_id' => 17,
        ]);        

        User::create([
            'name' => 'BMW MediaBox',
            'email' => 'gestorbmw2@appcess.es',
            'password' => bcrypt('BMW2'),
            'api_token' => Str::random(64),
            'dep' => Department::find(18)->nombre,
            'department_id' => 18,
        ]);        

        User::create([
            'name' => 'GMG (Mupis)',
            'email' => 'gestorgmg@appcess.es',
            'password' => bcrypt('Gmg2021'),
            'api_token' => Str::random(64),
            'dep' => Department::find(19)->nombre,
            'department_id' => 19,
        ]);        

        User::create([
            'name' => 'Gestagua',
            'email' => 'gestorgestagua@appcess.es',
            'password' => bcrypt('Gestagua'),
            'api_token' => Str::random(64),
            'dep' => Department::find(20)->nombre,
            'department_id' => 20,
        ]);        

        User::create([
            'name' => 'Venta 1',
            'email' => 'gestorventa@appcess.es',
            'password' => bcrypt('Venta'),
            'api_token' => Str::random(64),
            'dep' => Department::find(21)->nombre,
            'department_id' => 21,
        ]);        

        User::create([
            'name' => 'Venta 2',
            'email' => 'gestorventa2@appcess.es',
            'password' => bcrypt('Venta2'),
            'api_token' => Str::random(64),
            'dep' => Department::find(22)->nombre,
            'department_id' => 22,
        ]);        

        User::create([
            'name' => 'Sponsory',
            'email' => 'gestorsponsory@appcess.es',
            'password' => bcrypt('Sponsory'),
            'api_token' => Str::random(64),
            'dep' => Department::find(23)->nombre,
            'department_id' => 23,
        ]);        

        User::create([
            'name' => 'FOX',
            'email' => 'gestorfox@appcess.es',
            'password' => bcrypt('Fox2021'),
            'api_token' => Str::random(64),
            'dep' => Department::find(24)->nombre,
            'department_id' => 24,
        ]);        

        User::create([
            'name' => 'Barras (acreditaciones)',
            'email' => 'gastonmarenostrum@gmail.com ',
            'password' => bcrypt('Gaston'),
            'api_token' => Str::random(64),
            'dep' => Department::find(25)->nombre,
            'department_id' => 25,
        ]);        
        
        User::create([
            'name' => 'Barras (acreditaciones)',
            'email' => 'ruben@globalmusicsupport.com',
            'password' => bcrypt('ruben'),
            'api_token' => Str::random(64),
            'dep' => Department::find(25)->nombre,
            'department_id' => 25,
        ]);                

        User::create([
            'name' => 'azafatas',
            'email' => 'azafatas@appces.es',
            'password' => bcrypt('azafatas'),
            'api_token' => Str::random(64),
            'dep' => Department::find(26)->nombre,
            'department_id' => 26,
        ]);      

        User::create([
            'name' => 'Invitaciones',
            'email' => 'bb@foxgroup.es',
            'password' => bcrypt('Invitaciones'),
            'api_token' => Str::random(64),
            'dep' => Department::find(27)->nombre,
            'department_id' => 27,
        ]);        

        User::create([
            'name' => 'Cope',
            'email' => 'gestorcope@appcess.es',
            'password' => bcrypt('Cope'),
            'api_token' => Str::random(64),
            'dep' => Department::find(28)->nombre,
            'department_id' => 28,
        ]);        

        User::create([
            'name' => 'onda cero',
            'email' => 'gestorondacero@appcess.es',
            'password' => bcrypt('Ondacero'),
            'api_token' => Str::random(64),
            'dep' => Department::find(29)->nombre,
            'department_id' => 29,
        ]);        

        User::create([
            'name' => 'Ser marbella',
            'email' => 'gestorsermarbella@appcess.es',
            'password' => bcrypt('ser marbella'),
            'api_token' => Str::random(64),
            'dep' => Department::find(30)->nombre,
            'department_id' => 30,
        ]);        

        User::create([
            'name' => 'Diario Sur',
            'email' => 'gestordiariosur@appcess.es',
            'password' => bcrypt('Diario Sur'),
            'api_token' => Str::random(64),
            'dep' => Department::find(31)->nombre,
            'department_id' => 31,
        ]);        

        User::create([
            'name' => 'x Magazine',
            'email' => 'gestorxmagazine@appcess.es',
            'password' => bcrypt('x Magazine'),
            'api_token' => Str::random(64),
            'dep' => Department::find(32)->nombre,
            'department_id' => 32,
        ]);        

        User::create([
            'name' => 'Oclock',
            'email' => 'gestoroclock@appcess.es',
            'password' => bcrypt('Oclock'),
            'api_token' => Str::random(64),
            'dep' => Department::find(33)->nombre,
            'department_id' => 33,
        ]);        

        User::create([
            'name' => 'La opinion',
            'email' => 'gestorLaopinion@appcess.es',
            'password' => bcrypt('La opinion'),
            'api_token' => Str::random(64),
            'dep' => Department::find(34)->nombre,
            'department_id' => 34,
        ]);        

        User::create([
            'name' => 'Malaga Hoy ',
            'email' => 'gestorMalagahoy@appcess.es',
            'password' => bcrypt('Malaga Hoy'),
            'api_token' => Str::random(64),
            'dep' => Department::find(35)->nombre,
            'department_id' => 35,
        ]);        

        User::create([
            'name' => 'Abc',
            'email' => 'gestorabc@appcess.es',
            'password' => bcrypt('Abc'),
            'api_token' => Str::random(64),
            'dep' => Department::find(36)->nombre,
            'department_id' => 36,
        ]);        

        User::create([
            'name' => 'Mundo',
            'email' => 'gestormundo@appcess.es',
            'password' => bcrypt('Mundo'),
            'api_token' => Str::random(64),
            'dep' => Department::find(37)->nombre,
            'department_id' => 37,
        ]);        

        User::create([
            'name' => 'DKV',
            'email' => 'gestordkv@appcess.es',
            'password' => bcrypt('Dkv'),
            'api_token' => Str::random(64),
            'dep' => Department::find(38)->nombre,
            'department_id' => 38,
        ]);       

        User::create([
            'name' => 'Box A',
            'email' => 'gestorboxa@appcess.es',
            'password' => bcrypt('Boxa'),
            'api_token' => Str::random(64),
            'dep' => Department::find(39)->nombre,
            'department_id' => 39,
        ]);        

        User::create([
            'name' => 'Box B',
            'email' => 'gestorboxb@appcess.es',
            'password' => bcrypt('Boxb'),
            'api_token' => Str::random(64),
            'dep' => Department::find(40)->nombre,
            'department_id' => 40,
        ]);        

        User::create([
            'name' => 'RIFF MUSIC',
            'email' => 'promotor1@appcess.es',
            'password' => bcrypt('Riffmusic'),
            'api_token' => Str::random(64),
            'dep' => Department::find(41)->nombre,
            'department_id' => 41,
        ]);        

        User::create([
            'name' => 'PLANET EVENTS',
            'email' => 'promotor2@appcess.es',
            'password' => bcrypt('Planetevents'),
            'api_token' => Str::random(64),
            'dep' => Department::find(42)->nombre,
            'department_id' => 42,
        ]);        

        User::create([
            'name' => 'CONCERT TOUR GESTIONES S.L.',
            'email' => 'promotor3@appcess.es',
            'password' => bcrypt('Concerttour'),
            'api_token' => Str::random(64),
            'dep' => Department::find(43)->nombre,
            'department_id' => 43,
        ]);        

        User::create([
            'name' => 'NINONA PRODUCCIONES & MANAGEMENT S.L.',
            'email' => 'promotor14@appcess.es',
            'password' => bcrypt('Ninona'),
            'api_token' => Str::random(64),
            'dep' => Department::find(44)->nombre,
            'department_id' => 44,
        ]);        

        User::create([
            'name' => 'FILOMENA CULTURA IAE',
            'email' => 'promotor4@appcess.es',
            'password' => bcrypt('Filomena'),
            'api_token' => Str::random(64),
            'dep' => Department::find(45)->nombre,
            'department_id' => 45,
        ]);        

        User::create([
            'name' => 'L.A ROCK ENTERTAINMENT',
            'email' => 'promotor5@appcess.es',
            'password' => bcrypt('LARock'),
            'api_token' => Str::random(64),
            'dep' => Department::find(46)->nombre,
            'department_id' => 46,
        ]);        

        User::create([
            'name' => 'RITMO AMIGO S.L.',
            'email' => 'promotor6@appcess.es',
            'password' => bcrypt('Ritmoamigo'),
            'api_token' => Str::random(64),
            'dep' => Department::find(47)->nombre,
            'department_id' => 47,
        ]);        

        User::create([
            'name' => 'RUZVAN COMUNICACIONES',
            'email' => 'promotor7@appcess.es',
            'password' => bcrypt('Ruzvan'),
            'api_token' => Str::random(64),
            'dep' => Department::find(48)->nombre,
            'department_id' => 48,
        ]);        

        User::create([
            'name' => 'PADEL CUBIERTO ARCOS',
            'email' => 'promotor8@appcess.es',
            'password' => bcrypt('Padelarcos'),
            'api_token' => Str::random(64),
            'dep' => Department::find(49)->nombre,
            'department_id' => 49,
        ]);        

        User::create([
            'name' => 'GREEN COW PRODUCCIONES IAE',
            'email' => 'promotor9@appcess.es',
            'password' => bcrypt('Greencow'),
            'api_token' => Str::random(64),
            'dep' => Department::find(50)->nombre,
            'department_id' => 50,
        ]);        

        User::create([
            'name' => 'TERRITORIO MUSICAL',
            'email' => 'promotor10@appcess.es',
            'password' => bcrypt('Territorio'),
            'api_token' => Str::random(64),
            'dep' => Department::find(51)->nombre,
            'department_id' => 51,
        ]);        

        User::create([
            'name' => 'TRAS LA CORTINA SC.',
            'email' => 'promotor11@appcess.es',
            'password' => bcrypt('Traslacortina'),
            'api_token' => Str::random(64),
            'dep' => Department::find(52)->nombre,
            'department_id' => 52,
        ]);        

        User::create([
            'name' => 'PRODUCCIONES LA COCHERA',
            'email' => 'promotor12@appcess.es',
            'password' => bcrypt('Lacochera'),
            'api_token' => Str::random(64),
            'dep' => Department::find(53)->nombre,
            'department_id' => 53,
        ]);        

        User::create([
            'name' => 'HENRIK ANDERSEN',
            'email' => 'promotor13@appcess.es',
            'password' => bcrypt('Henrik'),
            'api_token' => Str::random(64),
            'dep' => Department::find(54)->nombre,
            'department_id' => 54,
        ]);        


        // asignar roles a usuarios 

        $myUser = User::find(11);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(12);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(13);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(14);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(15);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(16);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(17);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(18);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(19);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(20);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(21);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(22);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(23);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(24);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(25);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(26);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(27);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(28);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(29);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(30);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(31);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(32);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(33);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(34);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(35);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(36);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(37);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(38);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(39);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(40);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(41);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(42);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(43);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(44);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(45);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(46);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(47);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(48);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(49);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(50);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(51);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(52);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(53);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(54);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(55);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(56);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(57);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(58);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(59);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(60);
        $myUser->assignRoles('peticionario');    
        $myUser = User::find(61);
        $myUser->assignRoles('peticionario');            
        // ********************************************************


        



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



          array_push($myArrayTemplates, $templateEN[0]->id);
          array_push(
              $myArrayTemplateDetails,
              [
                  'content' => $templateEN[0]->content,
                  'subject' => $templateEN[0]->subject,
                  'name' => $templateEN[0]->name,
                  'activity_id' => $templateEN[0]->activity_id ,
                  'activity_type_id' => $templateEN[0]->activity_type_id,
                  'invitation_type_id' => $templateEN[0]->invitation_type_id,
                  'language_id' => $templateEN[0]->language_id,                
              ]
         );


         array_push($myArrayTemplates, $templateAC[0]->id);
         array_push(
             $myArrayTemplateDetails,
             [
                 'content' => $templateAC[0]->content,
                 'subject' => $templateAC[0]->subject,
                 'name' => $templateAC[0]->name,
                 'activity_id' => $templateAC[0]->activity_id ,
                 'activity_type_id' => $templateAC[0]->activity_type_id,
                 'invitation_type_id' => $templateAC[0]->invitation_type_id,
                 'language_id' => $templateAC[0]->language_id,                
             ]
        );




           $myArrayData = array_combine($myArrayTemplates, $myArrayTemplateDetails);
           
           $myEvent = Event::find($r);                 
           $myEvent->templates()->sync($myArrayData);        

       }

              
     


    }
}
