@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
        <div class="col col-md-5 mx-auto">
          <h2 class="text-center  mb-5">タイムライン</h1>
        </div>
        @foreach($diaries as $diary)
          <div>
            <th>
              <td><a href="{{ route('diary.show', ['id' => $diary->id]) }}">{{ $diary->title }}</a></td>
              <td>{{ $diary->score_label }}</td>
              <td>{{ $diary->condition_label }}</td>
              <td>{{ $diary->size_label }}</td>
              <td>{{ $diary->body }}</td>
              <td><a href="{{ route('spot.show', [ 'id' => $diary->spot_id ]) }}">{{ $diary->getSpotName() }}</a></td>
              <div class="image col-md-8 mx-auto">
                @if ($diary->image_path != null)
                  <img src="{{ $diary->image_path }}" alt="" class="image-diary mx-auto">
                @else
                  <img src="{{ asset('images/nodiaryimage.jpg') }}" alt="" class="mx-auto">
                @endif
              </div>
            </th>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection