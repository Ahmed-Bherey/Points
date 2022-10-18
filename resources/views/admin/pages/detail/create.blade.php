@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title "><i class="fas fa-server  ml-2"></i>بيانات المؤسسه</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal " action="{{ route('companySittings.create.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body ">
                                <div class="row g-4 mb-3">
                                    <div class="col-md-9 row g-3">
                                        <div class="col-md-6 form-floating">
                                            <input type="text" class="form-control" @isset($companySittings)
                                                value="{{ $companySittings->name }}" @endisset id="name"
                                                placeholder="اسم العميل" name="name">
                                            <label for="ar-name" class="col-sm-4 col-form-label">اسم الشركة
                                                بالعربية</label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="text" @isset($companySittings)
                                                value="{{ $companySittings->nameEn }}" @endisset class="form-control"
                                                id="name" placeholder="اسم العميل" name="nameEn">
                                            <label for="e-name" class="col-sm-4  col-form-label">اسم الشركة
                                                بالانجليزية</label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="text" @isset($companySittings)
                                                value="{{ $companySittings->address }}" @endisset class="form-control"
                                                id="name" placeholder="اسم العميل" name="address">
                                            <label for="address" class="col-sm-4 col-form-label"> عنوان
                                                الشركة </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="text" @isset($companySittings)
                                                value="{{ $companySittings->fax }}" @endisset class="form-control"
                                                id="name" placeholder="اسم العميل" name="fax">
                                            <label for="fax" class="col-sm-4 col-form-label">
                                                الفاكس</label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="email" @isset($companySittings)
                                                value="{{ $companySittings->mail }}" @endisset class="form-control"
                                                id="name" placeholder="اسم العميل" name="mail">
                                            <label for="e-mail" class="col-sm-4  col-form-label"> البريد
                                                الالكترونى</label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" @isset($companySittings)
                                                value="{{ $companySittings->phone }}" @endisset class="form-control"
                                                id="name" placeholder="اسم العميل" name="phone">
                                            <label for="tel" class="col-sm-4 col-form-label"> تليفون
                                                الشركة </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="text" @isset($companySittings)
                                                value="{{ $companySittings->web }}" @endisset class="form-control"
                                                id="name" placeholder="اسم العميل" name="web">
                                            <label for="site" class="col-sm-4 col-form-label"> موقع
                                                الويب </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="file" class="form-control" id="name" placeholder="اسم العميل"
                                                name="logo">
                                            <label for="site" class="col-sm-4 col-form-label"> لوجو الشركة</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <img src=" @isset($companySittings) {{ asset('/public/' . Storage::url($companySittings->logo)) }} @endisset"
                                            id="imgshow"
                                            style="max-width: 100%; border-radius:10px; box-shadow: -1px 4px 10px 0px goldenrod;">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn  bg-success "><i class="fa fa-check text-light"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div> <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
