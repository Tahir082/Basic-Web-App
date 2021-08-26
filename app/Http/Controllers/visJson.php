<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class visJson extends Controller
{
    public function visualize()
    {
      $path = storage_path()."/json/stock_market_data.json";
      $json = json_decode(file_get_contents($path), true);
      $collect= collect($json);
      $collection=$this->paginate($collect);
      return view('welcome', ['collections'=>$collection]);
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
