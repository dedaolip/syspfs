<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create([
            'name'              => 'Felipe Novaes Medeiros',
            'email'             => 'felipenovaesmedeiros@gmail.com',
            'password'          => bcrypt('1bfd2d30'),
            'remember_token'    => str_random(10),
        ]);
    }
}
