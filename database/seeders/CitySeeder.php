<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ciudades = [
            ["París", "PAR", 1],
            ["Marsella", "MAR", 1],
            ["Nueva York", "NYC", 2],
            ["Los Ángeles", "LAX", 2],
            ["Madrid", "MAD", 3],
            ["Barcelona", "BCN", 3],
            ["Pekín", "PEK", 4],
            ["Shanghái", "SHA", 4],
            ["Roma", "ROM", 5],
            ["Milán", "MIL", 5],
            ["Londres", "LON", 6],
            ["Manchester", "MAN", 6],
            ["Berlín", "BER", 7],
            ["Múnich", "MUC", 7],
            ["Ciudad de México", "MEX", 8],
            ["Cancún", "CUN", 8],
            ["Bangkok", "BKK", 9],
            ["Chiang Mai", "CNX", 9],
            ["Estambul", "IST", 10],
            ["Antalya", "AYT", 10],
            ["Viena", "VIE", 11],
            ["Salzburgo", "SZG", 11],
            ["Tokio", "TYO", 12],
            ["Osaka", "OSA", 12],
            ["Atenas", "ATH", 13],
            ["Salónica", "SKG", 13],
            ["Kuala Lumpur", "KUL", 14],
            ["George Town", "PEN", 14],
            ["Lisboa", "LIS", 15],
            ["Oporto", "OPO", 15],
            ["Moscú", "MOW", 16],
            ["San Petersburgo", "LED", 16],
            ["Toronto", "TOR", 17],
            ["Vancouver", "YVR", 17],
            ["Ámsterdam", "AMS", 18],
            ["Róterdam", "RTM", 18],
            ["Varsovia", "WAW", 19],
            ["Cracovia", "KRK", 19],
            ["Riad", "RUH", 20],
            ["Yeda", "JED", 20]
        ];

        foreach ($ciudades as $ciudad){
            $insert = new City;

            $insert->nombre = $ciudad[0];
            $insert->abrev = $ciudad[1];
            $insert->country_id = $ciudad[2];         
            $insert->save();
        }
        
    }
}
