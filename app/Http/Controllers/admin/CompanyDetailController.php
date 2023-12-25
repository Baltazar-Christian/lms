<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CompanyDetailController extends Controller
{
    public function index()
    {
        $companyDetails = CompanyDetail::all();

        return view('admin.company_details.index', compact('companyDetails'));
    }

    public function create()
    {
        return view('admin.company_details.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'contact_address' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            // 'website' => 'nullable|url|max:255',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('company_logos', 'public');
        }

        CompanyDetail::create([
            'name' => $request->input('name'),
            'logo' => $logoPath,
            'description' => $request->input('description'),
            'contact_address' => $request->input('contact_address'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_email' => $request->input('contact_email'),
            'website' => $request->input('website'),
        ]);

        return redirect()->route('company_details.index')->with('success', 'Company details created successfully.');
    }

    public function edit($id)
    {
        $companyDetail = CompanyDetail::find($id);

        return view('admin.company_details.edit', compact('companyDetail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'contact_address' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
            // 'website' => 'nullable|url|max:255',
        ]);

        $companyDetail = CompanyDetail::find($id);

        if ($request->hasFile('logo')) {
            // Delete existing logo

            if ($companyDetail->logo) {
                Storage::disk('public')->delete($companyDetail->logo);
            }

            // Update logo
            $logoPath = $request->file('logo')->store('company_logos', 'public');
            $companyDetail->logo = $logoPath;
        }

        $companyDetail->name = $request->input('name');
        $companyDetail->description = $request->input('description');
        $companyDetail->contact_address = $request->input('contact_address');
        $companyDetail->contact_phone = $request->input('contact_phone');
        $companyDetail->contact_email = $request->input('contact_email');
        $companyDetail->website = $request->input('website');
        $companyDetail->save();

        return redirect()->route('company_details.index')->with('success', 'Company details updated successfully.');
    }

    public function destroy($id)
    {
        $companyDetail = CompanyDetail::find($id);

        // Delete logo if exists
        if ($companyDetail->logo) {
            Storage::disk('public')->delete($companyDetail->logo);
        }

        $companyDetail->delete();

        return redirect()->route('company_details.index')->with('success', 'Company details deleted successfully.');
    }

}
