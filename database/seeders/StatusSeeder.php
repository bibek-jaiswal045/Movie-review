<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            ['status' => 'ongoing'],
            ['status' => 'upcoming'],
            ['status' => 'out of theatres'],
        ];

        foreach ($status as $status) {
            Status::create($status);
        };
    }
}
