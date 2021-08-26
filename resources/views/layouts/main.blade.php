<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Basic WebApp | TAHIR</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset('resources/css/font-awesome.min.css')}}">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .highcharts-figure, .highcharts-data-table table {
                min-width: 360px;
                max-width: 800px;
                margin: 1em auto;
              }

              .highcharts-data-table table {
              	font-family: Verdana, sans-serif;
              	border-collapse: collapse;
              	border: 1px solid #EBEBEB;
              	margin: 10px auto;
              	text-align: center;
              	width: 100%;
              	max-width: 500px;
              }
              .highcharts-data-table caption {
                padding: 1em 0;
                font-size: 1.2em;
                color: #555;
              }
              .highcharts-data-table th {
              	font-weight: 600;
                padding: 0.5em;
              }
              .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
                padding: 0.5em;
              }
              .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
                background: #f8f8f8;
              }
              .highcharts-data-table tr:hover {
                background: #f1f7ff;
              }
        </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <b><a class="navbar-brand" href="{{route('visualize')}}">Web App</a></b>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('visualize')}}"><b>JSON Model</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('sqlModel')}}"><b>SQL Model</b></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br>
      @yield('content')
      <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>
