@extends('layouts.toppage')

@section('content')
  <div id="toppage">
    <div class="container">
      <div class="row text-center flex-center position-ref padding-original">
        <div class="col-md-12 pt-5 top-body">
          <h1 class="t-title">Nami Log</h1> 
          @guest
            <!--テストユーザー　ショートカットログイン用-->
            <div class="col pt-5 test-login">
              <form method='POST' action="{{ route('login') }}">
                @csrf
                <input id="email" type="hidden" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="testsurf@dummy" required autofocus>
                <input id="password" type="hidden" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="testtest" required>
                <button class="btn btn-lg btn-warning ">{{ __('テストログイン') }}</button>
              </form>
            </div>
            <!--通常表示時　ボタン-->
            <div class="col mx-auto normal-btn">
                <a href="{{ route('login') }}" role='button' class='btn btn-lg btn-primary login'>ログイン</a>
                <a  href="{{ route('register') }}" role='button' class='btn btn-lg btn-success register'>新規登録</a>
            </div>
            @endguest
        </div>
      </div>      
    </div>
  </div>
@endsection