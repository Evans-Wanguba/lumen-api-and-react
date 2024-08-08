<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

/**
* @OA\Get(
*     path="/roles",
*     summary="Roles",
*     tags={"Roles"},
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

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy("name", "asc")
            ->paginate(50);
        return response($roles);

    }

    /**
     * Store a newly created resource in storage.
     * role name should lowercase
     * prevent space
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|unique:roles,name",
        ]);

        try {

            Role::create($request->except("id"));
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response(["message" => "Success to create new role"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response(["message" => "Success to remove role"]);
    }
}
