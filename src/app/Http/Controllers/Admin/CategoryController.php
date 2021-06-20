<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Category::orderBy('kategori', 'DESC')->get();
        return view('admin.category.index', compact('kategori'));

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
        return view('admin.category.create', compact('kategori'));

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
            'kategori' => 'required|unique:wilayahs,nama_wilayah',
        ];

        $messages = [
            'kategori.required' => 'Nama wilayah harus diisi!',
            'kategori.unique' => 'Nama wilayah sudah terdaftar!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $kategori = new Category;
        $kategori->kategori = ucwords(strtolower($request->kategori));
        $simpan = $kategori->save();

        if ($simpan) {
            Session::flash('success', 'Category has been created!');
            return redirect()->route('admin.category');
        } else {
            Session::flash('errors', ['' => 'Category Failed to created!']);
            return redirect()->route('admin.category.create');
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
        $kategori = Category::find($id);
        return view('admin.category.edit', compact('kategori'));
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
        ]);

        $rules = [
            'kategori' => 'required',
        ];

        $messages = [
            'kategori.required' => 'Nama wilayah harus diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'kategori' => $request->input('kategori'),
        ];

        $kategori = Category::find($id);
        $kategori->kategori = $data['kategori'];
        $kategori->save();
        return redirect()->route('admin.category')->with('success', 'Category has been edited!');
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
        Category::whereId($id)->delete();
        return back()->with('success', 'Category has been deleted!');
    }
}