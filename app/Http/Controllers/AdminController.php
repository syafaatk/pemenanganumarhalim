<?php
namespace App\Http\Controllers;
use Session;
use DataTables;
use App\Matapilih;
use App\Koordinator;
use App\Category;
use App\Counter;
use App\Tag;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function changePassword()
    {
      return view('admin.edit-password');
    }

    public function changePasswordSave(Request $request)
    {
        
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);
        $auth = Auth::user();
 
 // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) 
        {
            return back()->with('error', "Current Password is Invalid");
        }
 
// Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) 
        {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }
 
        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }


    // Dashboard
    public function dashboard()
    {
      $matapilih = Matapilih::latest()->get();
      $viewer2 = Matapilih::selectRaw('users.name, COUNT(*) as total')
        ->JOIN('users','users.id', '=', 'matapilihs.user_id')
        ->groupBy("users.name")
        ->pluck('total')
        ->toJson();
      $palembang = Category::selectRaw('categories.name, COUNT(matapilihs.kecamatan) as total')
        ->leftJoin('matapilihs','categories.name', '=', 'matapilihs.kecamatan')
        ->whereNull('matapilihs.deleted_at')
        ->where('categories.kabkota','=','PALEMBANG')
        ->groupBy("categories.name");  
      $banyuasin = Category::selectRaw('categories.name, COUNT(matapilihs.kecamatan) as total')
        ->leftJoin('matapilihs','categories.name', '=', 'matapilihs.kecamatan')
        ->whereNull('matapilihs.deleted_at')
        ->where('categories.kabkota','=','BANYUASIN')
        ->groupBy("categories.name");
      //dd($aktifitas_tanggal);
      $palembang_sum = Matapilih::where('kabupaten','=','KOTA PALEMBANG')->count();
      $banyuasin_sum = Matapilih::where('kabupaten','=','BANYUASIN')->count();
      $musibanyuasin_sum = Matapilih::where('kabupaten','=','MUSI BANYUASIN')->count();
      $lubuklinggau_sum = Matapilih::where('kabupaten','=','KOTA LUBUK LINGGAU')->count();

      $palembang_total = $palembang->pluck('total')->toJson();
      $palembang_nama = $palembang->pluck('categories.name')->toJson();
      $banyuasin_total = $banyuasin->pluck('total')->toJson();
      $banyuasin_nama = $banyuasin->pluck('categories.name')->toJson();
      //dd($palembang_sum);
      //dd($kecamatan_nama);
      //dd($viewer2);
      return view('admin.dashboard')->with('matapilihs',$matapilih )
                                    ->with('category', Category::all())
                                    ->with('koordinators', Koordinator::all())
                                    ->with('palembang_total',$palembang_total)
                                    ->with('palembang_nama',$palembang_nama)
                                    ->with('banyuasin_total',$banyuasin_total)
                                    ->with('banyuasin_nama',$banyuasin_nama)
                                    ->with('banyuasin_sum',$banyuasin_sum)
                                    ->with('musibanyuasin_sum',$musibanyuasin_sum)
                                    ->with('palembang_sum',$palembang_sum)
                                    ->with('lubuklinggau_sum',$lubuklinggau_sum);
                                    // ->with('viewer',json_encode($viewer_1,JSON_NUMERIC_CHECK));
    }

    public function dashboard_admin()
    {
      $viewer = Matapilih::selectRaw('users.name, COUNT(*) as total')
        ->JOIN('users','users.id', '=', 'matapilihs.user_id')
        ->groupBy("users.name") 
        ->where('users.is_active','=',1) 
        ->get();
      $viewer2 = Matapilih::selectRaw('users.name, COUNT(*) as total')
        ->JOIN('users','users.id', '=', 'matapilihs.user_id')
        ->groupBy("users.name")
        ->pluck('total')
        ->toJson();
      $nama = User::selectRaw('users.name, users.id')->where('users.is_active','=',1) 
        ->get();

      $users = User::where('is_active', 1)->pluck('name', 'id')->toArray();

      $aktifitas = Matapilih::selectRaw('DATE(created_at) as tanggal, ' . implode(', ', array_map(function ($userId, $userName) {
          return "COUNT(CASE WHEN user_id = $userId THEN 1 ELSE NULL END) AS $userName";
      }, array_keys($users), array_values($users))))
          ->groupBy('tanggal')
          ->orderBy('created_at', 'DESC')
          ->get();
          
      return view('admin.dashboard-admin')->with('aktifitas',$aktifitas )
                                    ->with('category', Category::all())
                                    ->with('koordinators', Koordinator::all())
                                    ->with('viewer',$viewer)
                                    ->with('nama',$nama);
                                    // ->with('viewer',json_encode($viewer_1,JSON_NUMERIC_CHECK));
    }

    public function dashboard_new()
    {
      $matapilih = Matapilih::latest()->get();
      $viewer2 = Matapilih::selectRaw('users.name, COUNT(*) as total')
        ->JOIN('users','users.id', '=', 'matapilihs.user_id')
        ->groupBy("users.name")
        ->pluck('total')
        ->toJson();
      $palembang = Category::selectRaw('categories.name, COUNT(matapilihs.kecamatan) as total')
        ->leftJoin('matapilihs','categories.name', '=', 'matapilihs.kecamatan')
        ->whereNull('matapilihs.deleted_at')
        ->where('categories.kabkota','=','PALEMBANG')
        ->groupBy("categories.name");  
      $banyuasin = Category::selectRaw('categories.name, COUNT(matapilihs.kecamatan) as total')
        ->leftJoin('matapilihs','categories.name', '=', 'matapilihs.kecamatan')
        ->whereNull('matapilihs.deleted_at')
        ->where('categories.kabkota','=','BANYUASIN')
        ->groupBy("categories.name");
      //dd($aktifitas_tanggal);
      $palembang_sum = Matapilih::where('kabupaten','=','KOTA PALEMBANG')->count();
      $banyuasin_sum = Matapilih::where('kabupaten','=','BANYUASIN')->count();
      $musibanyuasin_sum = Matapilih::where('kabupaten','=','MUSI BANYUASIN')->count();
      $lubuklinggau_sum = Matapilih::where('kabupaten','=','KOTA LUBUK LINGGAU')->count();

      $palembang_total = $palembang->pluck('total')->toJson();
      $palembang_nama = $palembang->pluck('categories.name')->toJson();
      $banyuasin_total = $banyuasin->pluck('total')->toJson();
      $banyuasin_nama = $banyuasin->pluck('categories.name')->toJson();
      //dd($palembang_sum);
      //dd($kecamatan_nama);
      //dd($viewer2);
      return view('admin.dashboard-new')->with('matapilihs',$matapilih )
                                    ->with('category', Category::all())
                                    ->with('koordinators', Koordinator::all())
                                    ->with('palembang_total',$palembang_total)
                                    ->with('palembang_nama',$palembang_nama)
                                    ->with('banyuasin_total',$banyuasin_total)
                                    ->with('banyuasin_nama',$banyuasin_nama)
                                    ->with('banyuasin_sum',$banyuasin_sum)
                                    ->with('musibanyuasin_sum',$musibanyuasin_sum)
                                    ->with('palembang_sum',$palembang_sum)
                                    ->with('lubuklinggau_sum',$lubuklinggau_sum);
                                    // ->with('viewer',json_encode($viewer_1,JSON_NUMERIC_CHECK));
    }

    // =============== Mata Pilih =============== //
    // Dashboard
    public function matapilih2()
    {
      $dataChunks = [];
      $matapilih = Matapilih::chunk(200, function ($dataChunk) use (&$dataChunks) {
          $dataChunks[] = $dataChunk;
      });
      //dd($matapilih);
      return view('admin.matapilih',['dataChunks' => $dataChunks])
      ->with('koordinators', Koordinator::all())
      ->with('tags', Tag::all());
    }
    //Category
    public function matapilih()
    {
      return view('admin.matapilih')->with('koordinators', Koordinator::all());
    }

    public function cetak()
    {
      return view('admin.cetak');
    }

    public function getMatapilih(Request $request)
    {
        if ($request->ajax()) {
            $data = Matapilih::selectRaw('matapilihs.*,lpad(matapilihs.tps,3,0)as tps_baru,users.name as nama_user,koordinators.name as nama_koordinator')
            ->leftJoin('koordinators','matapilihs.koordinator_id', '=', 'koordinators.id')
            ->leftJoin('users','matapilihs.user_id', '=', 'users.id')
            ->whereNull('matapilihs.deleted_at')
            ->latest()
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    // Mata Pilih Create
    public function matapilih_create()
    {
      $data = Koordinator::latest()->get();
      //dd($data);
      return view('admin.create-matapilih', ['koordinator' => $data]);
    }
    public function showNIK(Request $request)
    {
      $nik = Matapilih::all();
      
      if($request->keyword != ''){
        $nik = Matapilih::selectRaw('matapilihs.*,users.name as nama_user,koordinators.name as nama_koordinator')->JOIN('users','users.id', '=', 'matapilihs.user_id')->JOIN('koordinators','matapilihs.koordinator_id', '=', 'koordinators.id')->where('nik','=',$request->keyword)->get();
      }
      return response()->json([
        'nik' => $nik
      ]);
    }

    // Mata Pilih Create
    public function matapilih_create_manual()
    {
      $data = Koordinator::latest()->get();
      $kabupaten = Matapilih::select('kabupaten')->distinct()->get();
      $kecamatan = Matapilih::select('kabupaten','kecamatan')->distinct('kabupaten','kecamatan')->get();
      $kelurahan = Matapilih::select('kecamatan','kelurahan')->distinct('kecamatan','kelurahan')->get();

      //dd($kelurahan);
      return view('admin.create-matapilih-manual', ['koordinator' => $data , 'users' => User::latest()->get(), 'kabupaten' => $kabupaten, 'kecamatan' => $kecamatan, 'kelurahan' => $kelurahan]);
    }

    public function counter_success()
    {
      $auth = Auth::user();
      Counter::create([
          'user_id' => $auth->id,
          'status' => "1",
      ]);
    }

    public function counter_failed()
    {
      $auth = Auth::user();
      Counter::create([
          'user_id' => $auth->id,
          'status' => "0",
      ]);
    }

    // Mata Pilih Store
    public function matapilih_store(Request $request)
    {
      // dd($request);
      $request->validate(
        [
            'nik' => 'required|unique:matapilihs|max:16|min:16'
        ],
        [
            'nik.required' => 'NIK tidak boleh kosong!',
            'nik.unique' => 'NIK sudah didaftarkan!',
            'nik.max' => 'NIK tidak lebih dari 16 digit angka!',
            'nik.min' => 'NIK tidak kurang dari 16 digit angka!',
        ]
    );
      $this->validate($request,[
        'nama'=>'required|max:255',
        'alamat'=>'required',
        'nik'=>'required|unique:matapilihs|max:16|min:16',
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
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'nohp' => $request->nohp,
            'user_id' => $request->user_id,
            'koordinator_id' => $request->koordinator,
            'is_manual' => $request->is_manual
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
      return view('admin.edit-matapilih')->with('matapilih',$matapilih)->with('koordinators', Koordinator::all())->with('users',User::all());
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
      $matapilih->kabupaten = $request->kabupaten;
      $matapilih->kecamatan = $request->kecamatan;
      $matapilih->kelurahan = $request->kelurahan;
      $matapilih->nohp = $request->nohp;
      $matapilih->user_id = $request->user_id;
      $matapilih->koordinator_id = $request->koordinator;
      $matapilih->is_manual = $request->is_manual;
      // $matapilih->tags()->sync($request->tag);
      $matapilih->save();
      Session::flash('success','Matapilih has been updated!');
      return redirect()->route('admin.matapilih');
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

    public function deleteSelected(Request $request)
    {
        $selectedIds = $request->input('selectedIds');

        try {
            // Assuming your model is Matapilih
            Matapilih::whereIn('id', $selectedIds)->delete();

            return response()->json(['success' => true, 'message' => 'Selected rows deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting rows: ' . $e->getMessage()]);
        }
    }

    public function multipleDelete(Request $request)
    {
        $selectedIds = $request->input('selectedIds');

        try {
            // Assuming your model is Post
            Matapilih::whereIn('id', $selectedIds)->forceDelete();

            return response()->json(['success' => true, 'message' => 'Selected rows permanently deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error permanently deleting rows: ' . $e->getMessage()]);
        }
    }

    public function DeleteAll()
    {
        // Assuming you have a 'deleted_at' column in your table
        Matapilih::whereNotNull('deleted_at')->forcedelete();

        return response()->json(['success' => true, 'message' => 'All Rows deleted successfully']);
    }
}
