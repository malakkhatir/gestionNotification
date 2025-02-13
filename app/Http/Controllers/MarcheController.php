<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class MarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marches = Marche::all();
        return view('marches.index', compact('marches'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marches.create', compact('marches'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nomMarche' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_exp'=> 'required|date',
            'statut' => 'required|string|max:250',
        ]);

        // Créer un nouveau joueur
        Marche::create($request->all());
        return redirect()->route('marches.index')->with('msg', 'Nouveau marche ajouté');
    }

    /**
     * Display the specified resource.
     */
    /*public function show(string $id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('joueurs.edit', compact('joueurs'));
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
