<?php
namespace App\Http\Controllers;

use App\Models\UE;
use Illuminate\Http\Request;

class UEController extends Controller
{
    public function index()
    {
        $unites_enseignement = UE::all(); // Récupérer toutes les UEs
        return view('unites_enseignement.index', compact('unites_enseignement'));
    }

    public function create()
    {
        return view('unites_enseignement.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:unites_enseignement,code|regex:/^UE\d{2}$/',
            'nom' => 'required|string',
            'credits_ects' => 'required|integer|between:1,30',
            'semestre' => 'nullable|integer|in:1,2',
        ]);

        // Créer une nouvelle UE
        UE::create($validated);

        return redirect()->route('unites_enseignement.index');
    }

    public function edit($id)
    {
        $ue = UE::findOrFail($id);
        return view('unites_enseignement.edit', compact('ue'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required|unique:unites_enseignement,code,' . $id . '|regex:/^UE\d{2}$/',
            'nom' => 'required|string',
            'credits_ects' => 'required|integer|between:1,30',
            'semestre' => 'nullable|integer|in:1,2',
        ]);

        // Mettre à jour l'UE
        UE::findOrFail($id)->update($validated);

        return redirect()->route('unites_enseignement.index');
    }

    public function destroy($id)
    {
        // Supprimer l'UE
        UE::findOrFail($id)->delete();

        return redirect()->route('unites_enseignement.index');
    }
}
