<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;

class TugasController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $tugas = Tugas::where('mapel','LIKE','%'.$request->search.'%')
        ->orderBy('tugas', 'ASC',)->simplePaginate(5);
        //get posts
        // $tugas = Tugas::latest()->simplepaginate(5);

        return view('tugas.index', compact('tugas'));
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('tugas.create');
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
            'tugas'     => 'required',
            'mapel'   => 'required',
            'note' => 'required',

        ]);

        //create post
        Tugas::create([
            'tugas'     => $request->tugas,
            'mapel'     => $request->mapel,
            'note'   => $request->note,
        ]);

        return redirect()->route('tugas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show(string $id)
    {
         //get tugas by ID
         $tgs = Tugas::findOrFail($id);

         return view('tugas.show', compact('tgs'));
    }

     /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit(string $id)
    {
         //get tgs by ID
         $tgs = Tugas::findOrFail($id);

         return view('tugas.edit', compact('tgs'));
    }

     /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, string $id)
    {
         //validasi formnya
         $this->validate($request, [
            'tugas'     => 'required|min:2',
            'mapel'   => 'required|min:3',
            'note' => 'required',

        ]);

        //get post by ID
        $tgs = Tugas::findOrFail($id);

            $tgs->update([
                'tugas'     => $request->tugas,
                'mapel'     => $request->mapel,
                'note'   => $request->note
            ]);


        //redirect to index
        return redirect()->route('tugas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
         //get post by ID
         $tgs = Tugas::findOrFail($id);


         //delete tgs
         $tgs->delete();
 
         //redirect to index
         return redirect()->route('tugas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
