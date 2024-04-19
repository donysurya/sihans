<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pidum;
use Illuminate\Support\Facades\Hash;

class PidumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pidums = [
            [
                'name' => 'Petugas Pidum Utama',
                'email' => 'pidum@sihans.net',
                'password' => Hash::make('QWEasdZXC_1209'),
                'phone' => '0811-5187-878',
                'address' => 'Jl. Jend. Ahmad Yani No.Km.10, Tamiang Layang, Kec. Dusun Tim., Kabupaten Barito Timur, Kalimantan Tengah 73611',
                'role' => 'pidum'
            ],
            [
                'name' => 'Petugas Pidum',
                'email' => 'pidum@kejaksaan.go.id',
                'password' => Hash::make('QWEasdZXC_1209'),
                'phone' => '0811-5187-878',
                'address' => 'Jl. Jend. Ahmad Yani No.Km.10, Tamiang Layang, Kec. Dusun Tim., Kabupaten Barito Timur, Kalimantan Tengah 73611',
                'role' => 'pidum'
            ],
            [
                'name' => 'Petugas Rutan',
                'email' => 'rutan@kejaksaan.go.id',
                'password' => Hash::make('QWEasdZXC_1209'),
                'phone' => '0811-5187-878',
                'address' => 'Jl. Jend. Ahmad Yani No.Km.10, Tamiang Layang, Kec. Dusun Tim., Kabupaten Barito Timur, Kalimantan Tengah 73611',
                'role' => 'rutan'
            ],
        ];

        foreach ($pidums as $item)
            Pidum::create([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => $item['password'],
                'phone' => $item['phone'],
                'address' => $item['address'],
                'role' => $item['role'],
            ]);
    }
}
