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
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $this->service->create($data);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if( !$user = $this->service->findById($id))
            return redirect()->back();

            return view('admin.users.edit', compact('user'));
    }

    public function update(UserStoreUpdate $request, $id)
    {
        $data = $request->all();

        if(!$request->password){
            unset($data['password']);
        }else{
            $data['password'] = bcrypt($data['password']);
        }
        if(!$this->service->update($id, $data)){
            return back();
        }

        return redirect()->route('users.index');
    }

    public function changeImage($id)
    {
        if( !$user = $this->service->findById($id))
            return back();

        return view('admin.users.image', compact('user'));
    }

    public function uploadFile(Request $request)
    {
        dd($request->all());
    }


}
