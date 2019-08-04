@extends('layouts.app')

@section('content')
    <div class="container ">
      <div class="row">
        <div class="col col-md-8 mx-auto ">
            <h2 class="text-center mb-5">スポット詳細</h2>
            <div class="row box p-3 mb-5 ">
            <table class="table table-striped">
              <tbody class="text-center">
                <tr>
                  <td>スポット名</td>
                </tr>
                <tr>
                  <td>{{ $spot->name }}</td>
                </tr>
                <tr>
                  <td>都道府県</td>
                </tr>
                <tr>
                  <td>{{ $spot->place }}</td>
                </tr>
                <tr>
                  <td>メモ</td>
                </tr>
                <tr>
                  <td>{{ $spot->body }}</td>
                </tr>
              </tbody>
            </table>
            </div>
          <div class="text-center">
                <a class="btn btn-lg btn-primary"  href="{{ route('spot.edit', [ 'id' => $spot->id ]) }}" >編集</a>
          </div>
        </div>
      </div>
    </div>
@endsection