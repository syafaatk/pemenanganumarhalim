<?php

namespace App\Http\Controllers;

use Session;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
  //Category
  public function category()
  {
    return view('admin.category');
  }

  public function getCategories(Request $request)
  {
      if ($request->ajax()) {
          $data = Category::selectRaw('categories.id,categories.name,categories.kabkota, COUNT(matapilihs.kecamatan) as total')
          ->leftJoin('matapilihs','categories.name', '=', 'matapilihs.kecamatan')
          ->whereNull('matapilihs.deleted_at')
          ->groupBy("categories.id")
          ->groupBy("categories.name")
          ->groupBy("categories.kabkota")
          ->get();
          return Datatables::of($data)
              ->addIndexColumn()
              ->make(true);
      }
  }

  // Category Create
  public function category_create()
  {
    return view('admin.create-category');
  }

  // Category Store
  public function category_store(Request $request)
  {
    // dd($request->all());
    $this->validate($request,[
      'name'=> 'required'
    ]);

    $category = new Category;
    $category->kabkota = $request->kabkota;
    $category->name = $request->name;
    $category->save();

    Session::flash('success','Category has created!');
    return back();
  }

  // Category Edit
  public function category_edit($id)
  {
    $category = Category::findOrFail($id);
    return view('admin.edit-category')->with('category',$category);
  }

  // Category Update
  public function category_update(Request $request, $id)
  {
    $category = Category::findOrFail($id);
    $category->kabkota = $request->kabkota;
    $category->name = $request->name;
    $category->save();
    Session::flash('success','Kecamatan has been updated!');

    return redirect()->route('admin.category');
  }

  // Category Delete
  public function category_delete($id)
  {
    $category = Category::findOrFail($id);
    $category->delete();
    Session::flash('success','Category has deleted!');

    return back();
  }

  // ////End
}
