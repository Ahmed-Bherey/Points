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
                                <h3 class="card-title" style="float: right"> استعلام عن حالة الصيانة </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-6 form-floating">
                                            <select class="form-control" plac="" type="text" id="search" name="">
                                                <option>برقم الايصال</option>
                                                <option>برقم السيريال</option>
                                                <option>برقم الموبايل</option>
                                                <option>باسم العميل</option>
                                            </select>
                                            <label for="search" class="col-sm-3 col-form-label"> معيار البحث </label>
                                        </div>
                                        <div class="col-sm-6 form-floating">
                                            <input type="number" class="form-control" id="num" placeholder="رقم الايصال"
                                                name="">
                                            <label for="num" class="col-form-label">رقم الايصال
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" onclick="history.back()" class="btn  bg-danger mr-3"><i
                                            class="fas fa-undo"></i> </button>
                                    <button type="submit" class="btn  bg-success "><i class="fa fa-check text-light"
                                            aria-hidden="true"></i>
                                    </button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end card --}}




            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
