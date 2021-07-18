<?php

namespace Module\JWT\Controller;

use App\Helper\Submitter;
use Illuminate\Http\Request;
use Module\JWT\Model\Role;
use Module\JWT\Model\User;
use Module\JWT\Model\UserPermission;

class UserPermissionController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $roles = json_decode(Role::first()->scopes);
        return template("dashboard")->blank(view("user.createRole", compact("roles")), ['subtitle' => "ساخت وظیفه جدید"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return false|string
     */
    public function store(Request $request)
    {
        validate($request->all(), [
            UserPermission::SCOPE => "required",
            UserPermission::STATUS => "required"
        ]);

        UserPermission::create([
            UserPermission::USER_ID => $request->input(UserPermission::USER_ID),
            UserPermission::SCOPE => $request->input(UserPermission::SCOPE),
            UserPermission::STATUS => $request->input(UserPermission::STATUS),
        ]);

        return Submitter::swalRedirect("مجوز با موفقیت ثبت شد.",route('role.user.show',$request->input(UserPermission::USER_ID)));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        $role = User::findOrFail($id);
        return template("dashboard")->blank(view("user.role", ['role' => $role]), ['subtitle' => "محوز های کاربر"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $permistion=UserPermission::findOrFail($id);
        $permistion->delete();

        return Submitter::swalRedirect("مجوز با موفقیت حذف شد.",route('role.user.show', $permistion->user_id));
    }
}
