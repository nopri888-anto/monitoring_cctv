<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Session;
use Validator;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $parameter = Parameter::orderBy('id', 'DESC')->get();
        return view('admin.parameter.index', compact('parameter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Category::get();
        return view('admin.parameter.create', compact('kategori'));
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
            'nama_parameter' => 'required|min:10|max:200|unique:parameters,nama_parameter',
            'kategori' => 'required',
        ];

        $messages = [
            'nama_parameter.min' => 'Parameter minimal 10 karakter',
            'nama_parameter.max' => 'Parameter maksimal 200 karakter',
            'nama_parameter.required' => 'Nama parameter harus diisi!',
            'nama_parameter.unique' => 'Nama parameter sudah terdaftar!',
            'kategori.required' => 'Kategori harus di isi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $parameter = new Parameter;
        $parameter->category_id = $request->kategori;
        $parameter->nama_parameter = $request->nama_parameter;
        $simpan = $parameter->save();

        if ($simpan) {
            Session::flash('success', 'Parameter has been created!');
            return redirect()->route('admin.parameter');
        } else {
            Session::flash('errors', ['' => 'Parameter Failed to created!']);
            return redirect()->route('admin.parameter.create');
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
        $kategori = Category::get();
        $parameter = Parameter::find($id);
        return view('admin.parameter.edit', compact('kategori', 'parameter'));
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
            'kategori' => 'required',
            'nama_parameter' => 'required',
        ]);

        $rules = [
            'kategori' => 'required',
            'nama_parameter' => 'required|min:10|max:200',
        ];

        $messages = [
            'kategori.required' => 'Kategori harus diisi',
            'nama_parameter.max' => 'Maksimal 200 karakter',
            'nama_parameter.min' => 'Maksimal 10 karakter',
            'nama_parameter.required' => 'Parameter harus diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'category_id' => $request->input('kategori'),
            'nama_parameter' => $request->input('nama_parameter'),
        ];

        $parameter = Parameter::find($id);
        $parameter->category_id = $data["category_id"];
        $parameter->nama_cabang = $data['nama_parameter'];
        $parameter->save();
        return redirect()->route('admin.parameter')->with('success', 'Paramater has been edited!');
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
        Parameter::whereId($id)->delete();
        return back()->with('success', 'Parameter has been deleted!');
    }
}