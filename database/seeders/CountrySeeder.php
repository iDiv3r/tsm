<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paises = [
            ["Francia", "FRA", "fr"],
            ["Estados Unidos", "USA", "us"],
            ["España", "ESP", "es"],
            ["China", "CHN", "cn"],
            ["Italia", "ITA", "it"],
            ["Reino Unido", "GBR", "gb"],
            ["Alemania", "DEU", "de"],
            ["México", "MEX", "mx"],
            ["Tailandia", "THA", "th"],
            ["Turquía", "TUR", "tr"],
            ["Austria", "AUT", "at"],
            ["Japón", "JPN", "jp"],
            ["Grecia", "GRC", "gr"],
            ["Malasia", "MYS", "my"],
            ["Portugal", "PRT", "pt"],
            ["Rusia", "RUS", "ru"],
            ["Canadá", "CAN", "ca"],
            ["Países Bajos", "NLD", "nl"],
            ["Polonia", "POL", "pl"],
            ["Arabia Saudita", "SAU", "sa"]
        ];
        
        
        
        
        foreach ( $paises as $pais){
            $insert = new Country;

            $insert->nombre = $pais[0];
            $insert->abrev = $pais[1];
            $insert->bandera = $pais[2];
            $insert->save();
        }

    }
}
