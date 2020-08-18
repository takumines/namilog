@extends('layouts.app')

@push('css')
  <link href="/css/userProfile.css" rel="stylesheet">
@endpush


@section('content')
  <div class="container">
    <div class="col col-md-8 mx-auto">
      <h2 class="text-center mb-3">プロフィール</h1>
    </div>
    <div class="row p-4 mb-3 bg-white rounded shadow-sm">
      <div class="col-md-5">
          <div class="text-center mx-auto">
            @if( $user->image_path != null )
              <img src="{{ $user->image_path }}" alt="" class="image-user rounded border border-info mx-auto">
            @else
              <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="rounded border border-info mx-auto">
            @endif
          </div>
      </div>
      <div class="col-md-7">
          <h2 class="text-center mt-3">{{ $user->name }}</h2>
          <h4 class="pb-2">スタンス：</span> {{ $user->stance_label }}</h4>
          <h4 class="pb-2">ボード：<span class="pl-4">{{ $user->board_label }}</span></h4>
          <div class="col">
            <h5 class="text-center mx-auto">自己紹介</h5>
            {{ $user->introduction }}
          </div>
      </div>
      @if($current_user->id == $user->id)
        <div class="col pt-3">
          <div class="text-center">
            <a class="btn btn-lg btn-primary"  href="{{ route('user.edit', [ 'id' => $user->id ]) }}" >編集</a>
          </div>
        </div>
      @endif
    </div>
    <div class="row align-items-start">
      <div class="col-md-3 mb-3 bg-white rounded shadow-sm">
        <div>
          <h2 class="text-center pt-2 pb-2">スポット</h2>
        </div>
          @foreach($spots as $spot)
            @if($spot->user_id == $user->id)
            <div class="my-3 pt-1 bg-light rounded shadow-sm">
              <h3 class="text-center"><a href="{{ route('spot.show', ['spot' => $spot->id]) }}">{{ $spot->name }}</a></h3>
            </div>
            @endif
          @endforeach
      </div>
      <div class="col-md-9 bg-white rounded shadow-sm">
        <div>
            <h2 class="text-center pt-2 pb-2">日記</h2>
        </div>
        <div class="row">
          @foreach($diaries as $diary)
            @if($diary->user_id == $user->id)
              <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                  @if ($diary->image_path != null)
                      <img src="{{ $diary->image_path }}" alt="" class="card-img-top">
                  @else
                      <img src="{{ asset('images/no-image.jpg') }}" alt="" class="card-img-top">
                  @endif
                  <div class="card-body bg-light">
                    <h4 class="card-title"><a href="{{ route('diary.show', ['id' => $diary->id]) }}">{{ $diary->title }}</a></h4>
                    <div class="card-text ">
                      <p>by <a href="{{ route('user.show', ['id' => $diary->user_id]) }}">{{ $diary->getUserName() }}</a></p>
                      <p class="float-right mb-0">{{ $diary->getFormattedCreatedAtAttribute() }}</p>
                      @if($diary->comments->count())
                        <span class="badge badge-primary">
                          コメント {{ $diary->comments->count() }}件
                        </span>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
        <div class="d-flex ">
          {{ $diaries->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection