<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreUpdate;
use Illuminate\Http\Request;

use App\Services\UserService;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        $users = $this->service->getAll(
            filter: $request->get('filter', '')
        );


        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserStoreUpdate $request)
    {
        $user = $this->service->create($request->validated());

        return redirect()->route('users.index');
    }
}