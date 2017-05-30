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
        
      $client = factory(App\Client::class,40)->create();
    }
}
