<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignRoleToUserRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Role::class,'order');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response(Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role=Role::create([
            'name'=>$request->name,
            'guard_name'=>'web'
        ]);

        return $this->success('role created',$role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    public function assign(AssignRoleToUserRequest $request){
        $user=User::findOrFail($request->user_id);
        $role=Role::findOrFail($request->role_id);

        $user->assignRole($role->name);

        return $this->success('role assigned');

    }
}
