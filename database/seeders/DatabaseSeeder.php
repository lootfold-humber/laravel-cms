<?php

namespace Database\Seeders;

use App\Models\ContactRequest;
use App\Models\Education;
use App\Models\EducationLevel;
use App\Models\User;
use App\Models\Type;
use App\Models\Project;
use App\Models\Skill;
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

        User::truncate();
        User::factory()->count(2)->create();

        Type::truncate();
        Type::factory()->count(3)->create();

        Project::truncate();
        Project::factory()->count(4)->create();

        ContactRequest::truncate();
        ContactRequest::factory()->count(5)->create();

        EducationLevel::truncate();
        EducationLevel::factory()->count(5)->create();

        Education::truncate();
        Education::factory()->count(3)->create();

        Skill::truncate();
        Skill::factory()->count(5)->create();
    }
}
