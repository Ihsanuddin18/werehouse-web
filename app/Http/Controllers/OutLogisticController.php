<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlogistic;
use App\Models\Logistic;
use App\Models\Inlogistic;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log; // Tambahkan ini

class OutLogisticController extends Controller
{
    public function index(Request $request)
    {
        $query = Outlogistic::with('logistic');

        $month = $request->input('month');
        $year = $request->input('year');

        if ($month && $year) {
            $query->whereYear('tanggal_keluar', $year)
                ->whereMonth('tanggal_keluar', $month);
        } elseif ($year) {
            $query->whereYear('tanggal_keluar', $year);
        }

        $outlogistics = $query->latest()->paginate(15);
        
        $logistics = Logistic::with('outlogistics')->get();

        $firstYearDate = Outlogistic::min('tanggal_keluar');
        $firstYear = $firstYearDate ? date('Y', strtotime($firstYearDate)) : date('Y');
        $currentYear = date('Y');

        return view('outlogistics.index', [
            'outlogistics' => $outlogistics,
            'logistics' => $logistics,
            'firstYear' => $firstYear,
            'currentYear' => $currentYear,
        ]);
    }

    public function export_outlogistic_pdf(Request $request)
    {
        $query = Outlogistic::with('logistic');

        $month = $request->input('month');
        $year = $request->input('year');

        if ($month && $year) {
            $query->whereYear('tanggal_keluar', $year)
                ->whereMonth('tanggal_keluar', $month);
        } elseif ($year) {
            $query->whereYear('tanggal_keluar', $year);
        }

        $outlogistics = $query->get();

        $pdf = PDF::loadView('pdf.export_outlogistic_pdf', ['outlogistics' => $outlogistics]);
        return $pdf->download('export_outlogistic_pdf.pdf');
    }


    public function export_show_outlogistic_pdf($id)
    {
        $outlogistic = Outlogistic::findOrFail($id);

        $pdf = PDF::loadView('pdf.export_show_outlogistic_pdf', compact('outlogistic'));
        return $pdf->download('export_show_outlogistic.pdf');
    }

    public function create()
    {
        $logistics = Logistic::all();
        $outlogistics = Outlogistic::all();
        return view('outlogistics.create', compact('logistics'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_logistik' => 'required|exists:logistics,id',
            'jumlah_logistik_keluar' => 'required|integer',
            'tanggal_keluar' => 'required|date',
            'nama_penerima' => 'required|string|max:255',
            'alamat_penerima' => 'required|string|max:255',
            'keterangan_keluar' => 'nullable|string',
            'nik_kk_penerima' => 'required|string|max:255',
            'dokumentasi_keluar' => 'nullable|string|max:20000',
        ]);

        $inlogistic = Inlogistic::where('id_logistik', $validatedData['id_logistik'])->firstOrFail();

        $validatedData['id_inlogistik'] = $inlogistic->id;

        $outlogistic = Outlogistic::create($validatedData);

        $inlogistic->jumlah_logistik_masuk -= $validatedData['jumlah_logistik_keluar'];

        if ($inlogistic->jumlah_logistik_masuk < 0) {
            $inlogistic->jumlah_logistik_masuk = 0;
        }

        $inlogistic->save();

        return redirect()->route('outlogistics.index')->with('success', 'Data berhasil dikeluarkan !');
    }

    public function show($id)
    {
        $outlogistic = Outlogistic::findOrFail($id);
        $inlogistic = $outlogistic->inlogistic;

        return view('outlogistics.show', compact('outlogistic', 'inlogistic'));
    }

    public function edit(string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);
        $logistics = Logistic::all();
        return view('outlogistics.edit', compact('outlogistic', 'logistics'));
    }

    public function update(Request $request, $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);

        // Data lama sebelum di-update
        $oldJumlahLogistikKeluar = $outlogistic->jumlah_logistik_keluar;

        Log::info('Request Data:', $request->all());

        $request->validate([
            'tanggal_keluar' => 'required|date',
            'nama_penerima' => 'required|string|max:255',
            'nik_kk_penerima' => 'required|string|max:255',
            'alamat_penerima' => 'required|string|max:255',
            'jumlah_logistik_keluar' => 'required|integer',
            'keterangan_keluar' => 'nullable|string',
            'dokumentasi_keluar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Hitung perbedaan jumlah logistik keluar
        $newJumlahLogistikKeluar = $request->input('jumlah_logistik_keluar');
        $difference = $newJumlahLogistikKeluar - $oldJumlahLogistikKeluar;

        // Temukan data inlogistic terkait
        $inlogistic = Inlogistic::where('id_logistik', $outlogistic->id_logistik)->firstOrFail();

        // Perbarui jumlah logistik masuk berdasarkan perbedaan
        $inlogistic->jumlah_logistik_masuk -= $difference;

        if ($inlogistic->jumlah_logistik_masuk < 0) {
            $inlogistic->jumlah_logistik_masuk = 0;
        }

        $inlogistic->save();

        // Perbarui data outlogistic
        $outlogistic->tanggal_keluar = $request->input('tanggal_keluar');
        $outlogistic->nama_penerima = $request->input('nama_penerima');
        $outlogistic->nik_kk_penerima = $request->input('nik_kk_penerima');
        $outlogistic->alamat_penerima = $request->input('alamat_penerima');
        $outlogistic->jumlah_logistik_keluar = $request->input('jumlah_logistik_keluar');
        $outlogistic->keterangan_keluar = $request->input('keterangan_keluar');

        if ($request->hasFile('dokumentasi_keluar')) {
            $filePath = $request->file('dokumentasi_keluar')->store('dokumentasi_keluar');
            $outlogistic->dokumentasi_keluar = $filePath;
        }

        $outlogistic->save();

        return redirect()->route('outlogistics.index')->with('success', 'Data berhasil diperbarui!');
    }


    public function destroy(string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);

        $inlogistic = Inlogistic::where('id_logistik', $outlogistic->id_logistik)->first();

        if ($inlogistic) {
            $inlogistic->jumlah_logistik_masuk += $outlogistic->jumlah_logistik_keluar;
            $inlogistic->save();
        }

        $outlogistic->delete();

        return redirect()->route('outlogistics.index')->with('success', 'Data berhasil dihapus !');
    }

}
