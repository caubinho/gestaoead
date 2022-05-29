@extends('admin.layouts.app')

@section('title', 'Home')

@section('content')
<h1 class="w-full text-3xl text-black pb-6">Dashboard</h1>

<div class="grid grid-cols-12 gap-6 mb-6">
    @include('admin.home._partials.statiscs', [
        'total' => $totalUsers,
        'icon' => 'fas fa-users',
        'text' => 'Total Usuários',
        'url' => route('users.index')
    ])

    @include('admin.home._partials.statiscs', [
        'total' => $totalAdmins,
        'icon' => 'fas fa-robot',
        'text' => 'Total Admins',
        'url' => route('admin.index')
    ])

    @include('admin.home._partials.statiscs', [
        'total' => $totalCourses,
        'icon' => 'fas fa-video',
        'text' => 'Total Cursos',
        'url' => route('courses.index')
    ])

    @include('admin.home._partials.statiscs', [
        'total' => $totalSupports,
        'icon' => 'fas fa-headset',
        'text' => 'Dúvidas Pendentes',
        'url' => '/dashboard/supports'
    ])

</div>
@endsection
