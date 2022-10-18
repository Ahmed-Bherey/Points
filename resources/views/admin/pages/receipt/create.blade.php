@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="card card-info">
                            <div class="card-header header-bg">
                                <h3 class="card-title" style="float: right"> إيصال </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-6 form-floating">
                                            <select class="form-control" plac="" type="text" id="receipt" name="">
                                                <option>إيصال سحب</option>
                                                <option>إيصال إيداع</option>
                                            </select>
                                            <label for="receipt" class="col-form-label"> نوع الايصال </label>
                                        </div>
                                        <div class="col-sm-6 form-floating">
                                            <input type="number" class="form-control" id="num" placeholder="رقم الايصال"
                                                name="">
                                            <label for="num" class="col-form-label"> رقم الايصال </label>
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
                {{-- <div class="row mb-2 ">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark text-left"><i class="fas fa-cog text-info ml-2"></i>      تقرير سيريالات الاصناف</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
                <!-- /.row -->
                <form action="" method="">
                    <div class=" row mt-5  ">
                        <div class=" col-sm-12 col-lg-6 p-3 border border-1">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label"> السيريال </label>
                                <div class="col-sm-10 col-lg-9">
                                    <select class="form-control" plac="" type="text" name="">
                                        <option>option 1</option>
                                        <option>option 2</option>
                                        <option>option 3</option>
                                        <option>option 4</option>
                                        <option>option 5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-2">
                                    <input class="form-check-input" type="checkbox">

                                </div>

                                <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label">من   </label>
                                <div class="col-sm-10 col-lg-5">
                                    <div class="input-group date" id="d" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#d">
                                        <div class="input-group-append" data-target="#d" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                    <div class="form-group row">
                                        <div class="col-lg-2"></div>
                                        <label for="inputEmail3" class="col-sm-2 col-lg-3 col-form-label">الى   </label>
                                        <div class="col-sm-10 col-lg-5">
                                            <div class="input-group date" id="d" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#d">
                                                <div class="input-group-append" data-target="#d" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <button type="submit" class="btn btn-success mr-5 "><i class="fas fa-search"></i>
                                            بحث</button>
                                    </div>
                                </div>

                        </div>
                    </div>


                </form> --}}



            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
