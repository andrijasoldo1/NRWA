<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

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
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'License_no' => 'required|unique:car',
            'Model' => 'required',
            'Year' => 'required|date',
            'Ctype' => 'required',
            'Drate' => 'required|numeric',
            'Wrate' => 'required|numeric',
            'Status' => 'required',
        ]);

        Car::create($request->all());

        return redirect()->route('cars.index')
                         ->with('success', 'Car created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
{
    // Dijagnostičko ispisivanje za provjeru dobivenih podataka
    dd($request->all());
    dd($car);

    $request->validate([
        'License_no' => 'required|unique:cars,License_no,' . $car->Vehicle_id . ',Vehicle_id',
        'Model' => 'required',
        'Year' => 'required|date',
        'Ctype' => 'required',
        'Drate' => 'required|numeric',
        'Wrate' => 'required|numeric',
        'Status' => 'required',
    ]);

    // Dijagnostički ispis za provjeru rezultata ažuriranja
    $result = $car->update($request->all());
    dd($result);

    return redirect()->route('cars.index')
                     ->with('success', 'Car updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')
                         ->with('success', 'Car deleted successfully');
    }
}
