@extends('layouts.start')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">
              まずはお気に入りのスポットを登録しよう！
            </div>
            <div class="panel-body">
              <div class="text-center">
                <a href="{{ route('start.create') }}" class="btn btn-primary">
                  スポットを登録する
                </a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
@endsection