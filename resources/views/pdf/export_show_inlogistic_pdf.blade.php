<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .table thead th {
            vertical-align: middle;
            text-align: center;
        }

        .table tbody td {
            vertical-align: middle;
            text-align: center;
        }

        .img-responsive {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .table {
            width: 100%;
            page-break-inside: avoid;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4 style="font-size: 2rem;">Detail logistik masuk</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 style="color: blue;">Data Supplier</h4>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="nama_supplier">Nama Supplier:</label>
                            <p>{{ $inlogistic->supplier->nama_supplier }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="kode_supplier">Kode Supplier:</label>
                            <p>{{ $inlogistic->supplier->kode_supplier }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="instansi_supplier">Instansi Supplier:</label>
                            <p>{{ $inlogistic->supplier->instansi_supplier }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="email_supplier">Email Supplier:</label>
                            <p>{{ $inlogistic->supplier->email_supplier }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="telepon_supplier">Telepon Supplier:</label>
                            <p>{{ $inlogistic->supplier->telepon_supplier }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="tanggal_masuk">Tanggal Masuk:</label>
                            <p>{{ $inlogistic->tanggal_masuk }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <h4 style="color: blue;">Data Logistik</h4>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="nama_logistik">Nama Logistik:</label>
                            <p>{{ $inlogistic->logistic->nama_logistik }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="kode_logistik">Kode Logistik:</label>
                            <p>{{ $inlogistic->logistic->kode_logistik }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="satuan_logistik">Satuan Logistik:</label>
                            <p>{{ $inlogistic->logistic->satuan_logistik }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="jumlah_logistik_masuk">Jumlah:</label>
                            <p>{{ $inlogistic->jumlah_logistik_masuk }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="expayer_logistik">Tanggal Kadaluarsa:</label>
                            <p>{{ $inlogistic->expayer_logistik }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="keterangan_masuk">Keterangan:</label>
                            <p>{{ $inlogistic->keterangan_masuk }}</p>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold" for="dokumentasi_masuk">Dokumentasi Masuk:</label>
                            @if($inlogistic->dokumentasi_masuk)
                                <img src="{{ public_path('uploads/inlogistic/' . basename($inlogistic->dokumentasi_masuk)) }}"
                                    width="90" height="90">
                            @else
                                <p>Tidak ada gambar</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label style="font-weight: bold;">Ditambahkan Pada:</label>
                        <p>{{ \Carbon\Carbon::parse($inlogistic->created_at)->translatedFormat('l, d F Y') }}</p>
                    </div>
                    <div class="col mb-3">
                        <label style="font-weight: bold;">Diperbarui Pada:</label>
                        <p>{{ \Carbon\Carbon::parse($inlogistic->updated_at)->translatedFormat('l, d F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">Kode Logistik</th>
                            <th class="text-center">Nama Logistik</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Tanggal Masuk</th>
                            <th class="text-center">Tanggal Kadaluarsa</th>
                            <th class="text-center">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">{{ $inlogistic->logistic->kode_logistik }}</td>
                            <td class="text-center">{{ $inlogistic->logistic->nama_logistik }}</td>
                            <td class="text-center">{{ $inlogistic->logistic->satuan_logistik }}</td>
                            <td class="text-center">{{ $inlogistic->jumlah_logistik_masuk }}</td>
                            <td class="text-center">{{ $inlogistic->tanggal_masuk }}</td>
                            <td class="text-center">{{ $inlogistic->expayer_logistik }}</td>
                            <td class="text-center">{{ $inlogistic->keterangan_masuk }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>