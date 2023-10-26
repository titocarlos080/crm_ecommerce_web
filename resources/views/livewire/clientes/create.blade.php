<div>


    <div class="col-md-6">


        <div class="card">
            <div class="card-body p-4">
                <h5 class="auth-title">nUEVO CLIENTE</h5>

                <div class="form-group mb-3">
                    <label for="nombre">Nombre:</label>
                    <input class="form-control" wire:model='nombre' name="nombre" type="text">
                </div>
                <div class="form-group mb-3">
                    <label for="telefono">Telefono:</label>
                    <input class="form-control" wire:model='telefono' type="telefono">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Correo Electrónico:</label>
                    <input class="form-control" wire:model='email' type="email" id="email">

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
                    
                    <div class="form-group mb-1">
                        <label for="foto">Foto:</label>
                        <input class="btn" wire:model='foto' name="foto" type="file" id="foto">
                        @if($foto)
                        <img src="{{ $foto->temporaryUrl() }}" width="64" height="64" alt="" srcset="">
                         @endif
                    </div>
                </div>
                <div class="form-group mb-0 text-center">
                    <button wire:click='guardar' class="btn btn-dark "> REGISTRAR </button>

                    <button type="button" wire:click="cancelar" wire:loading.attr="disabled" class="btn btn-danger waves-effect m-l-5">
                        Cancelar
                    </button>


                </div>

            </div>


            @if($message_error)
            <span> {{$message_error}} </span>
            @endif

        </div>
    </div>


</div>


</div>
</div>