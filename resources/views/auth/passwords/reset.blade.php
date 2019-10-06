@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center mb-5">パスワード再発行</h1>
        <div class="card">
          <div class="card-body m-2">
            <!-- エラー処理 -->
            @include('partials.errors.form_errors')
            <form action="{{ route('password.update') }}" method="POST">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <div class="form-group">
                <label for="email" class="col-md-6">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" >
              </div>
              <div class="form-group">
                <label for="password" class="col-md-6">新しいパスワード</label>
                <input type="password" class="form-control" id="password" name="password" >
              </div>
              <div class="form-group">
                <label for="password-confirm" class="col-md-6">新しいパスワード（確認）</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" >
              </div>
              <div class="text-center">
                <button class="btn btn-lg btn-primary" type="submit">送信</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection