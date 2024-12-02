<?php

namespace App\Listeners;

use App\Events\FlightModificationEvent;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FlightModificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FlightModificationEvent $event): void
    {
        $usuarios = DB::table('tickets')
        ->where('flight_id', $event->flightId)
        ->join('users', 'users.id', '=', 'tickets.user_id')
        ->select('users.email')
        ->get();

        $infoVuelo = DB::table('flights_dates')
        ->where('flights_dates.id', $event->flightId)
        ->join('flights', 'flights.id', '=', 'flights_dates.flight_id')
        ->join('cities as origen', 'origen.id', '=', 'flights.origin_id')
        ->join('cities as destino', 'destino.id', '=', 'flights.destination_id')
        ->first();

        // dd($infoVuelo);

        foreach ($usuarios as $usuario){
            Mail::raw('Se ha modificado un vuelo en el que estabas interesado con destino a '.$infoVuelo->nombre.', la nueva información es la siguiente:
                Código de Vuelo:'. $infoVuelo->codigo.
                '     Fecha de Salida:'. $infoVuelo->fecha_salida.
                '     Hora de Salida:'. $infoVuelo->hora_salida,
                function ($message) use ($usuario){
                $message->to($usuario->email);
                $message->subject('Modificación de vuelo');
            });
        }
    }
}
