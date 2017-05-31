<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $user = factory(App\User::class)->create([
             'username' => 'admin',
             'email' => 'admin@gmail.com',
             'password' => bcrypt('admin'),
             'lastname' => 'Mr',
             'firstname' => 'admin'
         ]);
        
        //clien seed
        $limit = 33;
        $faker = Faker\Factory::create();
        for ($i = 0; $i < $limit; $i++) {
         DB::table('clients')->insert([ //,
          'firstname' => $faker->firstname,
          'lastname' => $faker->lastname,
          'email' => $faker->unique()->safeEmail,
          'tel' => $faker->phoneNumber,
          'city_id' => $faker->randomDigit,
          'state_id' => $faker->randomDigit,
          'country_id' => $faker->randomDigit,
          'picture'=> $faker->imageUrl($width = 640, $height = 480),
            ]);
        }
        
     //$client = factory(App\Client::class,40)->create();
        
        
        //creation of devis
         for ($i = 0; $i < $limit; $i++) {
         DB::table('devis')->insert([ //,
          
           'tel' => $faker->phoneNumber,
           'email' => $faker->unique()->safeEmail,
           'tel' => $faker->phoneNumber,
           'Situation' =>$faker->randomElement(['décés', 'non décés']),
           'ville_de_deces' => $faker->city,
           'date_de_deces' =>date('Y-m-d'),
           'lieu_de_deces' => $faker->city,
           'mode_de_sépulture' =>$faker->randomElement(['inhumation', 'crémation','rapatriement']),
           'destination_de_defunt' =>$faker->country,
           'ceremonie' => $faker->randomElement(['aucune ceremonie', 'ceremonie catholique','ceremonie musulmane','ceremonie juive']),
           'option' => $faker->randomElement(['faire-part', 'parution presse','soins de conservation','toilette mortuaire','registre de souvenirs']),
           'observation' => $faker->text($maxNbChars = 200),
           'start-time' => date('Y-m-d'),
            'deadline' =>date('Y-m-d'),
           
           
            ]);
        }
        
        
        
        
    }
}
