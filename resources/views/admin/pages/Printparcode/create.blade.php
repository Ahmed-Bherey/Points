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
                                <h3 class="card-title " style="float: right"> طباعة باركود</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="inputPassword3" class="col-form-label"> اسم الصنف
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="الرصيد الحالى" name="">
                                            <label for="inputPassword3" class="col-form-label">
                                                الرصيد الحالى
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="سعر القطاعى" name="">
                                            <label for="inputPassword3" class="col-form-label">
                                                سعر القطاعى
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder=" جانب السعر"
                                                name="">
                                            <label for="inputPassword3" class="col-form-label">
                                                جانب السعر
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="أعلى الكود"
                                                name="">
                                            <label for="inputPassword3" class="col-form-label">
                                                أعلى الكود</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="inputPassword3" class="col-form-label"> الترميز
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="inputPassword3" class="col-form-label">الوحدات
                                            </label>
                                        </div>
                                        <div class="col-sm-4 row pe-0 ps-0 ms-0 me-0 mt-2">
                                            <div class="col-sm-6 form-floating">
                                                <input type="number" class="form-control" id="" placeholder="العرض"
                                                    name="">
                                                <label for="inputPassword3" class="col-form-label">
                                                    العرض</label>
                                            </div>
                                            <div class="col-sm-6 form-floating ">
                                                <input type="number" class="form-control" id="" placeholder="الارتفاع"
                                                    name="">
                                                <label for="inputPassword3" class="col-form-label">
                                                    الارتفاع</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="عدد الباركود"
                                                name="">
                                            <label for="inputPassword3" class="col-form-label"> عدد الباركود
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="inputPassword3" class="col-form-label">التحجيم</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="الابعاد" name="">
                                            <label for="inputPassword3" class="col-form-label">الابعاد</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="نسبة الكود"
                                                name="">
                                            <label for="inputPassword3" class="col-form-label">نسبة الكود</label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="inputPassword3" class="col-form-label">الزاوية</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="">
                                                <option>option 1</option>
                                                <option>option 3</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="inputPassword3" class="col-form-label">نمط التجانس</label>
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


            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
