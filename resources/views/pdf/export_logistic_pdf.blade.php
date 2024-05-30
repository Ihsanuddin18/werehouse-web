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
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1> Daftar Data Logistik </h1>

    <table id="customers">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Kode Logistik</th>
            <th style="text-align: center;">Nama</th>
            <th style="text-align: center;">Satuan</th>
        </tr>
        @if($logistics->count() > 0)
            @foreach($logistics as $logistic)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $logistic->kode_logistik }}</td>
                    <td class="text-center">{{ $logistic->nama_logistik }}</td>
                    <td class="text-center">{{ $logistic->satuan_logistik }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8" style="text-align: center;">Tidak ada data logistik !</td>
            </tr>
        @endif
    </table>

</body>

</html>