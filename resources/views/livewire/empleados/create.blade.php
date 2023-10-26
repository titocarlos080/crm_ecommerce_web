<div>


    <div class="col-md-6">
        <div class="form-group">
            <button type="button" wire:click="cancelar" wire:loading.attr="disabled" class="btn btn-danger waves-effect m-l-5">
                Cancelar
            </button>
            

        <div class="card">
            <div class="card-body p-4">
                <h5 class="auth-title">NUEVO COLABORADOR REGISTO</h5>
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
                        <input class="btn" wire:model='foto' name="foto" type="file" id="foto">
                        @if($foto)
                        <img src="{{ $foto->temporaryUrl() }}" width="64" height="64" alt="" srcset="">
                         @endif
                    </div>
                     
                    <div class="form-group mb-0 text-center">

                        <button wire:click='cancelar' class="btn btn-danger " wire:loading.attr="disabled" wire:target="foto" type="submit"> cancelar </button>

                        <button wire:click='guadarEmpleado' class="btn btn-dark  " wire:loading.attr="disabled" wire:target="foto" type="submit"> REGISTRAR </button>
                    </div>

                </form>


            </div>
        </div>


    </div>


</div>
</div>