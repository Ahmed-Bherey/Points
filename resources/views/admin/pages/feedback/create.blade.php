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
                            <div class="card-header header-bg ">
                                <h3 class="card-title header-title"> إضافة مرتجع </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="categ" placeholder="اسم الصنف"
                                                name="">
                                            <label for="categ" class="col-form-label">اسم الصنف</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="num" placeholder="رقم الايصال"
                                                name="">
                                            <label for="num" class="col-form-label">رقم الايصال
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="customer">
                                                <option> </option>
                                                <option> </option>
                                            </select>
                                            <label for="customer" class="col-form-label">اسم العميل
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="tel" placeholder="تليفون العميل"
                                                name="">
                                            <label for="tel" class="col-form-label">تليفون العميل
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="address"
                                                placeholder="عنوان العميل" name="">
                                            <label for="address" class="col-sm-3 mb-3 col-lg-4 col-xl-3 col-form-label">عنوان
                                                العميل</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="datetime-local" class="form-control" placeholder="تاريخ الاستلام"
                                                id="receipt" name="birthdaytime">
                                            <label for="receipt" class="col-sm-3 mb-3 col-lg-4 col-xl-3 col-form-label">تاريخ
                                                الاستلام </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="datetime-local" class="form-control" placeholder="تاريخ التسليم"
                                                id="date" name="birthdaytime">
                                            <label for="date" class="col-sm-3 mb-3 col-lg-4 col-xl-3 col-form-label"> تاريخ
                                                التسليم</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="color">
                                                <option> </option>
                                                <option> </option>
                                            </select>
                                            <label for="color" class="col-form-label">اللون
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="Model">
                                                <option> </option>
                                                <option> </option>
                                            </select>
                                            <label for="Model" class="col-sm-3 mb-3 col-lg-4 col-xl-3 col-form-label">الموديل
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="place">
                                                <option> </option>
                                                <option> </option>
                                            </select>
                                            <label for="place" class="col-sm-3 mb-3 col-lg-4 col-xl-3 col-form-label">سيريال
                                                البطارية
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="serial"
                                                placeholder="سيريال الجهاز" name="">
                                            <label for="serial" class="col-sm-3 mb-3 col-lg-4 col-xl-3 col-form-label">سيريال
                                                الجهاز
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="recipient">
                                                <option> </option>
                                                <option> </option>
                                            </select>
                                            <label for="recipient" class="col-form-label">
                                                المستلم
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="place">
                                                <option> </option>
                                                <option> </option>
                                            </select>
                                            <label for="place" class="col-sm-3 mb-3 col-lg-4 col-xl-3 col-form-label">سيريال
                                                البطارية
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="serial" placeholder="" name="">
                                            <label for="serial" class="col-sm-3 mb-3 col-lg-4 col-xl-3 col-form-label">سيريال
                                                الجهاز
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="recipient">
                                                <option> </option>
                                                <option> </option>
                                            </select>
                                            <label for="recipient" class="col-form-label">
                                                المستلم
                                            </label>
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
                            </form>
                        </div>
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
                        <h3 class="card-title"> إضافة مرتجع
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    رقم الايصال</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    اسم الصنف </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    اسم العميل </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    تليفون العميل </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    تاريخ الاستلام</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    تاريخ التسليم </th>

                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    المستلم </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                    شكوي العميل</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Platform(s): activate to sort column ascending">
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
                                                <td>
                                                    <button type="submit" class="btn btn bg-secondary"> <i class="far fa-edit"
                                                            aria-hidden="true"></i></button>
                                                    <button type="submit" class="btn btn btn-danger"><i
                                                            class="fas fa-trash-alt"></i> </button>
                                                </td>
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
