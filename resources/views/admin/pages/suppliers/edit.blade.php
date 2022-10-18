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
                            <h3 class="card-title header-title"> الموردين </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('supplier.update' , $suppliers->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" value="{{$suppliers->name}}"
                                            id="suppler" placeholder="اسم المورد" name="name">
                                        <label for="suppler" class="col-form-label">اسم المورد</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" value="{{$suppliers->code}}"
                                            id="Password" placeholder="الرمز" name="code">
                                        <label for="Password" class="col-form-label">الرمز </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" value="{{$suppliers->address}}"
                                            id="address" placeholder="العنوان" name="address">
                                        <label for="address" class="col-form-label">العنوان </label>
                                        <div class="col-sm-9">
                                        </div>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="email" class="form-control" value="{{$suppliers->email}}"
                                            id="email" placeholder="الايميل" name="email">
                                        <label for="email" class="col-form-label"> الايميل</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="tel" class="form-control" value="{{$suppliers->tel}}" id="tel"
                                            placeholder="الهاتف" name="tel">
                                        <label for="tel" class="col-form-label"> الهاتف</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="notes"
                                            id="note">{{$suppliers->notes}}</textarea>
                                        <label for="note" class="col-form-label">ملاحظات</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-success-2 mr-3">
                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                                </button>
                                <button type="submit" class="btn bg-secondary" onclick="history.back()">
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
