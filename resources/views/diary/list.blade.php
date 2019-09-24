@extends('layouts.app')

@push('css')
  <link href="/css/diary.css" rel="stylesheet">
@endpush

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-10 mx-auto">
        <div class="col col-md-7 mx-auto">
          <h2 class="text-center mb-4">タイムライン</h1>
        </div>
        <div class="row">
          @foreach($diaries as $diary)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              @if ($diary->image_path != null)
                  <img src="{{ $diary->image_path }}" alt="" class="card-img-top">
              @else
                  <img src="{{ asset('images/nodiaryimage.jpg') }}" alt="" class="card-img-top">
              @endif
              <div class="card-body bg-light">
                <h4 class="card-title"><a href="{{ route('diary.show', ['id' => $diary->id]) }}">{{ $diary->title }}</a></h4>
                <div class="card-text ">
                  <p>by <a href="{{ route('user.show', ['id' => $diary->user_id]) }}">{{ $diary->getUserName() }}</a></p>
                  <p class="float-right mb-0">{{ $diary->getFormattedCreatedAtAttribute() }}</p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection