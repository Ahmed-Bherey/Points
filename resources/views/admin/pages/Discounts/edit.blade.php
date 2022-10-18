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
                                <h3 class="card-title header-title"> خصومات الموظفين </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('discounts.update', $discounts->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                                name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">ملاحظات
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="employee" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">اسم
                                                    الموظف
                                                </label>
                                                <div class="col-sm-9  col-lg-8 col-xl-9">
                                                    <select required class="form-control" name="staff_id" id="employee">
                                                        <option value="">Select Employee</option>
                                                        @foreach ($staffs as $key => $staff)
                                                            <option value="{{ $staff->id }}">{{ $staff->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="value" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">
                                                    قيمة الخصم</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <input type="number" class="form-control" id="value" placeholder=""
                                                        name="discount_value">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="day" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">
                                                    قيمتة باليوم</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <select required class="form-control" name="value_per_day" id="day">
                                                        <option value="">Select Value</option>
                                                        <option value="1">يوم</option>
                                                        <option value="2">نصف يوم </option>
                                                        <option value="3"> ربع يوم</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">التاريخ
                                                </label>
                                                <div class="col-sm-9  col-lg-8 col-xl-9">
                                                    <input type="date" class="form-control" id="date" placeholder=""
                                                        name="date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="note" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">سبب
                                                    الخصم
                                                </label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="notes" id="note"></textarea>
                                                </div>
                                            </div>
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
