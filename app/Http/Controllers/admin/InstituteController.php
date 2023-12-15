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

    public function show($id)
    {
        $institute = Instute::findOrFail($id);
        return view('admin.institutes.show', compact('institute'));
    }

    public function create()
    {
        return view('admin.institutes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust the validation rules as needed
            'description' => 'nullable|string',
            'contact_address' => 'nullable|string',
            'contact_phone' => 'nullable|string',
            'contact_email' => 'nullable|email',

            'code' => 'required|unique:instutes',
            'status' => 'required|in:active,blocked',
        ]);
 //'website' => 'nullable|url',
        // Handle file upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Create the institute
        Instute::create([
            'name' => $request->input('name'),
            'logo' => $logoPath ?? null,
            'description' => $request->input('description'),
            'contact_address' => $request->input('contact_address'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_email' => $request->input('contact_email'),
            'website' => $request->input('website'),
            'code' => $request->input('code'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('institutes.index')->with('success', 'Institute created successfully');
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
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust the validation rules as needed
            'description' => 'nullable|string',
            'contact_address' => 'nullable|string',
            'contact_phone' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'website' => 'nullable|url',
            'code' => 'required|unique:institutes,code,' . $id,
            'status' => 'required|in:active,blocked',
        ]);

        $institute = Institute::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('logo')) {
            // Delete the previous logo if it exists
            if ($institute->logo) {
                Storage::disk('public')->delete($institute->logo);
            }

            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        // Update the institute
        $institute->update([
            'name' => $request->input('name'),
            'logo' => $logoPath ?? $institute->logo,
            'description' => $request->input('description'),
            'contact_address' => $request->input('contact_address'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_email' => $request->input('contact_email'),
            'website' => $request->input('website'),
            'code' => $request->input('code'),
            'status' => $request->input('status'),
            // Add other fields
        ]);

        return redirect()->route('institutes.index')->with('success', 'Institute updated successfully');
    }

    public function destroy($id)
    {
        $institute = Instute::findOrFail($id);
        $institute->delete();

        return redirect()->route('institutes.index')->with('success', 'Institute deleted successfully');
    }
}
