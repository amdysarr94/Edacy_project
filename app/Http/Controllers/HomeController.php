<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $letter = $request->input('letter');

        $contacts = Contact::query()
            ->when($letter, fn($q) => $q->where('nom_entreprise', 'LIKE', $letter . '%'))
            ->orderBy('nom_entreprise')
            ->paginate(10)
            ->withQueryString();

        return view('home', compact('contacts', 'letter'));
    }
}
