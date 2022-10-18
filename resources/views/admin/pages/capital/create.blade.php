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
                                <h3 class="card-title" style="float: right"> قيم رصيد أول المدة </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="col-lg-12 border border-1 p-3">
                                <div class="butt">
                                    <button type="submit" class="btn btn-info ml-2 mt-2" data-toggle="modal"
                                        data-target="#exampleModal">الخزائن </button>
                                </div>
                            </div>
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('capital.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-6 form-floating">
                                            <input type="number" class="form-control" id="value"
                                                placeholder="قيمة مخزون أول المدة" name="begining_stock">
                                            <label for="value1" class="col-form-label"> قيمة مخزون أول المدة</label>
                                        </div>
                                        <div class="col-sm-6 form-floating">
                                            <input type="number" class="form-control" id="value"
                                                placeholder="قيمة رأس المال " name="capital_value">
                                            <label for="value" class="col-form-label">قيمة رأس المال </label>
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
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="width: 160%;">
                            <div class="modal-body">
                                <div class="row mt-1">
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h3 class="card-title" style="float: right"> الخزائن</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form class="form-horizontal" action="" method="">
                                                <div class="card-body">
                                                    {{-- row 1 --}}
                                                    <div class="row mb-3">
                                                        <div class="col-sm-4 form-floating">
                                                            <input type="number" class="form-control" id="treasury"
                                                                placeholder="اسم الخزينة" name="">
                                                            <label for="treasury" class="col-form-label">اسم الخزينة</label>
                                                        </div>
                                                        <div class="col-sm-4 form-floating">
                                                            <input type="number" class="form-control" id="value"
                                                                placeholder=" قيمةالخزينة" name="">
                                                            <label for="value" class="col-form-label">
                                                                قيمةالخزينة </label>
                                                        </div>
                                                        <div class="col-sm-4 form-floating">
                                                            <input type="number" class="form-control" id="honest"
                                                                placeholder="امين الخزينة" name="">
                                                            <label for="honest" class="col-form-label"> امين الخزينة
                                                            </label>
                                                        </div>
                                                    </div>
                                                    {{-- row 1 --}}
                                                    <div class="row mb-3">
                                                        <div class="col-sm-4 form-floating">
                                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                                            <label for="note" class="col-form-label">ملاحظات</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <button type="reset" class="btn bg-secondary   ml-2 mt-2"><i
                                                            class="fa fa-arrow-left ml-1" aria-hidden="true"></i>تراجع
                                                    </button>
                                                    <button type="submit" class="btn btn-danger  mt-2"><i
                                                            class="fa fa-plus ml-1" aria-hidden="true"></i> اضافة خزينة
                                                        لمستخدم</button>
                                                    <button type="reset" class="btn  btn-info ml-2 mt-2"><i
                                                            class="far fa-save ml-1"></i>حفظ </button>
                                                </div>
                                                <!-- /.card-footer -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
