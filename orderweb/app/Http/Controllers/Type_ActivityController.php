<?php

namespace App\Http\Controllers;

use App\Models\TypeActivity;
use Illuminate\Http\Request;

class Type_ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TypeActivity::all();
        return view('type_activity.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $type = TypeActivity::create($request->all());
        session()->flash('message', 'Tipo de actividad creada exitosamente');
        return redirect()->route('type_activity.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type = TypeActivity::find($id);
        if($type)//El tipo de actividad existe
        {
            return view('type_activity.edit', compact('type'));
        }
        else
        {
            session()->flash('warning', 'No se encuentra el tipo de actividad solicitado');
            return redirect()->route('type_activity.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = TypeActivity::find($id);
        if($type)//El tipo de actividad existe
        {
            $type->update($request->all());
            session()->flash('message', 'Tipo de actividad actualizado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra el tipo de actividad solicitado');
        }
        return redirect()->route('type_activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type= TypeActivity::find($id);

        if($type)//El tipo de actividad existe
        {
            $type->delete();
            session()->flash('message', 'Tipo de actividad eliminado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra el tipo de actividad solicitado');
        }

        return redirect()->route('type_activity.index');
    }
}
