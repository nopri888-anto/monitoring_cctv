<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Session;
use Validator;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $outlet = Outlet::orderBy('nama_outlet', 'DESC')
            ->join('wilayahs', 'outlets.wilayah_id', '=', 'wilayahs.id')
            ->join('cabangs', 'outlets.cabang_id', '=', 'cabangs.id')
            ->select('outlets.*', 'cabangs.nama_cabang', 'wilayahs.nama_wilayah')
            ->get();
        //$outlet = Outlet::with('wilayah')->get();
        return view('admin.outlet.index', compact('outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $wilayah = Wilayah::all();
        return view('admin.outlet.create', compact('wilayah'));
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
            'wilayah' => 'required',
            'cabang' => 'required',
            'nama_outlet' => 'required|min:3|max:50|unique:outlets,nama_outlet',
        ];

        $messages = [
            'cabang.required' => 'Kode cabang harus diisi!',
            'nama_outlet.required' => 'Nama cabang harus diisi!',
            'nama_outlet.unique' => 'Nama cabang sudah terdaftar!',
            'nama_outlet.min' => 'Kode minimal 3 karakter',
            'nama_outlet.max' => 'Kode maksimal 50 karakter',
            'wilayah.required' => 'Nama wilayah harus di isi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $outlet = new Outlet;
        $outlet->wilayah_id = $request->wilayah;
        $outlet->cabang_id = $request->cabang;
        $outlet->nama_outlet = $request->nama_outlet;
        $simpan = $outlet->save();

        if ($simpan) {
            Session::flash('success', 'Cabang has been created!');
            return redirect()->route('admin.outlet');
        } else {
            Session::flash('errors', ['' => 'Cabang Failed to created!']);
            return redirect()->route('admin.cabang.outlet');
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
        //
    }

}