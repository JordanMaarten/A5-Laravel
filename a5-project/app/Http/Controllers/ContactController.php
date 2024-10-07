<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Company;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id');
        return view('contacts.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'company_id'=>'required'
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')
            ->with('success', 'Contact is bewaard!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $companies = Company::pluck('name', 'id');
        return view('contacts.edit', compact('contact', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'company_id'=>'required'
        ]);

        $contact->update($request->all());

        return redirect('/contacts')
            ->with('success', 'Contact is aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('/contacts')
            ->with('success', 'Contact is verwijderd!');
    }
}
