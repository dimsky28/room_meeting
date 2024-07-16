            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">
                        Pemesanan Ruang
                    </h5>
                    <h6 class="card-subtitle text-muted">
                        Berikut jadwal lebih lengkap peminjaman Gedung Serbaguna Sasana Krida Karang Taruna berdasarkan waktu pemesanan!
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Pengguna</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Biro</th>
                                <th scope="col">Agenda</th>
                                <th scope="col">Waktu Pesan</th>
                                <th scope="col">Waktu Kembalikan</th>
                                <th scope="col">Sudah Kembalikan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking as $item)
                                <tr class="{{ $item->actual_return_time == null ? '' : ($item->return_time < $item->actual_return_time ?
                                    '' : '') }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->username ?? 'None'}}</td>
                                    <td>{{ $item->room->room_name }}</td>
                                    <td>{{ $item->user->biro ?? 'None'}}</td>
                                    <td>{{ $item->user->agenda ?? 'None'}}</td>
                                    <td>{{ $item->booking_time }}</td>
                                    <td>{{ $item->return_time }}</td>
                                    <td>{{ $item->actual_return_time }}</td>
                                    <td>
                                        <button class="btn fixed-size-button {{
                                            $item->actual_return_time == null ? 'btn-primary' :
                                            ($item->return_time < $item->actual_return_time ? 'btn-danger' : 'btn-success')
                                        }}">
                                            {{ $item->actual_return_time == null ? 'Berjalan' :
                                            ($item->return_time < $item->actual_return_time ? 'Jatuh Tempo' : 'Selesai') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

