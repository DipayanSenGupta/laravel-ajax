<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use Redirect,Response;

class PlayerController extends Controller
{
    // * Display a listing of the resource.
    // *
    // * @return \Illuminate\Http\Response
    // *
    public function index()
    {
        $data = [];
        $data['users'] = Player::orderBy('id','desc')->paginate(8);
   
        return view('players.index',$data);
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $PlayerId = $request->user_id;
        $Player   =   Player::updateOrCreate(['id' => $PlayerId],
                    ['name' => $request->name, 'email' => $request->email]);
    
        return Response::json($Player);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $Player  = Player::where($where)->first();
 
        return Response::json($Player);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Player = Player::where('id',$id)->delete();
   
        return Response::json($Player);
    }
}
