@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <!-- Main content -->
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card ">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"><i class="fas fa-server ml-2"></i>تعديل بيانات المؤسسه
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" method="post"
                                action="{{ route('companySittings.edit.update', $companySitting->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label">اسم
                                                    الشركة
                                                    بالعربية</label>
                                                <div class="col-sm-10 col-lg-8">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                        value="{{ $companySitting->name }}" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label"> عنوان
                                                    الشركة </label>
                                                <div class="col-sm-10 col-lg-8">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                        value="{{ $companySitting->address }}" name="address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label">
                                                    الفاكس</label>
                                                <div class="col-sm-10 col-lg-8">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                        value="{{ $companySitting->fax }}" name="fax">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label">
                                                    البريد
                                                    الالكترونى</label>
                                                <div class="col-sm-10 col-lg-8">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                        value="{{ $companySitting->mail }}" name="mail">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label">اسم
                                                    الشركة
                                                    بالانجليزية</label>
                                                <div class="col-sm-10 col-lg-8">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                        value="{{ $companySitting->nameEn }}" name="nameEn">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label">
                                                    تليفون
                                                    الشركة </label>
                                                <div class="col-sm-10 col-lg-8">
                                                    <input type="tel" class="form-control" id="inputEmail3"
                                                        value="{{ $companySitting->phone }}" name="phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-lg-4 col-form-label"> موقع
                                                    الويب </label>
                                                <div class="col-sm-10 col-lg-8">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                        value="{{ $companySitting->web }}" name="web">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button onclick="history.back()" class="btn  bg-danger mr-3"><i
                                            class="fas fa-undo"></i> </button>
                                    <button type="submit" class="btn  bg-success "><i class="fa fa-check text-light"
                                            aria-hidden="true"></i></button>
                                </div>
                                <!-- /.card-footer -->
                            </form>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
