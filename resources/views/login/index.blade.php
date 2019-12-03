@extends('layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('storage/css/login/style.css') }}">
@endsection

@section('content')
    <div class="wrapper__background__img"></div>

    <div class="wrapper__login z-depth-5">
        <h1 class="wrapper__login__header">Agroinfo</h1>
        <form action="{{ route('login') }}" method="POST" class="login__wrapper__form">

            @error('incorrect')
                <div class="login__error" data-error="{{ $message }}"></div>
            @enderror

            <input style="display:none" type="text" name="fakeusernameremembered"/>
            <input style="display:none" type="password" name="fakepasswordremembered"/>

            @csrf
            <div class="input-field">
                <label for="fild__email">E-mail</label>
                <input type="email" id="fild__email" name="email" autocomplete="off" class="validate">
                <span class="helper-text" data-error="O e-mail digitado não é valido">@error ('email') {{ head($errors->all()) }} @enderror</span>
            </div>
            <div class="input-field">
                <label for="fild__senha">Senha</label>
                <input type="password" id="fild__senha" name="password" autocomplete="off">
                @error ('password')
                    <span class="helper-text" data-error="O e-mail digitado não é valido">{{ last($errors->all())  }}</span>
                @enderror
            </div>
            <div class="wrapper__login__button">
                <div>
                    <p>Não possue uma conta?</p>
                    <a href="{{ route('register')  }}">Faça seu cadastro</a>
                </div>
                <button class="btn waves-button-input">Entrar</button>
            </div>
        </form>
    </div>

@endsection

@section('script')
    <script src="{{ asset('storage/js/login/script.js') }}"></script>
@stop