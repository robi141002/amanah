<?php

namespace App\Database\Seeds;

use App\Models\Bookings;
use App\Models\Owner;
use App\Models\Pasien;
use App\Models\Rooms;
use CodeIgniter\Database\Seeder;
use Illuminate\Support\Carbon;

class InitSeeder extends Seeder
{
    public function run()
    {
        Rooms::insert([
            [
                'name' => '01',
                'desc' => 'Deskripsi Kamar ...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '02',
                'desc' => 'Deskripsi Kamar ...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '03',
                'desc' => 'Deskripsi Kamar ...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '04',
                'desc' => 'Deskripsi Kamar ...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '05',
                'desc' => 'Deskripsi Kamar ...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '06',
                'desc' => 'Deskripsi Kamar ...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => '07',
                'desc' => 'Deskripsi Kamar ...',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        Pasien::insert([
            [
                'user_id' => 4,
                'address' => 'Jl. Jalan',
                'phone' => '+6285225230702',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        Bookings::insert([
            [
                'pasien_id' => 1,
                'code' => 'RSAA2024001',
                'room_id' => 1,
                'date_in' => Carbon::now(),
                'date_out' => Carbon::now(),
                'name' => 'John Doe',
                'address' => 'Jl. Jalan',
                'phone' => '+6285225230702',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
