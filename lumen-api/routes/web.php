<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get("/", function () use ($router) {
    return $router->app->version();
});

/**
 * the route to perform basic authentication on the application
 */
$router->group(["prefix" => "api"], function () use ($router) {
    $router->post("register", "AuthController@register");
    $router->post("login", "AuthController@login");
});

/**
 * all route with authorize
 */
$router->group(["middleware" => "auth:api", "prefix" => "api"], function () use ($router) {

    /**
     * specific route for user ownership
     */
    $router->group(["prefix" => "auth"], function () use ($router) {
        $router->post("logout", "AuthController@logout");
        $router->post("password-change", "AuthPasswordChangeController");
        $router->get("refresh", "AuthController@refresh");
        $router->get("profile", "AuthController@profile");
    });

    /**
     * resource routes for user role
     */
    $router->group(["prefix" => "roles"], function () use ($router) {
        $router->get("/", "RoleController@index");
        $router->post("/", "RoleController@store");
        $router->delete("/{id}", "RoleController@destroy");
    });

    /**
     * user permission resource route
     */
    $router->group(["prefix" => "permissions"], function () use ($router) {
        $router->get("/", "PermissionController@index");
        $router->post("/", "PermissionController@store");
        $router->delete("/{id}", "PermissionController@destroy");
    });

    /**
     * the route of the relationship between users and roles
     */
    $router->group(["prefix" => "user-permission"], function () use ($router) {
        $router->get("/", "UserPermissionController@usersWithPermissions");
        $router->get("/permission/{permission}", "UserPermissionController@usersWithPermission");
        $router->post("/give-permission", "UserPermissionController@userGivePermissionTo");
        $router->post("/revoke-permission", "UserPermissionController@userRevokePermissionTo");
    });

    /**
     * the route of the relationship between users and roles
     */
    $router->group(["prefix" => "user-role"], function () use ($router) {
        $router->get("/", "UserRoleController@usersWithRoles");
        $router->get("/role/{role}", "UserRoleController@usersWithRole");
        $router->get("/user-without-role", "UserRoleController@usersWithoutRole");
        $router->post("/give-role", "UserRoleController@userAssignRole");
        $router->post("/revoke-role", "UserRoleController@userRemoveRoleAs");

    });

    /**
     * give and revoke a user's permission via role
     */
    $router->group(["prefix" => "user-via-role"], function () use ($router) {
        $router->post("/give-permission", "UserRoleToPermissionController@userRoleGivePermissionTo");
        $router->post("/revoke-permission", "UserRoleToPermissionController@userRoleRevokePermissionTo");
    });

    /**
     * User
     */
    $router->group(["prefix" => "users"], function () use ($router) {
        $router->get("/", "UserController@index");
        $router->post("/", "UserController@store");
        $router->get("/{id}", "UserController@show");
    });

    /**
     * Customers
     */
    $router->group(["prefix" => "customers"], function () use ($router) {
        $router->get("/", "CustomerController@index");
        $router->post("/", "CustomerController@store");
        $router->get("/{id}", "CustomerController@show");
    });
});