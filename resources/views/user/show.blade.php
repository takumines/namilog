@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
          <div class="text-center">
            @if( $user->image_path != null )
              <img src="{{ $user->image_path }}" alt="" class="image-diary">
            @else
              <img src="{{ asset('images/nodiaryimage.jpg') }}" alt="" class="mx-auto">
            @endif
          </div>
          <h3 class="text-center">{{ $user->name }}</h3>
          <td>
            <tr>{{ $user->stance_label }}</tr>
            <tr>{{ $user->board_label }}</tr>
            <tr>{{ $user->introduction }}</tr>
          </td>
          <div class="text-center">
            <a class="btn btn-lg btn-primary" href="{{ route('user.edit', ['id' => $user->id]) }}">編集</a>
          </div>
        </th>
      </div>
    </div>
  </div>
@endsection