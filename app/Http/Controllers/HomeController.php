<?php

namespace App\Http\Controllers;

use App\Models\photo;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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

            $spec_tag = Tag::with('photo')->where('name', 'LIKE', '%' . $tag . '%')->toSql();
            dd($spec_tag);
            $spec_tag->appends($request->all());
            return view('index', [
                'photo' => $spec_tag,
                'tag'  => $tags
            ]);

        }
        else {
            return view('index', [
                'photo' => $photography,
                'tag'  => $tags
            ]);
        }


    }

    public function filterTags($slug){
        dd($slug);
    }


}
