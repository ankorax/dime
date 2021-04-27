<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use SweetAlert;

use App\Empleado;
use App\Area;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::get();

        return view('empleados.index')
        ->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();

        return view('empleados.create')
        ->with('areas', $areas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'empleado_email' => ['required', 'unique:empleados', 'max:100'],
            'empleado_nombres' => ['required', 'unique:empleados', 'max:100'],
        ]);

        $area = Area::find($request->area_id);

        $empleado = new Empleado($request->all());
        $empleado->area()->associate($area);
        if(!$request->empleado_boletin) {
            $empleado->empleado_boletin = "N";
        }
        $empleado->save();

        SweetAlert::success('El empleado ha sido creado exitosamente.', '¡Muy bien!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        $areas = Area::all();

        return view('empleados.edit')
        ->with('areas', $areas)
        ->with('empleado', $empleado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->all());

        SweetAlert::success('El empleado ha sido actualizado exitosamente.', '¡Muy bien!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        Empleado::destroy($empleado->empleado_id);

        SweetAlert::success('El empleado ha sido eliminado exitosamente.', '¡Atención!');

        return redirect()->back();
    }
}
