<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'manufacturer_id' => 'required',
            'manufacturer_name' => 'required',
            'model_id' => 'required',
            'model_name' => 'required',
            'modification_id' => 'required',
            'modification_name' => 'required'
        ]);

        $car = new Car();
        $car->user_id = Auth::user()->id;
        $car->manufacturer_id = $request->manufacturer_id;
        $car->manufacturer_name = $request->manufacturer_name;
        $car->model_id = $request->model_id;
        $car->model_name = $request->model_name;
        $car->modification_id = $request->modification_id;
        $car->modification_name = $request->modification_name;
        $car->filter = $request->filter;
        $car->save();

        return response()->json($car);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->filter = $request->filter;
        $car->save();

        return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::destroy($id);
        return response()->json($car);
    }
}
