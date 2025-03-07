@extends('welcome')
@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <center>
                    <h3 class="mb-0 h4 font-weight-bolder"> Rekapitulasi <br>
                        Dinas Kependudukan Dan Catatan Sipil Kota
                        Cirebon</h3>
                </center>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-2 ps-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">Total Data</p>
                                <h4 class="mb-0">{{ $totalRekap }}</h4>
                            </div>
                            <div
                                class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">weekend</i>
                            </div>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-2 ps-3"></div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header p-3">
                        <h6 class="mb-0">Pencatatan Per Bulan</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="rekapChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        @include('layout.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('rekapChart').getContext('2d');
            var rekapChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($bulanLengkap) !!}, // Label bulan dari controller
                    datasets: [{
                        label: 'Jumlah Pencatatan',
                        data: {!! json_encode($jumlahPerBulan) !!}, // Data jumlah pencatatan
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1 // Menampilkan hanya angka bulat
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
