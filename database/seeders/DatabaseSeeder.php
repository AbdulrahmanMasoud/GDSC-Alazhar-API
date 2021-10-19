<?php

namespace Database\Seeders;

use App\Models\Committe;

use App\Models\Courses;
use App\Models\Dsc;
use App\Models\Role;
use App\Models\Session;
use App\Models\Tracks;
use App\Models\User;
use Database\Factories\CoursesFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Committe::factory(10)->create();
        // Role::factory(3)->create();
        // User::factory(30)->create();
        // Dsc::factory(1)->create();
        // Tracks::factory(40)->create();
        // Courses::factory(60)->create();
        Session::factory(100)->create();
    }
}
