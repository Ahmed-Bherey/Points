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
                                <h3 class="card-title header-title"> إشعار خصم أو إضافة نقاط المندوب </h3>
                            </div>
                            <!-- /.card-header -->


                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                                name="">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="notice">
                                                <option>اشعار خصم</option>
                                                <option>اشعار اضافة</option>
                                            </select>
                                            <label for="notice" class="col-form-label">نوع الاشعار
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="customar">
                                                <option>البحث عن عميل</option>
                                                <option>option 2</option>

                                            </select>
                                            <label for="customar" class="col-form-label">اسم االمندوب</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="points" placeholder="النقاط"
                                                name="">
                                            <label for="points" class="col-form-label">النقاط </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="mon" placeholder="المبلغ"
                                                name="">
                                            <label for="mon" class="col-form-label">المبلغ </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="spentpoints"
                                                placeholder="النقاط المصروفة" name="">
                                            <label for="spentpoints" class="col-form-label">النقاط المصروفة
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="pointsrest"
                                                placeholder=" باقى النقاط " name="">
                                            <label for="pointsrest" class="col-form-label">
                                                باقى النقاط </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="pointsum"
                                                placeholder="مبلغ النقاط " name="">
                                            <label for="pointsum" class="col-form-label">مبلغ النقاط </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">ملاحظات</label>
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
                                <h3 class="card-title"> إشعار خصم أو إضافة المندوب </h3>
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
                                                            نوع الاشعار</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            التاريخ</th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            اسم االمندوب </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            المبلغ </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            النقاط</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            النقاط المصروفة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            باقى النقاط</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            مبلغ النقاط</th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
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
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <button type="submit" class="btn bg-secondary  "> <i
                                                                    class="far  fa-edit " aria-hidden="true"></i></button>
                                                            <button type="submit" class="btn btn-danger   "><i
                                                                    class="fas fa-trash-alt"></i> </button>
                                                        </td>

                                                    </tr>

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
