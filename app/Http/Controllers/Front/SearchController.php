<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->all());
        if ($request->category_id) {
            $reales = RealEstate::where('category_id',$request->category_id)
            ->where('title','LIKE','%'.$request->key.'%')
            ->orWhere('description','LIKE','%'.$request->key.'%')->paginate(9);
        } else {
            $reales = RealEstate::where('title','LIKE','%'.$request->key.'%')
            ->orWhere('description','LIKE','%'.$request->key.'%')->paginate(9);
        }


     //  dd($reales);
        return view('front.search',['reales'=>$reales]);
    }
}
