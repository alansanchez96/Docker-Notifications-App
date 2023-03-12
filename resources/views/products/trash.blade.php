@extends('app')
@include('components.navbar')

<a href="{{ route('product.index') }}"
    class="bg-rose-500 hover:bg-rose-600 px-4 py-2 rounded-r-xl text-gray-100 font-bold">Regresar</a>
<h1 class="text-xl font-bold mt-10">FILTROS</h1>
<div class="flex items-center w-full justify-between my-5">
    <div class="flex items-center w-full justify-start gap-x-4">
        <select
            class="bg-transparent border border-gray-300 text-gray-900 sm:text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/4 px-4 py-2">
            <option disabled selected>Selecciona una categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="text" name="search" placeholder="Busca un producto por su nombre"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-transparent sm:text-xs focus:ring-blue-500 focus:border-blue-500">
        <div class="flex w-1/5 items-center gap-x-2 justify-end">
            <button
                class="px-4 w-full py-2 text-gray-100 bg-gray-600 shadow-md hover:bg-gray-900 rounded-xl font-bold">Search</button>
            <button
                class="px-4 w-full py-2 text-gray-100 bg-gray-600 shadow-md hover:bg-gray-900 rounded-xl font-bold">Reset</button>
        </div>
    </div>
</div>
<div class="relative overflow-x-auto pb-10">
    <table class="w-full text-sm text-left text-gray-500 shadow">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300">
            <tr>
                <th scope="col" class="px-6 py-3">
                    CATEGORY
                </th>
                <th scope="col" class="px-6 py-3">
                    NAME
                </th>
                <th scope="col" class="px-6 py-3">
                    DESCRIPTION
                </th>
                <th scope="col" class="px-6 text-center py-3">
                    ACTIONS
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $product->category->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->name }}
                    </td>
                    <td class="px-6 py-4 w-1/2">
                        {{ $product->description }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <form class="inline-block mx-auto" action="{{ route('product.restore', $product->id) }}"
                            method="post">
                            @csrf
                            @method('PATCH')
                            <button
                                class="px-4 py-2 bg-emerald-500 text-gray-100 rounded-xl font-bold hover:bg-emerald-600">Restaurar</button>
                        </form>
                        <form class="inline-block mx-auto" action="{{ route('product.forceDelete', $product->id) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button
                                class="px-4 py-2 bg-red-800 text-gray-100 rounded-xl font-bold hover:bg-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-right"><span class="font-bold">Nota:</span> Las acciones no tienen confirmacion.</p>
</div>
