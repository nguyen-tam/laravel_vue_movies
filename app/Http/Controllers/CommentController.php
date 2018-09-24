<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Film;

class CommentController extends Controller
{

    /**
     * Get film comments.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function getFilmComments($slug)
    {
        $film = Film::where('slug', '=' ,$slug)->firstOrFail();  
        $comments = Comment::where('film_id', '=' ,$film->id)->get();

        foreach ($comments as $key => $value) {
            $comments[$key]['readable_created_at'] = $value['created_at']->toIso8601String();         
        }

        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $comment = $request->all();        
        $film = Film::where('slug', '=' ,$request['slug'])->firstOrFail();
        $comment['film_id'] = $film->id;

        return Comment::create($comment);
    }
}
