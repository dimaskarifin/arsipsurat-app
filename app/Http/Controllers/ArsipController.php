<?php

namespace App\Http\Controllers;

use App\Models\ArsipModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator, Alert, File;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ArsipModel::all()->sortDesc();
        return view ('layouts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arsip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nomor_surat' => ['required'],
            'kategori' => ['required'],
            'judul_surat' => ['required'],
            'document' => ['required'],
        ];
        $messages = [];
        $attributes = [
            'nomor_surat' => "Nomor Surat",
            'kategori' => 'Kategori Surat',
            'judul_surat' => 'Judul Surat',
            'document' => 'Dokumen',
        ];
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if (!$validator->passes()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->toArray());
        }else {
            $data = new ArsipModel;
            $data ->nomor_surat = $request->nomor_surat;
            $data ->kategori = $request->kategori;
            $data ->judul_surat = $request->judul_surat;

            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $filename = str_replace('/','-', $request->nomor_surat).".".$file->getClientOriginalExtension();
                $file->move(public_path('document'), $filename);
                $data->document = $filename;
            }
            $data->created_at = Carbon::now();
            $data->save();

        }

        Alert::success('Berhasil Menambahkan Data');
        return redirect(route('arsipsurat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('arsipsurat')
            ->select('id', 'nomor_surat', 'kategori', 'judul_surat', 'document', 'created_at')
            ->where('id', $id)
            ->orderBy('created_at', 'desc')
            ->first();

        return view('arsip.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('arsipsurat')
        ->select('id','nomor_surat','kategori','judul_surat','document','created_at')
        ->where('id',$id)
        ->orderBy('created_at','desc')
        ->first();

        return view('arsip.edit',['data' => $data]);
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
        if ($request->hasFile('document')) {
            $rules = [
                'nomor_surat' => ['required'],
                'kategori' => ['required'],
                'judul_surat' => ['required'],
                'document' => ['required'],
            ];
        }else {
            $rules = [
                'nomor_surat' => ['required'],
                'kategori' => ['required'],
                'judul_surat' => ['required'],
            ];
        }
        $messages = [];
        $attributes = [
            'nomor_surat' => "Nomor Surat",
            'kategori' => 'Kategori Surat',
            'judul_surat' => 'Judul Surat',
            'document' => 'Dokumen',
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        if (!$validator->passes()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->toArray());
        }else {
            $data = ArsipModel::where('id',$id)->first();
            $data->nomor_surat = $request->nomor_surat;
            $data->kategori = $request->kategori;
            $data->judul_surat = $request->judul_surat;
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $filename = str_replace('/','-', $request->nomor_surat).".".$file->getClientOriginalExtension();
                $file->move(public_path('document'), $filename);

                $path = public_path() . 'document' .$data->document;
                File::delete($path);
                $data->document = $filename;
            }
            $data->updated_at = Carbon::now();
            $data->save();

            Alert::success('Berhasil Update Data');

            return redirect(route('arsipsurat.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ArsipModel::where('id',$id)->delete();

        return redirect()->route('arsipsurat.index');
    }
}
