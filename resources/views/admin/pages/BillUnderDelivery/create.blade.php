@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> الفواتير تحت التسليم </h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="numbill" placeholder="رقم الفاتورة" name=""
                                                required="">
                                            <label for="numbill" class="col-form-label"> رقم الفاتورة</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="customer" placeholder="اسم العميل" name=""
                                                required="">
                                            <label for="customer" class="form-label">اسم العميل</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="represent" placeholder="اسم المندوب" name=""
                                                required="">
                                            <label for="represent" class="col-form-label">اسم المندوب</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="billtype"
                                                placeholder=" نوع الفاتورة" name="" required="">
                                            <label for="billtype" class="col-form-label"> نوع الفاتورة</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="تاريخ الفاتورة"
                                                name="" required="">
                                            <label for="date" class="col-form-label"> تاريخ الفاتورة</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="total"
                                                placeholder="إجمالى الفاتورة" name="" required="">
                                            <label for="total" class="col-form-label"> إجمالى الفاتورة</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="pay" placeholder="المدفوع"
                                                name="" required="">
                                            <label for="pay" class="col-form-label"> المدفوع</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="rest" placeholder="الباقى" name=""
                                                required="">
                                            <label for="rest" class="col-form-label">الباقى</label>
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
                                <h3 class="card-title " style="float:right; font-weight:bold;"> فواتير تحت التسليم
                                </h3>
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
                                                            رقم الفاتورة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            تاريخ الفاتورة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            اسم العميل</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            اسم المندوب</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            اجمالى فاتورة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            المدفوع</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الباقى</th>
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
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <button type="submit" class="btn bg-secondary  "> <i
                                                                    class="far  fa-edit " aria-hidden="true"></i></button>
                                                            <button type="submit" class="btn btn-danger     "><i
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
