<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\Realisasi;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('backend.v1.pages.report.index');
    }

    public function print(Request $request)
    {
        switch ($request->jenis) {
            case 'program':
                $data['programs'] = Program::all();
                break;
            case 'kegiatan':
                $data['kegiatans'] = Kegiatan::all();
                break;
            case 'realisasi':
                $data['realisasis'] = Realisasi::all();
                break;
        }
        return view('backend.v1.pages.report.' . $request->jenis, $data);
    }
}
