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
                                <h3 class="card-title header-title"> مرتبات الموظفين </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('salary.update', $salaries->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="staff_id" id="employee">
                                                <option value="">Select Employee</option>
                                                @foreach ($staffs as $key => $staff)
                                                    <option value="{{ $staff->id }}">{{ $staff->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="employee" class="col-form-label">اسم الموظف
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="الاساسي"
                                                name="main">
                                            <label for="value" class="col-form-label">
                                                الاساسي</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="سلف" name="loan">
                                            <label for="value" class="col-form-label">
                                                سلف</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder=" عدد أيام الغياب"
                                                name="absent">
                                            <label for="value" class="col-form-label">
                                                عدد أيام الغياب</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="قيمة الغياب"
                                                name="absent_value">
                                            <label for="value" class="col-form-label">
                                                قيمة الغياب</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="تأمينات"
                                                name="insurance">
                                            <label for="value" class="col-form-label">
                                                تأمينات</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id=""
                                                placeholder="عدد الساعات الاضافية" name="hours">
                                            <label for="value" class="col-form-label">
                                                عدد الساعات الاضافية</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id=""
                                                placeholder="قيمة الساعات الاضافية" name="hours_value">
                                            <label for="value" class="col-form-label">
                                                قيمة الساعات الاضافية</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id=""
                                                placeholder=" عدد ساعات التاخير" name="delay">
                                            <label for="value" class="col-form-label">
                                                عدد ساعات التاخير</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="قيمة التاخير"
                                                name="delay_value">
                                            <label for="value" class="col-form-label"> قيمة التاخير</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="net_salary"
                                                placeholder=" صافى المرتب" name="net_salary">
                                            <label for="net_salary" class="col-form-label"> صافى المرتب</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="بدل وجبات"
                                                name="meal">
                                            <label for="value" class=" col-form-label"> بدل وجبات</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="بدل إنتقال"
                                                name="transition">
                                            <label for="value" class="col-form-label">
                                                بدل إنتقال</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="مكافئات"
                                                name="reward">
                                            <label for="value" class="col-form-label">
                                                مكافئات </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="خصومات"
                                                name="discount">
                                            <label for="value" class="col-form-label">
                                                خصومات </label>
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
