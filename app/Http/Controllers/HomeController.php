<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logistic;
use App\Models\Supplier;
use App\Models\Inlogistic;
use App\Models\Outlogistic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype=='user')
            {
                $inlogistics = Inlogistic::all();
                $logisticsCount = Logistic::count();
                $suppliersCount = Supplier::count();
                $inlogisticsCount = Inlogistic::count();
                $outlogisticsCount = Outlogistic::count();

                \Log::info('Jumlah Logistik: ' . $logisticsCount);
                \Log::info('Jumlah Supplier: ' . $suppliersCount);
                \Log::info('Jumlah Penerimaan: ' . $inlogisticsCount);
                \Log::info('Jumlah Penerimaan: ' . $outlogisticsCount);

                return view('dashboard', compact('inlogistics','logisticsCount','suppliersCount','inlogisticsCount','outlogisticsCount'));
            }
            else if($usertype=='anggota')
            {
                return view('anggota.anggotahome');
            }
            else
            {
                return redirect()->back();
            }
        }
    }

    public function post()
    {
        return view("post");
    }

}
