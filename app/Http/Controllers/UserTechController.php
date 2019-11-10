<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technologies;
use Illuminate\Database\QueryException;

class UserTechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return all the tech information
        $technologies = Technologies::all();

        return view('userTech.index', ['technologies' => $technologies]);
    }

    public function edit(Technologies $tech)
    {
        try{
            // Return the show view page
            $tech = Technologies::find($tech->id);
            return view('userTech.show', ['technologies' => $tech]);
        }catch(QueryException $e){
            return back()->withInput()->with('error' , 'Tech could not be found');
        }
    }
}
