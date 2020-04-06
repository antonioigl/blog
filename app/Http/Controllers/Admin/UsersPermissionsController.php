<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function back;

class UsersPermissionsController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->permissions()->detach();

        if ($request->filled('permissions')){
            $user->givePermissionTo($request->permissions);
        }

        return back()->with(['flash' => 'Los permisos han sido actualizados']);
    }
}
