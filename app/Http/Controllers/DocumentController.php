<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Models\Grade;
use File;
use Session;
use Response;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all()->where('user_id', Auth::user()->user_id);
        return view('blog' , ['documents' => $documents]);
    }

    public function viewFile($id)
    {
        $documents = Grade::all()->where('document_id', $id);
        $file = Document::all()->where('document_id', $id)->first();
        //dd($file);
        return view('viewFile' , ['documents' => $documents , 'file' => $file]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'customFile' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('customFile');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'uploadFile';
		$file->move($tujuan_upload,$nama_file);
        // dd(Auth::user());
		Document::create([
			'filename' => $nama_file,
            'user_id' => Auth::user()->user_id
		]);

        $documents = Document::all()->where('filename', $nama_file)->first();

        shell_exec("python python\ocr.py ".$nama_file." ".Auth::user()->user_id." ".$documents->document_id." 2>&1");
        
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showFile($id)
    {
        $documents = Document::withTrashed()->where('user_id', $id)->get();
        return view('blog' , ['documents' => $documents]);
    }
    
    public function show($id)
    {
        $file = Document::find($id);
        // $dl = File::find($id);

        // File::delete('uploadFile/'.$file->filename);
        // dd($dl);
        // dd($file); 
        
        $filepath = public_path('uploadFile/').$file->filename;
        return Response::download($filepath);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documents = Document::find($id);
        // dd($documents);
        $documents->delete();
        Session::flash('success', 'File Berhasil Dihapus');
        return redirect()->back();
    }

    public function restore($id)
    {
        $documents = Document::onlyTrashed()->where('document_id',$id);
        // dd($documents);
        $documents->restore();
        Session::flash('success', 'File Berhasil Dikembalikan');
        return redirect()->back();
    }
}
