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
                                <h3 class="card-title" style="float: right"> تسجيل أقساط قديمة للعملاء</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select class="form-control" name="" id="customer">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 4</option>
                                        </select>
                                        <label for="customer" class="col-form-label">اسم العميل</label>
                                    </div>
                                    <div class="col-sm-4 form-floating p-0 m-0">
                                        <input type="number" class="form-control" id="amount" placeholder="" name="">
                                        <label for="amount" class="col-form-label">مبلغ التقسيط
                                        </label>
                                    </div>
                                    <div class="col-sm-4 row">
                                        <div class="col-sm-6 form-floating">
                                            <select class="form-control" name="" id="">
                                                <option>شهر</option>
                                                <option>سنة</option>
                                            </select>
                                            <label for="Installment" class="col-form-label"> القسط كل </label>
                                        </div>
                                        <div class="col-sm-6 form-floating p-0 m-0">
                                            <input type="number" class="form-control" id="Installment" placeholder=""
                                                name="">
                                        </div>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="Benefit" placeholder="قيمة الفائدة"
                                            name="">
                                        <label for="Benefit" class="col-form-label"> قيمة الفائدة </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="mon" placeholder="المبلغ" name="">
                                        <label for="mon" class="col-form-label">المبلغ</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="number" placeholder="عدد الاقساط"
                                            name="">
                                        <label for="number" class="col-form-label">عدد الاقساط </label>
                                    </div>
                                </div>
                                {{-- row 3 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="value" placeholder=" قيمة القسط"
                                            name="">
                                        <label for="value" class="col-form-label"> قيمة القسط
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select class="form-control" name="" id="percent">
                                            <option>دائن</option>
                                            <option>مدين</option>
                                        </select>
                                        <label for="percent" class="col-form-label">نسبة الفائدة
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="total" placeholder="الاجمالى"
                                            name="">
                                        <label for="total" class="col-form-label">الاجمالى</label>
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
                                <h3 class="card-title" style="float:right; font-weight:bold;"> اقساط قديمة للعملاء </h3>
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
                                                            اسم العميل </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            المبلغ </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            عددالاقساط </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            القسط كل</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            مبلغ التقسيط </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            قيمة القسط </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            قيمة الفائدة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            نسبة الفائدة </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            الاجمالى </th>
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
                                                        <td>dsdf </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>dsdf </td>
                                                        <td></td>

                                                        <td>
                                                            <button type="submit" class="btn bg-secondary"> <i
                                                                    class="far btn fa-edit "
                                                                    aria-hidden="true"></i></button>
                                                            <button type="submit" class="btn btn-danger"><i
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
