<?php

namespace App\Http\Controllers;
use App\Models\DataLogistik;
use Illuminate\Http\Request;

class DataLogistikController extends Controller

{

    public function index()
    {
        return view('datalogistik.index');
    }
    public function create()
    {
        return view('datalogistik.create');
    }

    public function store(Request $request)
    {
        datalogistik::create($request->all());
        return redirect()->route('datalogistik')->with('Berhasil','Data Logistik Berhasil Ditambahkan!');

    }

}