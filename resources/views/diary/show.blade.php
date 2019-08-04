@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row ">
      <div class="col col-md-10 mx-auto bg-primary">
        <h2 class="text-center mb-5">{{ $diary->title }}</h2>
      </div>
      <div class="col-lg-6  text-center bg-secondary">
        @if ($diary->image_path != null)
          <img src="{{ $diary->image_path }}" alt="" class="image-diary">
        @else
          <img src="{{ asset('images/nodiaryimage.jpg') }}" alt="" class="mx-auto">
        @endif
      </div>
      <div class="col-lg-6 bg-success">
        <a href="{{ route('spot.show', [ 'id' => $diary->spot_id ]) }}">{{ $diary->getSpotName() }}</a>
        <p>波のサイズ: {{ $diary->size_label }}</p>
        <p>コンディション: {{ $diary->condition_label }}</p>
        <p>総合点数: {{ $diary->score_label }}</p>
      </div>
    </div>
    <div class="row">
      <div class="col bg-danger">
          <p>{{ $diary->body }}</p>
      </div>
    </div>
    <div class="text-center">
      <a class="btn btn-lg btn-primary"  href="{{ route('diary.edit', [ 'id' => $diary->id ]) }}" >編集</a>
    </div>
  </div>
@endsection