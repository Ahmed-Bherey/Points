@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> أمر توريد يمكن تحويلة لفاتورة مشتريات</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="ordernum"
                                                placeholder=" رقم أمر التوريد" name="">
                                            <label for="ordernum" class="col-form-label"> رقم أمر التوريد</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="" id="namestore">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="namestore" class="col-form-label"> اسم المخزن </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="" id="suppler">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="suppler" class="col-form-label"> اسم المورد </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                                name="">
                                            <label for="date" class="col-form-label"> التاريخ </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="" id="represent">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="represent" class="col-form-label"> اسم المندوب </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="target" placeholder="التارجت"
                                                name="">
                                            <label for="target" class="col-form-label">
                                                التارجت
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="from" placeholder="من" name="">
                                            <label for="from" class="col-form-label">من
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label"> ملاحظات </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="totalb"
                                                placeholder="الاجمالى قبل الخصم " name="">
                                            <label for="totalb" class="col-form-label"> الاجمالى قبل الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="s" placeholder="نسبة الخصم "
                                                name="">
                                            <label for="s" class="col-form-label">نسبة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="value" placeholder="قيمة الخصم "
                                                name="">
                                            <label for="value" class="col-form-label"> قيمة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="" class="form-control" id="addtax"
                                                placeholder="قيمة الضريبة المضافة" name="">
                                            <label for="addtax" class="col-form-label"> قيمة الضريبة المضافة
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="cost" placeholder="تكلفة النقل"
                                                name="">
                                            <label for="cost" class="col-form-label"> تكلفة النقل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="totala"
                                                placeholder=" الاجمالى بعد الخصم" name="">
                                            <label for="totala" class="col-form-label"> الاجمالى بعد الخصم
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="win" placeholder="الربحية"
                                                name="">
                                            <label for="win" class="col-form-label"> الربحية </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="" id="namecat">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="namecat" class="col-form-label"> اسم الصنف </label>
                                        </div>
                                    </div>
                                    {{-- row 5 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="" id="unit">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="unit" class="col-form-label"> الوحدة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="qu" placeholder="الكمية"
                                                name="">
                                            <label for="qu" class="col-form-label"> الكمية</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="money"
                                                placeholder="الرصيد الحالى" name="">
                                            <label for="money" class="col-form-label"> الرصيد الحالى</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="unitprice"
                                                placeholder="سعر الوحدة" name="">
                                            <label for="unitprice" class="col-form-label"> سعر الوحدة</label>
                                        </div>
                                    </div>
                                    {{-- row 5 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="code" placeholder="الكود" name="">
                                            <label for="code" class="col-form-label"> الكود</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="b" placeholder="خصم كمية"
                                                name="">
                                            <label for="b" class="col-form-label"> خصم كمية</label>
                                            <div class="col-sm-8">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="add" placeholder="نسبة الاضافة"
                                                name="">
                                            <label for="add" class="col-form-label"> نسبة الاضافة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="dis" placeholder="نسبة الخصم"
                                                name="">
                                            <label for="dis" class="col-form-label"> نسبة الخصم </label>
                                        </div>
                                    </div>
                                    {{-- row 6 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="t"
                                                placeholder=" اجمالى سعر الصنف" name="">
                                            <label for="t" class="col-form-label"> اجمالى سعر الصنف</label>
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
                    <div class="col-sm-12 col-lg-12 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;"> </h3>
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
                                                            الكود </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            اسم الصنف</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الكمية</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            سعر الوحدة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الاجمالى </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            نسبة الخصم </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            قيمة الخصم</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الوحدة</th>
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
                                                        <td class="d-flex">
                                                            <button type="submit" class="btn bg-secondary"> <i
                                                                    class="far fa-edit " aria-hidden="true"></i></button>
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
