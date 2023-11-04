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
    $viewer2 = Koordinator::selectRaw('koordinators.keterangan, COUNT(*) as total')
        ->leftJoin('matapilihs','koordinators.id', '=', 'matapilihs.koordinator_id')
        ->groupBy("koordinators.keterangan")  
        ->get();
    //dd($viewer2);
    return view('admin.koordinator')->with('koordinators', Koordinator::latest()->get())
                                    ->with('viewer',$viewer)
                                    ->with('viewer2',$viewer2);
  }

  public function cetak(Request $request, $id)
  {
    $kelurahan= Matapilih::distinct()->where('koordinator_id','=',$id)->orderBy('kelurahan', 'DESC')->get(['kecamatan','kelurahan']);
    $data= Matapilih::where('koordinator_id','=',$id)->orderBy('kelurahan', 'DESC')->get();
    //dd($kelurahan);
    return view('admin.cetak-koordinator')->with('kelurahan', $kelurahan)
                                          ->with('data', $data)
                                          ->with('koordinator', Koordinator::findOrFail($id));
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
