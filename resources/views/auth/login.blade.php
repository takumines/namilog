@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center mb-5">ログイン</h1>
        <div class="card"> 
          <div class="card-body m-2">
            <!-- エラー処理 -->
            @include('partials.errors.form_errors')
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group row">
                <label for="email">メールアドレス</label>
                <input  type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
              </div>
              <div class="form-group row">
                <label for="password">パスワード</label>
                <input  type="text" class="form-control" id="password" name="password">
              </div>
              <div class="form-check row">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" >
                <label for="remember" class="form-check-label">ログイン情報を記憶する</label>
              </div>
              <div class="form-group">
                <div class="text-center">
                  <button class="btn btn-lg btn-primary" type="submit">ログイン</button>
                </div>
              </div>
              <div class="text-center">
                ※<a href="{{ route('password.request') }}">パスワードを忘れた方</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection