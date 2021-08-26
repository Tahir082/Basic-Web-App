@extends('layouts.main')
@section('content')
<div class="container">
  <br><br>
  <b> <h2>Data has been loaded into SQL Server Successfully!</h2> </b>
  <a href="{{route('sqlModel')}}">
    <button class="btn btn-success" name="button">Go to SQL Model</button>
  </a>
</div>
@endsection
