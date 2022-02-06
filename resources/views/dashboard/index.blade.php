@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Dashboard</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" id="today"></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body row align-items-center">
                        <div class="col-sm-12 col-md-6 col-xl-6 text-center">
                            <h3>Welcome to <b>Traffic APPs</b></h3>
                            <p><b>Sistem Identifikasi Arus Lalu Lintas pada Persimpangan Jalan</b></p>
                            <p>Tipe jalan yang tersedia:</p>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <b>Simpang</b>
                                            <h1><b>3</b></h1>
                                        </div>
                                        <div class="card-footer bg-primary">
                                            <a class="stretched-link" href="{{ url('/simpang3/data-simpang') }}">Data Simpang&nbsp;&nbsp;<i class="fas fa-chevron-right fa-xs"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <b>Simpang</b>
                                            <h1><b>4</b></h1>
                                        </div>
                                        <div class="card-footer bg-primary">
                                            <a class="stretched-link" href="{{ url('/simpang3/data-simpang') }}">Data Simpang&nbsp;&nbsp;<i class="fas fa-chevron-right fa-xs"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <b>Simpang</b>
                                            <h1><b>5</b></h1>
                                        </div>
                                        <div class="card-footer bg-primary">
                                            <a class="stretched-link" href="{{ url('/simpang5/data-simpang') }}">Data Simpang&nbsp;&nbsp;<i class="fas fa-chevron-right fa-xs"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-none d-sm-none d-md-block col-md-6 col-xl-6">
                            <div class="d-flex justify-content-center ">
                                <img src="{{ URL::asset('AdminLTE-3.1.0/dist/img/statistics.svg') }}" wilih="70%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Petunjuk Penggunaan</b></h3>
                    </div>
                    <div class="card-body">
                        <ol class="font-weight-bold">
                            <li>Pilih Tipe Jalan
                                <ul class="font-weight-normal">
                                    <li>Tipe jalan yang tersedia saat ini: Simpang 3, Simpang 4, dan Simpang 5.</li>
                                </ul>
                            </li>
                            <li>Input Data Simpang
                                <ul class="font-weight-normal">
                                    <li>Masuk ke halaman "Data Simpang".</li>
                                    <li>Pilih "Tambah data".</li>
                                    <li>Masukkan informasi simpang dan nilai ekivalensi.</li>
                                    <li>Simpan data dengan menekan tombol "Simpan".</li>
                                </ul>
                            </li>
                            <li>Input Data Lalu Lintas
                                <ul class="font-weight-normal">
                                    <li>Masuk ke halaman "Identifikasi".</li>
                                    <li>Untuk menambahkan data lalu lintas, Tekan "New Case"</li>
                                    <li>Pilih simpang yang ingin ditambahkan data lalu lintas / data surveinya.</li>
                                    <li>Masukkan data lalu lintas untuk setiap lengan dan sesuikan dengan arahnya (RT, ST, LT)</li>
                                    <li>Klik tombol "Preview" untuk memeriksa data yang akan diunggah.</li>
                                    <li>Simpan data dengan menekan tombol "Proses ke Database"</li>
                                    <li>Untuk melihat hasilnya, kembali ke halaman "Identifikasi"</li>
                                </ul>
                            </li>
                            <li>Identifikasi Simpang
                                <ul class="font-weight-normal">
                                    <li>Dalam halaman "Identifikasi" terdapat daftar simpang yang sudah di tambahkan data lalu lintas</li>
                                    <li>Pilih data yang ingin diidentifikasi dengan menekan tombol "Identifikasi"</li>
                                    <li>Sistem akan menampilkan hasil identifikasi simpang dari data lalu lintas yang berisi:
                                        <ul>
                                            <li>Kendaraan per-Jam</li>
                                            <li>SMP per-Jam</li>
                                            <li>Fluktasi Lalu Lintas</li>
                                            <li>Komposisi Kendaraan</li>
                                            <li>Komposisi Pergerakan</li>
                                            <li>Jam Puncak</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Format Data Lalu Lintas</b></h3>
                    </div>
                    <div class="card-body">
                        <p><b>Data lalu lintas berisi data survei dengan ketentuan tiap kendaraan dibagi menjadi 13 jenis, sebagai berikut:</b></p>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm">
                                <thead class="table-bordered">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Jenis Kendaraan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Kendaraan Roda Tiga</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Sedan</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>Oplet</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td>Micro Bus</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5</td>
                                        <td>Bus</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6</td>
                                        <td>Pick Up</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">7</td>
                                        <td>Micro Truck</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">8</td>
                                        <td>Truck As 2</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">9</td>
                                        <td>Truck As 3</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">10</td>
                                        <td>Mobil Tempel / Semi Trailer</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">11</td>
                                        <td>Sepeda Motor</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">12</td>
                                        <td>Sepeda</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">13</td>
                                        <td>Becak</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p><b>Format data lalu lintas dapat diunduh pada halaman "Format Data Lalu Lintas"</b></p>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function() {
        var today = new Date();
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        var li = today.getDate();
        var mm = monthNames[today.getMonth()];
        var yyyy = today.getFullYear();

        today = 'Today : ' + li + ' ' + mm + ' ' + yyyy;
        $("#today").text(today);
    });
</script>
@endsection