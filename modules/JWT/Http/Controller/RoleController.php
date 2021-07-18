<?php

namespace Module\JWT\Controller;

use App\Helper\Submitter;
use Illuminate\Http\Request;
use Module\JWT\Model\Role;

class RoleController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): string
    {
        return template("dashboard")->blank(view("role.index", ["role" => Role::all()]), ['subtitle' => "وظلیف ثبت شده"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): string
    {
        $roles = json_decode(Role::first()->scopes);
        return template("dashboard")->blank(view("role.create", compact("roles")), ['subtitle' => "ساخت وظیفه جدید"]);
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
            Role::NAME => ["required"],
            Role::TITLE => ["required"],
            Role::SCOPES => ["required"],
        ]);

        $roles=explode(",",$request->input(Role::SCOPES));
        array_pop($roles);

        Role::create([
            Role::NAME => $request->input(Role::NAME),
            Role::TITLE => $request->input(Role::TITLE),
            Role::SCOPES => json_encode($roles),
        ]);

        return Submitter::swalRedirect("وظیفه مورد نظر با موفقیت ثبت شد.",route("role.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $scope=Role::findOrFail($id);
        $roles = json_decode(Role::first()->scopes);
        return template("dashboard")->blank(view("role.edit",compact("scope","roles")),['subtitle'=>"ویرایش وظیفه"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        $scope=Role::findOrFail($id);

        $this->getValidate($request);

        $roles=explode(",",$request->input(Role::SCOPES));
        array_pop($roles);

        $scope->update([
            Role::NAME => $request->input(Role::NAME),
            Role::TITLE => $request->input(Role::TITLE),
            Role::SCOPES => json_encode($roles),
        ]);

        return Submitter::swalRedirect("وظیفه مورد نظر با موفقیت ویرایش شد.",route("role.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     */
    private function getValidate(Request $request): void
    {
        validate($request->all(), [
            Role::NAME => ["required"],
            Role::TITLE => ["required"],
            Role::SCOPES => ["required"],
        ]);
    }
}
