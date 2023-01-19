@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('success'))
            <div class="alert alert-info my-2" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Tambah Jadwal') }}</div>

                <div class="card-body">
                    <form method="POST" action="/jadwal-add">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Dokter') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" value="{{ $dokter->name }}"
                                    autocomplete="off" readonly>


                                @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="tanggal" class="form-control datepicker" required
                                    autocomplete="off">


                                @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <input id="id_dokter" type="text" class="form-control" name="id_dokter"
                            value="{{ $dokter->id }}" required hidden>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        daysOfWeekDisabled: [0,6]
    });
</script>
@endsection