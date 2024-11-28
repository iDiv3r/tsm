<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Airline;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aerolineas = [
            ['Air France', 'AF', '', 1],
            ['Transavia France', 'TO', '', 1],
            ['American Airlines', 'AA', '', 2],
            ['Delta Air Lines', 'DL', '', 2],
            ['Iberia', 'IB', '', 3],
            ['Vueling Airlines', 'VY', '', 3],
            ['Air China', 'CA', '', 4],
            ['China Eastern Airlines', 'MU', '', 4],
            ['Alitalia', 'AZ', '', 5],
            ['Neos', 'NO', '', 5],
            ['British Airways', 'BA', '', 6],
            ['EasyJet', 'U2', '', 6],
            ['Lufthansa', 'LH', '', 7],
            ['Eurowings', 'EW', '', 7],
            ['Aeroméxico', 'AM', '', 8],
            ['Volaris', 'Y4', '', 8],
            ['Thai Airways', 'TG', '', 9],
            ['Bangkok Airways', 'PG', '', 9],
            ['Turkish Airlines', 'TK', '', 10],
            ['Pegasus Airlines', 'PC', '', 10],
            ['Austrian Airlines', 'OS', '', 11],
            ['Lauda Europe', 'OE', '', 11],
            ['Japan Airlines', 'JL', '', 12],
            ['All Nippon Airways', 'NH', '', 12],
            ['Aegean Airlines', 'A3', '', 13],
            ['Olympic Air', 'OA', '', 13],
            ['Malaysia Airlines', 'MH', '', 14],
            ['AirAsia', 'AK', '', 14],
            ['TAP Air Portugal', 'TP', '', 15],
            ['Azores Airlines', 'S4', '', 15],
            ['Aeroflot', 'SU', '', 16],
            ['S7 Airlines', 'S7', '', 16],
            ['Air Canada', 'AC', '', 17],
            ['WestJet', 'WS', '', 17],
            ['KLM Royal Dutch Airlines', 'KL', '', 18],
            ['Transavia', 'HV', '', 18],
            ['LOT Polish Airlines', 'LO', '', 19],
            ['Enter Air', 'E4', '', 19],
            ['Saudia', 'SV', '', 20],
            ['Flynas', 'XY', '', 20]
        ];
        
        
        foreach ($aerolineas as $aerolinea) {
            Airline::create([
                'nombre' => $aerolinea[0],
                'abreviacion' => $aerolinea[1],
                'logo' => $aerolinea[2],
                'country_id' => $aerolinea[3]
            ]);
        }

    }
}
