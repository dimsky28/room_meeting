<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
            padding: 10px 0;
            background-color: #FCEF03;
        }
        .content {
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #FCEF03;
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Laporan Peminjaman</h1>
        </div>
        <div class="content">
            <table>
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>User</th>
                        <th>Room</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Actual Check-out</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $item)
                        <tr class="text">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->user->username ?? 'None' }}</td>
                            <td>{{ $item->room->room_name }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($item->booking_time)) }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($item->return_time)) }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($item->actual_return_time)) }}</td>
                            <td class="text-center">
                                @if($item->actual_return_time == null)
                                    <span class="text-primary">Berjalan</span>
                                @elseif($item->return_time < $item->actual_return_time)
                                    <span class="text-danger">Terlewat</span>
                                @else
                                    <span class="text-success">Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Support By. Admin Karang Taruna Jatipulo</p>
        </div>
    </div>
</body>
</html>
