<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;
use App\Film;
use App\Comment;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Film::all();
    }

    public function list()
    {
        //
        return view('films');
    }

    public function showDetail($slug)
    {
        return view('film_detail', ['slug' => $slug] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('film_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $film = $request->all();        

        $imageData = $film['photo'];        
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        $img = Image::make($film['photo'])->save(public_path('images/').$fileName);

        $film['photo'] = $fileName;
        $film['release_date'] = date('Y-m-d', strtotime($film['release_date']));
        $film['slug'] = str_slug($film['name'], '-');


        return Film::create($film);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getFilmBySlug($slug)
    {
        return Film::where('slug', '=' ,$slug)->firstOrFail();
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
        $film = Film::findOrFail($id);
        $film->update($request->all());

        return $film;
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
        $film = Film::findOrFail($id);
        $film->delete();

        return 204;
    }
}
