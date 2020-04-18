<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $allAnnonces = \App\Annonce::all();
        return view('annonce.index', ['annonces' => $allAnnonces]);
    }

    public function create()
    {
        return view('annonce.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'required|image'
        ]);

        $imgPath = request('image')->store('uploads', 'public');

        $annonce = auth()->user()->annonces()->create(array_merge($data, ['image' => $imgPath]));
        $annonce->images()->create(['image' => $imgPath]);

        return redirect('/user/'.auth()->user()->id . '/annonces');
    }

    public function show(Annonce $annonce)
    {
        return view('annonce.show', ['annonce' => $annonce]);
    }

    public function search()
    {
        $search = request('q');
        $annonces = DB::table('annonces')->where('title', 'LIKE', "%".$search."%")->get();
        return view('annonce.search', ['annonces' => $annonces, 'search' => $search]);
    }

    public function edit(Annonce $annonce)
    {
        return view('annonce.edit', ['annonce' => $annonce]);
    }

    public function update(Annonce $annonce)
    {

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'image' => 'required|image'
        ]);
        $imgPath = request('image')->store('uploads', 'public');

        $annonce->images()->create(['image' => $imgPath]);
        $annonce->update(array_merge($data, ['image' => $imgPath]));

        return redirect('/annonce/'.$annonce->id);
    }

    public function destroy(Annonce $annonce)
    {
        $annonce->delete();
        return redirect('/user/'.$annonce->user->id.'/annonces');
    }
}
