@extends('dashboard')

@section('producto')
@if ($categorias->isEmpty())
    <div class="w-full lg:w-1/2 mx-auto mb-8">
        <div class="bg-red-100 border border-red-600 rounded-md p-4">
            <p class="text-red-600 text-lg font-semibold mb-4">
                <a href="{{ route('categoria.index') }}" class="text-black hover:underline">
                    Primero debe registrar una categoría
                </a>
            </p>
        </div>
    </div>
@else
    <div class="container mx-auto px-8 my-8">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Editar Producto</h2>
        <form action="{{ route('producto.update', $p->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 px-8 py-4 gap-4">
                <div class="col-span-2">
                    <div class="mb-6">
                        <label for="nombre" class="text-gray-600 font-semibold text-sm">Nombre del producto:</label>
                        <input type="text" name="nombre" id="nombre" required value="{{ $p->nombre }}"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="descripcion" class="text-gray-600 font-semibold text-sm">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">{{ $p->descripcion }}</textarea>
                    </div>
                    <div class="mb-6">
                        <label for="categoria" class="text-gray-600 font-semibold text-sm">Categoría:</label>
                        <select name="categoria" id="categoria" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                            <option selected disabled>Elige una categoría</option>
                            @foreach ($categorias as $c)
                                <option value="{{ $c->id }}" {{ $c->id == $p->categoria_id ? 'selected' : '' }}>{{ $c->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="color" class="text-gray-600 font-semibold text-sm">Material:</label>
                        <select name="color" id="color"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                            <option selected disabled>Elige un color</option>
                            @foreach ($color as $c)
                                <option value="{{ $c->id }}" {{ $c->id == $p->color_id ? 'selected' : '' }}>{{ $c->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="precio" class="text-gray-600 font-semibold text-sm">Precio: (BOB)</label>
                        <input type="number" name="precio" id="precio" required value="{{ $p->precio }}"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="stock_min" class="text-gray-600 font-semibold text-sm">Stock Mínimo:</label>
                        <input type="number" name="stock_min" id="stock_min" required value="{{ $p->stock_min }}"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
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
