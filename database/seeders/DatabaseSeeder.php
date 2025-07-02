<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       DB::table("users")->insert([
        "id_role"=> "1",
        "id_vocation" => "1",
        "name"=> "Admin",
        "username" => "localadmin",
        "password" => Hash::make("@dm1n2024"),
        "type"=> "0",
       ]);
    }
}
