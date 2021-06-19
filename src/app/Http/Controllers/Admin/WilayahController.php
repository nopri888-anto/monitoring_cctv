<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Session;
use Validator;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wilayah = Wilayah::orderBy('id', 'DESC')->get();
        return view('admin.wilayah.index', compact('wilayah'));

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
        return view('admin.wilayah.create', compact('wilayah'));
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
            'kode_wilayah' => 'required|min:3|max:8|unique:wilayahs,kode_wilayah',
            'nama_wilayah' => 'required|unique:wilayahs,nama_wilayah',
        ];

        $messages = [
            'kode_wilayah.required' => 'Kode wilayah harus diisi!',
            'kode_wilayah.unique' => 'Kode sudah terdaftar!',
            'kode_wilayah.min' => 'Kode minimal 3 karakter',
            'kode_wilayah.max' => 'Kode maksimal 8 karakter',
            'nama_wilayah.required' => 'Nama wilayah harus diisi!',
            'nama_wilayah.unique' => 'Nama wilayah sudah terdaftar!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $wilayah = new Wilayah;
        $wilayah->kode_wilayah = ucwords($request->kode_wilayah);
        $wilayah->nama_wilayah = ucwords(strtolower($request->nama_wilayah));
        $simpan = $wilayah->save();

        if ($simpan) {
            Session::flash('success', 'Wilayah has been created!');
            return redirect()->route('admin.wilayah');
        } else {
            Session::flash('errors', ['' => 'Wilayah Failed to created!']);
            return redirect()->route('admin.wilayah.create');
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
        $wilayah = Wilayah::find($id);
        return view('admin.wilayah.edit', compact('wilayah'));
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
            'kode_wilayah' => 'required',
            'nama_wilayah' => 'required',
        ]);

        $rules = [
            'kode_wilayah' => 'required|min:3|max:8',
            'nama_wilayah' => 'required',
        ];

        $messages = [
            'kode_wilayah.required' => 'Kode wilayah harus diisi',
            'kode_wilayah.min' => 'Kode minimal 3 karakter',
            'kode_wilayah.max' => 'Kode maksimal 8 karakter',
            'nama_wilayah.required' => 'Nama wilayah harus diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'kode_wilayah' => $request->input('kode_wilayah'),
            'nama_wilayah' => $request->input('nama_wilayah'),
        ];

        $wilayah = Wilayah::find($id);
        $wilayah->kode_wilayah = $data['kode_wilayah'];
        $wilayah->nama_wilayah = $data['nama_wilayah'];
        $wilayah->save();
        return redirect()->route('admin.wilayah')->with('success', 'Wilayah has been edited!');

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
        Wilayah::whereId($id)->delete();
        return back()->with('success', 'Wilayah has been deleted!');
    }
}