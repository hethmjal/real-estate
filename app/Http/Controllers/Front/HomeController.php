<?php

namespace App\Http\Controllers\Front;

use App\Models\RealEstate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    public function index()
    {
         // $ip = request()->ip();
         $ip = '162.159.24.227'; /* Static IP address */

         $currentUserInfo = Location::get($ip);

        $latest_reales = RealEstate::latest()->take(10)->get();
        $reales = RealEstate::where('country',$currentUserInfo->countryName)->latest()->paginate(12);

        return view('front.index',['latest_reales'=>$latest_reales,'reales'=>$reales]);
      }

      public function showReales($slug)
      {
       // $ip =  request()->ip();
         $ip = '162.159.24.227'; /* Static IP address */

         $currentUserInfo = Location::get($ip);
          $category = Category::where('slug',$slug)->first();
          $reales = RealEstate::where('category_id',$category->id)->where('country',$currentUserInfo->countryName)->latest()->paginate(12);
        //  return $category;

          return view('front.property-grid',['reales'=>$reales]);
        }

}
