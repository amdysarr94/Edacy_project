<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'secteur_activite' => 'required|string|max:255',
            'email_entreprise' => 'required|email|max:255',
            'telephone_entreprise' => 'required|string|max:20',
            'adresse_entreprise' => 'required|string|max:255',
        ]);

        Contact::create([
            'user_id' => Auth::id(),
            'nom_entreprise' => $request->nom_entreprise,
            'secteur_activite' => $request->secteur_activite,
            'email_entreprise' => $request->email_entreprise,
            'telephone_entreprise' => $request->telephone_entreprise,
            'adresse_entreprise' => $request->adresse_entreprise,
        ]);

        return redirect()->route('dashboard')->with('success', 'Contact ajouté avec succès.');
    }
    public function update(Request $request, Contact $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }

        $request->validate([
            'nom_entreprise' => 'required|string|max:255',
            'secteur_activite' => 'required|string|max:255',
            'email_entreprise' => 'required|email|max:255',
            'telephone_entreprise' => 'required|string|max:20',
            'adresse_entreprise' => 'required|string|max:255',
        ]);

       
        $contact->update($request->only([
            'nom_entreprise',
            'secteur_activite',
            'email_entreprise',
            'telephone_entreprise',
            'adresse_entreprise',
        ]));

        return redirect()->back()->with('success', 'Contact mis à jour avec succès.');
    }
    public function destroy(Contact $contact)
    {
        if ($contact->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }

        $contact->delete();

        return redirect()->back()->with('success', 'Contact supprimé avec succès.');
    }
}
