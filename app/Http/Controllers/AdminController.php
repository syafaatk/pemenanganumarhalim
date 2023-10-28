<?php
namespace App\Http\Controllers;
use Session;
use App\Matapilih;
use App\Koordinator;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

    // Dashboard
    public function dashboard()
    {
      $viewer = Matapilih::selectRaw('users.name, COUNT(*) as total')
        ->JOIN('users','users.id', '=', 'matapilihs.admin')
        ->groupBy("users.name")  
        ->get();
      $matapilih = Matapilih::latest()->get();
      $viewer2 = Matapilih::selectRaw('users.name, COUNT(*) as total')
        ->JOIN('users','users.id', '=', 'matapilihs.admin')
        ->groupBy("users.name")
        ->pluck('total')
        ->toJson();
      $kecamatan = Category::selectRaw('categories.name, COUNT(matapilihs.kecamatan) as total')
        ->leftJoin('matapilihs','categories.name', '=', 'matapilihs.kecamatan')
        ->whereNull('matapilihs.deleted_at')
        ->groupBy("categories.name");  
      $kecamatan_total = $kecamatan->pluck('total')->toJson();
      $kecamatan_nama = $kecamatan->pluck('categories.name')->toJson();
      //dd($kecamatan_nama);
      //dd($viewer2);
      return view('admin.dashboard')->with('matapilihs',$matapilih )
                                    ->with('category', Category::all())
                                    ->with('koordinators', Koordinator::all())
                                    ->with('viewer',$viewer)
                                    ->with('kecamatan_total',$kecamatan_total)
                                    ->with('kecamatan_nama',$kecamatan_nama);
                                    // ->with('viewer',json_encode($viewer_1,JSON_NUMERIC_CHECK));
    }

    // =============== Mata Pilih =============== //
    // Dashboard
    public function matapilih()
    {
      $matapilih = Matapilih::latest()->get();
      return view('admin.matapilih')->with('matapilihs',$matapilih )
                                    ->with('koordinators', Koordinator::all())
                                    ->with('tags', Tag::all());
    }

    // Mata Pilih Create
    public function matapilih_create()
    {
        return view('admin.create-matapilih')->with('koordinators', Koordinator::all());
    }

    // Mata Pilih Store
    public function matapilih_store(Request $request)
    {
      // dd($request);
      $request->validate(
        [
            'nik' => 'required'
        ],
        [
            'nik.required' => 'Unit tidak boleh kosong!'
        ]
    );
      $this->validate($request,[
        'nama'=>'required|max:255',
        'alamat'=>'required',
        'nik'=>'required|max:16|min:16',
        'koordinator'=>'required'
      ]);
      $cek = Matapilih::where('nik', $request->nik)->first();
      //dd($cek);
      if (!$cek) {
          $matapilih = Matapilih::create([
            'nama'=> $request->nama,
            'alamat'=> $request->alamat,
            'nik' => $request->nik,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'tps' => $request->tps,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'nohp' => $request->nohp,
            'admin' => $request->admin,
            'koordinator_id' => $request->koordinator,
          ]);
          $matapilih->tags()->attach($request->tag);
          Session::flash('success','Mata Pilih Successfully Created.');
          return back();
      } else {
        Session::flash('info','NIK sudah terdaftar, silahkan coba lagi');
        return back();
      }
    }
    public function matapilih_edit($id)
    {
      $matapilih = Matapilih::findOrFail($id);
      return view('admin.edit-matapilih')->with('matapilih',$matapilih)->with('koordinators', Koordinator::all());
    }

    // Matapilih Update
    public function matapilih_update(Request $request, $id)
    {
      $matapilih = Matapilih::findOrFail($id);

      $this->validate($request,[
        'nama'=>'required|max:255',
        'alamat'=>'required',
        'nik'=>'required|max:16|min:16'
      ]);

      $matapilih->nama = $request->nama;
      $matapilih->alamat= $request->alamat;
      $matapilih->nik = $request->nik;
      $matapilih->rt = $request->rt;
      $matapilih->rw = $request->rw;
      $matapilih->tps = $request->tps;
      $matapilih->jenis_kelamin = $request->jenis_kelamin;
      $matapilih->kecamatan = $request->kecamatan;
      $matapilih->kelurahan = $request->kelurahan;
      $matapilih->nohp = $request->nohp;
      $matapilih->admin = $request->admin;
      $matapilih->koordinator_id = $request->koordinator;
      // $matapilih->tags()->sync($request->tag);
      $matapilih->save();
      Session::flash('success','Matapilih has been updated!');
      return redirect()->route('admin.dashboard');
    }

    // Matapilih trash
    public function matapilih_trash($id)
    {
      $matapilih = Matapilih::findOrFail($id);
      $matapilih->delete();
      return back();
    }

    // Matapilih trashed
    public function matapilih_trashed()
    {
      $matapilihs = Matapilih::onlyTrashed()->latest()->get();
      return view('admin.matapilihtrash')->with('matapilihs', $matapilihs);
    }

    // Matapilih Force Delete
    public function matapilih_forcedelete($id)
    {
      $matapilih = Matapilih::withTrashed()->where('id',$id)->first();
      $matapilih->forcedelete();
      Session::flash('success','Matapilih has deleted!');

      return back();
    }

    // Matapilih restore
    public function matapilih_restore($id)
    {
      $matapilih = Matapilih::withTrashed()->where('id',$id)->first();
      $matapilih->restore();
      Session::flash('info','Matapilih has been Restore!');

      return back();
    }

    // ============== CATEGORY ============= //
    

    // ============== Tag ============= //
    //Tag View
    public function tag()
    {
      return view('admin.tag')->with('tag', Tag::latest()->get());
    }

    // Tag Create
    public function tag_create()
    {
      return view('admin.create-tag');
    }

    // Tsg Store
    public function tag_store(Request $request)
    {
      $this->validate($request,[
        'tag'=> 'required'
      ]);

      $tag = new Tag;
      $tag->tag = $request->tag;
      $tag->kelurahan = $request->kelurahan;
      $tag->kecamatan = $request->kecamatan;
      $tag->nohp = $request->nohp;
      $tag->save();

      Session::flash('success','Tag has created!');
      return back();
    }

    // Tag Edit
    public function tag_edit($id)
    {
      $tag = Tag::find($id);
      return view('admin.edit-tag')->with('tag',$tag);
    }

    // Tag Update
    public function tag_update(Request $request, $id)
    {
      $tag = Tag::findOrFail($id);
      $tag->tag = $request->tag;
      $tag->kelurahan = $request->kelurahan;
      $tag->kecamatan = $request->kecamatan;
      $tag->nohp = $request->nohp;
      $tag->save();
      Session::flash('success','Tag has been updated!');

      return redirect()->route('admin.tag');
    }

    // tag Delete
    public function tag_delete($id)
    {
      $tag = Tag::find($id);
      $tag->delete();
      Session::flash('success','Tag has deleted!');

      return back();
    }
}
