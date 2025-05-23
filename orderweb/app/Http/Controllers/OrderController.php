<?php

namespace App\Http\Controllers;

use App\Models\Causal;
use App\Models\Observation;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $causals = Causal::all();
        $observations = Observation::all();
        return view('order.create', compact('causals', 'observations')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        session()->flash('message', 'Orden creada exitosamente');
        return redirect()->route('order.index');
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
        $order = Order::find($id);
        if($order) 
        {
            $causals = Causal::all();
            $observations = Observation::all();
            $cities =[
                ['name' => 'TULUA', 'value' => 'TULUA'],
                ['name' => 'BUGALAGRANDE', 'value' => 'BUGALAGRANDE'],
                ['name' => 'CALI', 'value' => 'CALI'],
                ['name' => 'BUGA', 'value' => 'BUGA']
            ];
            return view('order.edit', compact('order', 'causals', 'observations', 'cities'));
        }
        else
        {
            session()->flash('warning', 'No se encuentra la orden solicitada');
            return redirect()->route('order.index');
        }  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        if($order) 
        {
            $order->update($request->all());
            session()->flash('message', 'Orden actualizado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra la orden solicitado');            
        } 

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if($order) 
        {
            $order->delete();
            session()->flash('message', 'Orden eliminada exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra la orden solicitado');            
        } 

        return redirect()->route('order.index');
    }
}