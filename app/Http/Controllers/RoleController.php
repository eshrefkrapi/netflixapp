<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index4(){
        $roles = Role::all();
        return response()->json($roles);
    }
    public function storeR(StoreRoleRequest $request){
        
        $role = new Role();

        $role->name = $request->name;

        $role->save();
        return response()->json($role);
    }

    public function showR($id){
        $roles =  Role::findOrFail($id);
        return response()->json($roles);

    }

    public function destroy4($id){

        $role =  Role::findOrFail($id);

        $role->delete();

        return response()->json([
            'message' => 'User Role with the ID you entered deleted successfully'
        ]);

    }

    public function update4(UpdateRoleRequest $request, $id){
        
        $role =  Role::findOrFail($id);

        $role->name = $request->name;

        $role->update();

        return response()->json([
            'message' => 'User role updated successfully'
        ]);
    }
}
