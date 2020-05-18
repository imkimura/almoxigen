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
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 100px;">
            <div class="card">
                <div class="card-header text-center">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">


                            <div class="offset-md-2 col-md-8">
                                <i class="fas fa-user"></i> <label for="email" class="col-form-label"> Email</label>
                                <input placeholder="Insira seu email..." id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">


                            <div class="offset-md-2 col-md-8">
                                <i class="fas fa-key"></i> <label for="password" class="col-form-label">Senha</label>
                                <input placeholder="Insira sua senha..." id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="offset-md-3 col-md-6">
                                <button type="submit" class="btn btn-primary col-12">
                                   Entrar
                                </button>
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
