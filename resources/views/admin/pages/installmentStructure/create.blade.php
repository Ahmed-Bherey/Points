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
                                <h3 class="card-title header-title"> إعادة هيكلة الاقساط </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" name="" id="customar">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 4</option>
                                            </select>
                                            <label for="customar" class="col-sm-3 mb-3  col-form-label"> اسم العميل</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="billnumber"
                                                placeholder="رقم الفاتورة" name="">
                                            <label for="billnumber" class="col-form-label">رقم الفاتورة
                                            </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="date" class="form-control" id="billdate"
                                                placeholder="تاريخ الفاتورة" name="" required>
                                            <label for="billdate" class="col-form-label">تاريخ الفاتورة</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="totalrequire"
                                                placeholder=" مجموع الاقساط" name="">
                                            <label for="totalrequire" class="col-form-label"> مجموع الاقساط
                                                المطلوبة</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="notes"></textarea>
                                            <label for="notes" class="col-sm-3 mb-3  col-form-label">ملاحظات </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <label for="profit" class="col-form-label">أرباح التقسيط </label>
                                            <input type="number" class="form-control" id="profit" placeholder="" name="">
                                            <label for="profit" class="col-form-label">أرباح التقسيط </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="value" placeholder="قيمة القسط"
                                                name="">
                                            <label for="value" class="col-form-label"> قيمة القسط</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="percent"
                                                placeholder=" نسبة القسط" name="">
                                            <label for="percent" class="col-form-label"> نسبة القسط</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="num" placeholder="عدد الاقساط"
                                                name="">
                                            <label for="num" class="col-form-label"> عدد الاقساط</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder=" بداية القسط"
                                                name="">
                                            <label for="date" class="col-form-label"> بداية القسط</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="text" class="form-control" id="every" placeholder=" القسط كل"
                                                name="">
                                            <label for="every" class="col-form-label"> القسط كل </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="total"
                                                placeholder="مجموع الاقساط" name="">
                                            <label for="total" class="col-form-label">مجموع الاقساط</label>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa-solid fa-eye"></i>
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
                    <div class="col-sm-12 col-lg-12">
                        <div class="card border border-1 mt-3 bg-light">
                            <div class="card-header">
                                <h3 class="card-title ">إعادة هيكلة الاقساط </h3>
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
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            اسم العميل
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Engine version: activate to sort column ascending">
                                                            رقم الفاتورة
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            تاريخ الفاتورة
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">مجموع
                                                            الاقساط المطلوبة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">أرباح
                                                            التقسيط
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">قيمة
                                                            القسط
                                                        </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            نسبة القسط
                                                        </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">عدد
                                                            الاقساط
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">بداية
                                                            القسط
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending"> القسط
                                                            كل
                                                        </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            ملاحظات
                                                        </th>


                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            عمليات
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr class="odd">
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>



                                                        <td class="d-flex">
                                                            <a href="#" class="btn btn bg-secondary"><i
                                                                    class="far  fa-edit "></i>
                                                            </a>
                                                            <a href="#" class="btn btn btn-danger"><i
                                                                    class="fas fa-trash-alt "></i> </a>
                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->
    </div><!-- /.content-wrapper -->
@endsection
