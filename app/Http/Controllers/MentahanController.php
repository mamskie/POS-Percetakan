<?php

namespace App\Http\Controllers;

use App\Models\mentahan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use PDF;

class mentahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');

        return view('mentahan.index', compact('kategori'));
    }

    public function data()
    {
        $mentahan = mentahan::leftJoin('kategori', 'kategori.id_kategori', 'mentahan.id_kategori')
            ->select('mentahan.*', 'nama_kategori')
            // ::orderBy('kode_mentahan')->get();
            ->get();

        return datatables()
            ->of($mentahan)
            ->addIndexColumn()
            ->addColumn('select_all', function ($produk) {
                return '
                    <input type="checkbox" name="id_mentahan[]" value="' . $produk->id_mentahan . '">
                ';
            })
            ->addColumn('kode_mentahan', function ($mentahan) {
                return '<span class="label label-success">' . $mentahan->kode_mentahan . '<span>';
            })
            ->addColumn('aksi', function ($mentahan) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`' . route('mentahan.update', $mentahan->id_mentahan) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('mentahan.destroy', $mentahan->id_mentahan) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'select_all', 'kode_mentahan'])
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
        $mentahan = mentahan::latest()->first() ?? new mentahan();
        $request['kode_mentahan'] = 'K' . tambah_nol_didepan((int)$mentahan->id_mentahan + 1, 6);
        $mentahan = mentahan::create($request->all());
        // $kode_mentahan = (int) $mentahan->kode_mentahan +1;

        // $mentahan = new mentahan();
        // $mentahan->kode_mentahan = tambah_nol_didepan($kode_mentahan, 5);
        // $mentahan->nama = $request->nama;
        // $mentahan->kategori = $request->kategori;
        // $mentahan->jumlah = $request->jumlah;
        // $mentahan->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mentahan = mentahan::find($id);

        return response()->json($mentahan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $mentahan = mentahan::find($id)->update($request->all());
        $mentahan = mentahan::find($id);

        $mentahan->nama = $request->nama;
        $mentahan->id_kategori = $request->id_kategori;
        $mentahan->jumlah += $request->jumlah;

        $mentahan->update;

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentahan = mentahan::find($id);
        $mentahan->delete();

        return response(null, 204);
    }

    // public function cetakmentahan(Request $request)
    // {
    //     $datamentahan = collect(array());
    //     foreach ($request->id_mentahan as $id) {
    //         $mentahan = mentahan::find($id);
    //         $datamentahan[] = $mentahan;
    //     }

    //     $datamentahan = $datamentahan->chunk(2);
    //     $setting    = Setting::first();

    //     $no  = 1;
    //     $pdf = PDF::loadView('mentahan.cetak', compact('datamentahan', 'no', 'setting'));
    //     $pdf->setPaper(array(0, 0, 566.93, 850.39), 'potrait');
    //     return $pdf->stream('mentahan.pdf');
    // }
}
