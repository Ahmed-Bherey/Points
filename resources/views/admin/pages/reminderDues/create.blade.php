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
                            <h3 class="card-title" style="float: right"> تذكير بموعد استحقاق مصروف </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form action="{{route('reminderDue.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="" name="date1">
                                        <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">تاريخ
                                            المصروف
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="mon" placeholder="1"
                                            name="amount">
                                        <label for="mon"
                                            class="col-sm-3 col-lg-4 col-xl-3 col-form-label">القيمة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="date" class="form-control" id="remember" placeholder=""
                                            name="date2">
                                        <label for="remember" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">تاريخ
                                            التذكير
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="notes"
                                            id="note"></textarea>
                                        <label for="note" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">البيان
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="reset" class="btn bg-danger mr-3"><i class="fas fa-undo"></i> </button>
                                <button type="submit" class="btn bg-success"><i class="fa fa-check text-light"
                                        aria-hidden="true"></i></button>
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
                            <h3 class="card-title" style="float:right; font-weight:bold;"> موعد استحقاق مصروف
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
                                                        تاريخ المصروف</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        القيمة </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        تاريخ التذكير </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        البيان</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($reminderDues as $key => $reminderDue)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{$reminderDue->date1}}</td>
                                                    <td>{{$reminderDue->amount}}</td>
                                                    <td>{{$reminderDue->date2}}</td>
                                                    <td>{{$reminderDue->notes}}</td>
                                                    <td>
                                                        <a href="{{route('reminderDue.edit' , $reminderDue->id)}}" type="submit"
                                                            class="btn bg-secondary"><i class="far fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a href="{{route('reminderDue.destroy' , $reminderDue->id)}}"
                                                            onclick="return confirm('Are you sure?')" type="submit"
                                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a>
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
