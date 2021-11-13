<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaRequest;
use App\Models\Pizza;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::paginate(5);
        return view("pizzas.index",compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pizzas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {
        $path = $request->image->store('public/pizzas');
        Pizza::create([
            'name' => $request->name,
            'description' => $request->description,
            'small_pizza_price' => $request->small_pizza_price,
            'medium_pizza_price' => $request->medium_pizza_price,
            'large_pizza_price' => $request->large_pizza_price,
            'category' => $request->category,
            'image' => $path,
        ]);

        return redirect()->route('pizzas.index')->with('message','Pizza created successfully');
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
    public function edit(Pizza $pizza)
    {
        return view('pizzas.edit',compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaRequest $request, Pizza $pizza)
    {
        if($request->has('image')){
            $path = $request->image->store('public/pizzas');
        }else{
            $path = $pizza->image;
        }

        $pizza->update([
            'name' => $request->name,
            'description' => $request->description,
            'small_pizza_price' => $request->small_pizza_price,
            'medium_pizza_price' => $request->medium_pizza_price,
            'large_pizza_price' => $request->large_pizza_price,
            'category' => $request->category,
            'image' => $path,
        ]);

        return redirect()->route('pizzas.index')->with('message','Pizza updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
        return redirect()->route('pizzas.index')->with('message','Pizza deleted successfully');
    }
}
