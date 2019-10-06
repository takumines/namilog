@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1 class="text-center mb-5">パスワード再発行</h1>
        <div class="card">
          <div class="card-body m-2">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <form action="{{ route('password.email') }}" method="POST">
              @csrf
              <div class="form-group row">
                <label for="email">メールアドレス</label>
                <input  type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
              </div>
              <div class="text-center">
                <button class="btn btn-lg btn-primary" type="submit">再発行リンクを送る</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection