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
                                <h3 class="card-title" style="float: right"> عهد أول المدة </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form action="{{ route('covenant.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="الاسم"
                                                name="name">
                                            <label for="name" class="col-form-label">الاسم</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                                name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="type" id="type">
                                                <option>موظف</option>
                                                <option>غير موظف</option>
                                            </select>
                                            <label for="type" class="col-form-label">نوعة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="mon" placeholder="المبلغ"
                                                name="amount">
                                            <label for="mon" class="col-form-label">المبلغ</label>
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
                                <h3 class="card-title" style="float:right; font-weight:bold;"> العهد
                                </h3>
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
                                                        <td></td>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            الاسم </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            نوعة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            التاريخ </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            المبلغ </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($covenants as $key => $covenant)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $covenant->name }}</td>
                                                            <td>{{ $covenant->type }}</td>
                                                            <td>{{ $covenant->date }}</td>
                                                            <td>{{ $covenant->amount }}</td>
                                                            <td class="d-flex justify-content-center">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('covenant.edit', $covenant->id) }}"
                                                                        class="text-white"><i class="far btn fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="POST"
                                                                    action="{{ route('covenant.destroy', $covenant->id) }}">
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
