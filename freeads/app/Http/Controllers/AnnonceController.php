<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;

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

        auth()->user()->annonces()->create(array_merge($data, ['image' => $imgPath]));

        return redirect('/user/'.auth()->user()->id . '/annonces');
    }

    public function show(Annonce $annonce)
    {
        return view('annonce.show', ['annonce' => $annonce]);
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
