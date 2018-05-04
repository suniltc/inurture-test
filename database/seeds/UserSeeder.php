<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name' => 'sunil',
            'email' => 'suniltc@designesthetics.com',
            'password' => Hash::make('123456'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        if($admin){
            DB::table('role_user')->insert(
                [
                    'user_id' => $admin->id, 
                    'role_id' => '1'
                ]
            );
        }
    }
}
