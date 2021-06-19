<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Session;
use Validator;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cabang = Cabang::orderBy('id', 'DESC')->get();
        return view('admin.cabang.index', compact('cabang'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $wilayah = Wilayah::get();
        return view('admin.cabang.create', compact('wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'kode_cabang' => 'required|min:3|max:8|unique:cabangs,kode_cabang',
            'nama_cabang' => 'required|min:3|max:50|unique:cabangs,nama_cabang',
            'wilayah' => 'required',
        ];

        $messages = [
            'kode_cabang.required' => 'Kode cabang harus diisi!',
            'kode_cabang.unique' => 'Kode cabang sudah terdaftar!',
            'kode_cabang.min' => 'Kode minimal 3 karakter',
            'kode_cabang.max' => 'Kode maksimal 8 karakter',
            'nama_cabang.min' => 'Nama minimal 3 karakter',
            'nama_cabang.max' => 'Nama maksimal 50 karakter',
            'nama_cabang.required' => 'Nama cabang harus diisi!',
            'nama_cabang.unique' => 'Nama cabang sudah terdaftar!',
            'wilayah.required' => 'Nama wilayah harus di isi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $cabang = new Cabang;
        $cabang->wilayah_id = $request->wilayah;
        $cabang->kode_cabang = ucwords($request->kode_cabang);
        $cabang->nama_cabang = ucwords(strtolower($request->nama_cabang));
        $simpan = $cabang->save();

        if ($simpan) {
            Session::flash('success', 'Cabang has been created!');
            return redirect()->route('admin.cabang');
        } else {
            Session::flash('errors', ['' => 'Cabang Failed to created!']);
            return redirect()->route('admin.cabang.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $wilayah = Wilayah::get();
        $cabang = Cabang::find($id);
        return view('admin.cabang.edit', compact('wilayah', 'cabang'));
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
        $request->validate([
            'wilayah' => 'required',
            'kode_cabang' => 'required',
            'nama_cabang' => 'required',
        ]);

        $rules = [
            'wilayah' => 'required',
            'kode_cabang' => 'required|min:3|max:8',
            'nama_cabang' => 'required|min:3|max:50',
        ];

        $messages = [
            'wilayah.required' => 'Kode wilayah harus diisi',
            'kode_cabang.min' => 'Kode minimal 3 karakter',
            'nama_cabang.max' => 'Kode maksimal 8 karakter',
            'nama_cabang.required' => 'Nama wilayah harus diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'wilayah_id' => $request->input('wilayah'),
            'kode_cabang' => $request->input('kode_cabang'),
            'nama_cabang' => $request->input('nama_cabang'),
        ];

        $cabang = Cabang::find($id);
        $cabang->wilayah_id = $data["wilayah_id"];
        $cabang->kode_cabang = $data['kode_cabang'];
        $cabang->nama_cabang = $data['nama_cabang'];
        $cabang->save();
        return redirect()->route('admin.cabang')->with('success', 'Cabang has been edited!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cabang::whereId($id)->delete();
        return back()->with('success', 'Cabang has been deleted!');
    }
}