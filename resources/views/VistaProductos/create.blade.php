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
        <div class="w-full lg:w-2/3 mx-auto my-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-6">Registro de Producto</h2>
                <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="categoria" class="text-gray-600 font-semibold text-sm">Categoría:</label>
                        <select name="categoria" id="categoria" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                            <option selected disabled>Elige una categoría</option>
                            @forelse ($categorias as $c)
                                <option value="{{ $c->id }}">{{ $c->categoria }}</option>
                            @empty
                                <option disabled>Registra una nueva categoría</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="nombre" class="text-gray-600 font-semibold text-sm">Nombre del producto:</label>
                        <input type="text" name="nombre" id="nombre" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="descripcion" class="text-gray-600 font-semibold text-sm">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500"></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="precio" class="text-gray-600 font-semibold text-sm">Precio:</label>
                        <input type="number" name="precio" id="precio" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="stock_min" class="text-gray-600 font-semibold text-sm">Stock Mínimo:</label>
                        <input type="number" name="stock_min" id="stock_min" required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="fotos" class="text-gray-600 font-semibold text-sm">Fotos:</label>
                        <input type="file" name="fotos[]" id="fotos" multiple required
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="video" class="text-gray-600 font-semibold text-sm">Video:</label>
                        <input type="file" name="video" id="video"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                    </div>
                    <div class="mb-6">
                        <label for="color" class="text-gray-600 font-semibold text-sm">Color:</label>
                        <select name="color" id="color"
                            class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                            <option selected disabled>Elige un color</option>
                            @forelse ($colores as $c)
                                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                            @empty
                                <option disabled>Registra un nuevo color</option>
                            @endforelse
                        </select>
                    </div>


                    <div class="mb-6">
                        <label for="es_3d" class="text-gray-600 font-semibold text-sm">Es 3D:</label>
                        <input type="checkbox" name="es_3d" id="es_3d" class="border border-gray-400 rounded-lg py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500" onclick="toggle3DFields()">
                    </div>
                    <div id="3dFields" style="display: none;">
                        
                        <div class="mb-6">
                            <label for="precio_3d" class="text-gray-600 font-semibold text-sm">Precio del modelo 3d:</label>
                            <input type="number" name="precio_3d" id="precio_3d" 
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mb-6">
                            <label for="archivo_3d" class="text-gray-600 font-semibold text-sm">Archivo 3D:</label>
                            <input type="file" name="archivo_3d" id="archivo_3d"
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mb-6">
                            <label for="zip_path" class="text-gray-600 font-semibold text-sm">Archivo ZIP:</label>
                            <input type="file" name="zip_path" id="zip_path"
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500">
                        </div>
                        <div class="mb-6">
                            <label for="descripcion_3d" class="text-gray-600 font-semibold text-sm">Descripción del archivo 3D:</label>
                            <textarea name="descripcion_3d" id="descripcion_3d"
                                class="border border-gray-400 rounded-lg w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500"></textarea>
                        </div>
                        <div class="mb-6">
                            <label for="es_formato_obj" class="text-gray-600 font-semibold text-sm">Es Formato Obj:</label>
                            <input type="checkbox" name="es_formato_obj" id="es_formato_obj" class="border border-gray-400 rounded-lg py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500" onclick="toggle3DFields()">
                        </div>
                        <div class="mb-6">
                            <label for="es_formato_gltf" class="text-gray-600 font-semibold text-sm">Es Formato GLTF:</label>
                            <input type="checkbox" name="es_formato_gltf" id="es_formato_gltf" class="border border-gray-400 rounded-lg py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500" onclick="toggle3DFields()">
                        </div>
                        <div class="mb-6">
                            <label for="es_formato_fbx" class="text-gray-600 font-semibold text-sm">Es Formato FBX:</label>
                            <input type="checkbox" name="es_formato_fbx" id="es_formato_fbx" class="border border-gray-400 rounded-lg py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500" onclick="toggle3DFields()">
                        </div>
                        <div class="mb-6">
                            <label for="es_formato_stl" class="text-gray-600 font-semibold text-sm">Es Formato STL:</label>
                            <input type="checkbox" name="es_formato_stl" id="es_formato_stl" class="border border-gray-400 rounded-lg py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-green-500" onclick="toggle3DFields()">
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full focus:outline-none focus:shadow-outline">Guardar</button>
                        <a href="{{ route('producto.index') }}"
                            class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-6 ml-4 rounded-full">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <script>

        
        function toggle3DFields() {
            var checkbox = document.getElementById('es_3d');
            var fields = document.getElementById('3dFields');
            fields.style.display = checkbox.checked ? 'block' : 'none';
        }

        
        
    </script>
@endsection
