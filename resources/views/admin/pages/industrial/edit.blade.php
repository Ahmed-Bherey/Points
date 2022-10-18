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
                            <h3 class="card-title header-title">الصنايعية</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('industrial.update' ,$industrials->id)}}"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="text" class="form-control" value="{{$industrials->name}}"
                                            id="industrial" placeholder="اسم الصنايعى" name="name">
                                        <label for="industrial" class="col-form-label">اسم الصنايعى</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$industrials->industrial_tel}}" id="tel"
                                            placeholder="تليفون الصنايعى " name="industrial_tel">
                                        <label for="tel" class="col-form-label">تليفون الصنايعى </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="text" class="form-control" value="{{$industrials->fax}}" id="fax"
                                            placeholder="الفاكس" name="fax">
                                        <label for="fax" class="col-form-label"> الفاكس
                                        </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="text" class="form-control" value="{{$industrials->address}}"
                                            id="address" placeholder="عنوان الصنايعى" name="address">
                                        <label for="address" class="col-form-label">عنوان الصنايعى</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" value="{{$industrials->tel}}" id="mob"
                                            placeholder=" رقم الموبايل " name="tel">
                                        <label for="mob" class="col-form-label"> رقم الموبايل </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                            id="note">{{$industrials->notes}}</textarea>
                                        <label for="note" class="col-form-label">ملاحظات</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-success-2 mr-3">
                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                                </button>
                                <button class="btn bg-secondary" onclick="history.back()" type="submit">
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
