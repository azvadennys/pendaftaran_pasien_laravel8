@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">

                        <div class="col-2">{{ __('Dokter') }}
                        </div>
                        <div class="col-1"><a href="tambah-dokter" class="btn btn-primary btn-sm"><i
                                    class="fa fa-plus"></i>Tambah</a>
                        </div>
                    </div>
                </div>

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
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                                @php

                                $i = 1;
                                @endphp
                                @foreach ($users as $index)

                                <tr>
                                    <td class="text-center">
                                        <?php echo $i++; ?>

                                    </td>
                                    <td>
                                        {{ $index->name }}
                                    </td>
                                    <td>
                                        {{ $index->email }}
                                    </td>
                                    <td>
                                        Dokter
                                    </td>
                                    <td>
                                        <div class="text-right">
                                            <a href="/dokter-edit/{{$index->id}}" class="btn btn-info btn-sm"><i
                                                    class="fa fa-edit"></i>
                                                Edit</a>
                                            <form action="/dokter/{{$index->id}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i> Delete</button>
                                            </form>

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