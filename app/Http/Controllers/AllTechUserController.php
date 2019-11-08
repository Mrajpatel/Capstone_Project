<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technologies;

class AllTechUserController extends Controller
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
        return view('allTech.index', ['technologies' => $technologies]);
    }
}
