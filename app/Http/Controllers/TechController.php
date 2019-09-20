<?php

namespace App\Http\Controllers;

use App\Technologies;
use Illuminate\Http\Request;

class TechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $technologies = Technologies::all();

        return view('tech.index', ['technologies' => $technologies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tech.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $tech = Technologies::create([
                'code' => $request->input('barcode'),
                'description' => $request->input('description'),
                'condition' => $request->input('condition'),
                'tech_type' => $request->input('techType')
            ]);
            if($tech){
                return redirect()->route('tech.show', ['tech' => $tech->id])
                ->with('success', 'Tech data created successfully');
            }
        
        
        return back()->withInput()->with('errors', 'Error creating new tech');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Tech-Manager\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function show(Technologies $tech)
    {
        // Documentation given on Laravel Eloquent ORM
        //$tech = Technologies::where('id', $tech->id);
        $tech = Technologies::find($tech->id);
        return view('tech.show', ['technologies' => $tech]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Tech-Manager\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function edit(Technologies $tech)
    {
        //
        $tech = Technologies::find($tech->id);
        return view('tech.edit', ['technologies' => $tech]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Tech-Manager\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technologies $tech)
    {
        // save data 
        $techUpdate = Technologies::where('id', $tech->id)-> update([
            'code' => $request->input('barcode'),
            'description' => $request->input('description'),
            'condition' => $request->input('condition'),
            'tech_type' => $request->input('techType'),
        ]);

        if($techUpdate){
            return redirect()->route('tech.show', ['tech' => $tech->id])
            ->with('success', 'Tech data updated successfully');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Tech-Manager\Tech  $tech
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technologies $tech)
    {
        //dd($tech);
        $findTech = Technologies::find( $tech->id);
		if($findTech->delete()){
            
            //redirect
            return redirect()->route('tech.index')
            ->with('success' , 'Tech Data deleted successfully');
        }
        return back()->withInput()->with('error' , 'Tech Data could not be deleted');

    }
}
