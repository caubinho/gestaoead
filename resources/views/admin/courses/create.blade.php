@extends('admin.layouts.app')

@section('title', 'Cadastrar Curso')

@section('content')

<h1 class="text-3xl text-black pb-6">
    Cadastrar novo Curso
</h1>

                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">

                            <div class="leading-loose">
                                <form class="p-10 bg-white rounded shadow-xl" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                                    @include('admin.courses.partials.form')
                                </form>
                            </div>
                        </div>

@endsection
