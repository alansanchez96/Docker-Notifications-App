@extends('app')
@include('components.navbar')

<form action="{{ route('register') }}" class="w-2/5 mx-auto my-10 pb-10" method="post">
    @csrf
    <h1 class="text-center text-gray-900 mx-auto font-bold text-3xl my-10">
        Registra tu cuenta
    </h1>
    <div>
        @error('name')
            <p class="my-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
        @error('email')
            <p class="my-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
        @error('password')
            <p class="my-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="name" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nombre
        </label>
        <input type="text" id="name" name="name" placeholder="Escribe tu nombre"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-100 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div>
        <label for="email" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Email
        </label>
        <input type="text" id="email" name="email" placeholder="Escribe tu email"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-100 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div>
        <label for="password" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Password
        </label>
        <input type="password" id="password" name="password" placeholder="Escribe tu contraseña"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-100 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="flex justify-between mt-10 w-100 items-end">
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Register
        </button>
        <a href="{{ route('register.view') }}" class="text-gray-900 text-left hover:text-blue-700">
            Si ya tienes una cuenta, entra aqui.
        </a>
    </div>
</form>
