<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //variable
//        $vuelos = Flight::where('codigo','123')->get(['origen','destino']); //devuelve todos los registros de vuelos en la BD

        //$vuelos = Flight::all(); //devuelve todos los registros de vuelos en la BD

        //$vuelos=Flight::withoutTrashed()->get();
        //$vuelos=Flight::withTrashed()->get();
//        $vuelos = Flight::whereIn('id',[6,4,5])->get();
//        $vuelos = Flight::whereNotIn('id',[6,4,5])->get();
//        $vuelos = Flight::whereDate('created_at',  '2026-10-27');

        //practicando

        $vuelos = Flight::all();
//        $vuelos_count = Flight::exists();
//        dd($vuelos_count);sum('total'), avg('total')
        $vuelos_count = Flight::all()->count();




//        dd($vuelos);
//        $clientes = Clientes::where('estado','activo')->get();
        //dd($clientes);
//        return view('clientes.index', compact('clientes', 'clientes'));
        return view('flights.index', compact(['vuelos', 'vuelos_count']));




//        $flights = Flight::all();
//
//        return view('index', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $validated = $request->validate([
//            'origen' => 'required|string|max:255|min:3',
//            'destino' => 'required',
//            'codigo' => 'required',
//        ]);

        $validated = $request->validate([
            'origen'  => 'required|string|max:255|min:2',
            'destino' => 'required|string|max:255',
            'codigo'  => 'required|string|max:255',
        ],[
            'origen.required' => 'El campo origen es obligatorio',
            'origen.max'=> 'El limite de caracteres maximo es 255',
            'origen.min'=> 'El limite de caracteres minimo es 2',



        ]);

//        Flight::create($validated);
        Flight::create($validated);

//        return redirect()->route('flights.index')->with('', 'Flight created!');
        return redirect()
            ->route('flights.index')
            ->with('success', 'Vuelo registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $flight)
    {

        $validated = $request->validate([
            'origen' => 'required|string|max:100',
            'destino' => 'required|string|max:100',
            'codigo' => 'required|string|max:20',
        ],
            [
            'origen.required' => 'El origen es obligatorio.',
            'destino.required' => 'El destino es obligatorio.',
            'codigo.required' => 'El código del vuelo es obligatorio.',
        ]);


        $flight->update($validated);

        return redirect()
            ->route('flights.index')
            ->with('success', 'Vuelo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vuelo = Flight::findOrFail($id);
        $vuelo->delete();
        return redirect()
            ->route('flights.index')
            ->with('success', 'Vuelo eliminado correctamente.');
    }

    public function vueloEspecial($id){
        $vuelos = Flight::findOrFail($id);
    }
}
