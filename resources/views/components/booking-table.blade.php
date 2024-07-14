<div class="card border-0 shadow-sm my-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">
                Pemesanan Ruang
            </h5>
            <h7 class="card-subtitle">
                Berikut jadwal lebih lengkap peminjaman Gedung Serbaguna Sasana Krida Karang Taruna berdasarkan waktu pemesanan!
            </h7>
        </div>
        <i class="fas fa-calendar-alt fa-2x"></i>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar Ruangan</th>
                        <th scope="col">Pengguna</th>
                        <th scope="col">Ruangan</th>
                        <th scope="col">Waktu Pesan</th>
                        <th scope="col">Waktu Kembalikan</th>
                        <th scope="col">Sudah Kembalikan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Mengurutkan $booking berdasarkan booking_time secara descending (dari yang terbaru)
                        $sortedBookings = $booking->sortByDesc('booking_time');
                    ?>
                    @foreach ($sortedBookings as $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($item->room->cover)
                                    <img src="{{ asset('storage/cover/' . $item->room->cover) }}" alt="{{ $item->room->room_name }}" style="width: 100px; height: auto;">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>{{ $item->user->username ?? 'None' }}</td>
                            <td>{{ $item->room->room_name }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($item->booking_time)) }}</td>
                            <td>{{ date('d-m-Y H:i:s', strtotime($item->return_time)) }}</td>
                            <td>{{ $item->actual_return_time ? date('d-m-Y H:i:s', strtotime($item->actual_return_time)) : 'Sedang Dipakai' }}</td>
                            <td>
                                <i class="fas {{
                                    $item->actual_return_time == null ? 'fa-hourglass-half text-primary' :
                                    ($item->return_time < $item->actual_return_time ? 'fa-times-circle text-danger' : 'fa-check-circle text-success')
                                }} fa-lg"></i>
                            </td>
                            @if ($item->actual_return_time == null && now()->greaterThan($item->return_time))
                                <script>
                                    alert('Pengguna {{ $item->user->username ?? 'Unknown' }} melewati batas pengembalian!');
                                </script>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
