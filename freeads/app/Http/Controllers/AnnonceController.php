<?php

namespace App\Http\Controllers;

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

    public function show(\App\Annonce $annonce)
    {
        return view('annonce.show', ['annonce' => $annonce]);
    }
}
