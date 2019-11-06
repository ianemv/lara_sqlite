<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request){

        return view('posts/index');
    }

    public function create(){
        return view('posts/add');
    }

    public function view(Request $request, $slug){
        $post = Post::where ('slug',$slug)->first();

        return view('posts/view')->with('post', $post);
    }

    public function store (Request $request){

        try {
            $input = $request->all();

            $input['publish_date'] = empty($input['publish_date']) ? date('Y-m-d h:m:s',strtotime("now")) : date('Y-m-d h:m:s',strtotime($input['publish_date']));
            $input['slug'] =  Str::slug($input['title'], '-');

            if (!empty($input['id'])){
                $post = Post::find($input['id']);
                $resp = $post;
            }else{
                Post::create($input);
                $resp = $input;

            }


            return response()->json([
                'message' => $resp
            ], 200);

        } catch (\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getPosts (Request $request){
        try {
            $limit = $request->input('limit')?$request->input('limit'):25;
            $result = Post::orderBy('publish_date','desc')
            ->paginate($limit);

            if ($result){
                return response()->json([
                        'data' => $result,
                        'message' => "Success"
                    ], 200);
            }
        } catch (\Exception $e){

            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
