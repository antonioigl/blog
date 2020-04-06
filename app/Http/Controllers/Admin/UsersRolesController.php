<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function __;
use function back;

class UsersRolesController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //syncRoles es un método del paquete laravel-permission.
        // Este método, primero, quita todos los roles del usuario y luego agrega todos los que le pasemos al método. De esta manera evitamos roles duplicados
        //$user->syncRoles($request->roles);

        $user->roles()->detach();

        if ($request->filled('roles')){
            $user->assignRole($request->roles);
        }

        return back()->with(['flash' => __('Los roles han sido actualizados')]);
    }
}
