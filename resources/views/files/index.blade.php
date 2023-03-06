@extends('app')
@include('components.navbar')

<form action="{{ route('uploadFile') }}" class="w-2/5 mx-auto my-10 pb-10" method="post" enctype="multipart/form-data">
    @csrf
    <h1 class="text-center text-gray-900 mx-auto font-bold text-3xl my-10">
        Manipulacion de archivos
    </h1>
    <div>
        @error('file')
            <p class="my-2 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex justify-between items-center">
        <input name="file"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
            aria-describedby="file_help" id="file" type="file">
        <button type="submit"
            class="text-white ml-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Subir</button>
    </div>
    <div>
        <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF, WEBP, PDF, RAR,
            ZIP, AVI, MPEG, WAV, CSV, XLS.</p>
    </div>
</form>

@include('files.table-files')
