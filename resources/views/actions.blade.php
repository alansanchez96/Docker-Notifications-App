<div class="bg-gray-300 p-5 rounded my-10">
    <h1 class="text-3xl font-bold text-center my-6">
        Acciones de la app
    </h1>
    @if (session('create'))
        @include('components.toast-success')
    @elseif (session('fail'))
        @include('components.toast-failed')
    @endif
    <ol>
        <li>
            <a class="text-center block mx-auto rounded my-4 text-white py-2 w-3/6 bg-gray-800 hover:text-blue-400 hover:bg-gray-900 font-bold"
                href="{{ route('mail.sends') }}">Envia una notificacion por email a los {{ count($users) }} usuarios</a>
        </li>
        <li>
            <a class="text-center block mx-auto rounded my-4 text-white py-2 w-3/6 bg-gray-800 hover:text-blue-400 hover:bg-gray-900 font-bold"
                href="{{ route('product.create') }}">Crea un producto y notificalo a todos los usuarios</a>
        </li>
        <li>
            <a class="text-center block mx-auto rounded my-4 text-white py-2 w-3/6 bg-gray-800 hover:text-blue-400 hover:bg-gray-900 font-bold"
                href="{{ route('file.index') }}">Carga y descarga de Archivos (FileStorage)</a>
        </li>
    </ol>
</div>
