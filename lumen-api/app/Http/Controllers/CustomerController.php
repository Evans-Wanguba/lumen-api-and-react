<?php

namespace App\Http\Controllers;

use SwaggerLume\ServiceProvider as SwaggerLumeServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Log;

/**
* @OA\Get(
*     path="/",
*     summary="Get App Version",
*     tags={"General"},
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

 /**
* @OA\Get(
*     path="/key",
*     summary="Get App Key",
*     tags={"General"},
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

  /**
* @OA\Get(
*     path="/customers",
*     summary="Customers",
*     tags={"Customers"},
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

   /**
* @OA\Get(
*     path="/test",
*     summary="To Test",
*     tags={"Test"},
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

    /**
* @OA\Post(
*     path="/create-project",
*     summary="Create a project",
*     tags={"Project API"},
*    @OA\Parameter(
*           name="name",
*           in="query",
*           required=true,
*           @OA\Schema(
*                 type="string"
*           )
*     ),
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
*    ),
*      security={
*         {"Authorization":{}}
*     },
* )
*/

/**
* @OA\Post(
*     path="/send-mail-vls",
*     summary="Send mail to vls team without authentication",
*     tags={"Mail"},
*   
*     @OA\Parameter(
*           name="content",
*           in="query",
*           required=true,
*           @OA\Schema(
*                 type="string"
*           )
*     ),
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

      /**
* @OA\Post(
*     path="/template/store",
*     summary="To store the template",
*     tags={"Templates"},
*     @OA\Parameter(
*           name="content",
*           in="query",
*           required=true,
*           @OA\Schema(
*                 type="string"
*           )
*     ),
*     @OA\Parameter(
*           name="project_id",
*           in="query",
*           required=true,
*           @OA\Schema(
*                 type="string"
*           )
*     ),
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
*    ),
*     security={
*         {"Authorization":{}}
*     },
* )
*/

      /**
* @OA\Post(
*     path="/template/update",
*     summary="To update the template",
*     tags={"Templates"},
*    @OA\Parameter(
*           name="content",
*           in="query",
*           required=true,
*           @OA\Schema(
*                 type="string"
*           )
*     ),
*     @OA\Parameter(
*           name="templateId",
*           in="query",
*           required=true,
*           @OA\Schema(
*                 type="string"
*           )
*     ),
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
*    ),
*     security={
*         {"Authorization":{}}
*     },
* )
*/

      /**
* @OA\Post(
*     path="/template/get",
*     summary="To get the template",
*     tags={"Templates"},
*     @OA\Parameter(
*           name="templateId",
*           in="query",
*           required=true,
*           @OA\Schema(
*                 type="string"
*           )
*     ),
*     @OA\Parameter(
*           name="project_id",
*           in="query",
*           required=true,
*           @OA\Schema(
*                 type="string"
*           )
*     ),
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
*    ),
*     security={
*         {"Authorization":{}}
*     },
* )
*/

      /**
* @OA\Post(
*     path="/set-schedule",
*     summary="Set the schedule task",
*     tags={"Task"},
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
*    ),
*     security={
*         {"Authorization":{}}
*     },
* )
*/

class CustomerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/users",
     *     summary="Get a list of users",
     *     tags={"Users"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=403, description="Forbidden"),
     *     @OA\Response(response=404, description="Not found")
     * )
     */
    public function index()
    {
        $users = User::all();
    
        return $this->successResponse('All users', $users, 200);   
    }
    
    /**
     * @OA\Post(
     *     path="/users",
     *     summary="Add a new user",
     *     tags={"Users"},
     *     @OA\Parameter(
     *           name="content",
     *           in="query",
     *           required=true,
     *           @OA\Schema(
     *                 type="string"
     *           )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=403, description="Forbidden"),
     *     @OA\Response(response=404, description="Not found"),
     *     security={
     *         {"Authorization":{}}
     *     },
     * )
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
    
        return $this->successResponse('Add user', $user, 200);   
    }
    
    /**
     * @OA\Get(
     *     path="/users/{id}",
     *     summary="Show user details",
     *     tags={"Users"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=401, description="Unauthenticated"),
     *     @OA\Response(response=403, description="Forbidden"),
     *     @OA\Response(response=404, description="Not found")
     * )
     */
    public function show($id)
    {
        $user = User::find($id);
    
        return $this->successResponse('User details', $user, 200);   
    }
}