<?php

namespace App\Http\Controllers\admin;

use App\Models\Instute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstituteController extends Controller
{
    public function index()
    {
        $institutes = Instute::all();
        return view('admin.institutes.index', compact('institutes'));
    }

    public function create()
    {
        return view('admin.institutes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:institutes',
            // Add more validation rules as needed
        ]);

        Instute::create($request->all());

        return redirect()->route('admin.institutes.index')->with('success', 'Institute created successfully');
    }

    public function edit($id)
    {
        $institute = Instute::findOrFail($id);
        return view('admin.institutes.edit', compact('institute'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:institutes,code,' . $id,
            // Add more validation rules as needed
        ]);

        $institute = Instute::findOrFail($id);
        $institute->update($request->all());

        return redirect()->route('admin.institutes.index')->with('success', 'Institute updated successfully');
    }

    public function destroy($id)
    {
        $institute = Instute::findOrFail($id);
        $institute->delete();

        return redirect()->route('admin.institutes.index')->with('success', 'Institute deleted successfully');
    }
}
