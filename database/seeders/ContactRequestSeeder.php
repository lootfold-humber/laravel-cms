<?php

namespace Database\Seeders;

use App\Models\ContactRequest;
use Illuminate\Database\Seeder;

class ContactRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactRequest::truncate();
        ContactRequest::factory()->count(5)->create();
    }
}
