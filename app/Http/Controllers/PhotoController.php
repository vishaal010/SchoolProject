<?php

namespace App\Http\Controllers;

use App\Models\Review;
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
            'photo' => $photo,
        ]);
    }


//    public function showCollection()
//    {
//        $userid = $request->route('id');
//
//
//        // Select * FROM photographies
//        $photo = DB::table('photo')->where('user_id',$userid)->get();
//
//
//        return view('user.showcase', [
//            'photo' => $photo,
//        ]);
//    }


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

        $request->session()->flash('success', 'Foto is geupload');


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
        if (Auth::check()) {

            $userid = Auth::user()->id;

            $validation = DB::table('days')
                ->where('user_id', $userid)
                ->distinct()
                ->count('name');

            $photo = photo::find($id);

//            $reviews = DB::table('reviews')
//                ->join('users', 'users.id', '=', 'reviews.user_id')
//                ->join('photo', 'photo.id', '=', 'reviews.photo_id')
//                ->where('photo.id', '=' . $photo . '')
//                ->get();

            $reviews = Review::with('photo','users')->get();
//                ->join('users', 'users.id', '=', 'reviews.user_id')
//                ->join('photo', 'photo.id', '=', 'reviews.photo_id')
//                ->where('photo.id', '=' . $photo . '')
//                ->get();

            if (photo::where('id', '='. $photo)->exists()) {
                dd($reviews);
            }

            return view('photo.show')
                ->with('photo', $photo)
                ->with(compact('reviews', 'validation'));
        }
        else{
            $reviews = Review::with('photo','users')->get();

            $photo = photo::find($id);

            return view('photo.show')
                ->with('photo', $photo)
                ->with(compact('reviews'));
        }

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

        $request->session()->flash('success', 'Foto is verwijderd');

        return redirect('photo');
    }

    public function userid ()
    {

    }



}
