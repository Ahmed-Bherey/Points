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
                            <h3 class="card-title" style="float: right"> حسابات العامة </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form action="{{route('generalAccount.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="date"
                                            placeholder="التاريخ" name="date">
                                        <label for="date" class="col-form-label">التاريخ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" id="mon" placeholder="الاسم"
                                            name="name">
                                        <label for="expense" class="col-form-label">اسم المصروف
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="checkbox" value="1" checked id="mon" placeholder="الاسم"
                                            name="active">
                                        <label for="expense" class="col-form-label">نوع التفعيل
                                        </label>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa fa-check text-light" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn bg-secondary" onclick="history.back()" type="submit">
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
                            <h3 class="card-title" style="float:right; font-weight:bold;"> حسابات العامة
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
                                                    <td>#</td>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        التاريخ</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        اسم المصروف</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        نوع التفعيل </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($generalAccounts as $key => $generalAccount)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{$generalAccount->date}}</td>
                                                    <td>{{$generalAccount->name}}</td>
                                                    <td>
                                                        @if($generalAccount->active == 1)
                                                        مفعل
                                                        @else
                                                        غير مفعل
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('generalAccount.edit', $generalAccount->id) }}"
                                                            class="btn bg-secondary"><i class="far fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a href="{{ route('generalAccount.destroy', $generalAccount->id) }}"
                                                            onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
        </div>
        {{-- end card table --}}
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
</div>
@endsection
