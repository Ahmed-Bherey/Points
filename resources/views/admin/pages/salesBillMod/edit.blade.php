@extends('admin.layouts.includes.master')

@section('content')
@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 ">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark text-left"><i class="fas fa-cog text-info ml-2"></i> المخازن</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row mt-5 pt-2 border border-1">
                <div class=" col-sm-12 col-lg-5">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label">كود المخزن</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label">اسم المخزن</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label">امين المخزن</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label"> تليفون</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label">العنوان</label>
                        <div class="col-sm-10 col-lg-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label">ملاحظات </label>
                        <div class="col-sm-10 col-lg-9">
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-12 col-lg-7">--}}
                {{-- <div class="form-group row">--}}
                {{-- <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label">اسم الشركة بالعربية</label>--}}
                {{-- <div class="col-sm-10 col-lg-8">--}}
                {{-- <input type="email" class="form-control" id="inputEmail3" placeholder="">--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- <div class="form-group row">--}}
                {{-- <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label">اسم الشركة بالانجليزية</label>--}}
                {{-- <div class="col-sm-10 col-lg-8">--}}
                {{-- <input type="email" class="form-control" id="inputEmail3" placeholder="">--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- <div class="form-group row">--}}
                {{-- <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label"> عنوان الشركة </label>--}}
                {{-- <div class="col-sm-10 col-lg-8">--}}
                {{-- <input type="email" class="form-control" id="inputEmail3" placeholder="">--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- <div class="form-group row">--}}
                {{-- <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label"> تليفون الشركة </label>--}}
                {{-- <div class="col-sm-10 col-lg-8">--}}
                {{-- <textarea class="form-control" rows="3" placeholder=""></textarea>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- <div class="form-group row">--}}
                {{-- <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label"> الفاكس</label>--}}
                {{-- <div class="col-sm-10 col-lg-8">--}}
                {{-- <input type="email" class="form-control" id="inputEmail3" placeholder="">--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- <div class="form-group row">--}}
                {{-- <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label"> موقع الويب </label>--}}
                {{-- <div class="col-sm-10 col-lg-8">--}}
                {{-- <input type="email" class="form-control" id="inputEmail3" placeholder="">--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- <div class="form-group row">--}}
                {{-- <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label"> البريد الالكترونى</label>--}}
                {{-- <div class="col-sm-10 col-lg-8">--}}
                {{-- <input type="email" class="form-control" id="inputEmail3" placeholder="">--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- </div>--}}

                <!-- <div class="col-2">
                <img src="" alt="img">
                <button type="submit" class="btn  btn-secondary ">اضافة صورة</button>
            </div> -->
            </div>
            <div class="row border border-1 mt-3 bg-light">
                <div class="butt " style=" display: block; margin: 15px auto; ">
                    <button type="submit" class="btn  btn-success ml-2"><i class="fa fa-plus ml-1" aria-hidden="true"></i>اضافة</button>
                    <button type="submit" class="btn btn-warning ml-2" style="color:white;"><i class="far btn fa-edit " aria-hidden="true"></i>تعديل</button>
                    <button type="submit" class="btn   ml-2 "><i class="fa fa-arrow-left mr-1 " aria-hidden="true"></i>تراجع </button>
                    <button type="submit" class="btn btn-info ml-2"><i class="fa fa-user-plus ml-1" aria-hidden="true"></i>اضافة مخزن لمستخدم</button>
                </div>
            </div>
            <div class="card border border-1 mt-3 bg-light">
                <div class="card-header">
                    <h3 class="card-title " style="float:right; font-weight:bold;">بيانات المخازن</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_filter" class="dataTables_filter ">
                                    <!-- <label>Search:<input type="search"
                                                class="form-control form-control-sm" placeholder=""
                                                aria-controls="example1"></label>  -->
                                    <div class="form-group row">
                                        <div class="col-sm-10 col-lg-6">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="">
                                        </div>
                                        <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label">
                                            :Search</label>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons btn-group flex-wrap"> <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                                    <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true"><span>Column visibility</span><span class="dt-down-arrow"></span></button></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                اسم المخزن</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                كود المخزن</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                امين المخزن</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                العنوان</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                رقم التليفون</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                ملاحظات</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                عمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="even">
                                            <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="even">
                                            <td class="dtr-control sorting_1" tabindex="0">Gecko</td>
                                            <td>Firefox 3.0</td>
                                            <td>Win 2k+ / OSX.3+</td>
                                            <td>1.9</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="sorting_1 dtr-control">Gecko</td>
                                            <td>Camino 1.0</td>
                                            <td>OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="even">
                                            <td class="sorting_1 dtr-control">Gecko</td>
                                            <td>Camino 1.5</td>
                                            <td>OSX.3+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="sorting_1 dtr-control">Gecko</td>
                                            <td>Netscape 7.2</td>
                                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="even">
                                            <td class="sorting_1 dtr-control">Gecko</td>
                                            <td>Netscape Browser 8</td>
                                            <td>Win 98SE+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="sorting_1 dtr-control">Gecko</td>
                                            <td>Netscape Navigator 9</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="even">
                                            <td class="sorting_1 dtr-control">Gecko</td>
                                            <td>Mozilla 1.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1</td>
                                            <td>A</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Rendering engine</th>
                                            <th rowspan="1" colspan="1">Browser</th>
                                            <th rowspan="1" colspan="1">Platform(s)</th>
                                            <th rowspan="1" colspan="1">Engine version</th>
                                            <th rowspan="1" colspan="1">CSS grade</th>
                                            <th rowspan="1" colspan="1"></th>
                                            <th rowspan="1" colspan="1"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing
                                    1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="example1_previous">
                                            <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                        </li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

@endsection

@endsection
