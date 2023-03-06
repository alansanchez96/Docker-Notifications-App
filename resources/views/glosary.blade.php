<div class="bg-gray-300 p-5 rounded my-10">
    <h1 class="text-3xl font-bold text-center my-6">
        Glosario
        @include('components.notify')
    </h1>
    @if (session('create'))
        @include('components.toast-success')
    @elseif (session('fail'))
        @include('components.toast-failed')
    @endif
    <ol>
        <li>
            <a class="text-center block mx-auto rounded my-4 text-white py-2 w-3/6 bg-gray-800 hover:text-blue-400 hover:bg-gray-900 font-bold"
                href="{{ route('mail.sends') }}">Enviar Email de bienvenida a 50 usuarios con Queues</a>
        </li>
        <li>
            <a class="text-center block mx-auto rounded my-4 text-white py-2 w-3/6 bg-gray-800 hover:text-blue-400 hover:bg-gray-900 font-bold"
                href="{{ route('product.create') }}">Crear producto. Activara notificaciones y eventos con Queue</a>
        </li>
        <li>
            <a class="text-center block mx-auto rounded my-4 text-white py-2 w-3/6 bg-gray-800 hover:text-blue-400 hover:bg-gray-900 font-bold"
                href="{{ route('file.index') }}">Manipulacion de FileStorage</a>
        </li>
    </ol>
</div>
