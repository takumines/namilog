@extends('layouts.app')
<style>
img{
  width: 50;
  height: 50;
}
</style>
@section('content')
<div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
        <div class="col col-md-5 mx-auto">
          <h2 class="text-center  mb-5">ユーザー一覧</h1>
        </div>
        @foreach($users as $user)
              <div class="image col-md-8 mx-auto">
                @if ($user->image_path != null)
                  <img src="{{ $user->image_path }}" alt="" class="image-user mx-auto">
                @else
                  <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="mx-auto">
                @endif
              </div>
              <a href="{{ route('user.show', ['id' => $user->id]) }}">{{ $user->name }}</a>
        @endforeach
      </div>
    </div>
  </div>
@endsection