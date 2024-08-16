<?php

namespace App\Http\Controllers;

use App\Models\Importer;
use Illuminate\Http\Request;

class ImporterController extends Controller
{
    public function index()
    {
        return view('importers.index', ['importers' => Importer::latest()->get()]);
    }

    public function create()
    {
        return view('importers.create');
    }
    public function store()
    {
        $attribute = request()->validate([
            'name' => 'required',
            'address' => 'required',
        ]);

        Importer::create($attribute);

        return redirect()->route('importers.index');
    }

    public function show(Importer $importer)
    {
        return view('importers.show', ['importer' => $importer]);
    }

    public function edit(Importer $importer)
    {
        return view('importers.edit', ['importer' => $importer]);
    }

    public function update(Importer $importer)
    {
        // validation
        $attributes  = request()->validate([
            'name' => 'required',
            'address' => 'required'
        ]);
        // update data
        $importer->update($attributes);
        // return data
        return redirect()->route('importers.show', ['importer' => $importer->id]);
    }

    public function destroy($id)
    {
        // without route model binding
        // get data
        $importer = Importer::findOrFail($id);
        // delete data
        $importer->delete();
        // redirect
        return redirect()->route('importers.index');
    }
}
