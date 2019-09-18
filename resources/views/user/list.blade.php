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
        <div class="col col-md-8 mx-auto">
          <h2 class="text-center  mb-5">ユーザー一覧</h1>
        </div>
        @foreach($users as $user)
          <div class="my-3 p-3 bg-white rounded shadow-sm">
            <div class="float-left mr-3">
                @if ($user->image_path != null)
                  <img src="{{ $user->image_path }}" alt="" class="image-user rounded border border-info mx-auto">
                @else
                  <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="rounded border border-info mx-auto">
                @endif
            </div>
                <h3 class="mt-2"><a href="{{ route('user.show', ['id', $user->id]) }}">{{ $user->name }}</a></h3>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection