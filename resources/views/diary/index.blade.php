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
              <td>{{ $diary->score }}</td>
              <td>{{ $diary->condition }}</td>
              <td>{{ $diary->size }}</td>
              <td>{{ $diary->body }}</td>
              <td>{{ $diary->getSpotName() }}</td>
            </th>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection