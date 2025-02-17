@extends('layouts.guest')

@section('content')
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <div class="col-sm-4 m-auto">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h5 class="h5 mb-3 fw-normal">Registrar</h5>
                    <div class="form-floating mb-2 ">
                        <input type="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput"
                            placeholder="name@example.com" value="{{ old('name') }}" name="name">
                        <label for="floatingInput">Nome</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2 ">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                            placeholder="name@example.com" value="{{ old('email') }}" name="email">
                        <label for="floatingInput">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2 ">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="floatingInput" placeholder="name@example.com" value="{{ old('password') }}" name="password">
                        <label for="floatingInput">Senha</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-2 ">
                        <input type="password" class="form-control " id="floatingInput" name="password_confirmation"
                            placeholder="name@example.com">
                        <label for="floatingInput">Confirmação de Senha</label>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-success w-100 py-2">
                            Registrar
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-outline-success w-100 py-2 mt-3">Já possui uma conta?
                            Entrar</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
