<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Realisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rule == 'Admin') {
            $data['realisasis'] = Realisasi::all();
            $data['kegiatans'] = Kegiatan::all();
            return view('backend.v1.pages.realisasi.admin.index', $data);
        } else {
            // bisa dibuat menjadi: apabila pagu kegiatan diubah menjadi lebih rendah sedangkan pagu realisasi yang bersangkutan dengan kegiatan tersebut sangat tinggi, maka tampilkan icon tanda seru(error) untuk menginformasikan user nya memperbaharui pagu realisasi yang telah diiputkan sebelumnya.
            $data['realisasis'] = Realisasi::whereHas('kegiatan.user', function ($query) {
                return $query->where('id', Auth::user()->id);
            })->get();
            return view('backend.v1.pages.realisasi.user.index', $data);
        }
    }

    public function pilihKegiatan()
    {
        $data['kegiatans'] = Kegiatan::where('user_id', Auth::user()->id)->get();
        return view('backend.v1.pages.realisasi.user.realisasi-kegiatan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // ambil parameter di dalam get
        if (Auth::user()->rule == 'User') {
            $month = date('m');
            $data['triwulan'] = 0;

            if ($month < 4) {
                $data['triwulan'] = 1;
            } elseif ($month < 7) {
                $data['triwulan'] = 2;
            } elseif ($month < 10) {
                $data['triwulan'] = 3;
            } else {
                $data['triwulan'] = 4;
            }

            $data['kegiatan'] = Kegiatan::where('id', $request->kegiatan_id)->first();
            $data['pagu'] = $data['kegiatan']->pagu;
            $data['target'] = $data['kegiatan']->target;
            $data['satuan'] = $data['kegiatan']->satuan;
            $data['terserap'] = $data['kegiatan']->realisasi->sum('pagu');
            $data['sisa'] = $data['pagu'] - $data['terserap'];

            return view('backend.v1.pages.realisasi.user.create', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required',
            'tanggal' => 'required',
            'triwulan' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
            'keterangan' => 'required',
        ]);

        $data['kegiatan'] = Kegiatan::where('id', $request->kegiatan_id)->first();
        $data['pagu'] = $data['kegiatan']->pagu;
        $data['terserap'] = $data['kegiatan']->realisasi->sum('pagu');
        $data['sisa'] = $data['pagu'] - $data['terserap'];

        // bila pagu yang di input melebihi sisa pagu kegiatan maka dianggap gagal
        if ($request->pagu > $data['sisa']) {
            return to_route('realisasi.create', ['kegiatan_id' => $request->kegiatan_id])->with('failed', 'Pagu Yang Dimasukkan melebihi Batas Anggaran Kegiatan');
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Realisasi::create($data);
        return to_route('realisasi.index')->with('success', 'Realisasi Berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Realisasi $realisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Realisasi $realisasi)
    {
        if (Auth::user()->rule == 'User') {
            $month = date('m');
            $data['triwulan'] = 0;

            if ($month < 4) {
                $data['triwulan'] = 1;
            } elseif ($month < 7) {
                $data['triwulan'] = 2;
            } elseif ($month < 10) {
                $data['triwulan'] = 3;
            } else {
                $data['triwulan'] = 4;
            }

            $data['kegiatans'] = Kegiatan::where('user_id', Auth::user()->id)->get();

            $data['kegiatan'] = Kegiatan::where('id', $realisasi->kegiatan_id)->first();
            $data['pagu'] = $data['kegiatan']->pagu;
            $data['target'] = $data['kegiatan']->target;
            $data['satuan'] = $data['kegiatan']->satuan;
            $data['terserap'] = $data['kegiatan']->realisasi->sum('pagu');
            $data['sisa'] = $data['pagu'] - $data['terserap'];

            $data['realisasi'] = $realisasi;

            return view('backend.v1.pages.realisasi.user.edit', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Realisasi $realisasi)
    {
        $request->validate([
            'kegiatan_id' => 'required',
            'tanggal' => 'required',
            'triwulan' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
            'keterangan' => 'required',
        ]);

        $data['kegiatan'] = Kegiatan::where('id', $request->kegiatan_id)->first();
        $data['pagu'] = $data['kegiatan']->pagu;
        $data['terserap'] = $data['kegiatan']->realisasi->where('id', '!=', $realisasi->id)->sum('pagu');
        $data['sisa'] = $data['pagu'] - $data['terserap'];

        // bila pagu yang di input melebihi sisa pagu kegiatan maka dianggap gagal
        if ($request->pagu > $data['sisa']) {
            return to_route('realisasi.edit', $realisasi->id)->with('failed', 'Pagu Yang Dimasukkan melebihi Batas Anggaran Kegiatan');
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $realisasi->update($data);

        return to_route('realisasi.index')->with('success', 'Realisasi Berhasil di Perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Realisasi $realisasi)
    {
        $realisasi->delete();
        return to_route('realisasi.index')->with('success', 'Realisasi Berhasil di Hapus');
    }
}
