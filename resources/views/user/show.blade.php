@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        <th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->stance_label }}</td>
          <td>{{ $user->board_label }}</td>
          <td>{{ $user->introduction }}</td>
          <div>
            @if( $user->image_path != null )
              <img src="{{ $user->image_path }}" alt="" class="image-diary">
            @else
              <img src="{{ asset('images/nodiaryimage.jpg') }}" alt="" class="mx-auto">
            @endif
          </div>
        </th>
      </div>
    </div>
  </div>
@endsection