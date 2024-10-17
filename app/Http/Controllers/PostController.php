<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Post;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $posts = Post::where('name','LIKE','%'.$request->search.'%')
        ->orderBy('name', 'ASC',)->simplePaginate(5);
        //get posts
        // $posts = Post::latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:2',
            'nis'   => 'required|min:8',
            'absen' => 'required',

        ]);

        //create post
        Post::create([
            'name'     => $request->name,
            'nis'     => $request->nis,
            'absen'   => $request->absen,
        ]);

        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show(string $id)
    {
        //get post by ID
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

     /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit(string $id)
    {
        //get post by ID
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //validasi formnya
        $this->validate($request, [
            'name'     => 'required|min:2',
            'nis'   => 'required|min:8',
            'absen' => 'required',

        ]);

        //get post by ID
        $post = Post::findOrFail($id);

            $post->update([
                'name'     => $request->name,
                'nis'     => $request->nis,
                'absen'   => $request->absen
            ]);


        //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        //get post by ID
        $post = Post::findOrFail($id);


        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}



