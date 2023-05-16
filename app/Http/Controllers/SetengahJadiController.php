<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setengahJadi;

class setengahJadiController extends Controller
{
    public function index()
    {
        return view('setengahJadi.index');
    }

    public function data()
    {
        $setengahJadi = setengahJadi::orderBy('id_setengahJadi', 'desc')->get();

        return datatables()
            ->of($setengahJadi)
            ->addIndexColumn()
            ->addColumn('aksi', function ($setengahJadi) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('setengahJadi.update', $setengahJadi->id_setengahJadi) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('setengahJadi.destroy', $setengahJadi->id_setengahJadi) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
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
        $setengahJadi = setengahJadi::create($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setengahJadi = setengahJadi::find($id);

        return response()->json($setengahJadi);
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
        $setengahJadi = setengahJadi::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setengahJadi = setengahJadi::find($id)->delete();

        return response(null, 204);
    }
}