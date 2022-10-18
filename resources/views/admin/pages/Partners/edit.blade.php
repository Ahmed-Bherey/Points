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
                                <h3 class="card-title" style="float: right"> بيانات الشركاء </h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form action="{{ route('partner.update', $partners->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="borrower"
                                                    class="col-sm-3  col-lg-4 col-xl-3 col-form-label">الاسم
                                                </label>
                                                <div class="col-sm-9  col-lg-8 col-xl-9">
                                                    <input type="text" class="form-control"
                                                        value="{{ $partners->name }}" id="borrower" placeholder=""
                                                        name="name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="address"
                                                    class="col-sm-3 col-lg-4 col-xl-3 col-form-label">العنوان</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <input type="text" class="form-control"
                                                        value="{{ $partners->address }}" id="address" placeholder=""
                                                        name="address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="value" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">قيمة
                                                    المشاركة</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <input type="number" class="form-control"
                                                        value="{{ $partners->amount }}" id="value" placeholder=""
                                                        name="amount">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="safe" class="col-sm-3 col-lg-4 col-xl-3 col-form-label"> الخزينة
                                                </label>
                                                <div class="col-sm-5 col-lg-8 col-xl-9">
                                                    <select class="form-control" name="treasury_id" id="safe">
                                                        <option>Select treasury</option>
                                                        @foreach ($treasuries as $treasury)
                                                            <option value="{{ $treasury->id }}"
                                                                @if ($partners->treasury_id == $treasury->id) selected @endif>
                                                                {{ $treasury->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">تأثر الخزينة ورأس المال
                                                    بقيمة المشاركة </label>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="person" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">نوعة
                                                </label>
                                                <div class="col-sm-9  col-lg-8 col-xl-9">
                                                    <select class="form-control" plac="" type="text" id="person"
                                                        name="type">
                                                        <option> عامل</option>
                                                        <option> غير عامل</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tel" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">التليفون
                                                </label>
                                                <div class="col-sm-9  col-lg-8 col-xl-9">
                                                    <input type="number" class="form-control"
                                                        value="{{ $partners->tel }}" id="tel" placeholder="" name="tel">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="percent" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">نسبة
                                                    المشاركة</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <input type="number" class="form-control"
                                                        value="{{ $partners->rate }}" id="percent" placeholder=""
                                                        name="rate">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="note" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">ملاحظات
                                                </label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="notes"
                                                        id="note">{{ $partners->notes }}</textarea>
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
