<?php

namespace App\Http\Controllers;

use Flasher\Toastr\Prime\ToastrInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        return view('admin/category', [
            'categorys' => Category::all()
        ]);
    }

    public function add_category()
    {
        $category = new Category();

        $category->category = request()->category;

        $category->save();


        toastr()->success('Category create successfully!');

        return redirect('/category_list');
    }


    public function destroy_category(Category $category)
    {
        $category->delete();


        toastr()->success('Category delete successfully');

        return redirect('/category_list');
    }

    public function edit_category(Category $category)
    {
        
        return view('admin.edit_category', [
            'category' => $category
        ]);
    }

    public function update_category(Category $category)
    {
        $category->category = request('category');

        $category->update();

        toastr()->success('Category update successfully');

        return redirect('/category_list');
    }
}
