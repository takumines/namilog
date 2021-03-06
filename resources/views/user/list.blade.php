@extends('layouts.app')

@push('css')
  <link href="/css/userList.css" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
        <div class="col col-md-8 mx-auto">
          <h2 class="text-center  mb-5">ユーザー一覧</h2>
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
                <h3 class="mt-2"><a href="{{ route('user.show', ['user' => $user->id]) }}">{{ $user->name }}</a></h3>
          </div>
        @endforeach
        <div class="d-flex ">
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection