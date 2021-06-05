<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\LanguageRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index(){
        $default_lang= getDefault_lang();

        $categories= Category::where('trans_lang',$default_lang)->select('id','name','trans_lang','image','active')->get();
        return view('admin.categories.index',compact('categories'));
    }



    public function create(){

        return view('admin.categories.create');
    }



    public function store(CategoryRequest $request){

try {
    DB::beginTransaction();

    $categories = collect($request->category);
    $filter = $categories->filter(function ($value, $key) {
        return $value['trans_lang'] == getDefault_lang();
    });

    $d_category = array_values($filter->all())[0];

    $file_path = "";
    if ($request->has('image')) {
        $file_path = upload_image('categories', $request->image);
    }

    $d_category_id = Category::insertGetId([
        'trans_lang' => $d_category['trans_lang'],
        'trans_of' => 0,
        'name' => $d_category['name'],
        'image' => $file_path,
        'slug' => $d_category['name'],
    ]);

    $sub_categories = $categories->filter(function ($value, $key) {
        return $value['trans_lang'] != getDefault_lang();
    });

    if (isset($sub_categories) && $sub_categories->count()) {
        $categories_arr = [];
        foreach ($sub_categories as $category) {
            $categories_arr[] = [
                'trans_lang' => $category['trans_lang'],
                'trans_of' => $d_category_id,
                'name' => $category['name'],
                'image' => $file_path,
                'slug' => $category['name'],
            ];
        }
        Category::insert($categories_arr);
    }

    DB::commit();
    return redirect()->route('admin.categories')->with(['success'=>'Category Added Successfully']);

}
catch (\Exception $ex){
    DB::rollBack();
    return redirect()->route('admin.categories')->with(['error'=>'Something went wrong try again']);
}
    }


    public function edit($id){

        $parent_cat = Category::with('categories')->find($id);

      if(!$parent_cat){
          return redirect()->route('admin.categories')->with(['error'=>'This Category dose not exist.']);
      }
      else{

       $trans_cat = Category::select()->where('trans_of',$parent_cat->id)->get();
          return view('admin.categories.edit',compact('parent_cat','trans_cat'));
      }

    }

    public function update($id,CategoryRequest $request)
    {

        try {
           $parent_cat = Category::find($id);
            $parent_cat_active='1';
            if (!$parent_cat) {
                return redirect()->route('admin.categories')->with(['error' => 'Error ..... Please try again ']);
            }else{


                $cat_arr = array_values($request->category)[0];

                if(!isset($cat_arr['active'])){
                   // $request->request->add(['active'=>0]);
                    $parent_cat_active='0';
                }

                ////// Save image if available
                $file_path = $parent_cat->image;
                if ($request->has('image')) {
                    $file_path = upload_image('categories', $request->image);
                }

                $parent_cat->where('id',$id)->update([
                    'name'=>$cat_arr['name'],
                    'active'=>$parent_cat_active,
                    'image'=>$file_path,
                ]);

                return redirect()->route('admin.categories')->with(['success'=>'Category updated Successfully']);
            }

        }catch (\Exception $ex){
            return redirect()->route('admin.categories')->with(['error' => 'Error ..... Please try again ']);
        }
        }

        public function companies_list($id){

            $category = Category::with('categories')->find($id);

            return view('cat_companies_list',compact('category'));

        }
}
