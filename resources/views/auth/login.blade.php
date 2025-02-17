@extends('layouts.guest')

@section('content')
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <div class="col-sm-4 m-auto">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h5 class="h5 mb-3 fw-normal">Acessar</h5>
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
                        <input type="password" class="form-control " id="floatingPassword" placeholder="Password"
                            name="password">
                        <label for="floatingPassword">Senha</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="">
                        <button class="btn btn-success w-100 py-2" type="submit">Entrar</button>
                        <a href="{{ route('register') }}" class="btn btn-outline-success w-100 py-2 mt-3">Ainda não possu
                            uma conta? Registre-se</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
