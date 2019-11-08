<?php

namespace App\Http\Controllers;

use App\Loanouts;
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
        // Returns all the tech from the database to the admin view
        $technologies = Technologies::all();
        return view('tech.index', ['technologies' => $technologies]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchTech(Request $request, Technologies $tech)
    {
        // Returning all tech from the database
        return view('tech.searchTech', ['technologies' => $tech]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // send the create view 
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
        // Store the tech from create view to the database        
        $tech = Technologies::create([
            'code' => $request->input('barcode'),
            'description' => $request->input('description'),
            'condition' => $request->input('condition'),
            'tech_type' => $request->input('techType')
        ]);
        if ($tech) {
            return redirect()->route('tech.show', ['tech' => $tech->id])
                ->with('success', 'Tech data created successfully');
        }

        // Redirect
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
        // find the tech in database and show the tech information in the show.blade view
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
        // find the tech from the database and display information in edit.blade view
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
        // save data into the database after update
        $response = $request->input('techLoan');
        $loaned = 0;
        $techDelete = null;
        if($response == "True"){
            $loaned = 1;
        }else{
            $loaned = 0;
            $due_time = "";
            $findTech = Loanouts::where('tech_id', $tech->id);
            if ($findTech->delete()) {}
        }

        // Find the tech from id and update the values
        $techUpdate = Technologies::where('id', $tech->id)->update([
            'code' => $request->input('barcode'),
            'description' => $request->input('description'),
            'condition' => $request->input('condition'),
            'tech_type' => $request->input('techType'),
            'loaned' => $loaned,
            'due_time' => $due_time,
        ]);

        if ($techUpdate) {
            return redirect()->route('tech.show', ['tech' => $tech->id])
                ->with('success', 'Tech data updated successfully');
        }

        // Redirect
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
        // Delete the tech from the database using tech id
        $findTech = Technologies::find($tech->id);
        if ($findTech->delete()) {

            // redirect with success message
            return redirect()->route('tech.index')
                ->with('success', 'Tech Data deleted successfully');
        }
        // redirect with error message
        return back()->withInput()->with('error', 'Tech Data could not be deleted');
    }
}
