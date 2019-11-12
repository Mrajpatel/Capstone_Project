<?php

namespace App\Http\Controllers;

use App\User;
use App\Loanouts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Returns all the user from the database to the view
        $usersList = User::all();
        $loanoutList = Loanouts::all();

        return view('users.index', ['usersList' => $usersList, 'loanoutList' => $loanoutList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // send/redirect to the create view 
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            // Store the user from create view to the database  
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
                
            ]);
            if($user){
                // Redirect with sucess message
                return redirect()->route('users.show', ['singleUserData' => $user->id])
                ->with('success', 'User data created successfully');
            }
        }catch(QueryException  $e){
            // Redirect with error message
            return redirect()->route('users.index')
                ->with('error', 'Error in User data. Try with unique data.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        try{
            // find the user in database and show the user information in the show.blade view
            $singleUser = User::find($user->id);
            return view('users.show', ['singleUserData' => $singleUser]);
        }catch(QueryException $e){
            // Redirect with error message
            return redirect()->route('users.index')
                ->with('error', 'Unable to find user.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        try{
            // find the user from the database and display information in edit.blade view
            $singleUserData = User::find($user->id);
            return view('users.edit', ['singleUserData' => $singleUserData]);
        }catch(QueryException $e){
            // Redirect with error message
            return redirect()->route('users.index')
                ->with('error', 'Unable to find user.');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try{
            // save data into the database after update
            $userUpdate = User::where('id', $user->id)-> update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'fine' => $request->input('fine'),
                'password' => $request->input('password'),
            ]);

            if($userUpdate){
                // Redirect with success message
                return redirect()->route('users.show', ['user' => $user->id])
                ->with('success', 'User data updated successfully');
            }
        }catch(QueryException $e){
            // Redirect with error message
            return back()->withInput()->with('error' , 'User data cannot be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{
            // delete user account
            $findUser = User::find( $user->id);
            if($findUser->delete()){
                
                //redirect with success message
                return redirect()->route('users.index')
                ->with('success' , 'User deleted successfully');
            }
        } catch(QueryException $e){
            // redirect with error message
            return back()->withInput()->with('error' , 'User could not be deleted');
        }
    }
}
