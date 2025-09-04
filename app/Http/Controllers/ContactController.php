<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'phone' => 'required|unique:contacts,phone',
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success','Contact added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name'  => 'required',
            'phone' => 'required|unique:contacts,phone,'.$contact->id,
        ]);

        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('success','Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success','Contact deleted successfully.');
    }

    // 🚀 XML Import
    public function importXML(Request $request)
    {
        $request->validate([
            'xml_file' => 'required|file',
        ]);

        $xmlContent = simplexml_load_file($request->file('xml_file')->getRealPath());

        $duplicates = [];
        foreach ($xmlContent->contact as $c) {
            $phone = (string) $c->phone;

            // Duplicate check
            if (\App\Models\Contact::where('phone', $phone)->exists()) {
                $duplicates[] = $phone;
                continue;
            }

            \App\Models\Contact::create([
                'name'  => (string) $c->name,
                'phone' => $phone,
            ]);
        }

        if (!empty($duplicates)) {
            return redirect()->route('contacts.index')
                ->withErrors(['Some contacts were skipped because phone numbers already exist: ' . implode(', ', $duplicates)]);
        }

        return redirect()->route('contacts.index')->with('success', 'Contacts imported successfully.');
    }

}
