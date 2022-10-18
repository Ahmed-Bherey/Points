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
                        <form action="{{route('reminderDue.update' , $reminderDues->id)}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 form-floating">
                                        <input type="date" class="form-control" value="{{$reminderDues->date1}}"
                                            id="date" placeholder="" name="date1">
                                        <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">تاريخ
                                            المصروف
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$reminderDues->amount}}"
                                            id="mon" placeholder="1" name="amount">
                                        <label for="mon"
                                            class="col-sm-3 col-lg-4 col-xl-3 col-form-label">القيمة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="date" class="form-control" value="{{$reminderDues->date2}}"
                                            id="remember" placeholder="" name="date2">
                                        <label for="remember" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">تاريخ
                                            التذكير
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="notes"
                                            id="note">{{$reminderDues->notes}}</textarea>
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
