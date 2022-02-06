@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Format Data Lalu Lintas</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" id="today"></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid ">
            <div class="card">
                <div class="card-body">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Format</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                Waktu survei maksimal satu hari dan di hari yang sama <br>
                                Saat pengisian data lalu lintas dimulai dari UTARA - TIMUR - SELATAN - BARAT - BARAT LAUT <br>
                                Arah arus berurutan dari RT - ST - LT <br>
                                Data lalu lintas per 10 menit
                            </p>
                        </div>
                    </div>
                    <form class="row" action="" autocomplete="off">
                        <div class="form-group col-sm-12 col-md-6 col-xl-6">
                            <label for="jam_awal">Jam Awal</label>
                            <input type="time" class="form-control" id="jam_awal" name="jam_awal" value="00:00" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-xl-6">
                            <label for="jam_akhir">Jam Akhir</label>
                            <input type="time" class="form-control" id="jam_akhir" name="jam_akhir" value="00:00" required>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6 mb-1">
                            <button type="button" class="btn btn-info w-100" name="preview" id="preview" onclick="preview_data()">Preview</button>
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-6">
                            <button type="button" class="btn btn-primary w-100" name="export" id="export" onclick="excelExport()">Export to Excel</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body table-responsive">
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

    function preview_data() {
        $("#table_preview tbody").empty()
        var jam_awal = $("#jam_awal").val();
        var jam_akhir = $("#jam_akhir").val();
        $.ajax({
            url: "{{ url('simpang5/format-data/preview') }}",
            type: "GET",
            data: {
                jam_awal: jam_awal,
                jam_akhir: jam_akhir
            },
            success: function(ajaxData) {
                for (var i = 0; i < ajaxData.length; i++) {
                    var markup = "<tr><td>" + ajaxData[i].jam_awal + " - " + ajaxData[i].jam_akhir +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>" +
                        "</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>"
                    $("#table_preview").append(markup);
                };
            },
        });
    };

    function excelExport() {
        var jam_awal = $("#jam_awal").val();
        var jam_akhir = $("#jam_akhir").val();
        var url_ = "{{ url('') }}" + "/simpang5/format-data/excelExport?jam_awal=" + jam_awal + "&jam_akhir=" + jam_akhir;;
        window.open(url_, '_blank');
    }
</script>
@endsection