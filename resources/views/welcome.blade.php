@extends('layouts.main')
@section('content')
        <div class="container">
          <h1>JSON Model</h1>
        </div>
        <div class="container">
          <table class="table" border="1">
            <tr>
              <th>Date</th>
              <th>Trade Code</th>
              <th>High</th>
              <th>Low</th>
              <th>Open</th>
              <th>Close</th>
              <th>Volume</th>
            </tr>
            @foreach($collections as $c)
            <tr>
              <td>{{$c['date']}}</td>
              <td>{{$c['trade_code']}}</td>
              <td>{{$c['high']}}</td>
              <td>{{$c['low']}}</td>
              <td>{{$c['open']}}</td>
              <td>{{$c['close']}}</td>
              <td>{{$c['volume']}}</td>
            </tr>
            @endforeach
          </table>
          <div class="row">
            {{ $collections->links('pagination::bootstrap-4') }}
          </div>
        </div>
@endsection
