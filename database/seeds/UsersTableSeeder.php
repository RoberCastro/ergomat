<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    User::create([
      'name' => 'User Admin',
      'email' => 'admin@gmail.com',
      'password' => bcrypt('secret'),
      'isadmin' => 1,
    ]);

    User::create([
      'name' => 'User Basic',
      'email' => 'basic@gmail.com',
      'password' => bcrypt('secret'),
      'isadmin' => 0,
    ]);

    User::create([
      'name' => 'User Test',
      'email' => 'test@gmail.com',
      'password' => bcrypt('secret'),
      'isadmin' => 1,
    ]);

    User::create([
      'name' => 'User Seed',
      'email' => 'seed@gmail.com',
      'password' => bcrypt('secret'),
      'isadmin' => 0,
    ]);
  }
}
