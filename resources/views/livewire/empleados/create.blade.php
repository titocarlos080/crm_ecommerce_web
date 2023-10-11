<div>


    <div class="col-md-3">
        <div class="form-group">
            <button type="button" wire:click="cancelar" wire:loading.attr="disabled" class="btn btn-danger waves-effect m-l-5">
                Cancelar
            </button>
            <label for="roles" class="control-label">Roles</label>

            <select class="form-control" wire:model="id_rol" name="rol" id="rol">
                <option value="">Seleccionar</option>
                @php
                $usuario = auth()->user(); // Obtener el usuario autenticado
                $empresa = $usuario->empresa; // Acceder a la propiedad "empresa" del usuario
                $rol = $usuario->rol; // Acceder a la propiedad "rol" del usuario
                @endphp

                @foreach ($roles as $rol)
                @if($rol->id > 2)
                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h5 class="auth-title">PANEL DE REGISTO</h5>
                <form>
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nombre">Nombre:</label>
                        <input class="form-control" wire:model='nombre' name="nombre" type="text" id="nombre" placeholder="Ej. Evo Morales" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label for="telefono">Telefono:</label>
                        <input class="form-control" wire:model='telefono' name="telefono" type="telefono" id="telefono" placeholder="">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Correo Electrónico:</label>
                        <input class="form-control" wire:model='email' name="email" type="email" id="email" placeholder="evomorales@gmail.com">
                        @error('email')
                        <span class="error text-danger">* {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="password">Contraseña:</label>
                        <div class="input-group">
                            <input class="form-control" wire:model='password' name="password" type="text" id="password" placeholder="Ingrese su contraseña">
                            <div class="input-group-append">
                                <button type="button" id="showPassword" class="btn btn-secondary">Mostrar</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-1">
                        <label for="foto">Foto:</label>
                        <input class="form-control" wire:model='foto' name="foto" type="file" id="foto">

                    </div>
                    <div class="form-group mb-0 text-center">
                        <button wire:click='guadarEmpleado' class="btn btn-dark btn-block" type="submit"> REGISTRAR </button>
                    </div>

                </form>


            </div>
        </div>


    </div>


</div>
</div>