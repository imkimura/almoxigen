@extends('layouts.app')

@section('css')
<style>
    body {
        background-color: #001974;
    }
    input.form-control,
    button.btn-primary.btn {
        height: 42px;
    }
    button.btn-primary {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    .card-header.text-center {
        background: #eeeeeebd;
        font-size: 24px;
    }
    img.logo-login {
        width: 300px;
        height: auto;
        margin: 10px 0px 20px;
        justify-content: center;
    }
</style>
@endsection

@section('content')
<div class="container" style="margin-top: 130px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Restaurar Senha') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Endereço de E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar Link de Restaurar Senha') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
