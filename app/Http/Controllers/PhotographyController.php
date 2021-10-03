<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\User;
use Barryvdh\Reflection\DocBlock\Tag;
use Illuminate\Http\Request;
use App\Models\photography;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PhotographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Select * FROM photographies
        $photography = photography::all();

        return view('index', [
            '$photography' => $photography
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();

        return view('photography.create', ['tags' => $tags]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'user_id' => 'required',
        'location' => 'required',
        'description' => 'required',
        'imagepath' => 'required',
    ]);


        $tags = Tags::all();
      $photo =  photography::create([
          'name' => $request->input('name'),
          'user_id' => $request->input('user_id'),
          'location'=> $request->input('location'),
          'description'=> $request->input('description'),
          'imagepath'=> $request->input('imagepath'),
      ]);

       $photo->tags()->sync($request->tags);

        return redirect(route('index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = photography::find($id);

        return view('photography.show')->with('photo',$photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
