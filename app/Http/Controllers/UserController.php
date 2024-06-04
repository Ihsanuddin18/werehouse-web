<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserDataResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\LogistikResource;
use App\Models\User;
use App\Models\Logistic;
use App\Models\Supplier;
use App\Models\Inlogistic;
use App\Models\Outlogistic;
use App\Models\LogisticRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return new UserDataResource(true, "Daftar data Akun", $users);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return new UserResource(true, "Data masuk!", $user);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->last_login_at = now();

            $data = [
                'id' => $user->id,
                'name' => $user->name
            ];

            return new UserDataResource(true, "Berhasil Login!", $data);
        } else {
            return new UserDataResource(true, "Berhasil Login!", []);
        }
    }

    public function getLogistic()
    {
        $logistic = Logistic::all();
        return new UserDataResource(true, "Daftar data Logistik", $logistic);
    }

    public function storeLogistic(Request $request)
    {
        $request->validate([
            'kode_logistik' => 'required',
            'nama_logistik' => 'required',
            'satuan_logistik' => 'required',
        ]);

        $post = Logistic::create($request->all());
        return new LogistikResource(true, "Data Logistik", $post);
    }

    public function getSupplier()
    {
        $supplier = Supplier::all();
        return new UserDataResource(true, "Daftar data Supplier", $supplier);
    }

    public function storeSupplier(Request $request)
    {
        $request->validate([
            'kode_supplier' => 'required',
            'nama_supplier' => 'required',
            'email_supplier' => 'required',
            'telepon_supplier' => 'required',
            'instansi_supplier' => 'required',
        ]);

        $post = Supplier::create($request->all());
        return new LogistikResource(true, "Data Supplier", $post);
    }

    public function getInlogistic()
    {
        $inlogistic = Inlogistic::all();
        return new UserDataResource(true, "Data logistik Masuk", $inlogistic);
    }

    public function storeInlogistic(Request $request)
    {
        $request->validate([
            'id_logistik' => 'required',
            'id_supplier' => 'required',
            'jumlah_logistik_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'expayer_logistik' => 'required',
            'keterangan_masuk' => 'required',
            'dokumentasi_masuk' => 'required',
        ]);

        $post = Inlogistic::create($request->all());
        return new LogistikResource(true, "Data logistik Masuk", $post);
    }

    public function getOutlogistic()
    {
        $outlogistic = Outlogistic::all();
        return new UserDataResource(true, "Data logistik Keluar", $outlogistic);
    }

    public function storeOutlogistic(Request $request)
    {
        $validatedData = $request->validate([
            'id_logistik' => 'required|exists:logistics,id',
            'jumlah_logistik_keluar' => 'required|integer',
            'tanggal_keluar' => 'required|date',
            'nama_penerima' => 'required|string|max:255',
            'nik_kk_penerima' => 'required|string|max:255',
            'alamat_penerima' => 'required|string|max:255',
            'keterangan_keluar' => 'nullable|string',
            'dokumentasi_keluar' => 'nullable|string|max:20000',
        ]);

        $inlogistic = Inlogistic::where('id_logistik', $validatedData['id_logistik'])->firstOrFail();
        $logistic = Logistic::with('inlogistics')->findOrFail($validatedData['id_logistik']);
        $jumlahTersedia = $logistic->inlogistics->sum('jumlah_logistik_masuk');

        if ($validatedData['jumlah_logistik_keluar'] > $jumlahTersedia) {
            return response()->json(['success' => false, 'message' => 'Jumlah logistik tidak mencukupi.'], 400);
        }

        if ($request->hasFile('dokumentasi_keluar')) {
            $file = $request->file('dokumentasi_keluar');
            $filePath = $file->store('dokumentasi_keluar', 'public');
            $validatedData['dokumentasi_keluar'] = $filePath;
        }

        $validatedData['id_inlogistik'] = $inlogistic->id;

        $outlogistic = Outlogistic::create($validatedData);

        $inlogistic->jumlah_logistik_masuk -= $validatedData['jumlah_logistik_keluar'];

        if ($inlogistic->jumlah_logistik_masuk < 0) {
            $inlogistic->jumlah_logistik_masuk = 0;
        }

        $inlogistic->save();

        return new LogistikResource(true, "Data logistik Keluar", $outlogistic);
    }


    public function getLogisticRequest()
    {
        $logisticrequest = LogisticRequest::all();
        return new UserDataResource(true, "List logistik ", $logisticrequest);
    }

    public function storeLogisticRequest(Request $request)
    {
        $request->validate([
            'request_nama_logistik_keluar' => 'required',
            'request_jumlah_logistik_keluar' => 'required',
            'alamat_penerima_logistik' => 'required',
            'keterangan_penerima_logistik' => 'required',
            'tanggal_kejadian_bencana' => 'required',
        ]);


        $post = LogisticRequest::create($request->all());
        return new LogistikResource(true, "List logistik", $post);
    }
}