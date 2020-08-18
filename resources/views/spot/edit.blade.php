@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
          <h1 class="text-center mb-5">スポット編集</h1>
        <!-- エラー処理 -->
        @include('partials.errors.form_errors')
        <form action="{{ route('spot.edit', [ 'spot' => $spot->id ]) }}" method="post">
          @csrf
          <!-- スポット名フォーム -->
          <div class="form-group">
            <label class="col-md-3 mx-auto" for="name">スポット名</label>
            <input class="form-control" type="text" name="name" value="{{ old('name', $spot->name) }}">
          </div>
          <!-- 都道府県入力フォーム -->
          <div class="form-group">
            <label class="col-md-3 mx-auto" for="place">都道府県</label>
            <input class="form-control" type="text" name="place" value="{{ old('place', $spot->place) }}">
          </div>
          <!-- メモ入力エリア -->
          <div class="form-group">
            <label class="col-md-2 mx-auto" for="body">特長メモ</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ old('body', $spot->body) }}</textarea>
          </div>
          <!-- 送信ボタン -->
          <div class="form-group">
            <div class="text-center">
              <button class="btn btn-lg  btn-primary" type="submit">完了</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection