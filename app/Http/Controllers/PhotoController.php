<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;

        // Select * FROM photographies
        $photo = DB::table('photo')->where('user_id',$userid)->get();



        return view('user.showcase', [
            'photo' => $photo
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('photo.create', ['tags' => $tags]);

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
        'imagepath' => 'required|mimes:jpg,png,jpeg|max:5048'
    ]);

    $newImageName = time() . '-' . $request->name . '.' . $request->imagepath->extension();

    $test = $request->imagepath->move(public_path('images'), $newImageName);



        $tags = Tag::all();
      $photo =  photo::create([
          'name' => $request->input('name'),
          'user_id' => $request->input('user_id'),
          'location'=> $request->input('location'),
          'description'=> $request->input('description'),
          'imagepath'=> $newImageName
      ]);

       $photo->tags()->sync($request->tags);

        return redirect('photo');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = User::findOrFail($id);
        $photo = photo::find($id);

        return view('photo.show')->with('photo',$photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
    public function destroy($id, Request $request)
    {
        Photo::destroy($id);

        $request->session()->flash('success', 'Gebruiker is verwijderd');

        return redirect('photo');
    }

    public function validation ()
    {
        return Carbon::createFromTimestamp(-1)->toDateTimeString();
    }



}
