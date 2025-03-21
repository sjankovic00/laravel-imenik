<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\MemberFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Member::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Member::factory(20)->create();
    }
}
