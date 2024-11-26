<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;


use function Laravel\Prompts\select;

class AdminHoteles extends Controller
{
    # Mostrar Hoteles ====================================================================================================================================

    public function vistaHoteles(){

        $hoteles = DB::table('hotels')
            ->join('cities','cities.id','=','hotels.city_id')
            ->join('countries','countries.id','=','cities.country_id')
            ->select('hotels.*','cities.nombre as ciudad','countries.bandera' )
            ->get()
        ;

        $serviciosHoteles = DB::table('hotel_services')
            ->join('services','services.id','=','hotel_services.service_id')
            ->join('hotels','hotels.id','=','hotel_services.hotel_id')
            ->select('services.nombre as servicio','services.icono','hotels.id as hotel')
            ->get()
        ;

        $ciudades = DB::table('cities')
            ->join('countries','countries.id','=','cities.country_id')
            ->select('cities.id','cities.nombre as ciudad','countries.nombre as pais' )
            ->get()
        ;

        $servicios = Service::all();

        // $asd = Storage::files('public/profile-photos');

        // dd($asd);

        return view('vistas.adminHoteles',[
            'hoteles'=>$hoteles,
            'serviciosHoteles'=>$serviciosHoteles,
            'ciudades'=>$ciudades,
            'servicios'=>$servicios
        ]);
    }

    # Agregar Hotel ====================================================================================================================================

    public function agregarHotel(Request $request){
        $request->validate([
            'txtNombre' => 'required|string|max:150',
            'selectEstrellas' => 'required',
            'floatDistancia' => 'required|numeric|min:0',
            'txtDescripcion' => 'required|string|max:500',
            'intHabitaciones' => 'required|numeric|min:0',
            'floatPrecio' => 'required|numeric|min:0',
            'txtPoliticas' => 'required|string|max:500',
            'txtDireccion' => 'required|string|max:150',
            'txtCiudad' => 'required|integer',
            'imgHotel' => 'required|image'
        ]);
        
        $idHotel = DB::table('hotels')
        ->insertGetId([
            'nombre'=>$request->input('txtNombre'),
            'estrellas'=>$request->input('selectEstrellas'),
            'calificacion'=>0,
            'distancia'=>$request->input('floatDistancia'),
            'descripcion'=>$request->input('txtDescripcion'),
            'num_huespedes'=>$request->input('intHabitaciones'),
            'precio'=>$request->input('floatPrecio'),
            'politicas'=>$request->input('txtPoliticas'),
            'direccion'=>$request->input('txtDireccion'),
            'city_id'=>$request->input('txtCiudad')
        ]);


        $imagen = $request->file('imgHotel');

        DB::table('hotel_photos')
            ->insert([
                'foto'=>$imagen->storePublicly('hoteles','public'),
                'hotel_id'=>$idHotel
        ]);
        

        foreach($request->post() as $item=>$value){
            if(strpos($item,"checkbox") !== false){

                $idServicio = preg_replace('/\D/', '', $item); 

                DB::table('hotel_services')->insert([
                    'service_id'=>$idServicio,
                    'hotel_id'=>$idHotel
                ]);
                
            }
        }
        
        $nombre = $request->input('txtNombre');
        session()->flash('success', 'El Hotel '.$nombre.' ha sido agregado correctamente');
        return to_route('hotelesAdministrador');
    }

    # Editar Hotel ====================================================================================================================================

    public function editarHotel(Request $request){

        $request->validate([
            'txtNombre-'.$request->input('idHotel') => 'required|string|max:150',
            'txtDireccion-'.$request->input('idHotel') => 'required|string|max:150',
            'txtCiudad-'.$request->input('idHotel') => 'required',
            'selectEstrellas-'.$request->input('idHotel') => 'required',
            'floatDistancia-'.$request->input('idHotel') => 'required|numeric|min:0',
            'intHabitaciones-'.$request->input('idHotel') => 'required|numeric|min:0',
            'floatPrecio-'.$request->input('idHotel') => 'required|numeric|min:0',
            'txtDescripcion-'.$request->input('idHotel') => 'required|string|max:500',
            'txtPoliticas-'.$request->input('idHotel') => 'required|string|max:500',
            'imgHotel-'.$request->input('idHotel') => 'image'
        ]);

        DB::table('hotels')
            ->where('id',$request->input('idHotel'))
            ->update([
                'nombre'=>$request->input('txtNombre-'.$request->input('idHotel')),
                'direccion'=>$request->input('txtDireccion-'.$request->input('idHotel')),
                'city_id'=>$request->input('txtCiudad-'.$request->input('idHotel')),
                'estrellas'=>$request->input('selectEstrellas-'.$request->input('idHotel')),
                'distancia'=>$request->input('floatDistancia-'.$request->input('idHotel')),
                'num_huespedes'=>$request->input('intHabitaciones-'.$request->input('idHotel')),
                'precio'=>$request->input('floatPrecio-'.$request->input('idHotel')),
                'descripcion'=>$request->input('txtDescripcion-'.$request->input('idHotel')),
                'politicas'=>$request->input('txtPoliticas-'.$request->input('idHotel'))
            ]);
        
        DB::table('hotel_services')
            ->where('hotel_id',$request->input('idHotel'))
            ->delete();
        

        foreach($request->post() as $item=>$value){
            if(strpos($item,"checkbox") !== false){

                $idServicio = preg_replace('/\D/', '', $item); 

                DB::table('hotel_services')->insert([
                    'service_id'=>$idServicio,
                    'hotel_id'=>$request->input('idHotel')
                ]);
                
            }
        }

        $newImg = $request->file('imgHotel-'.$request->input('idHotel'));
        
        if($newImg){
            DB::table('hotel_photos')
            ->insert([
                'foto'=>$newImg->storePublicly('hoteles','public'),
                'hotel_id'=>$request->input('idHotel')
            ]);
        }

        $nombre = $request->input('txtNombre-'.$request->input('idHotel'));

        session()->flash('success', 'El Hotel '.$nombre.' ha sido editado correctamente');
        return to_route('hotelesAdministrador');
    }

    # Eliminar Hotel ====================================================================================================================================

    public function eliminarHotel(Request $request){

        $fotos = DB::table('hotel_photos')
            ->where('hotel_id',$request->input('idHotel'))
            ->select('foto')
            ->get();

        foreach($fotos as $foto){       
            $name = str_replace('hoteles/','',$foto->foto);
            Storage::delete('public/hoteles/'.$foto->foto);
        }
        

        DB::table('hotels')
            ->where('id',$request->input('idHotel'))
            ->delete();

        $nombre = $request->input('txtNombre');
        session()->flash('success', 'El Hotel '.$nombre.' ha sido eliminado correctamente');
        return to_route('hotelesAdministrador');
    }
    
}
