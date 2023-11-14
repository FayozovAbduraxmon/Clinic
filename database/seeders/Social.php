<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Social extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("socials")->insert([
            'name' => 'Instagram',
            'followers' => '40000',
        ]);

        DB::table("socials")->insert([
            'name' => 'Telegram',
            'followers' => '13200',
        ]);
    }
}
