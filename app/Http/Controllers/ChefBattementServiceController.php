<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChefBattement;
use App\Contracts\ChefBattementServiceInterface;

class ChefBattementServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*
     public function index()
    {
        // Récupérer tous les chefs de l'école donnée
        $chefs = ChefBattement::all();

        // Retourner la vue avec les chefs
        return view('layouts.tables.chefs', ['chefs' => $chefs]);
    } */

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
