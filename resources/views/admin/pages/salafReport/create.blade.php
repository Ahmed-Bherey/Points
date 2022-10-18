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
                                <h3 class="card-title" style="float: right"> تقرير السلف </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" plac="" type="text" id="seral" name="">
                                                <option>option 1</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                            </select>
                                            <label for="seral" class="col-form-label"> الاسم </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <select class="form-control" plac="" type="text" id="seral" name="">
                                                <option> موظف</option>
                                                <option> غير موظف</option>
                                            </select>
                                            <label for="seral" class="col-form-label"> صاحب السلفة </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="من" name="">
                                            <label for="date" class="col-form-label"> من </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="date" class="form-control" id="d" placeholder="إلى" name="">
                                            <label for="d" class="col-form-label"> إلى </label>
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






            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
