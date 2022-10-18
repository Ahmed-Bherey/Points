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
                        <form action="{{route('generalAccount.update' , $generalAccounts->id)}}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{$generalAccounts->date}}"
                                            id="date" placeholder="التاريخ" name="date">
                                        <label for="date" class="col-form-label">التاريخ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" value="{{$generalAccounts->name}}"
                                            id="mon" placeholder="الاسم" name="name">
                                        <label for="expense" class="col-form-label">اسم المصروف
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="checkbox" @if ($generalAccounts->active == 1) checked @endif
                                        value="1"
                                        id="mon" placeholder="الاسم"
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
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
</div>
@endsection
