<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Http\Requests\LanguageRequest;
use http\Env\Request;
use mysql_xdevapi\Exception;

class LanguagesController extends Controller
{
    public function index(){

      $languages= Language::select()->paginate(5);
        return view('admin.languages.index',compact('languages'));
    }

    public function create(){

        return view('admin.languages.create');
    }

    public function store(LanguageRequest $request){
        if(!$request->has('active')){ $request->request->add(['active'=>0]);}
        try{
            Language::create($request->except(['_token']));
            return redirect()->route('admin.languages')->with(['success'=>'Language saved Successfully ']);
        }catch (\Exception $ex){
            return redirect()->route('admin.languages')->with(['error'=>'Error ..... Please try again ']);
        }

    }

    public function edit($id){

        $language = Language::find($id);
        if(!$language){
            return redirect()->route('admin.languages')->with(['error'=>'Language not found maybe deleted by other ADMIN!']);
        }

        return view('admin.languages.edit',compact('language'));

    }

    public function update($id,LanguageRequest $request){

        try{
            $language = Language::find($id);

            if(!$language){
                return redirect()->route('admin.languages')->with(['error'=>'Error ..... Please try again ']);
            }
            if(!$request->has('active')){ $request->request->add(['active'=>0]);}
            $language->update($request->except(['_token']));
            return redirect()->route('admin.languages')->with(['success'=>'Language updated Successfully ']);
        }catch (\Exception $ex){
            return redirect()->route('admin.languages')->with(['error'=>'Error ..... Please try again ']);
        }

    }

    public function destroy($id){

        try{
            $language = Language::find($id);

            if(!$language){
                return redirect()->route('admin.languages')->with(['error'=>'Error ..... Please try again ']);
            }
            $language->delete();
            return redirect()->route('admin.languages')->with(['success'=>'Language Deleted Successfully ']);
        }catch (\Exception $ex){
            return redirect()->route('admin.languages')->with(['error'=>'Error ..... Please try again ']);
        }

    }
}
