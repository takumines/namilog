@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
        <div class="col col-md-5 mx-auto">
          <h2 class="text-center  mb-5">ユーザー一覧</h1>
        </div>
        @foreach($users as $user)
          <div>
            <th>
              <div class="image col-md-8 mx-auto">
                @if ($user->image_path != null)
                  <img src="{{ $user->image_path }}" alt="" class="image-diary mx-auto">
                @else
                  <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="mx-auto">
                @endif
              </div>
              <td><a href="{{ route('user.show', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
            </th>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection