<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{
        StoreImage,
        AdminStoreUpdate
    };
use App\Services\UploadFile;
use Illuminate\Http\Request;

use App\Services\AdminService;

class AdminController extends Controller
{
    protected $service;

    public function __construct(AdminService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $datos = $this->service->getAll(
            filter:$request->filter ?? ''
        );

        return view('admin.admin.index', compact('datos'));
    }


    public function create()
    {
        return view('admin.admin.create');
    }

    public function show($id)
    {
        if (!$data = $this->service->findById($id))
            return back();

        return view('admin.admin.show', compact('data'));
    }

    public function store(AdminStoreUpdate $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        $this->service->create($data);

        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        if( !$admin = $this->service->findById($id))
            return redirect()->back();

            return view('admin.admin.edit', compact('admin'));
    }

    public function update(AdminStoreUpdate $request, $id)
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

        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect()->route('admin.index');
    }

    public function changeImage($id)
    {
        if( !$admin = $this->service->findById($id))
            return back();

        return view('admin.admin.image', compact('admin'));
    }

    public function uploadFile(StoreImage $request, UploadFile $uploadFile, $id)
    {
        $path = $uploadFile->store($request->image, 'admins');

        if(!$this->service->update($id, ['image' => $path ])){
            return back();
        }

        return redirect()->route('admin.index');
    }


}
