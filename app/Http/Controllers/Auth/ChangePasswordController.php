<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\StoreChangedPassword;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function adminChangePassword(StoreChangedPassword $request){

        $user = User::find($request->id);

        if (Hash::check($request->current, $user->password)) {
            $user->password = bcrypt($request->new);
            $user->save();
            return true;
        } else {
            return false;
        }
    }
}
