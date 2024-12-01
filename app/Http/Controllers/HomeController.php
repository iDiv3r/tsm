<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (Auth::user() == null)
        {
            return view('welcome');
        }
        else
        {
            switch (Auth::user()->rol)
            {
                case 2:
                    return to_route('superAdmin');
                    break;
                case 1:
                    return to_route('rutaHotelesUsuarios');
                    break;
                case 0:
                    return to_route('rutaHotelesUsuarios');
                    break;
                default:
                    return view('welcome');
                    break;
            }
        }
    }
}
