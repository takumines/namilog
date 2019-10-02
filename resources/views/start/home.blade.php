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
                <input id="password" type="hidden" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="namitest" required>
                <button class="btn btn-lg btn-warning ">
                  <i class="fas fa-check"></i>{{ __('テストログイン') }}
                </button>
              </form>
            </div>
            <!--通常表示時　ボタン-->
            <div class="col mx-auto normal-btn">
                <a href="{{ route('login') }}" role='button' class='btn btn-lg btn-primary login'><i class="fas fa-key"></i> ログイン</a>
              @if (Route::has('register'))
                <a  href="{{ route('register') }}" role='button' class='btn btn-lg btn-success register'><i class="fas fa-user-plus"></i> 新規登録</a>
              @endif
            </div>
            @endguest
        </div>
      </div>      
    </div>
  </div>
@endsection