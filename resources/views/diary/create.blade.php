@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
          <h2 class="text-center mb-5">日記作成</h2>
        <!-- エラー処理 -->
        @include('partials.errors.form_errors')
        <form action="{{ route('diary.create') }}" method="post" enctype="multipart/form-data">
          @csrf
          <!-- タイトル入力フォーム -->
          <div class="form-group">
            <label class="col col-md-3" for="title">タイトル</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}">
          </div>
          <!-- スポット選択フォーム -->
          <div class="form-group">
            <label class="col col-md-3" for="spot_id">スポット</label>
            <select class="form-control" name="spot_id" id="spot_id">
              @foreach($spots as $spot)
                <option value="{{ $spot->id }}">{{ $spot->name }}</option>
              @endforeach
            </select>
          </div>
          <!-- コンディション入力フォーム -->
          <div class="form-group">
            <label  class="col col-md-3" for="condition">コンディション</label>
            <select  class="form-control" id="condition" name="condition">
              @foreach(config('condition') as $key => $condition)
                <option value="{{ $key }}">{{ $condition['label'] }}</option>
              @endforeach
            </select>
          </div>
          <!-- 波のサイズ入力フォーム -->
          <div class="form-group">
            <label  class="col col-md-3" for="size">波のサイズ</label>
            <select  class="form-control" id="size" name="size">
              @foreach(config('size') as $key => $size)
                <option value="{{ $key }}">{{ $size['label'] }}</option>
              @endforeach
            </select>
          </div>
          <!-- 総合点数入力フォーム -->
          <div class="form-group">
            <label  class="col col-md-3" for="score">総合点数</label>
            <select  class="form-control" id="score" name="score">
              @foreach(config('score') as $key => $score)
                <option value="{{ $key }}">{{ $score['label'] }}</option>
              @endforeach
            </select>
          </div>
          <!-- 画像アップロードフォーム -->
          <div class="form-group">
            <label class="col col-md-3" for="image">画像</label>
            <div class="col-md-10">
              <input type="file" class="form-control-file" name="image">
            </div>
          </div>
          <!-- メモ入力フォーム -->
          <div class="form-group">
            <label class="col col-md-3" for="body">メモ</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
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