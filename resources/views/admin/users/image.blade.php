@extends('admin.layouts.app')

@section('title', 'Editar Imagem')

@section('content')

<h1 class="text-3xl text-black pb-6">
    Editar Foto do Usuário <b>{{ $user->name }}</b>
</h1>

                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">

                            <div class="leading-loose">
                                <form action="{{ route('users.update.image', $user->id)}}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded">
                                    @include('admin.includes.alerts')
                                    @method('PUT')
                                    @csrf

                                    <div class="my-4">
                                        <label class="block text-sm text-gray-600" for="name">Buscar Foto</label>
                                        <input class="px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="image" type="file" aria-label="Image">
                                    </div>

                                    <div class="mt-6">
                                        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Atualizar Foto</button>
                                    </div>
                                </form>
                            </div>
                        </div>

@endsection
