@extends('layouts.main')
@section('content')
<div class="container-fluid" style="text-align:center">
  <h1>SQL Model</h1><hr>
</div>
        <div class="container">
          <div class="row">
            <div class="col-md-5">
                <div class="row">
                  <h3>Line Chart</h3><hr>
                  <form class="form" action="{{route('search')}}" method="post">
                    @csrf
                    <select class="" name="search">
                      @foreach($tcs as $t)
                      <option value="{{$t['trade_code']}}">{{$t['trade_code']}}</option>
                      @endforeach
                    </select>
                    <input type="submit" name="search_submit" class="btn btn-success" value="Select">
                  </form>
                  <figure class="highcharts-figure">
                    <div id="container"></div>
                  </figure>
                  @php
                    if(isset($_POST['search_submit']))
                    {
                      $tr_cd= $_POST['search'];
                      echo "<h4><b>Trade Code:</b> ".$tr_cd." </h4>";
                    }
                  @endphp

                </div>
                <br><br>
                <h2>Add New Record</h2><hr>
                <div id="add_new">
                  <form class="form-group" action="{{route('create')}}" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <label for="date">Date</label><br>
                        <input type="date" name="date" required><br>
                      </div>
                      <div class="col-md-6">
                        <label for="tc">Trade Code</label><br>
                        <input type="text" name="tc" placeholder="Type trade code" required plac><br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="high">High</label><br>
                        <input type="text" name="high" placeholder="High" required><br>
                      </div>
                      <div class="col-md-6">
                        <label for="low">Low</label><br>
                        <input type="text" name="low" placeholder="Low" required><br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="open">Open</label><br>
                        <input type="text" name="open" placeholder="Open" required><br>
                      </div>
                      <div class="col-md-6">
                        <label for="close">Close </label><br>
                        <input type="text" name="close" placeholder="Close" required><br>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label for="volume">Volume </label><br>
                        <input type="text" name="volume" placeholder="Volume" required><br>
                      </div>
                      <div class="col-md-6">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Create">
                      </div>
                    </div>
                  </form>
                </div>
            </div>
            <div class="col-md-7">
              @if ($message = Session::get('success'))
                  <font color="Green"><b>{{ $message }}<b></font>
              @endif
              <p> <a href="#add_new"> <button type="button" name="button" class="btn btn-success"> Click here to add a new record</button> </a> </p>
              <table class="table" border="1">
                <tr>
                  <th>Date</th>
                  <th>Trade Code</th>
                  <th>High</th>
                  <th>Low</th>
                  <th>Open</th>
                  <th>Close</th>
                  <th>Volume</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
                @foreach($collection as $c)
                <tr>
                  <td>{{$c['date']}}</td>
                  <td>{{$c['trade_code']}}</td>
                  <td>{{$c['high']}}</td>
                  <td>{{$c['low']}}</td>
                  <td>{{$c['open']}}</td>
                  <td>{{$c['close']}}</td>
                  <td>{{$c['volume']}}</td>
                  <td>
                      <button type="button" class="btn btn-success dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-edit"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background:#30353B; width: 300px; padding-left:30px; color:#FFF">
                        <form class="" action="{{route('update', $c['id'])}}" method="post">
                          @csrf
                          <label for="date">Date</label>
                          <input type="date" name="date" value="{{$c['date']}}" required><br><br>
                          <label for="tc">Code</label>
                          <input type="text" name="tc" value="{{$c['trade_code']}}" required><br><br>
                          <label for="high">High</label>
                          <input type="text" name="high" value="{{$c['high']}}" required><br><br>
                          <label for="low">Low</label>
                          <input type="text" name="low" value="{{$c['low']}}" required><br><br>
                          <label for="open">Open</label>
                          <input type="text" name="open" value="{{$c['open']}}" required><br><br>
                          <label for="close">Close </label>
                          <input type="text" name="close" value="{{$c['close']}}" required><br><br>
                          <label for="volume">Volume </label>
                          <input type="text" name="volume" value="{{$c['volume']}}" required><br><br>
                          <input type="submit" class="btn btn-success" value="Update">
                        </form>
                      </ul>
                  </td>
                  <td> <a href="{{route('delete', $c['id'])}}"> <button class="btn btn-danger" ><i class="fa fa-trash"></i></button> </a> </td>
                </tr>
                @endforeach
              </table>
              <div class="row">
                  {{ $collection->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
          <br><br>
          <div class="row">
          </div>
        </div>


        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script type="text/javascript">
        Highcharts.chart('container', {
          title: {
            text: 'High and Low Points of selected Trade Code'
          },

          subtitle: {
            text: 'Source: SQL server'
          },

          yAxis: {
            title: {
              text: 'Points'
            }
          },

          xAxis: {
            accessibility: {
              rangeDescription: 'Range: 2020 to 2021'
            }
          },

          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
          },

          plotOptions: {
            series: {
              label: {
                connectorAllowed: false
              },
              pointStart: 0
            }
          },

          series: [{
            name: 'High',
            @php
            $data="";
            foreach($collection as $d)
            {
              $data .= $d['high'].",";
            }
            echo "data: [".$data."]";
            @endphp

          }, {
            name: 'Low',
            @php
            $data="";
            foreach($collection as $d)
            {
              $data .=$d['low'].",";
            }
            echo "data: [".$data."]";

            @endphp
          }],

          responsive: {
            rules: [{
              condition: {
                maxWidth: 500
              },
              chartOptions: {
                legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
                }
              }
            }]
          }

          });
        </script>

@endsection
