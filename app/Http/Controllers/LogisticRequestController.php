<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogisticRequest;
use App\Models\Logistic;
use App\Models\Inlogistic;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class LogisticRequestController extends Controller
{

    public function index(Request $request)
    {
        $query = LogisticRequest::with('logistic');

        $month = $request->input('month');
        $year = $request->input('year');

        if ($month && $year) {
            $query->whereYear('tanggal_kejadian_request', $year)
                ->whereMonth('tanggal_kejadian_request', $month);
        } elseif ($year) {
            $query->whereYear('tanggal_kejadian_request', $year);
        }

        $logisticrequests = $query->latest()->paginate(15);

        $logistics = Logistic::with('logisticrequests')->get();

        $firstYearDate = LogisticRequest::min('tanggal_kejadian_request');
        $firstYear = $firstYearDate ? date('Y', strtotime($firstYearDate)) : date('Y');
        $currentYear = date('Y');

        return view('logisticrequests.index', [
            'logisticrequests' => $logisticrequests,
            'logistics' => $logistics,
            'firstYear' => $firstYear,
            'currentYear' => $currentYear,
        ]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function confirm($id)
    {
        $logisticRequest = LogisticRequest::findOrFail($id);

        $logisticRequest->status = 'Dikonfirmasi';
        $logisticRequest->save();

        return redirect()->route('logisticrequests.index')->with('success', 'Permintaan logistik berhasil dikonfirmasi !');
    }

    public function destroy($id)
    {
        $logisticrequests = LogisticRequest::findOrFail($id);
        $logisticrequests->delete();

        return redirect()->route('logisticrequests.index')->with('success', 'Permintaan berhasil ditolak dan dihapus !');
    }

}