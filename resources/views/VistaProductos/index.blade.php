@extends('dashboard')

@section('producto')
    <div class="container mx-auto px-4 my-4">

        <div class="flex flex-col items-center sm:flex-row">
            <div class="mt-4 sm:ml-4">
                <a href="{{ route('categoria.index') }}"
                    class="bg-indigo-500 hover:bg-indigo-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                    Categorías
                </a>
            </div>
            <div class="mt-4 sm:ml-4">
                <a href="{{ route('producto.index') }}"
                    class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
            <div class="mt-4 sm:ml-4">
                <a href="{{ route('producto.index') }}" class="bg-orange-500 hover:bg-orange-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                    Productos
                </a>
            </div>
            <div class="mt-4 sm:ml-4">
                <a href="{{ route('color.index') }}"
                    class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                    Materiales
                </a>
            </div>
        </div>

        <br>
        <br>
        <div class="mt-4 sm:ml-4">
            <div class="mb-8 flex gap-4 items-center">
                <h2 class="text-2xl font-bold">Gestionar Producto</h2>
                <a href="{{ route('producto.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md mr-2">
                    Registrar
                </a>
            </div>
        </div>
        @foreach ($categorias as $categoria)
            <h2 class="text-xl font-bold text-gray-500 mt-8 mb-4 ml-4 uppercase">Categoria: {{ $categoria->categoria }}</h2>
            <!-- Contenedor de productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-8">
                @foreach ($categoria->productos as $producto)
                    <div class="bg-white p-4 shadow-md rounded-xl">
                        <div class="grid grid-cols-[2fr,2fr] gap-2">
                            <div class="flex flex-col items-center justify-center">
                                <img src="{{ asset('storage/' . $producto->imagen1) }}" alt="Foto del producto"
                                    class="w-24 h-24 mb-2">
                                <a href="{{ route('generarimagen', $producto->id) }}"
                                    class="bg-orange-500 text-white px-4 py-2 rounded-md ml-2">Image Gen</a>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-xl font-bold mb-2">{{ $producto->nombre }}</h2>
                                <p class="mb-2">Stock: {{ $producto->stock }}</p>
                                <p class="mb-2">{{  \Illuminate\Support\Str::limit($producto->descripcion, 15) }}</p>
                                <p class="text-2xl font-bold">{{ $producto->precio }} Bs.</p>
                                <div class="flex items-center justify-center gap-2 mt-4">
                                    <a href="{{ route('producto.edit', $producto->id) }}"
                                        class="bg-blue-500 flex hover:bg-blue-700 text-white rounded-full px-2 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            {{ svg('eva-edit') }}
                                        </svg>
                                        <p class="ml-2 mr-2">Editar</p>
                                    </a>

                                    <form action="{{ route('producto.destroy', $producto->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 flex hover:bg-red-700 text-white rounded-full px-2 py-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" stroke-width="1" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                {{ svg('eva-trash') }}
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
