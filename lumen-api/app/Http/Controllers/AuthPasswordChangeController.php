<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\PasswordMatchRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
* @OA\Get(
*     path="/password",
*     summary="Password Reset",
*     tags={"Password Reset"},
*    @OA\Response(
*      response=200,
*       description="Success",
*   ),
*   @OA\Response(
*      response=401,
*       description="Unauthenticated"
*   ),
*   @OA\Response(
*      response=400,
*      description="Bad Request"
*   ),
*   @OA\Response(
*      response=404,
*      description="Not found"
*   ),
*    @OA\Response(
*          response=403,
*          description="Forbidden"
*    )
* )
*/

class AuthPasswordChangeController extends Controller
{
    /**
     * User can update their password auth
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            "current_password" => ["required", new PasswordMatchRole],
            'password'         => 'required|confirmed',
        ]);

        User::findOrFail(Auth::user()->id)->update(["password" => Hash::make($request->password)]);

        return response(["message" => "Success change password"]);
    }
}
