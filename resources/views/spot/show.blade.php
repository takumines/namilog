@extends('layouts.app')

@section('content')
    <div class="container ">
      <div class="row">
        <div class="col col-md-8 mx-auto ">
          <h1 class="text-center mb-5">スポット詳細</h1>
          <div class="p-4 mb-3 bg-white border border-Secondary rounded shadow-sm">
            <h4 class="text-center">スポット名</h4>
            <div class="mb-3 bg-light border border-dark rounded">
              <h3 class="mt-2 text-center">{{ $spot->name }}</h3>
            </div>
            <h4 class="text-center">都道府県</h4>
            <div class="mb-3 bg-light border border-dark rounded">
              <h3 class="mt-2 text-center">{{ $spot->place }}</h3>
            </div>
            <h4 class="text-center">メモ</h4>
            <div class="mb-3 bg-light border border-dark rounded">
              <p class="mt-2 text-center">{{ $spot->body }}</p>
            </div>
          </div>
            <div class="text-center">
              <a class="btn btn-lg btn-success" href="{{ route('diary.list') }}">戻る</a>
              @if($user->id == $spot->user_id)
                <a class="btn btn-lg btn-primary"  href="{{ route('spot.edit', [ 'spot' => $spot->id ]) }}" >編集</a>
              @endif
            </div>
        </div>
      </div>
    </div>
@endsection