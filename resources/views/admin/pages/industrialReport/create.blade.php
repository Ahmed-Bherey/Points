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
                            <h3 class="card-title header-title"> تقرير الصنايعية</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form class="form-horizontal" action="" method="">
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select class="form-control" plac="" type="text" id="seral" name="">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                        </select>
                                        <label for="seral" class="col-form-label"> اسم الصنايعى </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="من" name="">
                                        <label for="date" class="col-form-label"> من </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="d" placeholder="إلى" name="">
                                        <label for="d" class="col-form-label"> إلى </label>
                                    </div>

                                </div>




                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="reset" class="btn  bg-danger mr-3"><i class="fas fa-undo"></i> </button>
                                <button type="submit" class="btn  btn-info  ">عرض</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>



                        {{-- end card --}}


                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
            </div>
            @endsection
