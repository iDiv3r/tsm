<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $paises = [
            ["Room service", "broom"],
            ["Piscina", "person-swimming"],
            ["Restaurante", "utensils"],
            ["Buffet", "burger"],
            ["Spa", "spa"],
            ["Gimnasio", "dumbbell"],
            ["Canchas", "person-running"],
            ["Wifi", "wifi"],
            ["Valet Parking", "square-parking"],
            ["Estacionamiento", "car-side"],
            ["Recepción 24/7", "bell-concierge"],
            ["Cambio de divisas", "money-bill-transfer"],
            ["Mayordomo", "user-tie"],
            ["Jacuzzi", "bath"],
            
        ];
        
        
        
        
        foreach ( $paises as $pais){
            $insert = new Service;

            $insert->nombre = $pais[0];
            $insert->icono = $pais[1];
            $insert->save();
        }

    }
}
