@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            @if (auth()->user()->role == "dokter")
            <div class="card my-3">
                <div class="card-header">{{ __('Kelola Hari Libur') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session()->has('success'))
                    <div class="alert alert-info my-2" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    <form method="POST" action="/dokter-jadwal/{{ auth()->user()->id }}">
                        <div class="row justify-content-center mx-2">

                            @csrf
                            <div class="form-check col-1 mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" @if(is_array(old('jadwal',$jadwal)) &&
                                    in_array('1', old('jadwal',$jadwal))) checked @endif name="jadwal[]" value="1"
                                    id="Senin">
                                <label class="form-check-label" for="Senin">
                                    Senin
                                </label>
                            </div>
                            <div class="form-check col-1 mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" @if(is_array(old('jadwal',$jadwal)) &&
                                    in_array('2', old('jadwal',$jadwal))) checked @endif name="jadwal[]" value="2"
                                    id="Selasa">
                                <label class="form-check-label" for="Selasa">
                                    Selasa
                                </label>
                            </div>
                            <div class="form-check col-1 mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" @if(is_array(old('jadwal',$jadwal)) &&
                                    in_array('3', old('jadwal',$jadwal))) checked @endif name="jadwal[]" value="3"
                                    id="Rabu">
                                <label class="form-check-label" for="Rabu">
                                    Rabu
                                </label>
                            </div>
                            <div class="form-check col-1 mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" @if(is_array(old('jadwal',$jadwal)) &&
                                    in_array('4', old('jadwal',$jadwal))) checked @endif name="jadwal[]" value="4"
                                    id="Kamis">
                                <label class="form-check-label" for="Kamis">
                                    Kamis
                                </label>
                            </div>
                            <div class="form-check col-1 mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" @if(is_array(old('jadwal',$jadwal)) &&
                                    in_array('5', old('jadwal',$jadwal))) checked @endif name="jadwal[]" value="5"
                                    id="Jum'at">
                                <label class="form-check-label" for="Jum'at">
                                    Jum'at
                                </label>
                            </div>
                            <div class="form-check col-1 mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" @if(is_array(old('jadwal',$jadwal)) &&
                                    in_array('6', old('jadwal',$jadwal))) checked @endif name="jadwal[]" value="6"
                                    id="Sabtu">
                                <label class="form-check-label" for="Sabtu">
                                    Sabtu
                                </label>
                            </div>
                            <div class="form-check col-1 mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" @if(is_array(old('jadwal',$jadwal)) &&
                                    in_array('0', old('jadwal',$jadwal))) checked @endif name="jadwal[]" value="0"
                                    id="Minggu">
                                <label class="form-check-label" for="Minggu">
                                    Minggu
                                </label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @if (auth()->user()->role == "pasien")
            <div class="card my-3">
                <div class="card-header">{{ __('Daftar Dokter') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session()->has('success'))
                    <div class="alert alert-info my-2" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    <div class="table-responsive  text-nowrap">
                        <!--Table-->
                        <table class="table table-secondary table-hover table-striped">

                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Hari Libur</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($dokter as $index)

                                <tr>
                                    <td class="text-center">
                                        <?php echo $i++; ?>

                                    </td>
                                    <td>
                                        {{ $index->name }}
                                    </td>
                                    <td>
                                        Dokter
                                    </td>
                                    <td>
                                        @php if ($index->jadwal != NULL) {
                                        $hari = explode(',', $index->jadwal->hari);
                                        if (in_array('0', $hari)) {
                                        echo 'Minggu ';
                                        }
                                        if (in_array('1', $hari)) {
                                        echo 'Senin ';
                                        }
                                        if (in_array('2', $hari)) {
                                        echo 'Selasa ';
                                        }
                                        if (in_array('3', $hari)) {
                                        echo 'Rabu ';
                                        }
                                        if (in_array('4', $hari)) {
                                        echo 'Kamis ';
                                        }
                                        if (in_array('5', $hari)) {
                                        echo 'Jumat ';
                                        }
                                        if (in_array('6 ', $hari)) {
                                        echo 'Sabtu';
                                        }
                                        }else{
                                        echo'Tidak ada hari libur';
                                        }
                                        @endphp

                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <a href="/buat-jadwal/{{$index->id}}" class="btn btn-info btn-sm"><i
                                                    class="fa fa-edit"></i>
                                                Buat Jadwal</a>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>
                </div>
            </div>

            <div class="card my-3">
                <div class="card-header">{{ __('Daftar Pengajuan Jadwal') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session()->has('success'))
                    <div class="alert alert-info my-2" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                    @endif
                    <div class="table-responsive  text-nowrap">
                        <!--Table-->
                        <table class="table table-secondary table-hover table-striped">

                            <!--Table head-->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Dokter</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($pengajuan as $index)

                                <tr>
                                    <td class="text-center">
                                        <?php echo $i++; ?>

                                    </td>
                                    <td>
                                        {{ $index->pasien->name }}
                                    </td>
                                    <td>
                                        {{ $index->dokter->name }}
                                    </td>
                                    <td>
                                        {{ $index->jadwal }}
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <a href="/cetak/{{$index->id}}" target="_blank"
                                                class="btn btn-danger btn-sm"><i class="fa fa-edit"></i>
                                                Cetak</a>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!--Table body-->
                        </table>
                        <!--Table-->
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection