< x-layouts.app>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="/">
                                <!-- NOMBRE EMPRESA -->
                                <span>ECOMMERCE</span>
                            </a>
                        </div>

                        <h5 class="auth-title">Iniciar Sesión</h5>

                        <form action="/registrar" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre:</label>
                                <input class="form-control" name="nombre" type="text" id="nombre" value="{{ old('email') }}" placeholder="Nombre" autofocus>
                                @error('nombre')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Correo Electrónico:</label>
                                <input class="form-control" name="email" type="email" id="email" placeholder="Ingrese su correo electrónico">
                                @error('email')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Telefono:</label>
                                <input class="form-control" name="telefono" type="tel" id="tel">
                            </div>
                            <div class="form-group mb-1">
                                <label for="password">Contraseña:</label>
                                <input class="form-control" name="password" type="password" id="password" placeholder="Ingrese su contraseña">
                                @error('password')
                                <span class="error text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-1">
                                <label for="foto">Foto:</label>
                                <input class="form-control" name="foto" type="file" id="foto">

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