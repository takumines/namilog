@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-8 mx-auto">
        <div class="col col-md-5 mx-auto">
          <h2 class="text-center border-bottom mb-5">タイムライン</h2>
        </div>
        @foreach($diaries as $diary)
          <div>
            <th>
              <td>{{ $diary->title }}</td>
              <td>{{ $diary->score_label }}</td>
              <td>{{ $diary->condition_label }}</td>
              <td>{{ $diary->size_label }}</td>
              <td>{{ $diary->body }}</td>
              <td>{{ $diary->getSpotName() }}</td>
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