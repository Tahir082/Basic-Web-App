<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sqlModel;

class SqlModelController extends Controller
{
  public function jsonToSql()
  {
    $path = storage_path()."/json/stock_market_data.json";
    $json = json_decode(file_get_contents($path), true);
    $collections = collect($json);
    foreach ($collections as $collection)
    {
      $sqmodel= new sqlModel;
      $sqmodel->date=$collection['date'];
      $sqmodel->trade_code=$collection['trade_code'];
      $sqmodel->high=$collection['high'];
      $sqmodel->low=$collection['low'];
      $sqmodel->open=$collection['open'];
      $sqmodel->close=$collection['close'];
      $sqmodel->volume=$collection['volume'];
      $sqmodel->save();
    }
    return view('jsonToSql');
  }

  public function create(Request $request)
  {
    $this->validate($request,[
      'date'=>'required',
      'tc'=>'required',
      'high'=>'required',
      'low'=>'required',
      'open'=>'required',
      'close'=>'required',
      'volume'=>'required',
    ]);
        $create= new sqlModel;
        $create->date=$request->get('date');
        $create->trade_code=$request->get('tc');
        $create->high=$request->get('high');
        $create->low=$request->get('low');
        $create->open=$request->get('open');
        $create->close=$request->get('close');
        $create->volume= $request->get('volume');
        $create->save();
    return redirect('sqlModel')->with('success', 'Record inserted successfully!');
  }

  public function read()
  {
    $collection = sqlModel::paginate(15);
    $trade_code="Select Code";
    $trade_codes= sqlModel::select('trade_code')->groupby('trade_code')->get();
    return view('sqlModel', ['collection'=>$collection], ['tcs'=>$trade_codes]);
  }

  public function search(Request $request)
  {
    $trade_code= $request->get('search');
    $collection= sqlModel::where('trade_code','=',$trade_code)->paginate(100);
    $trade_codes= sqlModel::select('trade_code')->groupby('trade_code')->get();
    return view('sqlModel', ['collection'=>$collection], ['tcs'=>$trade_codes]);
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'date'=>'required',
      'tc'=>'required',
      'high'=>'required',
      'low'=>'required',
      'open'=>'required',
      'close'=>'required',
      'volume'=>'required',
    ]);
    $update= sqlModel::find($id);
    $update->date=$request->get('date');
    $update->trade_code=$request->get('tc');
    $update->high=$request->get('high');
    $update->low=$request->get('low');
    $update->open=$request->get('open');
    $update->close=$request->get('close');
    $update->volume= $request->get('volume');
    $update->save();
    return redirect('sqlModel')->with('success', 'Updated successfully!');
  }

  public function delete(Request $request, $id)
  {
    $finder= sqlModel::find($id);
    $finder->delete();
    return redirect('sqlModel')->with('success', 'Record removal successful!');
  }





}
