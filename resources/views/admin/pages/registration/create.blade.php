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
                            <h3 class="card-title" style="float: right">تسجيل خطوط السير</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form class="form-horizontal" action="" method="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <select class="form-control" name="" id="driver">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 4</option>
                                        </select>
                                        <label for="driver" class="col-sm-4 col-lg-4 col-xl-3 col-form-label">اسم السائق</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="Road" placeholder="1" name="">
                                        <label for="Road" class="col-sm-4 col-lg-4 col-xl-3 col-form-label"> خط السير </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="2" name="">
                                        <label for="date" class="col-sm-4 col-lg-4 col-xl-3 col-form-label"> التاريخ </label>
                                    </div>

                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="power" placeholder="2" name="">
                                        <label for="power" class="col-sm-4 col-lg-4 col-xl-3 col-form-label"> تفويل السيارة </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="km" placeholder="2" name="">
                                        <label for="km" class="col-sm-4 col-lg-4 col-xl-3 col-form-label">  الكيلومترات</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="literno" placeholder="2" name="">
                                        <label for="literno" class="col-sm-4 col-lg-4 col-xl-3 col-form-label">   السولار  </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="notes" id="note"></textarea>
                                        <label for="note" class="col-sm-4 col-xl-3 col-form-label">ملاحظات</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="reset" class="btn  bg-danger mr-3"><i class="fas fa-undo"></i>
                                </button>
                                <button type="submit" class="btn  bg-success"><i class="fa fa-check text-light" aria-hidden="true"></i></button>

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
                            <h3 class="card-title" style="float:right; font-weight:bold;"> خطوط السير </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        اسم السائق </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        خط السير </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                        عددالكيلومترات </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        عدد لترات السولار المستهلكة </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        تفويل السيارة</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        التاريخ</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        ملاحظات</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
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
                                                        <button type="submit" class="btn bg-secondary"> <i class="far btn fa-edit " aria-hidden="true"></i></button>
                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button>
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
