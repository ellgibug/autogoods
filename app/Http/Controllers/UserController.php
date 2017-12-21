<?php

namespace App\Http\Controllers;

use App\Auto;
use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $autos = Auto::all();

        // тестовые данные. из заменят данные из АПИ
        $Audi= ['A4', 'TT'];
        $BMW= ['X5', 'X6'];
        $Bugatti= ['Chiron', 'Veyron', 'Veyron Super Sport'];
        $Cadillac= ['Escalade', 'Coupe deville', 'CT6'];
        $Ferrari= ['LaFerrari', 'Italia', 'Enzo'];
        $Ford= ['Focus', 'Explorer', 'Kuga'];
        $Jeep= ['Wrangler', 'Cherokee'];
        $Lamborghini= ['Veneno', 'Avendator', 'Reventon', 'Urus'];
        $Lexus= ['GX', 'RX', 'LX', 'NX'];
        $Mercedes= ['Gelandewagen', 'Brabus', 'SLS AMG'];
        $Opel= ['Astra', 'Corsa', 'Mokka', 'Zafira'];
        $Porsche= ['Cayenne', 'Panamera'];
        $Volvo= ['XC60', 'XC40', 'XC90'];
        $LADA= ['Калина', 'Самара'];
        $GAZ= ['Соболь', 'Фермер', 'Грузовик'];

        if($request->ajax()){

            switch ($request->brand){
                case 1:
                    $result = $Audi; break;
                case 2:
                    $result = $BMW; break;
                case 3:
                    $result = $Bugatti; break;
                case 4:
                    $result = $Cadillac; break;
                case 5:
                    $result = $Ferrari; break;
                case 6:
                    $result = $Ford; break;
                case 7:
                    $result = $Jeep; break;
                case 8:
                    $result = $Lamborghini; break;
                case 9:
                    $result = $Lexus; break;
                case 10:
                    $result = $Mercedes; break;
                case 11:
                    $result = $Opel; break;
                case 12:
                    $result = $Porsche; break;
                case 13:
                    $result = $Volvo; break;
                case 14:
                    $result = $LADA; break;
                case 15:
                    $result = $GAZ; break;
                default:
                    $result = null; break;
            }

            return response()->json($result);
        }

        $cars = Car::where('user_id', Auth::user()->id)->get();
        return view('front.users.index', compact('cars', 'autos'));
    }
}
