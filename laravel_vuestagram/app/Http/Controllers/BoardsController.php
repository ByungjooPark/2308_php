<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Exception;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Board::limit(3)->orderBy('id', 'desc')->get();
        foreach($result as $item) {
            $item->img = asset($item->img);
            // $item->img = 'data:image/*;base64, '.base64_encode(file_get_contents(public_path($item->img)));
        }
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make(
            $req->only('img', 'name', 'content')
            ,[
            'img' => 'required|image|mimes:jpeg,png,jpg,gif',
            'name' => 'required|min:2|max:10|regex:/^[가-힣]+$/u',
            'content' => 'required|max:100|not_regex:/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/u',
            ]
        );

        if($validator->fails()){
            throw new Exception('E01');
        }

        $imgName = Str::uuid().'.'.$req->img->extension();
        $req->img->move(public_path('img'), $imgName);
        $board = new Board();
        $board->img = '/img/'.$imgName;
        $board->name = $req->name;
        $board->likes = 0;
        $board->content = $req->content;
        // $board->filter = $req->filter;
        $board->save();
        $board->img = asset($board->img);
        return $board;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($board)
    {
        if(!is_numeric($board)){
            throw new Exception('E01');
        }

        $result = Board::where('id', '<', $board)->orderBy('id', 'desc')->first();
        if(!empty($result) && $result->count() >= 1) {
            $result->img = asset($result->img);
        }
        return $result;
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
