<?php

namespace Modules\Simpang3\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Simpang3\Entities\DataLaluLintas;
use Modules\Simpang3\Entities\Simpang3;

class Simpang3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data_simpang = Simpang3::orderby('updated_at', 'desc')->get();
        return view('simpang3::data_simpang.index', compact('data_simpang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('simpang3::data_simpang.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        Simpang3::create($request->all());
        return redirect('/simpang3/data-simpang')
            ->with('success', 'Data Simpang berhasil disimpan.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('simpang3::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data_simpang = Simpang3::find($id);
        return view('simpang3::data_simpang.edit', compact('data_simpang', 'id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data_simpang=Simpang3::find($id);
        $data_simpang->update($request->all());

        return redirect('/simpang3/data-simpang')
            ->with('success', 'Data Simpang berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data_simpang=Simpang3::find($id);
        $data_lalu_lintas = DataLaluLintas::where('id_simpang', $id);
        $data_simpang->delete();
        $data_lalu_lintas->delete();

        return redirect('/simpang3/data-simpang')
            ->with('success', 'Data Simpang berhasil dihapus');
    }
}
