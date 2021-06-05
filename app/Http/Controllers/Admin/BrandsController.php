<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{

    public function index(){
        $default_lang= getDefault_lang();

        $brands= Brand::where('trans_lang',$default_lang)->select('id','name','trans_lang','image','active')->get();
        return view('admin.brands.index',compact('brands'));
    }

    public function create(){

        return view('admin.brands.create');
    }

    public function store(BrandRequest $request){

        try {
            DB::beginTransaction();

            $brands = collect($request->brand);
            $filter = $brands->filter(function ($value, $key) {
                return $value['trans_lang'] == getDefault_lang();
            });

            $d_brand = array_values($filter->all())[0];

            $file_path = "";
            if ($request->has('image')) {
                $file_path = upload_image('brands', $request->image);
            }

            $d_brand_id = Brand::insertGetId([
                'trans_lang' => $d_brand['trans_lang'],
                'trans_of' => 0,
                'name' => $d_brand['name'],
                'image' => $file_path,
                'slug' => $d_brand['name'],
            ]);

            $sub_brands = $brands->filter(function ($value, $key) {
                return $value['trans_lang'] != getDefault_lang();
            });

            if (isset($sub_brands) && $sub_brands->count()) {
                $brands_arr = [];
                foreach ($sub_brands as $brand) {
                    $brands_arr[] = [
                        'trans_lang' => $brand['trans_lang'],
                        'trans_of' => $d_brand_id,
                        'name' => $brand['name'],
                        'image' => $file_path,
                        'slug' => $brand['name'],
                    ];
                }
                Brand::insert($brands_arr);
            }

            DB::commit();
            return redirect()->route('admin.brands')->with(['success'=>'Brand Added Successfully']);

        }
        catch (\Exception $ex){
            DB::rollBack();
            return $ex;
            return redirect()->route('admin.brands')->with(['error'=>'Something went wrong try again']);
        }
    }

    public function edit($id){

        $parent_brand = Brand::with('brands')->find($id);

        if(!$parent_brand){
            return redirect()->route('admin.brands')->with(['error'=>'This Brand dose not exist.']);
        }
        else{

            $trans_brand = Brand::select()->where('trans_of',$parent_brand->id)->get();
            return view('admin.brands.edit',compact('parent_brand','trans_brand'));
        }

    }

    public function update($id,BrandRequest $request)
    {

        try {
            $parent_brand = Brand::find($id);
            $parent_brand_active='1';
            if (!$parent_brand) {
                return redirect()->route('admin.brands')->with(['error' => 'Error ..... Please try again ']);
            }else{


                $brand_arr = array_values($request->brand)[0];

                if(!isset($brand_arr['active'])){
                    // $request->request->add(['active'=>0]);
                    $parent_brand_active='0';
                }

                ////// Save image if available
                $file_path = $parent_brand->image;
                if ($request->has('image')) {
                    $file_path = upload_image('brands', $request->image);
                }

                $parent_brand->where('id',$id)->update([
                    'name'=>$brand_arr['name'],
                    'active'=>$parent_brand_active,
                    'image'=>$file_path,
                ]);

                return redirect()->route('admin.brands')->with(['success'=>'Brand updated Successfully']);
            }

        }catch (\Exception $ex){
            return $ex;
            return redirect()->route('admin.brands')->with(['error' => 'Error ..... Please try again ']);
        }
    }

    public function companies_list($id){

        $brand = Brand::with('brands')->find($id);

        return view('brand_companies_list',compact('brand'));

    }


}
