@extends('welcome')
@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="ms-3">
                <center>
                    <h3 class="mb-0 h4 font-weight-bolder"> Rekapitulasi <br>
                        Dinas kependudukan Dan Catatan Sipil Kota
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
                    <div class="card-footer p-2 ps-3">

                    </div>
                </div>
            </div>

        </div>


        @include('layout.footer')
    </div>
@endsection
