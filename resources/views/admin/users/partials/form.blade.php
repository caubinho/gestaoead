@include('admin.layouts.includes.alerts')
    @csrf

    <div class="my-4">
        <label class="block text-sm text-gray-600" for="name">Nome</label>
        <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Digite um Nome" aria-label="Name" value="{{ $user->name ?? old('name')}}">
    </div>
    <div class="my-4">
        <label class="block text-sm text-gray-600" for="email">Email</label>
        <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" placeholder="Digite um E-mail" aria-label="Email" value="{{ $user->email ?? old('email')}}">
    </div>

    <div class="my-4">
        <label class="block text-sm text-gray-600" for="name">Senha</label>
        <input class="px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="password" type="password" placeholder="Digite uma Senha" aria-label="Name">
    </div>

    <div class="mt-6">
        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Enviar</button>
    </div>

