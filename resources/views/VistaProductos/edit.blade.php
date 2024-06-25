@extends('dashboard')

@section('producto')
    @if ($categorias->isEmpty() || $marcas->isEmpty())
        <div class="w-full lg:w-1/2 mx-auto mb-4">
            <p class="my-8 text-red-600 bg-red-100 border border-red-600 rounded-md px-4 py-2 mb-4">
                @if ($categorias->isEmpty())
                    <a href="{{ route('categoria.create') }}" class="text-black hover:underline">
                        Primero debe registrar una categoría
                    </a>
                @else
                    <a href="{{ route('marca.index') }}" class="text-black hover:underline">
                        Primero debe registrar una marca
                    </a>
                @endif
            </p>
        </div>
    @else
        <div class="w-full lg:w-2/3 mx-auto my-4">
            <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Actualizar Producto</h2>
            <form action="{{ route('producto.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="categoria" class="text-gray-600 font-semibold text-sm">Categoría:</label>
                        <select name="categoria" id="categoria" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                            <option disabled>Elige una categoría</option>
                            @foreach ($categorias as $c)
                                <option value="{{ $c->id }}" {{ $p->categoria_id == $c->id ? 'selected' : '' }}>{{ $c->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="marca" class="text-gray-600 font-semibold text-sm">Marca:</label>
                        <select name="marca" id="marca" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                            <option disabled>Elige una marca</option>
                            @forelse ($marcas as $m)
                                <option value="{{ $m->id }}" {{ $p->marca_id == $m->id ? 'selected' : '' }}>{{ $m->nombre }}</option>
                            @empty
                                <option disabled>No hay marcas registradas</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <!-- Repite para cada foto, video y archivo 3D con opción para mantener o reemplazar -->
                <div class="grid grid-cols-2 gap-6">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="mt-6">
                            <label for="foto{{ $i }}" class="text-gray-600 font-semibold text-sm">Foto {{ $i }}:</label>
                            @if ($p->{'imagen' . $i})
                                <img src="{{ asset($p->{'imagen' . $i}) }}" alt="Imagen actual {{ $i }}" class="mb-2" width="150">
                            @endif
                            <input type="file" name="foto{{ $i }}" id="foto{{ $i }}"
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                    @endfor

                    <div class="mt-6">
                        <label for="video" class="text-gray-600 font-semibold text-sm">Video:</label>
                        @if ($p->video)
                            <video width="150" controls class="mb-2">
                                <source src="{{ asset($p->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                        <input type="file" name="video" id="video"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>

                    <div class="mt-6">
                        <label for="archivo_3d" class="text-gray-600 font-semibold text-sm">Archivo 3D:</label>
                        @if ($p->archivo_3d)
                            <a href="{{ asset($p->archivo_3d) }}" target="_blank">Ver Archivo Actual</a>
                        @endif
                        <input type="file" name="archivo_3d" id="archivo_3d"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                </div>

                <!-- Agrega campos adicionales como en la vista de creación -->
                <div class="mt-6">
                    <label for="nombre" class="text-gray-600 font-semibold text-sm">Nombre del producto:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $p->nombre }}" required
                        class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                </div>

                <div class="mt-6">
                    <label for="descripcion" class="text-gray-600 font-semibold text-sm">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required
                        class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">{{ $p->descripcion }}</textarea>
                </div>
                
                <div class="grid grid-cols-2 gap-6">
                    <div class="mt-6">
                        <label for="cant_min" class="text-gray-600 font-semibold text-sm">Stock Mínimo:</label>
                        <input type="number" name="cant_min" id="cant_min" value="{{ $p->stock_min }}" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mt-6">
                        <label for="precio" class="text-gray-600 font-semibold text-sm">Precio:</label>
                        <input type="number" name="precio" id="precio" value="{{ $p->precio }}" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full focus:outline-none focus:shadow-outline">Actualizar</button>
                    <a href="{{ route('producto.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-6 ml-4 rounded-full">Cancelar</a>
                </div>
            </form>
        </div>
    @endif
@endsection
