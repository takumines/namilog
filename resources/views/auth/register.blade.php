@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 ">
        <h1 class="text-center mb-5">ユーザー登録</h1>
        <div class="card">
          <div class="card-body m-2">
          <!-- エラー処理 -->
          @include('partials.errors.form_errors')
            <form action="{{ route('register') }}" method="POST">
            @csrf
              <div class="form-group row">
                <label for="name" class="col-md-6">ユーザー名</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
              </div>
              <div class="form-group row">
                <label for="email" class="col-md-6">メールアドレス</label>
                <input  type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
              </div>
              <div class="form-group row">
                <label for="password" class="col-md-6">パスワード</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group row">
                <label for="password-confirm" class="col-md-6">パスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>
              <div class="form-group row">
                <label for="phone_number" class="col-md-6">電話番号</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number">
              </div>
              <div class="form-group">
                <div class="text-center">
                  <button class="btn btn-lg btn-primary" type="submit">登録</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection