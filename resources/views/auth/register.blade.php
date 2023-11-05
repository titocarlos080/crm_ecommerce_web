< x-layouts.app>

    <div class="container mt-4 " style=" background-image: url(https://img.freepik.com/vector-premium/fondo-tecnologia-datos-digitales-alta-tecnologia_29971-1153.jpg);">
        <div class="row d-flex justify-content-center">


            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4 bg-soft-success rounded">

                        <div class="text-center w-75 m-auto">
                            <a href="/">
                                <!-- NOMBRE EMPRESA -->
                                <span>ECOMMERCE</span>
                            </a>
                        </div>

                        <h5 class="auth-title">PANEL DE REGISTO</h5>
                        <form action="/registrar" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_plan" value="{{$planId}}">
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre:</label>
                                <input class="form-control" name="nombre" type="text" id="nombre" placeholder="Ej. Evo Morales" autofocus>
                                <div class="form-group mb-1">
                                    <label for="foto">Foto:</label>
                                    <input class="form-control" name="foto" type="file" id="foto">

                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="telefono">Telefono:</label>
                                <input class="form-control" name="telefono" type="telefono" id="telefono" placeholder="">

                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Correo Electrónico:</label>
                                <input class="form-control" name="email" type="email" id="email" placeholder="evomorales@gmail.com">
                                @error('email')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="nombre_empresa">Nombre de la empresa:</label>
                                <input class="form-control" name="nombre_empresa" type="text" id="nombre_empresa" placeholder="MI EMPRESA" autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email_empresa">Correo Empresa:</label>
                                <input class="form-control" name="email_empresa" type="email" id="email_empresa" placeholder="Ej. admin@miempresa.com">
                                @error('email_empresa')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="descripcion_empresa">Descripcion de la Empresa:</label>
                                <input class="form-control" name="descripcion_empresa" type="text" id="descripcion_empresa" placeholder="Ej. empresa comercial">

                            </div>

                            <div class="form-group mb-1">
                                <label for="password">Contraseña:</label>
                                <div class="input-group">
                                    <input class="form-control" name="password" type="text" id="password" placeholder="Ingrese su contraseña">
                                    <div class="input-group-append">
                                        <button type="button" id="showPassword" class="btn btn-secondary">Mostrar</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <label for="logo">Logo:</label>
                                <input class="form-control" name="logo" type="file" id="logo">
                                <img id="imagePreview" src="" alt="Logo Preview" style="max-width: 100%; max-height: 200px; display: none">

                                <script>
                                    function previewImage(input) {
                                        var imagePreview = document.getElementById('imagePreview');
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                imagePreview.src = e.target.result;
                                                imagePreview.style.display = 'block';
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            imagePreview.src = '';
                                            imagePreview.style.display = 'none';
                                        }
                                    }
                                </script>
                            </div>


                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-dark btn-block" type="submit"> REGISTRAR </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>


    </div>


    </x-layouts.app>