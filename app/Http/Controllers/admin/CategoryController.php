<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::orderBy('created_at','DESC')->get();
        return view('admin.category.categories',compact('categories'));
    }
    public function create(){
        return view('admin.category.add');
    }

    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:255'
        ]);
        $category_name = $request->category_name;
        $category_slug = trim(strtolower(str_replace(' ','-',$category_name)));
        $user_id = Auth::id(); 
        try{
            Category::create([
                'category_name' => $category_name,
                'category_slug' => $category_slug,
                'added_by' => $user_id,
            ]);
            return redirect()->route('admin.add_category')->with('success','Category has been added successfully.');
        }catch(Exception $e){
            return redirect()->route('admin.add_category')->with('error','Error occured while adding.');
        }
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit',['category' => $category]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name' => 'required|string|max:255'
        ]);
        $category_name = $request->category_name;
        $category_slug = trim(strtolower(str_replace(' ','-',$category_name)));
        $user_id = Auth::id(); 
        try{
            $category = Category::findOrFail($id);
                $category->category_name = $category_name;
                $category->category_slug = $category_slug;
                $category->added_by = $user_id;
                $category->save();
            return redirect('/admin/categories')->with('success','Category has been updated successfully.');
        }catch(Exception $e){
            return redirect('/admin/categories')->with('error','Error occured while updating.');
        }

    }

    public function changeStatus($id){
        $category = Category::select('status')->where('id','=',$id)->first();

        if($category->status == 1){
            $status = '0';
           
        }else{
            $status = '1';
        }
        $values = array('status' => $status);
        Category::where('id',$id)->update($values);

        return redirect('/admin/categories')->with('success',"Status Changed");
    }

    public function destroy($id) {
        //
        $category = Category::findOrFail($id);
        try{
            $category->delete();
            return redirect('/admin/categories')->with('success',' Deleted');
        }catch(Exception $e){
            return redirect('/admin/categories')->with('error','Could not Deleted!');
        }
    }
}
