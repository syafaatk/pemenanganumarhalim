<?php

namespace App\Http\Controllers;

use Session;
use App\Tag;
use App\Koordinator;
use App\Matapilih;
use Illuminate\Http\Request;

class KoordinatorController extends Controller
{
  //Koordinator
  public function koordinator()
  {
    $viewer = Koordinator::selectRaw('koordinators.id, COUNT(matapilihs.id) as total')
        ->leftJoin('matapilihs','koordinators.id', '=', 'matapilihs.koordinator_id')
        ->whereNull('matapilihs.deleted_at')
        ->groupBy("koordinators.id")  
        ->get();
    //dd($viewer);
    return view('admin.koordinator')->with('koordinators', Koordinator::latest()->get())
                                    ->with('viewer',$viewer);
  }

  // Koodrinator Create
  public function koordinator_create()
  {
    return view('admin.create-koordinator');
  }

  // Koordinator Store
  public function koordinator_store(Request $request)
  {
    // dd($request->all());
    $this->validate($request,[
      'name'=> 'required'
    ]);

    $koordinator = new Koordinator;
    $koordinator->name = $request->name;
    $koordinator->keterangan = $request->keterangan;
    $koordinator->nohp = $request->nohp;
    $koordinator->save();

    Session::flash('success','Koordinator has created!');
    return back();
  }

  // Koordinator Edit
  public function koordinator_edit($id)
  {
    $koordinator = Koordinator::findOrFail($id);
    return view('admin.edit-koordinator')->with('koordinator',$koordinator);
  }

  // Koordinator Update
  public function koordinator_update(Request $request, $id)
  {
    $koordinator = Koordinator::findOrFail($id);
    $koordinator->name = $request->name;
    $koordinator->keterangan = $request->keterangan;
    $koordinator->nohp = $request->nohp;
    $koordinator->save();
    Session::flash('success','Koordinator has been updated!');

    return redirect()->route('admin.koordinator');
  }

  // Koordinator Delete
  public function koordinator_delete($id)
  {
    $koordinator = Koordinator::findOrFail($id);
    $koordinator->delete();
    Session::flash('success','Koordinator has deleted!');

    return back();
  }

  // ////End
}
