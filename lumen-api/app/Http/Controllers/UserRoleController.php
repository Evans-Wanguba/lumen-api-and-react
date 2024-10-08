<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
* @OA\Get(
*     path="/logs",
*     summary="User Roles",
*     tags={"Logs"},
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

class UserRoleController extends Controller
{
    /**
     * assign a role to user
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response
     */
    public function userAssignRole(Request $request)
    {
        $this->validate($request, [
            "user_id" => "required",
            "role"    => "required",
        ]);

        $user = User::findOrFail($request->user_id);

        $user->assignRole($request->role);

        return response(["message" => "Success to assign role to a user"]);

    }

    /**
     * remove a role from a user
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Request
     */
    public function userRemoveRoleAs(Request $request)
    {
        $this->validate($request, [
            "user_id" => "required",
            "role"    => "required",
        ]);

        $user = User::findOrFail($request->user_id);
        $user->removeRole($request->role);

        return response(["message" => "Success to remove role from user"]);
    }

    /**
     * get users with a role
     * @param string $role
     * @return \Illuminate\Http\Response
     */
    public function usersWithRole($role)
    {
        $users = User::role($role)->paginate(50);

        return response($users);
    }

    /**
     * get users with any role
     * @return \Illuminate\Http\Response
     */
    public function usersWithoutRole()
    {
        $users = User::doesntHave("roles")->paginate(50);

        return response($users);
    }

    /**
     * get users with any roles
     * @return \Illuminate\Http\Response
     */
    public function usersWithRoles()
    {
        $users = User::with("roles")
            ->whereHas("roles")
            ->paginate(50);
        return response($users);
    }
}
