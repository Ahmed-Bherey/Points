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
                            <div class="card-header">
                                <h3 class="card-title" style="float: right"> إهلاكات الاصول </h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form action="{{ route('destruction.update', $destructions->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="assets"
                                                    class="col-sm-3 col-md-3 col-lg-4 col-xl-3 col-form-label">
                                                    اسم الاصل
                                                </label>
                                                <div class="col-sm-9 col-md-9 col-lg-8 col-xl-9">
                                                    <input type="text" class="form-control"
                                                        value="{{ $destructions->name }}" id="assets" placeholder=""
                                                        name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Clearvalue"
                                                    class="col-sm-3 col-lg-4 col-xl-3 col-form-label">قيمة
                                                    الاصل</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <input type="number" class="form-control"
                                                        value="{{ $destructions->assets_amount }}" id="Clearvalue"
                                                        placeholder="" name="assets_amount">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="mon" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">قيمة
                                                    الاهلاكات</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <input type="number" class="form-control"
                                                        value="{{ $destructions->destructions_amount }}" id="mon"
                                                        placeholder="" name="destructions_amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">التاريخ
                                                </label>
                                                <div class="col-sm-9  col-lg-8 col-xl-9">
                                                    <input type="date" class="form-control"
                                                        value="{{ $destructions->date }}" id="date" placeholder=""
                                                        name="date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Clear" class="col-sm-3 col-lg-4 col-xl-3 col-form-label"> صافى
                                                    الاصل</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <input type="number" class="form-control"
                                                        value="{{ $destructions->pure_asset }}" id="Clear" placeholder=""
                                                        name="pure_asset">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="damgevalue"
                                                    class="col-sm-3 col-lg-4 col-xl-3 col-form-label">قيمة
                                                    الاهلاك</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <input type="number" class="form-control"
                                                        value="{{ $destructions->destruction_amount }}" id="damgevalue"
                                                        placeholder="" name="destruction_amount">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button onclick="history.back()" class="btn  bg-danger mr-3"><i
                                            class="fas fa-undo"></i>
                                    </button>
                                    <button type="submit" class="btn  bg-success"><i class="fa fa-check text-light"
                                            aria-hidden="true"></i></button>

                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>

                {{-- end card --}}
                {{-- start card table --}}
                {{-- end card table --}}


            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
