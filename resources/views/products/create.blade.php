@extends('app')
@include('components.navbar')

<form action="{{ route('product.store') }}" class="w-2/5 mx-auto my-10 pb-10" method="post">
    @csrf
    <h1 class="text-center text-gray-900 mx-auto font-bold text-3xl my-10">
        Crea un producto para testear las <span class="text-emerald-700">notificaciones</span> y <span
            class="text-emerald-700">eventos</span>.
    </h1>
    <div>
        @error('name')
            <p class="my-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
        @error('description')
            <p class="my-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="small-input" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Nombre del producto
        </label>
        <input type="text" id="small-input" name="name" placeholder="Escribe el nombre del producto"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-100 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div>

        <label for="message" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Descripcion del producto
        </label>
        <textarea id="message" rows="4" name="description"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escribe la descripcion del producto"></textarea>
    </div>
    <div>
        <button type="submit"
            class="text-white mt-10 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>
    </div>
</form>
