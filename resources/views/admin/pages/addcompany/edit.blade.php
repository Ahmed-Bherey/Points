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
                                <h3 class="card-title header-title"> إضافة شركة</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('companies.update', $companies->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $companies->name }}"
                                                id="ar" placeholder="اسم الشركة باللغة العربية" name="name" required>
                                            <label for="ar" class="col-form-label">اسم الشركة باللغة العربية
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $companies->en_name }}"
                                                id="en" placeholder="اسم الشركة باللغةالانجليزية" name="en_name">
                                            <label for="en" class="col-form-label">اسم الشركة
                                                باللغةالانجليزية
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="" class="form-control" value="{{ $companies->address }}"
                                                id="ad" placeholder="عنوان الشركة" name="address">
                                            <label for="ad" class="col-form-label"> عنوان الشركة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $companies->website }}"
                                                id="site" placeholder="موقع الويب" name="website">
                                            <label for="site" class="col-form-label"> موقع الويب</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $companies->fax }}"
                                                id="fax" placeholder="الفاكس" name="fax">
                                            <label for="fax" class="col-form-label"> الفاكس</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $companies->phone }}"
                                                id="tel" placeholder="تليفون الشركة" name="phone">
                                            <label for="tel" class="col-form-label">تليفون الشركة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="email" class="form-control" value="{{ $companies->email }}"
                                                id="email" placeholder="البريد الالكترونى" name="email">
                                            <label for="email" class="col-form-label"> البريد الالكترونى</label>
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
                {{-- start card table --}}
                {{-- end card table --}}


            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
