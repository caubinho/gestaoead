@extends('admin.layouts.app')

@section('title', "Detalhes do Usuário {$data->name}")

@section('content')
<h1 class="w-full text-3xl text-black pb-6">
    Detalhes do Usuário {{ $data->name }}
</h1>

<div class="flex flex-wrap">
    <div class="w-full my-6 pr-0 lg:pr-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('users.destroy', $data->id) }}" method="POST">
                <ul>
                    <li>{{ $data->name }}</li>
                    <li>{{ $data->email }}</li>
                </ul>
                @method('DELETE')
                @csrf
                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-red-900 rounded" type="submit">
                        Deletar o Usuário {{ $data->name }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
