@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> تفكيك صنف مجمع </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="" id="name">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="name" class="col-sm-4  col-form-label"> اسم الصنف المراد
                                                تفكيكة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="" id="store">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="store" class="col-form-label">المخزن الموجود بة الصنف
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="disconnect" placeholder=""
                                                name="">
                                            <label for="disconnect" class="col-form-label">الكمية المراد
                                                تفكيكها
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="" id="namestore">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="namestore" class="col-form-label"> اسم المخزن المراد
                                                التفكيك فية </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="qu" placeholder="الكميةالموجودة بالمخزن" name="">
                                            <label for="qu" class="col-form-label"> الكميةالموجودة بالمخزن</label>
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
                                <h3 class="card-title"> مكونات الاصناف التى يتم
                                    تجمعها</h3>
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
                                                            اسم الصنف </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            المصنعية </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الوحدة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الكمية </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            تكلفة المنتج المجمع</th>
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

                                                        <td>
                                                            <button type="submit" class="btn bg-secondary"> <i
                                                                    class="far fa-edit " aria-hidden="true"></i></button>
                                                            <button type="submit" class="btn btn-danger  "><i
                                                                    class="fas fa-trash-alt "></i> </button>
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
        </div>
        <!-- /.content-header -->
    </div>
@endsection
