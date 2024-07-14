@extends('layouts.mainlayout')

@section('title', 'Laporan PDF')

@section('content')

<div class="wrapper">
    <div class="main">
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Laporan Pemesanan</h4>
                    <form action="{{ route('export.pdf') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Unduh PDF</button>
                        <div class="card border-0 mt-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th >User</th>
                                                <th>Room</th>
                                                <th>Check-in</th>
                                                <th>Check-out</th>
                                                <th>Actual Check-out</th>
                                                <th>Status</th>
                                                <th>
                                                    Pilih
                                                    <br>
                                                    <input type="checkbox" id="select-all">
                                                    {{-- Checkbox untuk memilih semua --}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                // Mengurutkan $bookings berdasarkan booking_time secara descending (dari yang terbaru)
                                                $sortedBookings = $booking->whereNotNull('actual_return_time')->sortByDesc('booking_time');
                                            ?>
                                            @foreach ($sortedBookings as $item)
                                                <tr class="text">
                                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->user->username ?? 'None' }}</td>
                                                    <td>{{ $item->room->room_name }}</td>
                                                    <td>{{ date('d-m-Y H:i:s', strtotime($item->booking_time)) }}</td>
                                                    <td>{{ date('d-m-Y H:i:s', strtotime($item->return_time)) }}</td>
                                                    <td>{{ date('d-m-Y H:i:s', strtotime($item->actual_return_time)) }}</td>
                                                    <td style="text-align: center;">
                                                        <i class="fas {{
                                                            $item->actual_return_time == null ? 'fa-hourglass-half text-primary' :
                                                            ($item->return_time < $item->actual_return_time ? 'fa-times-circle text-danger' : 'fa-check-circle text-success')
                                                        }} fa-lg"></i>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <input type="checkbox" name="selected_bookings[]" value="{{ $item->id }}" class="booking-checkbox">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item {{ $booking->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link text-dark" href="{{ $booking->previousPageUrl() }}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        @foreach ($booking->getUrlRange(1, $booking->lastPage()) as $page => $url)
                                            <li class="page-item {{ $page == $booking->currentPage() ? 'active' : '' }}">
                                                <a class="page-link text-dark" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                        <li class="page-item {{ $booking->currentPage() == $booking->lastPage() ? 'disabled' : '' }}">
                                            <a class="page-link text-dark" href="{{ $booking->nextPageUrl() }}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    document.getElementById('select-all').addEventListener('change', function(e) {
        var checkboxes = document.querySelectorAll('.booking-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = e.target.checked;
        });
    });
</script>

@endsection
