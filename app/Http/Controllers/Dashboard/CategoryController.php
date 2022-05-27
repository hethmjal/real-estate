<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function manage_category()
    {
        $categories = Category::get();
        return view('admin.dashboard.manage-category',['categories'=>$categories]);
    }
    public function add()
    {
        return view('admin.dashboard.add-category');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category'=>'required'
        ]);
        $category = new Category();
        $category->category = $request->category;
        $category->slug =  $this->slug_ar($request->category) ;

        $category->save();
        return redirect()->route('category.manage')->with('success','تم اضافة القسم بنجاح');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.dashboard.update-category',['category'=>$category]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category'=>'required',

        ]);
        $slug = $this->slug_ar($request->title) ;

        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->slug =  $this->slug_ar($request->category) ;

        $category->save();
                 return redirect()->route('category.manage')->with('success','تم تعديل القسم بنجاح');
    }



    public function destroy($id)
    {
         Category::destroy($id);
        return redirect()->route('category.manage')->with('success','تم حذف القسم بنجاح');

    }














    function slug_ar($string, $separator = '-') {
        if (is_null($string)) {
            return "";

        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }
}
