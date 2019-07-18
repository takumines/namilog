@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row ">
      <div class="col col-md-8 mx-auto ">
        <div class="col col-md-5 mx-auto">
          <h2 class="text-center border-bottom mb-5">スポット編集</h2>
        </div>
        <!-- エラー処理 -->
        @include('partials.errors.form_errors')
        <form action="{{ route('spot.edit', [ 'id' => $spot->id ]) }}" method="post">
          @csrf
          <!-- スポット名フォーム -->
          <div class="form-group row">
            <label class="col-md-3 mx-auto" for="name"><span class="badge badge-danger">必須</span>スポット名</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') ?? $spot->name }}">
          </div>
          <!-- 都道府県入力フォーム -->
          <div class="form-group row">
            <label class="col-md-3 mx-auto" for="place"><span class="badge badge-danger">必須</span>都道府県</label>
            <input class="form-control" type="text" name="place" value="{{ old('place') ?? $spot->place }}">
          </div>
          <!-- メモ入力エリア -->
          <div class="form-group row">
            <label class="col-md-2 mx-auto" for="body">特長メモ</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ old('body') ?? $spot->body }}</textarea>
          </div>
          <!-- 送信ボタン -->
          <div class="col-2 mx-auto">
            <button class="btn btn-lg btn-block btn-primary" type="submit">完了</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection