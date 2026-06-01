<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('module_name')->get()->groupBy('module_name');
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_name' => 'required|string',
            'actions' => 'required|array'
        ]);
        
        $module = $request->module_name;
        $moduleSlug = strtolower(trim($module));

        foreach ($request->actions as $action) {
            $permissionName = $action . ' ' . $moduleSlug;
            
            // Only create if it doesn't already exist
            Permission::firstOrCreate([
                'name' => $permissionName
            ], [
                'module_name' => $module
            ]);
        }

        return redirect()->route('permissions.index')->with('success', 'CRUD Permissions auto-generated for module: ' . $module);
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name,'.$permission->id,
            'module_name' => 'required|string'
        ]);
        
        $permission->update([
            'name' => $request->name,
            'module_name' => $request->module_name
        ]);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
