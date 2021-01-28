@extends('layouts.app')

@section('content')
<style>
.invalid-feedback-2 {
    display: block;
}
</style>
 <section class="registr shadow_bc">
    <form method="POST" action="{{ route('register') }}"  class="registr niked">
                        @csrf

                <a href="{{ url('/') }}" class="logo_reg">

                            <img src="/public/uploads/logo/logo.png">

                </a>

                <h1>Добро пожаловать</h1>
                <p> Зарегистрируйтесь на сайте с помощью номером телефона или E-mail или через социальную сеть </p>

                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" class="form-control tel_uz" required autocomplete="name" autofocus placeholder="+998xx-xx-xx-xx">
                    @error('name')
                        <span class="invalid-feedback-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group"> 
                    <input type="text" required name="email" class="form-control" value="" placeholder="Введите E-mail" />
                    @error('email')
                        <span class="invalid-feedback-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group"> 
                    <input type="password" required name="password" class="form-control" placeholder="Пароль" value="" /> 
                    @error('password')
                        <span class="invalid-feedback-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group ">

                    <div class="col-md-12" style="padding: 0;">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Подтвердите пароль" required autocomplete="new-password">
                    </div>
                </div>

                <div class="agree_ser"> 
                    <input type="checkbox" name="agree" id="ber" value="0" style="display: none" /> <label for="ber"> Я соглашаюсь с <a href="https://bisyor.uz/terms" target="_blank"> правилами использования сервиса </a> , а также с передачей и обработкой моих данных* </label> </div> <button type="submit" class="more_know blue"> Зарегистрироваться </button>
            </form>
            <div class="reg_bottom">
                <p>© 2018-2020 site - Все права защищены</p>
                <p> По вопросам: <a href="mailto:info@site.uz">info@site.uz</a> </p>
            </div>
        </section>



@endsection
