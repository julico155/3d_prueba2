@extends('dashboard')

@section('producto')
    <div class="container mx-auto px-4 my-4">
        <div class="bg-white p-8 rounded-lg shadow-md w-full sm:w-1/2 mx-auto">
            <h2 class="text-2xl font-bold mb-4">Generar Imagen con IA</h2>
            <form id="iaForm" action="{{ route('generarImagenIA') }}" method="POST">
                @csrf
                <input type="hidden" name="producto_id" id="producto_id" value="{{ $producto->id }}">
                <div class="mb-4">
                    <label for="prompt" class="block text-gray-700 text-sm font-bold mb-2">Prompt:</label>
                    <input type="text" name="prompt" id="prompt" value="Parque con vista al lago" 
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Generar Imagen
                    </button>
                    <a href="{{ route('producto.index') }}" class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancelar
                    </a>
                </div>
            </form>
            <div id="loadingSpinner" class="mt-4 flex justify-center items-center" style="display: none;">
                <div class="windows-spinner">
                    <div class="spinner-circle"></div>
                    <div class="spinner-circle"></div>
                    <div class="spinner-circle"></div>
                    <div class="spinner-circle"></div>
                    <div class="spinner-circle"></div>
                    <div class="spinner-circle"></div>
                    <div class="spinner-circle"></div>
                    <div class="spinner-circle"></div>
                </div>
            </div>
            <div class="mt-8">
                <h2 class="text-xl font-bold mb-4">Imagen Generada</h2>
                <canvas id="imageCanvas" class="border rounded-lg"></canvas>
            </div>
            <div class="mt-4">
                <form id="saveImageForm" action="{{ route('guardarImagenIA') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="producto_id" id="save_producto_id" value="{{ $producto->id }}">
                    <input type="hidden" name="image_url" id="image_url">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Guardar Imagen
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .windows-spinner {
            width: 50px;
            height: 50px;
            position: relative;
        }

        .spinner-circle {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            background-color: transparent;
            border: 4px solid #3498db;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 1.2s linear infinite;
        }

        .spinner-circle:nth-child(1) {
            animation-delay: -1.1s;
        }

        .spinner-circle:nth-child(2) {
            animation-delay: -1.0s;
        }

        .spinner-circle:nth-child(3) {
            animation-delay: -0.9s;
        }

        .spinner-circle:nth-child(4) {
            animation-delay: -0.8s;
        }

        .spinner-circle:nth-child(5) {
            animation-delay: -0.7s;
        }

        .spinner-circle:nth-child(6) {
            animation-delay: -0.6s;
        }

        .spinner-circle:nth-child(7) {
            animation-delay: -0.5s;
        }

        .spinner-circle:nth-child(8) {
            animation-delay: -0.4s;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <script>
        document.getElementById('iaForm').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('loadingSpinner').style.display = 'flex';
            const prompt = document.getElementById('prompt').value;
            const producto_id = document.getElementById('producto_id').value;

            fetch('{{ route("generarImagenIA") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ prompt, producto_id })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('loadingSpinner').style.display = 'none';
                if (data.success) {
                    const canvas = document.getElementById('imageCanvas');
                    const ctx = canvas.getContext('2d');
                    const img = new Image();
                    img.onload = function() {
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0);
                        document.getElementById('saveImageForm').style.display = 'block';
                        document.getElementById('image_url').value = data.image_url;
                    };
                    img.src = data.image_url;
                } else {
                    alert('Error generando la imagen con IA: ' + data.message);
                }
            })
            .catch(error => {
                document.getElementById('loadingSpinner').style.display = 'none';
                console.error('Error:', error);
                alert('Error generando la imagen con IA.');
            });
        });
    </script>
@endsection
