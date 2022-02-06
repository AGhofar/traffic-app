<?php

namespace Modules\Simpang4\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Simpang4\Entities\DataLaluLintas;
use Modules\Simpang4\Entities\Simpang4;

class Simpang4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data_simpang = Simpang4::orderby('updated_at', 'desc')->get();
        return view('simpang4::data_simpang.index', compact('data_simpang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('simpang4::data_simpang.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Simpang4::create($request->all());
        return redirect('/simpang4/data-simpang')
            ->with('success', 'Data Simpang berhasil disimpan.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data_simpang = Simpang4::find($id);
        return view('simpang4::data_simpang.show', compact('data_simpang', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data_simpang = Simpang4::find($id);
        return view('simpang4::data_simpang.edit', compact('data_simpang', 'id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data_simpang=Simpang4::find($id);
        $data_simpang->update($request->all());

        return redirect('/simpang4/data-simpang')
            ->with('success', 'Data Simpang berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data_simpang=Simpang4::find($id);
        $data_lalu_lintas = DataLaluLintas::where('id_simpang', $id);
        $data_simpang->delete();
        $data_lalu_lintas->delete();

        return redirect('/simpang4/data-simpang')
            ->with('success', 'Data Simpang berhasil dihapus');
    }
}
