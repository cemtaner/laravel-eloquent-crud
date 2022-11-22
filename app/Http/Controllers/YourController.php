<?php

namespace App\Http\Controllers;
use App\Models\YourModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class YourController extends Controller
{

    public $module;
    public $service;

    public function index()
    {
        $items = YourModel::query()->get(); 
        return view('module.index', [  
            'module'=>$items, 
        ]); 
    }


    public function create()
    {
        return view('module.create');
    }

    public function store(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'name' => 'required|string',
            'detail' => 'required|string',
        ]);
        if($validate->fails()){
            return redirect()->route('module.index')->with('unsuccessful','Fill in all fields!');
        }
        YourModel::query()->create([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);
        return redirect()->route('module.index')->with('success','Registration Added!'); 
    }


    public function show(YourModel $module)  
    { 
        return view('module.show',compact('module'));  
    }

    public function edit(YourModel $module)
    {
        return view('module.edit',compact('module'));   
    }

    public function update(Request $request, $id)
    { 
        $validate=Validator::make($request->all(),[
            'name' => 'required|string',
            'detail' => 'required|string',
        ]);
        if($validate->fails()){
            return redirect()->route('module.index')->with('unsuccessful','Fill in all fields!');
        }
        YourModel::where('id',$id)->update([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);    
        return redirect()->route('module.index')->with('success','Registration Updated!');  
    }

    public function destroy($id)
    {
        YourModel::query()->where('id',$id)->delete();
        return redirect()->route('module.index')->with('unsuccessful','Record Deleted!'); 
    }
}