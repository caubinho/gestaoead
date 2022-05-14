@extends('admin.layouts.app')

@section('title', 'Cadastrar Administrador')

@section('content')

<h1 class="text-3xl text-black pb-6">
    Cadastrar novo Administrador
</h1>

                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">

                            <div class="leading-loose">
                                <form action="{{ route('admin.store')}}" method="POST"class="p-10 bg-white rounded">
                                    @csrf

                                    @include('admin.admin.__partials.form')
                                </form>
                            </div>
                        </div>

@endsection
