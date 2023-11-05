<x-layouts.app>
    <div class="container">
        <div class="row pt-4 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (!session('enviado'))
                    <div class="card-header">{{ __('Reset Password') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password_email') }}">
                            @csrf
                            <div class="row mb-3">

                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">

                                    <input id="email" type="email" class="form-control " name="email" required autocomplete="email" autofocus>

                                    @if(session('error_email'))
                                    <div class="alert alert-danger ">
                                        {{ session('error_email') }}
                                    </div>
                                    @endif


                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar email') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="alert alert-success" role="alert">

                        {{session('enviado')}}
                    </div>

                    <a href="{{route('login')}}" class="btn btn-success">
                        Cerrar
                    </a>


                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>