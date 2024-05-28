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
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1> Daftar Data Supplier </h1>

    <table id="customers">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Kode Supplier</th>
            <th style="text-align: center;">Nama</th>
            <th style="text-align: center;">Email</th>
            <th style="text-align: center;">Telepon</th>
            <th style="text-align: center;">Instansi</th>
        </tr>
        @if($suppliers->count() > 0)
            @foreach($suppliers as $supplier)
                <tr>
                    <td class="text-center">{{ ($suppliers->currentPage() - 1) * $suppliers->perPage() + $loop->iteration }}
                    </td>
                    <td class="text-center">{{ $supplier->kode_supplier }}</td>
                    <td class="text-center">{{ $supplier->nama_supplier }}</td>
                    <td class="text-center">{{ $supplier->email_supplier }}</td>
                    <td class="text-center">{{ $supplier->telepon_supplier }}</td>
                    <td class="text-center">{{ $supplier->instansi_supplier }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center"> Tidak ada data ! </td>
            </tr>
        @endif
    </table>

</body>

</html>