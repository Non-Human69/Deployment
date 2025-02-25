<?php

namespace App\Http\Controllers;

use App\Models\Beheer;
use App\Models\Product;
use Illuminate\Http\Request;

class BeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beheers = Beheer::all();
        return view('beheers.index', compact('beheers'));
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
    public function show(Beheer $beheer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beheer $beheer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beheer $beheer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beheer $beheer)
    {
        //
    }

    public function map()
    {
        $products = product::all();
        return view('beheers.map', compact('products'));
    }
}
