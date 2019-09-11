@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
          <div class="text-center">
            @if( $user->image_path != null )
              <img src="{{ $user->image_path }}" alt="" class="image-user">
            @else
              <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="mx-auto">
            @endif
          </div>
          <h3 class="text-center">{{ $user->name }}</h3>
          <td>
            <tr>{{ $user->stance_label }}</tr>
            <tr>{{ $user->board_label }}</tr>
            <tr>{{ $user->introduction }}</tr>
          </td>
          
            @foreach($spots as $spot)
              @if($spot->user_id == $user->id)
                <h3><a href="{{ route('spot.show', ['id' => $spot->id]) }}">{{ $spot->name }}</a></h3>
              @endif
            @endforeach
          

          
            @foreach($diaries as $diary)
              @if($diary->user_id == $user->id)
                <h2><a href="{{ route('diary.show', ['id' => $diary->id]) }}">{{ $diary->title }}</a></h2>
              @endif
            @endforeach
          

          @if($user->id == $current_user->id)
            <div class="text-center">
              <a class="btn btn-lg btn-primary" href="{{ route('user.edit', ['id' => $user->id]) }}">編集</a>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection