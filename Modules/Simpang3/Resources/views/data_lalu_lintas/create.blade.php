@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>New Case</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-weight-bold">Simpang 3</li>
                        <li class="breadcrumb-item"><a href="{{ url('/simpang3/data-lalu-lintas') }}">Identifikasi</a></li>
                        <li class="breadcrumb-item active">New Case</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid ">
            <div class="card">
                <div class="card-body">
                    <form class="row" action="{{ url('/simpang3/data-lalu-lintas/preview') }}" autocomplete="off" name="preview" id="preview" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-sm-12 col-md-6 col-xl-6">
                            <label for="nama_simpang">Nama Simpang</label>
                            <input type="text" class="form-control" id="nama_simpang" name="nama_simpang" data-toggle="modal" data-target="#data_simpangModal" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-xl-6">
                            <label for="date">Tanggal Survei</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="data_survei">Data Survei</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="data_survei" name="data_survei" accept=".xlsx, .xls, .csv" required>
                                    <label class="custom-file-label" for="data_survei">Pilih file</label>
                                </div>
                            </div>
                            <small class="form-text text-muted">Format file dalam bentuk Excel(.xls, .xlsx, .csv)</small>
                        </div>
                        <div class="col-12 row mt-3">
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <a href="{{ url('/simpang3/data-lalu-lintas') }}" class="btn btn-default btn-block">Batal</a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <button type="submit" class="btn btn-info btn-block">Preview Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card" id="preview_card">
                <div class="card-body">
                    <form class="row" action="{{ url('/simpang3/data-lalu-lintas/simpan') }}" autocomplete="off" name="simpan" id="simpan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="id_simpang" name="id_simpang" hidden>
                        <input type="text" name="arah" id="arah" hidden>
                        <input type="date" id="tgl_survei" name="tgl_survei" hidden>
                        <input type="text" id="file_name" name="file_name" hidden>
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="table_preview">
                                <thead class="table-bordered">
                                    <tr>
                                        <th rowspan="3"></th>
                                        <th colspan="26">LENGAN UTARA</th>
                                        <th colspan="26">LENGAN TIMUR</th>
                                        <th colspan="26">LENGAN SELATAN</th>
                                    </tr>
                                    <tr>
                                        <th colspan="26">Nama Jalan Utara</th>
                                        <th colspan="26">Nama Jalan Timur</th>
                                        <th colspan="26">Nama Jalan Selatan</th>
                                    </tr>
                                    <tr>
                                        <th colspan="13">LURUS (ST)</th>
                                        <th colspan="13">BELOK KIRI (LT)</th>
                                        <th colspan="13">BELOK KANAN (RT)</th>
                                        <th colspan="13">BELOK KIRI (LT)</th>
                                        <th colspan="13">BELOK KANAN (RT)</th>
                                        <th colspan="13">LURUS (ST)</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="align-middle">Waktu</th>
                                        <th colspan="6">Nama Jalan Utara</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Selatan</th>
                                        <th colspan="6">Nama Jalan Utara</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Timur</th>

                                        <th colspan="6">Nama Jalan Timur</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Utara</th>
                                        <th colspan="6">Nama Jalan Timur</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Selatan</th>

                                        <th colspan="6">Nama Jalan Selatan</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Timur</th>
                                        <th colspan="6">Nama Jalan Selatan</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Utara</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Proses ke Database</button>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="data_simpangModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title"><b>Pilih Simpang</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table id="data-simpang" class="table table-hover table-bordered w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th hidden></th>
                            <th>Nama Simpang</th>
                            <th>Lengan Utara</th>
                            <th>Lengan Timur</th>
                            <th>Lengan Selatan</th>
                            <th>Ekuivalen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_simpang as $data_simpang)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td hidden>{{ $data_simpang->id }}</td>
                            <td>{{ $data_simpang->nama_simpang }}</td>
                            <td>{{ $data_simpang->jalan_utara }}</td>
                            <td>{{ $data_simpang->jalan_timur }}</td>
                            <td>{{ $data_simpang->jalan_selatan }}</td>
                            <td>{{ $data_simpang->tipe_ekuivalen }}</td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm data_simpang" data-dismiss="modal" aria-label="Close">Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        bsCustomFileInput.init();

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("date").setAttribute("max", today);

        $("#data-simpang").DataTable({
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
        });
    });

    $(document).ready(function() {
        $(".data_simpang").on('click', function() {
            var currentRow = $(this).closest("tr");
            var id = currentRow.find("td:eq(1)").html();
            var nama_simpang = currentRow.find("td:eq(2)").html();

            $('#id_simpang').val(id);
            $('#nama_simpang').val(nama_simpang);
        });
        $("#date").on('change', function() {
            var date = $(this).val();
            $('#tgl_survei').val(date);
        });
    });

    $(document).ready(function() {
        $('#preview').on('submit', function(event) {
            event.preventDefault();
            $("#table_preview tbody").empty();
            $.ajax({
                url: "{{ url('/simpang3/data-lalu-lintas/preview') }}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(ajaxData) {
                    for (var i = 0; i < ajaxData.data.length; i++) {
                        $('#file_name').val(ajaxData.file)
                        $("#table_preview tbody").append(
                            `<tr>
                            <td>` + ajaxData.data[i].jam_awal + `-` + ajaxData.data[i].jam_akhir + `</td>    
                            <td>` + ajaxData.data[i].data1 + `</td>                            
                            <td>` + ajaxData.data[i].data2 + `</td>
                            <td>` + ajaxData.data[i].data3 + `</td>
                            <td>` + ajaxData.data[i].data4 + `</td>
                            <td>` + ajaxData.data[i].data5 + `</td>
                            <td>` + ajaxData.data[i].data6 + `</td>
                            <td>` + ajaxData.data[i].data7 + `</td>
                            <td>` + ajaxData.data[i].data8 + `</td>
                            <td>` + ajaxData.data[i].data9 + `</td>
                            <td>` + ajaxData.data[i].data10 + `</td>
                            <td>` + ajaxData.data[i].data11 + `</td>
                            <td>` + ajaxData.data[i].data12 + `</td>
                            <td>` + ajaxData.data[i].data13 + `</td>
                            <td>` + ajaxData.data[i].data14 + `</td>                            
                            <td>` + ajaxData.data[i].data15 + `</td>
                            <td>` + ajaxData.data[i].data16 + `</td>
                            <td>` + ajaxData.data[i].data17 + `</td>
                            <td>` + ajaxData.data[i].data18 + `</td>
                            <td>` + ajaxData.data[i].data19 + `</td>
                            <td>` + ajaxData.data[i].data20 + `</td>
                            <td>` + ajaxData.data[i].data21 + `</td>
                            <td>` + ajaxData.data[i].data22 + `</td>
                            <td>` + ajaxData.data[i].data23 + `</td>
                            <td>` + ajaxData.data[i].data24 + `</td>
                            <td>` + ajaxData.data[i].data25 + `</td>
                            <td>` + ajaxData.data[i].data26 + `</td>
                            <td>` + ajaxData.data[i].data27 + `</td>                            
                            <td>` + ajaxData.data[i].data28 + `</td>
                            <td>` + ajaxData.data[i].data29 + `</td>
                            <td>` + ajaxData.data[i].data30 + `</td>
                            <td>` + ajaxData.data[i].data31 + `</td>
                            <td>` + ajaxData.data[i].data32 + `</td>
                            <td>` + ajaxData.data[i].data33 + `</td>
                            <td>` + ajaxData.data[i].data34 + `</td>
                            <td>` + ajaxData.data[i].data35 + `</td>
                            <td>` + ajaxData.data[i].data36 + `</td>
                            <td>` + ajaxData.data[i].data37 + `</td>
                            <td>` + ajaxData.data[i].data38 + `</td>
                            <td>` + ajaxData.data[i].data39 + `</td>
                            <td>` + ajaxData.data[i].data40 + `</td>                            
                            <td>` + ajaxData.data[i].data41 + `</td>
                            <td>` + ajaxData.data[i].data42 + `</td>
                            <td>` + ajaxData.data[i].data43 + `</td>
                            <td>` + ajaxData.data[i].data44 + `</td>
                            <td>` + ajaxData.data[i].data45 + `</td>
                            <td>` + ajaxData.data[i].data46 + `</td>
                            <td>` + ajaxData.data[i].data47 + `</td>
                            <td>` + ajaxData.data[i].data48 + `</td>
                            <td>` + ajaxData.data[i].data49 + `</td>
                            <td>` + ajaxData.data[i].data50 + `</td>
                            <td>` + ajaxData.data[i].data51 + `</td>
                            <td>` + ajaxData.data[i].data52 + `</td>
                            <td>` + ajaxData.data[i].data53 + `</td>                            
                            <td>` + ajaxData.data[i].data54 + `</td>
                            <td>` + ajaxData.data[i].data55 + `</td>
                            <td>` + ajaxData.data[i].data56 + `</td>
                            <td>` + ajaxData.data[i].data57 + `</td>
                            <td>` + ajaxData.data[i].data58 + `</td>
                            <td>` + ajaxData.data[i].data59 + `</td>
                            <td>` + ajaxData.data[i].data60 + `</td>
                            <td>` + ajaxData.data[i].data61 + `</td>
                            <td>` + ajaxData.data[i].data62 + `</td>
                            <td>` + ajaxData.data[i].data63 + `</td>
                            <td>` + ajaxData.data[i].data64 + `</td>
                            <td>` + ajaxData.data[i].data65 + `</td>
                            <td>` + ajaxData.data[i].data66 + `</td>                            
                            <td>` + ajaxData.data[i].data67 + `</td>
                            <td>` + ajaxData.data[i].data68 + `</td>
                            <td>` + ajaxData.data[i].data69 + `</td>
                            <td>` + ajaxData.data[i].data70 + `</td>
                            <td>` + ajaxData.data[i].data71 + `</td>
                            <td>` + ajaxData.data[i].data72 + `</td>
                            <td>` + ajaxData.data[i].data73 + `</td>
                            <td>` + ajaxData.data[i].data74 + `</td>
                            <td>` + ajaxData.data[i].data75 + `</td>
                            <td>` + ajaxData.data[i].data76 + `</td>
                            <td>` + ajaxData.data[i].data77 + `</td>
                            <td>` + ajaxData.data[i].data78 + `</td>
                        </tr>`
                        )
                    }
                    $('#preview_card').show();
                }
            });
        });
    });
</script>
@endsection