<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            /* Mengatur teks di tengah untuk header */
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center;"> Daftar Data Supplier </h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Kode Supplier</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Instansi</th>
        </tr>
        @if($suppliers->count() > 0)
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $supplier->kode_supplier }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->email_supplier }}</td>
                    <td>{{ $supplier->telepon_supplier }}</td>
                    <td>{{ $supplier->instansi_supplier }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center"> Tidak ada data! </td>
            </tr>
        @endif
    </table>

</body>

</html>