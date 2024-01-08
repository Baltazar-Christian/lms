<?php

namespace App\Http\Controllers\admin;

use App\Models\Module;
use App\Models\Instute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view('admin.modules.index', compact('modules'));
    }

    // For Tutors modules
    public function tutor_modules()
    {
        $modules = Module::all();
        return view('tutor.modules.index', compact('modules'));
    }


    public function create()
    {
        $institutes = Instute::all();
        return view('admin.modules.create', compact('institutes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:modules',
            'institutes' => 'required|array',
            'institutes.*' => 'exists:instutes,id',
        ]);

        $moduleData = [
            'name' => $request->input('name'),
            'status' => 'active',
            'created_by' => Auth::id(),
        ];

        $module = Module::create($moduleData);

        // Attach institutes to the module
        $module->institutes()->attach($request->input('institutes'), [
            'status' => 'active',
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('lms.modules')->with('success', 'Module created successfully');
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        $institutes = Instute::all();
        return view('admin.modules.edit', compact('module', 'institutes'));
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);
        $institutes = Instute::all();
        return view('admin.modules.show', compact('module', 'institutes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:modules,name,' . $id,
            'institutes' => 'required|array',
            'institutes.*' => 'exists:instutes,id',
        ]);

        $moduleData = [
            'name' => $request->input('name'),
            'status' => 'active', // You can adjust this based on your logic
            'created_by' => Auth::id(),
        ];

        $module = Module::findOrFail($id);
        $module->update($moduleData);

        // Sync institutes for the module
        $module->institutes()->sync($request->input('institutes'), [
            'status' => 'active',
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('lms.modules')->with('success', 'Module updated successfully');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->institutes()->detach(); // Detach institutes before deleting the module
        $module->delete();

        return redirect()->route('admin.modules.index')->with('success', 'Module deleted successfully');
    }
}
