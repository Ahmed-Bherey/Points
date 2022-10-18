@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header header-bg">
                            <h3 class="card-title" style="float: right"> إهلاكات الاصول </h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form action="{{ route('destruction.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="text" class="form-control" id="assets" placeholder="" name="name">
                                        <label for="assets" class="col-sm-3 col-md-3 col-lg-4 col-xl-3 col-form-label">
                                            اسم الاصل
                                        </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" id="Clearvalue" placeholder="" name="assets_amount">
                                        <label for="Clearvalue" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">قيمة
                                            الاصل</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" id="mon" placeholder="" name="destructions_amount">
                                        <label for="mon" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">قيمة
                                            الاهلاكات</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="" name="date">
                                        <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">التاريخ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" id="Clear" placeholder="" name="pure_asset">
                                        <label for="Clear" class="col-sm-3 col-lg-4 col-xl-3 col-form-label"> صافى
                                            الاصل</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" id="damgevalue" placeholder="" name="destruction_amount">
                                        <label for="damgevalue" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">قيمة
                                            الاهلاك</label>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button onclick="history.back()" class="btn  bg-danger mr-3"><i class="fas fa-undo"></i>
                                </button>
                                <button type="submit" class="btn  bg-success"><i class="fa fa-check text-light" aria-hidden="true"></i></button>

                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>

            {{-- end card --}}
            {{-- start card table --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float:right; font-weight:bold;"> إهلاكات الاصول
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        اسم الاصل </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        قيمة الاصل </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        صافي الاصل </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        قيمة الاهلاكات </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        قيمة الاهلاك </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        التاريخ </th>

                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($destructions as $destruction)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $destruction->name }}
                                                    </td>
                                                    <td>{{ $destruction->assets_amount }}</td>
                                                    <td>{{ $destruction->pure_asset }}</td>
                                                    <td>{{ $destruction->destructions_amount }}</td>
                                                    <td>{{ $destruction->destruction_amount }}</td>
                                                    <td>{{ $destruction->date }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <button type="submit" class="btn bg-secondary">
                                                            <a href="{{ route('destruction.edit', $destruction->id) }}" class="text-white"><i class="far btn fa-edit " aria-hidden="true"></i></a>
                                                        </button>
                                                        <form method="post" action="{{ route('destruction.destroy', $destruction->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger  "><i class="fas fa-trash-alt"></i> </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            {{-- end table --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- end card table --}}


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
