@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card ">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> الاصناف تحت التسليم </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                                name="" required="">
                                            <label for="date" class="col-form-label">التاريخ </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="numbill"
                                                placeholder="رقم الفاتورة" name="code" required="">
                                            <label for="numbill" class="col-form-label"> رقم الفاتورة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="customer" placeholder="اسم العميل"
                                                name="name" required="">
                                            <label for="customer" class="col-form-label">اسم العميل</label>
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
                {{-- start table card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card border border-1 mt-3 bg-light">
                            <div class="card-header">
                                <h3 class="card-title " style="float:right; font-weight:bold;"> الاصناف تحت التسليم</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                class="table table-bordered table-striped dataTable dtr-inline no-footer"
                                                aria-describedby="example1_info" role="grid">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Rendering engine: activate to sort column descending">
                                                            رقم الفاتورة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            اسم العميل</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            التاريخ</th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">s</td>
                                                        <td>dsdf </td>
                                                        <td></td>
                                                        <td>
                                                            <button type="submit" class="btn bg-secondary  "> <i
                                                                    class="far fa-edit " aria-hidden="true"></i></button>
                                                            <button type="submit" class="btn btn-danger   "><i
                                                                    class="fas fa-trash-alt "></i> </button>
                                                        </td>

                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    {{-- end table card --}}



    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    </div>
@endsection
