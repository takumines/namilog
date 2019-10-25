@extends('layouts.app')

@push('css')
  <link href="/css/diaryShow.css" rel="stylesheet">
@endpush

@section('content')
  <div class="container">
    <div class="col col-md-8 mx-auto">
      <h1 class="text-center mb-3">{{ $diary->title }}</h1>
    </div>
    <div class="row p-4 mb-3 bg-white rounded shadow-sm">
      <div class="col-lg-6">
        <div class="text-center mx-auto">
          @if ($diary->image_path != null)
            <img src="{{ $diary->image_path }}" alt="" class="image-diary rounded border border-info ">
          @else
            <img src="{{ asset('images/no-image.jpg') }}" alt="" class="rounded border border-info">
          @endif
        </div>
      </div>
      <div class="col-lg-6 ">
        <h2 class="pt-4">スポット：
          <a href="{{ route('spot.show', [ 'id' => $diary->spot_id ]) }}" >{{ $diary->getSpotName() }}</a>
        </h2>
        <h2 class="pt-4">波のサイズ： {{ $diary->size_label }}</h2>
        <h2 class="pt-4">コンディション： {{ $diary->condition_label }}</h2>
        <h2 class="pt-4">総合点数： {{ $diary->score_label }}</h2>
      </div>
      <div class="col-12 pt-3">
          <div class="col-10 mx-auto">
            <h3 class="text-center">{{ $diary->body }}</h3>
          </div>
      </div>
      @if($diary->user_id == $current_user->id)
        <div class="col-12 pt-3 text-center">
          <a class="btn btn-lg btn-primary"  href="{{ route('diary.edit', ['id' => $diary->id ]) }}">編集</a>
          <form class="d-inline" action="{{ route('diary.delete', ['id' => $diary->id]) }}" method="POST">
            @csrf 
            <input type="submit" name="delete" value="削除" class=" btn btn-lg btn-danger" onClick="delete_alert(event);return false;">
          </form>
        </div>
      @endif
    </div>
    <!-- コメントフォーム -->
    <div class="col col-md-8 mx-auto">
      <h1 class="text-center mb-3">コメント</h1>
    </div>
    <div class="row p-4 mb-3 bg-white rounded shadow-sm">
      <div class="col col-md-10 mx-auto">
        @include('partials.errors.form_errors')
        <form action="{{ route('comment.create', ['id' => $diary->id]) }}" method="POST">
          @csrf
          <input type="hidden"  name="diary_id" value="{{ $diary->id }}">
          <div class=" form-group">
            <label class="col col-md-3" for="body"></label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="5">{{ old('body') }}</textarea>
          </div>
          <div class="form-group">
            <div class="text-center">
              <button class="btn btn-lg  btn-primary" type="submit">コメントする</button>
            </div>
          </div>
        </form>
      </div>
      <!-- コメント一覧 -->
      @foreach($comments as $comment)
          <div class="col-10 mx-auto comment-list p-4 mb-3 bg-white rounded shadow-sm">
            <div class="d-block">
              <p>{{ $comment->body }}</p>
            </div>
            <div class="comment-item">
              @if($comment->user_id == $current_user->id)
                <a href="{{ route('comment.delete', ['id' => $comment->id]) }}"
                  onclick="event.preventDefault();document.getElementById('delete').submit();" class="float-right mb-0 ml-2">削除</a>
                <form id="delete" action="{{ route('comment.delete', ['id' => $comment->id]) }}" method="POST" style="display: none;">
                  @csrf
                </form>
              @endif
              <a href="{{ route('user.show', [ 'id' => $comment->user_id ]) }}">
                <p class="float-right mb-0 ml-2">{{ $comment->getCommentUserName() }}</p>
              </a>
              <p class="float-right mb-0">{{ $diary->getFormattedCreatedAtAttribute() }}</p>
            </div>
          </div>
      @endforeach
      <div class="d-flex">
        {{ $comments->links() }}
      </div>
    </div>
  </div>
@endsection