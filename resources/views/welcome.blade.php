@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-3">Selamat Datang Di Sistem RS Citra</h1>

            <div class="card my-3">
                <div class="card-header">{{ __('Dokter Tersedia') }}</div>

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

        </div>
    </div>
</div>
@endsection