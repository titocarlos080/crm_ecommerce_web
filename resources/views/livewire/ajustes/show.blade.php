<div>
    <div class="card">
        <div class="card-body p-4">
            <h5 class="auth-title">CONFIGURAR PROVEEDOR DE PAGO STRIPE</h5>
            <div class="form-group mb-3">
                <label for="stripe_key">STRIPE_KEY:</label>
                <input class="form-control" wire:model='stripe_key'  name="stripe_key" type="text" id="stripe_key" placeholder="pk_test_51OCnXYBUTIElEVaateMFj5EfKojo1HtxF37K3kl0zAl20IbqWxX9i5x2SDTkxQp3zzKtYviJWbLN9e5Rv49r20ie00oyzpQZDh">
            </div>
            <div class="form-group mb-3">
                <label for="stripe_secret">STRIPE_SECRET:</label>
                <input class="form-control" wire:model='stripe_secret' name="stripe_secret" type="telefono" id="stripe_secret" placeholder="sk_test_51OCnXYBUTIElEVaabxuJlu2ddScyvMrfxa9JwRUj2dYQrKueP5nl3ET1OcDSzELF0La5BLDufk7yCgE93EW9F8l700fuu5sPUc">
            </div>
        </div>
        <div class="d-flex justify-content-center">

            <button wire:click="guardar" class="btn btn-success"> <i class="fa fa-save"></i> GUARDAR</button>
        </div>





    </div>
</div>

<script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('stripe-guardado', (comments) => {
                alert(comments)
            });
            Livewire.on('stripe-error', (comments) => {
                alert(comments)
            });
            


        })
    </script>
</div>