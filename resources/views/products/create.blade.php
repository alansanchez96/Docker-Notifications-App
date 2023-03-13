@extends('app')
@include('components.navbar')

<a href="{{ route('product.index') }}"
    class="bg-rose-500 hover:bg-rose-600 px-4 py-2 rounded-r-xl text-gray-100 font-bold">Regresar</a>

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
    <div class="flex justify-between items-center w-full gap-x-4">
        <div class="w-1/2">
            <label for="name" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Nombre del producto
            </label>
            <input type="text" id="name" name="name" placeholder="Escribe el nombre del producto"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-transparent sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="w-1/2">
            <label for="category" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Selecciona una categoria
            </label>
            <select id="category" name="category_id"
                class="bg-transparent border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 py-2">
                <option disabled selected>Selecciona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>

        <label for="message" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Descripcion del producto
        </label>
        <textarea id="message" rows="4" name="description"
            class="block p-2.5 w-full text-sm text-gray-900 bg-transparent rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Escribe la descripcion del producto"></textarea>
    </div>
    <div>
        <button type="submit"
            class="text-gray-100 mt-10 bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm w-full sm:w-auto px-6 py-2.5 text-center font-bold">Crear</button>
    </div>
</form>
