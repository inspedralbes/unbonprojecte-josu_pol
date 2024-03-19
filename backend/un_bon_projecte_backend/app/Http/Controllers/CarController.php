<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;



class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return response()->json($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    // Add other CRUD methods (update, delete, etc.) here

    public function show($id)
    {
        $car = Car::find($id);
        return response()->json($car);
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->update($request->all());
        return response()->json($car, 200);
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return response()->json(null, 204);
    }

    // create a endpoint to insert many cars

    public function insertManyCars(Request $request)
    {
        $cars = $request->all();
        Car::insert($cars);
        return response()->json($cars, 201);
    }

    // create a endpoint to insert a single car

    public function insertSingleCar(Request $request)
    {
        $car = $request->all();
        Car::insert($car);
        return response()->json($car, 201);
    }



    
}
