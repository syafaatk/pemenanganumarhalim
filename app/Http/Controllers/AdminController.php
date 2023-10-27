<?php
namespace App\Http\Controllers;
use Session;
use App\Post;
use App\Matapilih;
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
      $matapilih = Matapilih::latest()->get();
      return view('admin.dashboard')->with('matapilihs',$matapilih )
                                    ->with('category', Category::all())
                                    ->with('tags', Tag::all());
    }

    // =============== POST =============== //
    // Post Create
    public function post_create()
    {
      $categories = Category::all();
      if($categories->count() == 0)
      {
        Session::flash('info','You must have some Categories to create a post');
        return redirect()->back();
      }
      else
      {
        return view('admin.create-post')->with('tags', Tag::all())
                                        ->with('categories', Category::all());
      }
    }

    // =============== Mata Pilih =============== //
    // Dashboard
    public function matapilih()
    {
      $matapilih = Matapilih::latest()->get();
      return view('admin.matapilih')->with('matapilihs',$matapilih )
                                    ->with('tags', Tag::all());
    }

    // Mata Pilih Create
    public function matapilih_create()
    {
        return view('admin.create-matapilih')->with('tags', Tag::all());
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
        'nik'=>'required|max:16|min:16'
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
      return view('admin.edit-matapilih')->with('matapilih',$matapilih)->with('tags', Tag::all());
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
      $matapilih->tags = $request->koordinator;
      $matapilih->tags()->sync($request->tag);
      $matapilih->save();
      Session::flash('success','Matapilih has been updated!');
      return redirect()->route('admin.dashboard');
    }

    // Post Store
    public function post_store(Request $request)
    {
      // dd($request);
      $this->validate($request,[
        'title'=>'required|max:255',
        'image'=>'image',
        'category_id'=>'required',
        'content'=>'required'
      ]);

      if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('upload/post/',$image_new_name);

        $post = Post::create([
          'title'=> $request->title,
          'slug'=> str_slug($request->title),
          'image' => 'upload/post/' . $image_new_name,
          'category_id' => $request->category_id,
          'content' => $request->content
        ]);

        $post->tags()->attach($request->tag);

      }else{
        $post = Post::create([
          'title'=> $request->title,
          'slug'=> str_slug($request->title),
          'category_id' => $request->category_id,
          'content' => $request->content
        ]);

        $post->tags()->attach($request->tag);

      }

      Session::flash('success','Post Successfully Created.');
      return back();
    }

    // Post Edit
    public function post_edit($id)
    {
      $post = Post::findOrFail($id);
      return view('admin.edit-post')->with('post', $post)
                                    ->with('tags', Tag::all())
                                    ->with('categories', Category::all());
    }

    // Post Update
    public function post_update(Request $request, $id)
    {
      $post = Post::findOrFail($id);

      $this->validate($request,[
        'title'  => 'required|min:4|max:255',
        'category_id' => 'required',
        'content' => 'required'
      ]);

      if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('upload/post/',$image_new_name);

        $post->image = 'upload/post/' . $image_new_name;
      }

      $post->title = $request->title;
      $post->content = $request->content;
      $post->category_id = $request->category_id;
      $post->tags()->sync($request->tag);
      $post->save();

      Session::flash('success','Post has been updated!');
      return redirect()->route('admin.dashboard');
    }

    // Post trash
    public function post_trash($id)
    {
      $post = Post::findOrFail($id);
      $post->delete();
      return back();
    }

    // Post trashed
    public function post_trashed()
    {
      $posts = Post::onlyTrashed()->latest()->get();
      return view('admin.trash')->with('posts', $posts)->with('categories', Category::all());
    }

    // Post Force Delete
    public function post_forcedelete($id)
    {
      $post = Post::withTrashed()->where('id',$id)->first();
      $post->forcedelete();
      Session::flash('success','Post has deleted!');

      return back();
    }

    // Post restore
    public function post_restore($id)
    {
      $post = Post::withTrashed()->where('id',$id)->first();
      $post->restore();
      Session::flash('info','Post has been Restore!');

      return back();
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
