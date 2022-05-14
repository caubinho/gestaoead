<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{
        StoreImage,
        UserStoreUpdate
    };
use App\Services\UploadFile;
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
        $datos = $this->service->getAll(
            filter: $request->filter ?? ""
        );


        return view('admin.users.index', compact('datos'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function show($id)
    {
        if (!$data = $this->service->findById($id))
            return back();

        return view('admin.users.show', compact('data'));
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

    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect()->route('users.index');
    }

    public function changeImage($id)
    {
        if( !$user = $this->service->findById($id))
            return back();

        return view('admin.users.image', compact('user'));
    }

    public function uploadFile(StoreImage $request, UploadFile $uploadFile, $id)
    {
        $path = $uploadFile->store($request->image, 'users');

        if(!$this->service->update($id, ['image' => $path ])){
            return back();
        }

        return redirect()->route('users.index');
    }


}
