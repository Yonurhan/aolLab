<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Outlet::create([
            'outlet_name' => 'Pesanggahan Rd. 125',
            'region' => 'West Jakarta',
            'opening_time' => '08:00:00',
            'closing_time'  => '22:00:00',
            'date' => Carbon::create(2024, 12, 25)
        ]);
        
        Outlet::create([
            'outlet_name' => 'Malaka Rd. 24',
            'region' => 'West Jakarta',
            'opening_time' => '05:00:00',
            'closing_time'  => '17:00:00',
            'date' => Carbon::create(2024, 12, 25)
        ]);

        Outlet::create([
            'outlet_name' => 'Living World, Alam Sutera',
            'region' => 'South Tangerang',
            'opening_time' => '09:00:00',
            'closing_time'  => '22:00:00',
            'date' => Carbon::create(2024, 12, 25)
        ]);

        Outlet::create([
            'outlet_name' => 'Supermall Karawaci, Bencongan',
            'region' => 'Tangerang',
            'opening_time' => '08:00:00',
            'closing_time'  => '22:00:00',
            'date' => Carbon::create(2024, 12, 25)
        ]);

        Outlet::create([
            'outlet_name' => 'Boulevard Raya Rd. 7, Kelapa Gading',
            'region' => 'North Jakarta',
            'opening_time' => '08:00:00',
            'closing_time'  => '22:00:00',
            'date' => Carbon::create(2024, 12, 25)
        ]);

    }
}
