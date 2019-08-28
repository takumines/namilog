@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
        <h1 class="text-center mb-5">プロフィール編集</h1>
        <!-- エラー処理 -->
        @include('partials.errors.form_errors')
        <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- ユーザー名 -->
          <div class="form-group">
            <label class="col col-md-3" for="name">ユーザー名</label>
            <input class="form-control" type="text" name="name" value="{{ old('name', $user->name)}}">
          </div>
          <!-- スタンス -->
          <div class="form-group">
            <label class="col col-md-3" for="stance">スタンス</label>
            <select class="form-control" name="stance" id="stance">
              @foreach(config('stance') as $key => $stance)
                <option value="{{ $key }}"{{ $key == old('stance', $user->stance) ? 'selected' : '' }}>{{ $stance['label'] }}</option>
              @endforeach
            </select>
          </div>
          <!-- ボード -->
          <div class="form-group">
            <label class="col col-md-3" for="board">ボード</label>
            <select class="form-control" name="board" id="board">
              @foreach(config('board') as $key => $board)
                <option value="{{ $key }}"{{ $key == old('board', $user->board) ? 'selected' : '' }}>{{ $board['label'] }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="col col-md-3" for="iamge">画像</label>
            <div class="col-md-10">
              <input type="file" class="form-control-file" name="image">
              <div class="form-text form-info">
                @if($user->image_path != null)
                  設定中: {{ $user->image_path }}
                @else
                  設定中: なし
                @endif
              </div>
            </div>
          </div>
          <!-- 自己紹介 -->
          <div class="form-group">
            <label class="col col-md-3" for="introduction">自己紹介</label>
            <textarea class="form-control" name="introduction" cols="30" rows="10">{{ old('introduction', $user->introduction) }}</textarea>
          </div>
        </form>
        <div class="form-group">
        </div>
      </div>
    </div>
  </div>
@endsection