<?php

namespace App\Http\Controllers\support;

use App\Models\Module;
use App\Models\Instute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupportModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all support routes
        $this->middleware('role:support'); // Require support role for all support routes
    }

    public function index()
    {
        $modules = Module::latest()->get();
        return view('support.modules.index', compact('modules'));
    }



    public function create()
    {
        $institutes = Instute::all();
        return view('support.modules.create', compact('institutes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:modules',
            'description' => 'required',
            'institutes' => 'nullable|array',
            'institutes.*' => 'exists:instutes,id',
        ]);

        $moduleData = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => 'active',
            'created_by' => Auth::id(),
        ];

        $module = Module::create($moduleData);

        // Attach institutes to the module
        $module->institutes()->attach($request->input('institutes'), [
            'status' => 'active',
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('lms.support-modules')->with('success', 'Module created successfully');
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        $institutes = Instute::all();
        return view('support.modules.edit', compact('module', 'institutes'));
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);
        $institutes = Instute::all();
        return view('support.modules.show', compact('module', 'institutes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:modules,name,' . $id,
            'institutes' => 'nullable|array',
            'institutes.*' => 'exists:instutes,id',
        ]);

        $moduleData = [
            'name' => $request->input('name'),
            'status' => 'active', // You can adjust this based on your logic
            'description'=>$request->input('description'),
            'created_by' => Auth::id(),
        ];

        $module = Module::findOrFail($id);
        $module->update($moduleData);

        // Sync institutes for the module
        $module->institutes()->sync($request->input('institutes'), [
            'status' => 'active',
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('lms.support-modules')->with('success', 'Module updated successfully');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->institutes()->detach(); // Detach institutes before deleting the module
        $module->delete();

        return redirect()->route('lms.support-modules')->with('success', 'Module deleted successfully');
    }
}
