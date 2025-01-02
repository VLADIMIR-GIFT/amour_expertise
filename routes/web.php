<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UEController;

// Route pour la page d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Route pour lister les Unités d'Enseignement
Route::get('unites_enseignement', [UEController::class, 'index'])->name('unites_enseignement.index');

// Route pour afficher un formulaire de création d'une UE
Route::get('unites_enseignement/create', [UEController::class, 'create'])->name('unites_enseignement.create');

// Route pour stocker une nouvelle UE
Route::post('unites_enseignement', [UEController::class, 'store'])->name('unites_enseignement.store');

// Route pour éditer une UE
Route::get('unites_enseignement/{id}/edit', [UEController::class, 'edit'])->name('unites_enseignement.edit');

// Route pour mettre à jour une UE
Route::put('unites_enseignement/{id}', [UEController::class, 'update'])->name('unites_enseignement.update');

// Route pour supprimer une UE
Route::delete('unites_enseignement/{id}', [UEController::class, 'destroy'])->name('unites_enseignement.destroy');

// Route pour afficher un élément constitutif
Route::get('elements_constitutifs', function () {
    return view('elements_constitutifs'); // Vue pour les éléments constitutifs
});
