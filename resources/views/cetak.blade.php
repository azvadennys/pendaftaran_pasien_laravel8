<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body onload="window.print()">
    <div class=" row justify-content-center my-5">
        <h2 class="text-center mb-3">Pengajuan Pendaftaran</h2>
        <div class="col-md-8">
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pasien') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"
                        value="{{ $pengajuan_jadwal->pasien->name }}" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Email Pasien') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"
                        value="{{ $pengajuan_jadwal->pasien->email }}" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama Dokter') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"
                        value="{{ $pengajuan_jadwal->dokter->name }}" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Konsultasi') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $pengajuan_jadwal->jadwal}}"
                        readonly>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row mb-3">
                <p class="text-center">Bukti pendaftaran ini sah apabila tidak ada coretan.</p>
            </div>
        </div>

    </div>
</body>

</html>