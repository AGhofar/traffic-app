@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>New Case</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-weight-bold">Simpang 5</li>
                        <li class="breadcrumb-item"><a href="{{ url('/simpang5/data-lalu-lintas') }}">Identifikasi</a></li>
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
                    <form class="row" action="{{ url('/simpang5/data-lalu-lintas/preview') }}" autocomplete="off" name="preview" id="preview" method="POST" enctype="multipart/form-data">
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
                                <a href="{{ url('/simpang5/data-lalu-lintas') }}" class="btn btn-default btn-block">Batal</a>
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
                    <form class="row" action="{{ url('/simpang5/data-lalu-lintas/simpan') }}" autocomplete="off" name="simpan" id="simpan" method="POST" enctype="multipart/form-data">
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
                                        <th colspan="52">LENGAN UTARA</th>
                                        <th colspan="52">LENGAN TIMUR</th>
                                        <th colspan="52">LENGAN SELATAN</th>
                                        <th colspan="52">LENGAN BARAT</th>
                                        <th colspan="52">LENGAN BARAT LAUT</th>
                                    </tr>
                                    <tr>
                                        <th colspan="52">Nama Jalan Utara</th>
                                        <th colspan="52">Nama Jalan Timur</th>
                                        <th colspan="52">Nama Jalan Selatan</th>
                                        <th colspan="52">Nama Jalan Barat</th>
                                        <th colspan="52">Nama Jalan Barat Laut</th>
                                    </tr>
                                    <tr>
                                        <th colspan="13">BELOK KANAN (RT1)</th>
                                        <th colspan="13">BELOK KANAN (RT2)</th>
                                        <th colspan="13">LURUS (ST)</th>
                                        <th colspan="13">BELOK KIRI (LT)</th>
                                        <th colspan="13">BELOK KANAN (RT)</th>
                                        <th colspan="13">LURUS (ST1)</th>
                                        <th colspan="13">LURUS (ST2)</th>
                                        <th colspan="13">BELOK KIRI (LT)</th>
                                        <th colspan="13">BELOK KANAN (RT)</th>
                                        <th colspan="13">LURUS (ST1)</th>
                                        <th colspan="13">LURUS (ST2)</th>
                                        <th colspan="13">BELOK KIRI (LT)</th>
                                        <th colspan="13">BELOK KANAN (RT)</th>
                                        <th colspan="13">LURUS (ST)</th>
                                        <th colspan="13">BELOK KIRI (LT1)</th>
                                        <th colspan="13">BELOK KIRI (LT2)</th>
                                        <th colspan="13">BELOK KANAN (RT)</th>
                                        <th colspan="13">LURUS (ST1)</th>
                                        <th colspan="13">LURUS (ST2)</th>
                                        <th colspan="13">BELOK KIRI (LT)</th>
                                    </tr>
                                    <tr>
                                        <th rowspan="2" class="align-middle">Waktu</th>
                                        <th colspan="6">Nama Jalan Utara</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Barat Laut</th>
                                        <th colspan="6">Nama Jalan Utara</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Barat</th>
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
                                        <th colspan="6">Nama Jalan Barat Laut</th>
                                        <th colspan="6">Nama Jalan Timur</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Barat</th>
                                        <th colspan="6">Nama Jalan Timur</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Selatan</th>

                                        <th colspan="6">Nama Jalan Selatan</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Timur</th>
                                        <th colspan="6">Nama Jalan Selatan</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Utara</th>
                                        <th colspan="6">Nama Jalan Selatan</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Barat Laut</th>
                                        <th colspan="6">Nama Jalan Selatan</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Barat</th>

                                        <th colspan="6">Nama Jalan Barat</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Selatan</th>
                                        <th colspan="6">Nama Jalan Barat</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Timur</th>
                                        <th colspan="6">Nama Jalan Barat</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Utara</th>
                                        <th colspan="6">Nama Jalan Barat</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Barat Laut</th>

                                        <th colspan="6">Nama Jalan Barat Laut</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Barat</th>
                                        <th colspan="6">Nama Jalan Barat Laut</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Selatan</th>
                                        <th colspan="6">Nama Jalan Barat Laut</th>
                                        <th>Ke</th>
                                        <th colspan="6">Nama Jalan Timur</th>
                                        <th colspan="6">Nama Jalan Barat Laut</th>
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
                            <th>Lengan Barat</th>
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
                            <td>{{ $data_simpang->jalan_barat }}</td>
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
                url: "{{ url('/simpang5/data-lalu-lintas/preview') }}",
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

                            <td>` + ajaxData.data[i].data79 + `</td>                            
                            <td>` + ajaxData.data[i].data80 + `</td>
                            <td>` + ajaxData.data[i].data81 + `</td>
                            <td>` + ajaxData.data[i].data82 + `</td>
                            <td>` + ajaxData.data[i].data83 + `</td>
                            <td>` + ajaxData.data[i].data84 + `</td>
                            <td>` + ajaxData.data[i].data85 + `</td>
                            <td>` + ajaxData.data[i].data86 + `</td>
                            <td>` + ajaxData.data[i].data87 + `</td>
                            <td>` + ajaxData.data[i].data88 + `</td>
                            <td>` + ajaxData.data[i].data89 + `</td>
                            <td>` + ajaxData.data[i].data90 + `</td>
                            <td>` + ajaxData.data[i].data91 + `</td>

                            <td>` + ajaxData.data[i].data92 + `</td>                            
                            <td>` + ajaxData.data[i].data93 + `</td>
                            <td>` + ajaxData.data[i].data94 + `</td>
                            <td>` + ajaxData.data[i].data95 + `</td>
                            <td>` + ajaxData.data[i].data96 + `</td>
                            <td>` + ajaxData.data[i].data97 + `</td>
                            <td>` + ajaxData.data[i].data98 + `</td>
                            <td>` + ajaxData.data[i].data99 + `</td>
                            <td>` + ajaxData.data[i].data100 + `</td>
                            <td>` + ajaxData.data[i].data101 + `</td>
                            <td>` + ajaxData.data[i].data102 + `</td>
                            <td>` + ajaxData.data[i].data103 + `</td>
                            <td>` + ajaxData.data[i].data104 + `</td>

                            <td>` + ajaxData.data[i].data105 + `</td>                            
                            <td>` + ajaxData.data[i].data106 + `</td>
                            <td>` + ajaxData.data[i].data107 + `</td>
                            <td>` + ajaxData.data[i].data108 + `</td>
                            <td>` + ajaxData.data[i].data109 + `</td>
                            <td>` + ajaxData.data[i].data110 + `</td>
                            <td>` + ajaxData.data[i].data111 + `</td>
                            <td>` + ajaxData.data[i].data112 + `</td>
                            <td>` + ajaxData.data[i].data113 + `</td>
                            <td>` + ajaxData.data[i].data114 + `</td>
                            <td>` + ajaxData.data[i].data115 + `</td>
                            <td>` + ajaxData.data[i].data116 + `</td>
                            <td>` + ajaxData.data[i].data117 + `</td>

                            <td>` + ajaxData.data[i].data118 + `</td>                            
                            <td>` + ajaxData.data[i].data119 + `</td>
                            <td>` + ajaxData.data[i].data120 + `</td>
                            <td>` + ajaxData.data[i].data121 + `</td>
                            <td>` + ajaxData.data[i].data122 + `</td>
                            <td>` + ajaxData.data[i].data123 + `</td>
                            <td>` + ajaxData.data[i].data124 + `</td>
                            <td>` + ajaxData.data[i].data125 + `</td>
                            <td>` + ajaxData.data[i].data126 + `</td>
                            <td>` + ajaxData.data[i].data127 + `</td>
                            <td>` + ajaxData.data[i].data128 + `</td>
                            <td>` + ajaxData.data[i].data129 + `</td>
                            <td>` + ajaxData.data[i].data130 + `</td>

                            <td>` + ajaxData.data[i].data131 + `</td>                            
                            <td>` + ajaxData.data[i].data132 + `</td>
                            <td>` + ajaxData.data[i].data133 + `</td>
                            <td>` + ajaxData.data[i].data134 + `</td>
                            <td>` + ajaxData.data[i].data135 + `</td>
                            <td>` + ajaxData.data[i].data136 + `</td>
                            <td>` + ajaxData.data[i].data137 + `</td>
                            <td>` + ajaxData.data[i].data138 + `</td>
                            <td>` + ajaxData.data[i].data139 + `</td>
                            <td>` + ajaxData.data[i].data140 + `</td>
                            <td>` + ajaxData.data[i].data141 + `</td>
                            <td>` + ajaxData.data[i].data142 + `</td>
                            <td>` + ajaxData.data[i].data143 + `</td>

                            <td>` + ajaxData.data[i].data144 + `</td>                            
                            <td>` + ajaxData.data[i].data145 + `</td>
                            <td>` + ajaxData.data[i].data146 + `</td>
                            <td>` + ajaxData.data[i].data147 + `</td>
                            <td>` + ajaxData.data[i].data148 + `</td>
                            <td>` + ajaxData.data[i].data149 + `</td>
                            <td>` + ajaxData.data[i].data150 + `</td>
                            <td>` + ajaxData.data[i].data151 + `</td>
                            <td>` + ajaxData.data[i].data152 + `</td>
                            <td>` + ajaxData.data[i].data153 + `</td>
                            <td>` + ajaxData.data[i].data154 + `</td>
                            <td>` + ajaxData.data[i].data155 + `</td>
                            <td>` + ajaxData.data[i].data156 + `</td>

                            <td>` + ajaxData.data[i].data157 + `</td>                            
                            <td>` + ajaxData.data[i].data158 + `</td>
                            <td>` + ajaxData.data[i].data159 + `</td>
                            <td>` + ajaxData.data[i].data160 + `</td>
                            <td>` + ajaxData.data[i].data161 + `</td>
                            <td>` + ajaxData.data[i].data162 + `</td>
                            <td>` + ajaxData.data[i].data163 + `</td>
                            <td>` + ajaxData.data[i].data164 + `</td>
                            <td>` + ajaxData.data[i].data165 + `</td>
                            <td>` + ajaxData.data[i].data166 + `</td>
                            <td>` + ajaxData.data[i].data167 + `</td>
                            <td>` + ajaxData.data[i].data168 + `</td>
                            <td>` + ajaxData.data[i].data169 + `</td>
                            
                            <td>` + ajaxData.data[i].data170 + `</td>                            
                            <td>` + ajaxData.data[i].data171 + `</td>
                            <td>` + ajaxData.data[i].data172 + `</td>
                            <td>` + ajaxData.data[i].data173 + `</td>
                            <td>` + ajaxData.data[i].data174 + `</td>
                            <td>` + ajaxData.data[i].data175 + `</td>
                            <td>` + ajaxData.data[i].data176 + `</td>
                            <td>` + ajaxData.data[i].data177 + `</td>
                            <td>` + ajaxData.data[i].data178 + `</td>
                            <td>` + ajaxData.data[i].data179 + `</td>
                            <td>` + ajaxData.data[i].data180 + `</td>
                            <td>` + ajaxData.data[i].data181 + `</td>
                            <td>` + ajaxData.data[i].data182 + `</td>

                            <td>` + ajaxData.data[i].data183 + `</td>                            
                            <td>` + ajaxData.data[i].data184 + `</td>
                            <td>` + ajaxData.data[i].data185 + `</td>
                            <td>` + ajaxData.data[i].data186 + `</td>
                            <td>` + ajaxData.data[i].data187 + `</td>
                            <td>` + ajaxData.data[i].data188 + `</td>
                            <td>` + ajaxData.data[i].data189 + `</td>
                            <td>` + ajaxData.data[i].data190 + `</td>
                            <td>` + ajaxData.data[i].data191 + `</td>
                            <td>` + ajaxData.data[i].data192 + `</td>
                            <td>` + ajaxData.data[i].data193 + `</td>
                            <td>` + ajaxData.data[i].data194 + `</td>
                            <td>` + ajaxData.data[i].data195 + `</td>

                            <td>` + ajaxData.data[i].data196 + `</td>                            
                            <td>` + ajaxData.data[i].data197 + `</td>
                            <td>` + ajaxData.data[i].data198 + `</td>
                            <td>` + ajaxData.data[i].data199 + `</td>
                            <td>` + ajaxData.data[i].data200 + `</td>
                            <td>` + ajaxData.data[i].data201 + `</td>
                            <td>` + ajaxData.data[i].data202 + `</td>
                            <td>` + ajaxData.data[i].data203 + `</td>
                            <td>` + ajaxData.data[i].data204 + `</td>
                            <td>` + ajaxData.data[i].data205 + `</td>
                            <td>` + ajaxData.data[i].data206 + `</td>
                            <td>` + ajaxData.data[i].data207 + `</td>
                            <td>` + ajaxData.data[i].data208 + `</td>

                            <td>` + ajaxData.data[i].data209 + `</td>                            
                            <td>` + ajaxData.data[i].data210 + `</td>
                            <td>` + ajaxData.data[i].data211 + `</td>
                            <td>` + ajaxData.data[i].data212 + `</td>
                            <td>` + ajaxData.data[i].data213 + `</td>
                            <td>` + ajaxData.data[i].data214 + `</td>
                            <td>` + ajaxData.data[i].data215 + `</td>
                            <td>` + ajaxData.data[i].data216 + `</td>
                            <td>` + ajaxData.data[i].data217 + `</td>
                            <td>` + ajaxData.data[i].data218 + `</td>
                            <td>` + ajaxData.data[i].data219 + `</td>
                            <td>` + ajaxData.data[i].data220 + `</td>
                            <td>` + ajaxData.data[i].data221 + `</td>

                            <td>` + ajaxData.data[i].data222 + `</td>                            
                            <td>` + ajaxData.data[i].data223 + `</td>
                            <td>` + ajaxData.data[i].data224 + `</td>
                            <td>` + ajaxData.data[i].data225 + `</td>
                            <td>` + ajaxData.data[i].data226 + `</td>
                            <td>` + ajaxData.data[i].data227 + `</td>
                            <td>` + ajaxData.data[i].data228 + `</td>
                            <td>` + ajaxData.data[i].data229 + `</td>
                            <td>` + ajaxData.data[i].data230 + `</td>
                            <td>` + ajaxData.data[i].data231 + `</td>
                            <td>` + ajaxData.data[i].data232 + `</td>
                            <td>` + ajaxData.data[i].data233 + `</td>
                            <td>` + ajaxData.data[i].data234 + `</td>

                            <td>` + ajaxData.data[i].data235 + `</td>                            
                            <td>` + ajaxData.data[i].data236 + `</td>
                            <td>` + ajaxData.data[i].data237 + `</td>
                            <td>` + ajaxData.data[i].data238 + `</td>
                            <td>` + ajaxData.data[i].data239 + `</td>
                            <td>` + ajaxData.data[i].data240 + `</td>
                            <td>` + ajaxData.data[i].data241 + `</td>
                            <td>` + ajaxData.data[i].data242 + `</td>
                            <td>` + ajaxData.data[i].data243 + `</td>
                            <td>` + ajaxData.data[i].data244 + `</td>
                            <td>` + ajaxData.data[i].data245 + `</td>
                            <td>` + ajaxData.data[i].data246 + `</td>
                            <td>` + ajaxData.data[i].data247 + `</td>

                            <td>` + ajaxData.data[i].data248 + `</td>                            
                            <td>` + ajaxData.data[i].data249 + `</td>
                            <td>` + ajaxData.data[i].data250 + `</td>
                            <td>` + ajaxData.data[i].data251 + `</td>
                            <td>` + ajaxData.data[i].data252 + `</td>
                            <td>` + ajaxData.data[i].data253 + `</td>
                            <td>` + ajaxData.data[i].data254 + `</td>
                            <td>` + ajaxData.data[i].data255 + `</td>
                            <td>` + ajaxData.data[i].data256 + `</td>
                            <td>` + ajaxData.data[i].data257 + `</td>
                            <td>` + ajaxData.data[i].data258 + `</td>
                            <td>` + ajaxData.data[i].data259 + `</td>
                            <td>` + ajaxData.data[i].data260 + `</td>
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