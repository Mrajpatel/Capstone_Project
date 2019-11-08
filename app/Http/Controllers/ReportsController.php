<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technologies;
use App\Loanouts;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technologies::all();
        $loanoutList = Loanouts::all();

        return view('report.index', ['technologies' => $technologies, 'loanoutList' => $loanoutList]);
    }
}
