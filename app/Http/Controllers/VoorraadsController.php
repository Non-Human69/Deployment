<?php

namespace App\Http\Controllers;

use App\Models\Voorraads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoorraadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voorraads = Voorraads::all();
        return view('voorraads.index', compact('voorraads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Voorraads $voorraads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voorraads $voorraads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voorraads $voorraads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voorraads $voorraads)
    {
        //
    }
}
