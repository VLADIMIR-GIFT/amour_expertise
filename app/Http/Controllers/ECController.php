<?php
namespace App\Http\Controllers;

use App\Models\EC;
use App\Models\UE;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ECController extends Controller
{
    public function index()
    {  // Retourner une vue avec Inertia
        return Inertia::render('ElementsConstitutifs/Index', [
            'data' => [] // Ajoutez ici les données que vous voulez passer à la vue
        ]);
    }

    public function create()
    {
        // Passer la liste des UE à la vue de création
        $ues = UE::all();  // Je change 'unites_enseignement' en 'ues'
        return view('elements_constitutifs.create', compact('ues'));  // 'ues' est passé à la vue
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'nom' => 'required|string',
            'coefficient' => 'required|numeric',
            'ue_id' => 'required|exists:unites_enseignement,id',
            'code' => 'required|string|unique:elements_constitutifs',  // 'code' est nullable pour permettre la génération automatique
        ]);
        EC::create($validated);

        // Vérifier si le code a été fourni, sinon le générer automatiquement
        if (empty($validated['code'])) {
            $validated['code'] = 'EC' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);  // Génération d'un code unique comme 'EC001', 'EC002', etc.
        }

        // Création de l'élément constitutif avec les données validées
        EC::create($validated);

        // Redirection vers la page d'index
        return redirect()->route('elements_constitutifs.index');
    }

    public function edit(EC $id)
    {
        // Passer la variable 'ues' dans la vue d'édition
        $ec =EC::findOrFail($id);
        $ues = UE::all();
        return view('elements_constitutifs.edit', compact('ec', 'ues'));  // Correctement passé à la vue
    }

    public function update(Request $request, EC $ec)
    {
        // Validation des données lors de la mise à jour
        $request->validate([
            'code' => 'required|unique:elements_constitutifs,code,' . $ec->id,
            'nom' => 'required',
            'coefficient' => 'required|numeric|min:1|max:5',
            'ue_id' => 'required|exists:unites_enseignement,id',
        ]);

        // Mise à jour de l'élément constitutif
        $ec->update($request->all());
        return redirect()->route('elements_constitutifs.index')->with('success', 'EC mis à jour avec succès.');
    }

    public function destroy(EC $ec)
    {
        // Suppression de l'élément constitutif
        $ec->delete();
        return redirect()->route('elements_constitutifs.index')->with('success', 'EC supprimé avec succès.');
    }
}
