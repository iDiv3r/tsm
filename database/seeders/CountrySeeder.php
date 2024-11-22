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
            ["Arabia Saudita", "SAU", "sa"],
            ["Suiza", "CHE", "ch"],
            ["India", "IND", "in"],
            ["Vietnam", "VNM", "vn"],
            ["Hong Kong", "HKG", "hk"],
            ["Emiratos Árabes", "ARE", "ae"],
            ["Corea del Sur", "KOR", "kr"],
            ["Hungría", "HUN", "hu"],
            ["Chequia", "CZE", "cz"],
            ["Australia", "AUS", "au"],
            ["Sudáfrica", "ZAF", "za"],
            ["Indonesia", "IDN", "id"],
            ["Egipto", "EGY", "eg"],
            ["Singapur", "SGP", "sg"],
            ["Filipinas", "PHL", "ph"],
            ["Israel", "ISR", "il"],
            ["Noruega", "NOR", "no"],
            ["Ucrania", "UKR", "ua"],
            ["Irlanda", "IRL", "ie"],
            ["Suecia", "SWE", "se"],
            ["Irán", "IRN", "ir"],
            ["Dinamarca", "DNK", "dk"],
            ["Argentina", "ARG", "ar"],
            ["Bélgica", "BEL", "be"],
            ["Chile", "CHL", "cl"],
            ["Brasil", "BRA", "br"],
            ["Perú", "PER", "pe"],
            ["Finlandia", "FIN", "fi"],
            ["Pakistán", "PAK", "pk"],
            ["Colombia", "COL", "co"],
            ["Bulgaria", "BGR", "bg"],
            ["Rumanía", "ROU", "ro"],
            ["Marruecos", "MAR", "ma"],
            ["Ecuador", "ECU", "ec"],
            ["Túnez", "TUN", "tn"],
            ["Armenia", "ARM", "am"],
            ["Jordania", "JOR", "jo"],
            ["Catar", "QAT", "qa"],
            ["Lituania", "LTU", "lt"],
            ["Kenia", "KEN", "ke"],
            ["Letonia", "LVA", "lv"],
            ["Kazajistán", "KAZ", "kz"],
            ["Eslovenia", "SVN", "si"],
            ["Estonia", "EST", "ee"],
            ["Sri Lanka", "LKA", "lk"],
            ["Croacia", "HRV", "hr"],
            ["Luxemburgo", "LUX", "lu"],
            ["Camboya", "KHM", "kh"],
            ["Georgia", "GEO", "ge"],
            ["Mónaco", "MCO", "mc"],  # Sin aeropuerto propio
            ["Islandia", "ISL", "is"],
            ["Nueva Zelanda", "NZL", "nz"],
            ["Serbia", "SRB", "rs"],
            ["Montenegro", "MNE", "me"],
            ["Macao", "MAC", "mo"],
            ["Panamá", "PAN", "pa"],
            ["Líbano", "LBN", "lb"],
            ["Albania", "ALB", "al"],
            ["Malta", "MLT", "mt"],
            ["Myanmar", "MMR", "mm"],
            ["Azerbaiyán", "AZE", "az"],
            ["San Marino", "SMR", "sm"],  # Sin aeropuerto propio
            ["Liechtenstein", "LIE", "li"],  # Sin aeropuerto propio
            ["Andorra", "AND", "ad"],  # Sin aeropuerto propio
            ["Bosnia", "BIH", "ba"],
            ["Nepal", "NPL", "np"],
            ["Uzbekistán", "UZB", "uz"],
            ["Bahamas", "BHS", "bs"],
            ["Maldivas", "MDV", "mv"],
            ["Cuba", "CUB", "cu"],
            ["Moldavia", "MDA", "md"],
            ["Guatemala", "GTM", "gt"],
            ["Honduras", "HND", "hn"],
            ["Uruguay", "URY", "uy"],
            ["Bielorrusia", "BLR", "by"],
            ["Sudán", "SDN", "sd"],
            ["Bangladés", "BGD", "bd"],
            ["Zimbabue", "ZWE", "zw"]
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
