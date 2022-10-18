@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12 col-lg-12 ">
                        <div class="card card-info">
                            <div class="card-header header-bg">
                                <h3 class="card-title" style="float: right"> العملاء </h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="name" placeholder=" اسم العميل"
                                                name="">
                                            <label for="name" class="col-form-label"> اسم العميل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="tel" class="form-control" id="tel" placeholder=" تليفون العميل "
                                                name="">
                                            <label for="tel" class="col-form-label">
                                                تليفون العميل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="company" placeholder=" اسم الشركة"
                                                name="">
                                            <label for="company" class="col-form-label">
                                                اسم الشركة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="mob" placeholder="رقم الموبايل"
                                                name="">
                                            <label for="mob" class="col-form-label"> رقم الموبايل </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="fax" placeholder="الفاكس"
                                                name="">
                                            <label for="fax" class="col-form-label">الفاكس </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="email" class="form-control" id="email"
                                                placeholder="بريد الكترونى" name="">
                                            <label for="email" class="col-form-label">بريد الكترونى </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="card" placeholder="رقم البطاقة"
                                                name="">
                                            <label for="card" class="col-form-label">رقم البطاقة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="m" placeholder="المحافظة" name="">
                                            <label for="m" class="col-form-label">
                                                المحافظة </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="z" placeholder="المركز" name="">
                                            <label for="z" class="col-form-label"> المركز
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="b" placeholder="البلد" name="">
                                            <label for="b" class="col-form-label"> البلد
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">
                                                ملاحظات </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="address"
                                                placeholder=">عنوان العميل" name="">
                                            <label for="address" class="col-form-label">عنوان العميل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="" id="categ">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="categ" class="col-form-label"> تصنيف العميل </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="" id="bill">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="bill" class="col-form-label"> نوع الفاتورة
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="" id="represent">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="represent" class="col-form-label"> اسم
                                                المندوب </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="" id="group">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="group" class="col-form-label"> المجموعة
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="h" placeholder="" name="">
                                            <label for="h" class="col-form-label"> حد الائتمان
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="day" placeholder=" عدد الايام"
                                                name="">
                                            <label for="day" class="col-form-label"> عدد الايام
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="file" placeholder=" الملف الضريبى"
                                                name="">
                                            <label for="file" class="col-form-label"> الملف الضريبى </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="taxnum"
                                                placeholder=" الرقم الضريبى" name="">
                                            <label for="taxnum" class="col-form-label"> الرقم الضريبى </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="Commerc"
                                                placeholder="رقم السجل التجارى" name="">
                                            <label for="Commerc" class="col-form-label"> رقم السجل التجارى
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="dept"
                                                placeholder="عمر الدين بالأيام" name="">
                                            <label for="dept" class="col-form-label"> عمر الدين بالأيام </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="file" id="imgload">
                                            <label for="logo" class="col-form-label">شعار</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <img src="#" id="imgshow" style="height: 100px; width: auto;">
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
                <div class="row mt-4">
                    <div class="col-sm-12 col-lg-12 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;">العملاء </h3>
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
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            العنوان </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            رقم الموبايل</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الفاكس </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            تصنيف العميل</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            نوع الفاتورة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
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
                                                        <td>
                                                            <button type="submit" class="btn bg-secondary"> <i
                                                                    class="far fa-edit"></i></button>
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="fas fa-trash-alt "></i> </button>
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
                {{-- photo show --}}
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script>
                    $('document').ready(function() {
                        $("#imgload").change(function() {
                            if (this.files && this.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    $('#imgshow').attr('src', e.target.result);
                                }
                                reader.readAsDataURL(this.files[0]);
                            }
                        });
                    });
                </script>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
