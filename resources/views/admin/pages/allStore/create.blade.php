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
                                <h3 class="card-title" style="float: right"> الخزائن</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('treasuries.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="treasury"
                                                placeholder="اسم الخزينة" name="name">
                                            <label for="treasury" class="col-form-label">اسم الخزينة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="value"
                                                placeholder=" قيمة الخزينة " name="treasury_value">
                                            <label for="value" class="col-form-label"> قيمة الخزينة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="honest" placeholder="امين الخزينة"
                                                name="treasury_secretary">
                                            <label for="honest" class="col-form-label"> امين الخزينة </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="note" id="note"></textarea>
                                            <label for="note" class="col-sm-4 col-xl-3 col-form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button type="reset" class="btn bg-secondary" onclick="history.back()" type="submit">
                                        <i class="fas fa-undo"></i>
                                    </button>
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
                                <h3 class="card-title" style="float:right; font-weight:bold;"> الخزائن </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            اسم الخزينة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            امين الخزينة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            قيمة الخزينة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            ملاحظات</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">s</td>
                                                        <td>dsdf </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <button type="submit" class="btn  "> <i
                                                                    class="far btn fa-edit "
                                                                    aria-hidden="true"></i></button>
                                                            <button type="submit" class="btn   "><i
                                                                    class="fas fa-trash-alt"></i> </button>
                                                        </td>
                                                        </tr>
                                                        @foreach ($treasuries as $treasury)
                                                            <tr class="odd">
                                                                <td class="dtr-control sorting_1" tabindex="0">
                                                                    {{ $treasury->name }}</td>
                                                                <td>{{ $treasury->treasury_value }}</td>
                                                                <td>{{ $treasury->treasury_secretary }}</td>
                                                                <td>{{ $treasury->note }}</td>
                                                                <td class="d-flex justify-content-center">
                                                                    <button type="submit" class="btn bg-secondary ">
                                                                        <a href="{{ route('treasuries.edit', $treasury->id) }}"
                                                                            class="text-white"><i
                                                                                class="far btn fa-edit "
                                                                                aria-hidden="true"></i></a>
                                                                    </button>
                                                                    <form method="post"
                                                                        action="{{ route('treasuries.destroy', $treasury->id) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            onclick="return confirm('Are you sure?')"
                                                                            class="btn btn-danger  "><i
                                                                                class="fas fa-trash-alt"></i> </button>
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
