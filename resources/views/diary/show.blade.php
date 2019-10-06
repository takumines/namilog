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
            <img src="{{ asset('images/nodiaryimage.jpg') }}" alt="" class="rounded border border-info">
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
          <a class="btn btn-lg btn-primary"  href="{{ route('diary.edit', ['id' => $diary->id ]) }}" >編集</a>
          <form　class=”form-inline”  action="{{ route('diary.delete', ['id' => $diary->id]) }}" method="POST">
            {{ csrf_field() }}
            <input type="submit" value="削除" class="btn btn-danger btn-lg btn-dander" onClick="delete_alert(event);return false;">
          </form>
        </div>
      @endif
    </div>
  </div>
@endsection
