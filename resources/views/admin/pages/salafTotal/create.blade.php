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
                                <h3 class="card-title" style="float: right"> تقرير إجمالى السلف </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" action="" method="">
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-6 form-floating">
                                            <select class="form-control" plac="" type="text" id="seral" name="">
                                                <option>الكل</option>
                                                <option>موظف</option>
                                                <option>غير موظف</option>
                                            </select>
                                            <label for="seral" class="col-form-label"> البحث بال </label>
                                        </div>
                                        <div class="col-sm-6 form-floating">
                                            <select class="form-control" plac="" type="text" id="seral" name="">
                                                <option> الاكثر مديونية</option>
                                                <option> الاقل مديونية</option>
                                            </select>
                                            <label for="seral" class="col-form-label"> ترتيب حسب </label>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn bg-success-2 mr-3">
                                            <i class="fa fa-check text-light" aria-hidden="true"></i>
                                        </button>
                                        <button type="reset" class="btn bg-secondary" onclick="history.back()"
                                            type="submit">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
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
