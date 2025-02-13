<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Besoin;
use App\Models\Marche;
use App\Models\StatutBesoin;
use Illuminate\Support\Facades\Auth;

class BesoinController extends Controller
{
   
    public function index()
    {
        $besoin = Besoin::with(['user', 'statut'])->get();
        return view('consulterbesoin', compact('besoin'));
    }


    public function create()
    {
        $marcheActif = Marche::where('statut', 1)->first();
        if (!$marcheActif) {
            return redirect()->back()->with('error', 'Aucun marché actif trouvé.');
        }

        $statutDefaut = StatutBesoin::find(1);;
        if (!$statutDefaut) {
            return redirect()->back()->with('error', 'Aucun statut de besoin trouvé.');
        }

        // Génération de la référence basée sur le dernier enregistrement
        $lastBesoin = Besoin::latest('ref')->first();
        $newRef = $lastBesoin ? $lastBesoin->ref + 1 : 1;
        // Création du besoin immédiatement
        $besoin = Besoin::create([
            'ref' => $newRef,
            'idMarche' => $marcheActif->id,
            'date' => null, // Date will be updated after validation
            'idStatut' => $statutDefaut->id,
            'iduser' => Auth::id(),
        ]);

        return view('dashboard', compact('besoin', 'marcheActif'));
    }

    public function update(Request $request, $ref)
    {
        $request->validate([
            'date' => 'required|date',
        ]);
        $besoin = Besoin::where('ref', $ref)->firstOrFail();
        $besoin->update([
            'date' => $request->date,
        ]);
        return redirect('/')->with('success', 'Besoin mis à jour avec succès.');
    }
}
