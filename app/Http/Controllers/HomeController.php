<?php

namespace App\Http\Controllers;

use App\Models\photo;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Days;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Login;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;





class HomeController extends Controller
{

    public function __invoke(Request $request)
    {

        // Select * FROM photographies
        $photography = photo::all();
        $tags = Tag::all();


        if (isset($_GET['search'])){
            $search_text = $_GET['search'];

            $photos = DB::table('photo')
                ->where('name', 'LIKE', '%'. $search_text. '%')

                ->paginate(2);
            $photos->appends($request->all());
            return view('index', [
                'photo' => $photos,
                'tag'  => $tags
            ]);
        }
        elseif (isset($_GET['tag'])){
            $tag = $_GET['tag'];

            $photo = photo::whereHas('tags',function ($query) use ($tag){
                $query->where('name', 'LIKE', '%'. $tag . '%');
            })->paginate(10);

            $photo->appends($request->all());
            return view('index', [
                'photo' => $photo,
                'tag'  => $tags

            ]);

        }
        else {
            return view('index', [
                'photo' => $photography,
                'tag'  => $tags,
            ]);
        }


    }

    public function filterTags($slug){
        dd($slug);
    }


}
