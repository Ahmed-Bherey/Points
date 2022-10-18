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
                                <h3 class="card-title header-title"> أصناف بمقاس واحد </h3>
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
                                            <input type="text" class="form-control" id="n" placeholder="اسم الصنف"
                                                name="">
                                            <label for="n" class="col-form-label"> اسم الصنف
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="" id="c">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="c" class="col-form-label"> الشركة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="" id="t">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="t" class="col-form-label"> النوع</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="" id="u">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="u" class="col-form-label"> الوحدة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="" id="m">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="m" class=" col-form-label"> المقاس</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="" id="store">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="store" class="col-form-label"> المخزن</label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="price" placeholder=" سعر الشراء"
                                                name="">
                                            <label for="price" class="col-form-label"> سعر الشراء</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="per" placeholder="اقصى نسبة خصم"
                                                name="">
                                            <label for="per" class="col-form-label"> اقصى نسبة خصم
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="pay" placeholder="اقصى كمية بيع"
                                                name="">
                                            <label for="pay" class="col-form-label"> اقصى كمية بيع
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="min" placeholder="الحد الأدنى للكمية" name="">
                                            <label for="min" class="col-form-label"> الحد الأدنى للكمية
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="max" placeholder="الحد الأقصى للكمية" name="">
                                            <label for="max" class="col-form-label"> الحد الأقصى للكمية
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
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                {{-- end card --}}
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> أصناف بمقاس واحد</h3>
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
                                                            اسم الصنف</th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الشركة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            النوع</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الوحدة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            المقاس</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            المخزن</th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            سعر الشراء</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            أقصى نسبة خصم</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            أقصى نسبة بيع</th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الحد الادنى للكمية</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الحد الاقصى للكمية</th>



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
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <button type="submit" class="btn bg-secondary"> <i
                                                                    class="far fa-edit" aria-hidden="true"></i></button>
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
