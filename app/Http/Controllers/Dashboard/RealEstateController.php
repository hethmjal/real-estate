<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use App\Models\RealEstateImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Stevebauman\Location\Facades\Location;

class RealEstateController extends Controller
{
    public function index()
    {
        $reales = RealEstate::latest()->paginate(20);
        return view('admin.dashboard.reales.reales',['reales'=>$reales]);
    }

    public function add()
    {
        $categories = Category::get();

        return view('admin.dashboard.reales.create-real',['categories'=>$categories]);
    }

      public function store(Request $request)
    {
      //  dd($request->all());
        $request->validate([
            "title"=>'required',
            "category_id"=>"required",
            "city"=>"required",
            "address"=>"required",
            "phone"=>"required",

        ],[
            "title.required"=>"هذا الحقل مطلوب",
            "category_id.required"=>"الرجاء اختيار قسم",
            "city.required"=>"هذا الحقل مطلوب",
            "address.required"=>"هذا الحقل مطلوب",
            "phone.required"=>"هذا الحقل مطلوب",

        ]);

   //  $ip = $request->ip();
        $ip = '162.159.24.227'; /* Static IP address */

       $currentUserInfo = Location::get($ip);



        $slug = $this->slug_ar($request->title) ;

        $request->merge([
            'user_id'=> Auth::id(),
            'country'=>$currentUserInfo->countryName,
            'slug'=>$slug,
        ]);
        //dd($request->all());
     $real =   RealEstate::create($request->all());
     if($request->hasFile('images')){
     //    dd();
        foreach ($request->file('images') as $file) {
            $image_path=$file->store('/RealEstateImages',[
                'disk'=>'uploads'
            ]);
         //   dd( $image_path);
            $real->images()->create([
                'path'=>$image_path,
            'real_estate_id'=>$real->id,
        ]);


        }
    }

        return redirect()->route('dashboard.reales')->with('success','تمت اضافة العقار بنجاح');
    }




    public function edit($slug)
    {
        $real = RealEstate::where('slug',$slug)->first();
        $categories = Category::get();

        return view('admin.dashboard.reales.update-real',['real'=>$real,'categories'=>$categories]);
    }





    public function update(Request $request, $slug)
    {
      dd($request->all());
        $real = RealEstate::where('slug',$slug)->first();
        if($request->hasFile('images')){
            foreach ($request->file('images') as $file) {
                $image_path=$file->store('/RealEstateImages',[
                    'disk'=>'uploads'
                ]);
                $real->images()->create([
                    'path'=>$image_path,
                'real_estate_id'=>$real->id,
            ]);

            }
        }
        $request->validate([
            "title"=>'required',
            "category_id"=>"required",
            "city"=>"required",
            "address"=>"required",
            "phone"=>"required",
        ],[
            "title.required"=>"هذا الحقل مطلوب",
            "category_id.required"=>"الرجاء اختيار قسم",
            "city.required"=>"هذا الحقل مطلوب",
            "address.required"=>"هذا الحقل مطلوب",
            "phone.required"=>"هذا الحقل مطلوب",

        ]);
        if (!$request->kitchen) {
            $request->merge([
                'kitchen'=> null,
            ]);
        }
        if (!$request->elevator) {
            $request->merge([
                'elevator'=> null,
            ]);
        }
        if (!$request->car) {
            $request->merge([
                'car'=> null,
            ]);
        }
   //  $ip = $request->ip();
        $ip = '162.159.24.227'; /* Static IP address */

       $currentUserInfo = Location::get($ip);



        $slug = $this->slug_ar($request->title) ;

        $request->merge([
            'user_id'=> Auth::id(),
            'country'=>$currentUserInfo->countryName,
            'slug'=>$slug,
        ]);

        $real->update($request->all());

        return redirect()->route('dashboard.reales')->with('success','تم تعديل العقار بنجاح');

    }


    public function destroy($slug)
    {
        $real = RealEstate::where('slug',$slug)->first();
        foreach ($real->images as $image) {
            Storage::disk('uploads')->delete($image->path);
        }
        $real->delete();
        return redirect()->route('dashboard.reales')->with('success','تم حذف العقار بنجاح');

    }

    public function destroyImage(Request $request)
    {
        $image = RealEstateImage::findOrFail($request->id);

        // delete image from images folder
        Storage::disk('uploads')->delete($image->path);
        $image->delete();
        return $image;
    }





    function slug_ar($string, $separator = '-') {
        if (is_null($string)) {
            return "";

        }
     //   $r = RealEstate::count();

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return time().'-'.$string;
    }
}
