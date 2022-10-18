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
                                <h3 class="card-title header-title"> تقرير سيريالات الاصناف </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" type="text" id="seral" name="">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="seral" class="col-form-label"> السيريال </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="" name="">
                                            <label for="date" class="col-form-label"> من </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="d" placeholder="" name="">
                                            <label for="d" class="col-form-label"> إلى </label>
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
