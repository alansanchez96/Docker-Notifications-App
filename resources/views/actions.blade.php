<div class="bg-stone-300 p-5 rounded-xl pb-10 my-10">
    <h1 class="text-3xl font-bold text-center my-6">
        Acciones de la app
    </h1>
    @auth
        <h3 class="text-xl text-center text-green-700 font-bold">Usuario: {{ auth()->user()->name }}</h3>
    @endauth
    @if (session('create'))
        @include('components.toast-success')
    @elseif (session('fail'))
        @include('components.toast-failed')
    @endif
    <ol>
        <li>
            <a class="text-center block mx-auto rounded-xl my-4 text-white py-4 px-6 w-3/4 hover:text-rose-500 bg-gray-900 font-bold"
                href="{{ route('mail.sends') }}">Envia una notificacion por email a los {{ count($users) }} usuarios</a>
        </li>
        <li>
            <a class="text-center block mx-auto rounded-xl my-4 text-white py-4 px-6 w-3/4 hover:text-rose-500 bg-gray-900 font-bold"
                href="{{ route('product.index') }}">Ir a la seccion de Productos</a>
        </li>
        <li>
            <a class="text-center block mx-auto rounded-xl my-4 text-white py-4 px-6 w-3/4 hover:text-rose-500 bg-gray-900 font-bold"
                href="{{ route('file.index') }}">Carga y descarga de Archivos (FileStorage)</a>
        </li>
    </ol>
</div>
