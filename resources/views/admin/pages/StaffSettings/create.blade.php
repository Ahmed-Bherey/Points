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
                            <h3 class="card-title header-title"> الاعدادات الخاصة بالموظف </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('staffSetting.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <select required class="form-control" name="staff_id" id="employee">
                                            <option value="">Select Employee</option>
                                            @foreach ($staffs as $key => $staff)
                                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="employee" class="col-form-label">اسم الموظف
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="days" placeholder=""
                                            name="work_day_num">
                                        <label for="days" class="col-form-label">عدد
                                            ايام العمل
                                            بالمؤسسة اسبوعيا
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <select required class="form-control" name="main_holiday" id="vac2">
                                            <option value="">اختر اليوم</option>
                                            <option value="1">السبت</option>
                                            <option value="2">الاحد</option>
                                            <option value="3">الاثنين</option>
                                            <option value="4">الثلاثاء</option>
                                            <option value="5">الاربعاء</option>
                                            <option value="6">الخميس</option>
                                        </select>
                                        <label for="vac1" class="col-form-label">يوم
                                            الاجازة الرسمى 1</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <select required class="form-control" name="sub_holiday" id="vac2">
                                            <option value="">اختر اليوم</option>
                                            <option value="1">السبت</option>
                                            <option value="2">الاحد</option>
                                            <option value="3">الاثنين</option>
                                            <option value="4">الثلاثاء</option>
                                            <option value="5">الاربعاء</option>
                                            <option value="6">الخميس</option>
                                        </select>
                                        <label for="vac2" class="col-form-label"> يوم الاجازة
                                            الرسمى 2
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="time" class="form-control" id="presence" placeholder="وقت الحضور"
                                            name="attendance_time">
                                        <label for="presence" class="col-form-label">وقت
                                            الحضور </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="time" class="form-control" id="departure"
                                            placeholder="وقت الانصراف " name="leaving_time">
                                        <label for="departure" class="col-form-label">وقت
                                            الانصراف </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="time" class="form-control" id="minite"
                                            placeholder=" مدى الحضور والانصراف بالدقائق"
                                            name="attendance_leaving_duration">
                                        <label for="minite" class="col-form-label"> مدى
                                            الحضور والانصراف بالدقائق</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="normal"
                                            placeholder="عدد الاجازات الاعتيادى" name="normal_holiday_num">
                                        <label for="normal" class="col-form-label">عدد الاجازات الاعتيادى
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="Casual"
                                            placeholder="عدد الاجازات العارضة" name="casual_holiday_num">
                                        <label for="Casual" class="col-form-label">عدد الاجازات العارضة
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="clock"
                                            placeholder="ساعات العمل اليومية" name="work_hours">
                                        <label for="clock" class="col-form-label"> ساعات العمل اليومية
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="a" placeholder="كل يوم غياب ب "
                                            name="absence_day">
                                        <label for="a" class="col-form-label">كل يوم غياب ب
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="b" placeholder=">كل ساعة تأخير ب"
                                            name="delay_hour">
                                        <label for="b" class="col-form-label">كل ساعة تأخير ب
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="c" placeholder="كل ساعة إضافية ب"
                                            name="extra_hour">
                                        <label for="c" class="col-form-label">كل ساعة إضافية
                                            ب </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="i"
                                            placeholder=" الحساب على اساس عدد أيام الشهر" name="basedOnNumOfMonthDay">
                                        <label for="i" class="col-form-label">
                                            الحساب على اساس عدد أيام الشهر </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <select required class="form-control" name="cost_type" id="d">
                                            <option value="">Select Type</option>
                                            <option value="1">أيام</option>
                                            <option value="2">مبلغ ثابت</option>
                                        </select>
                                        <label for="d" class="col-form-label"> نوع الحساب
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="e" placeholder=" أو بمبلغ ثابت"
                                            name="extra_fixed_amount">
                                        <label for="e" class="col-form-label"> أو بمبلغ ثابت
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="f" placeholder=" أو بمبلغ ثابت"
                                            name="basedOnFixedAmount">
                                        <label for="f" class="col-form-label"> أو بمبلغ ثابت
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="g" placeholder=" أو بمبلغ ثابت"
                                            name="basedOnFixedAmount">
                                        <label for="g" class="col-form-label"> أو بمبلغ ثابت
                                        </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <select required class="form-control" name="cost_time" id="d">
                                            <option value="">Select Cost Time</option>
                                            <option value="1">شهرى</option>
                                            <option value="2">سنوى</option>
                                        </select>
                                        <label for="h" class="col-form-label">
                                            مدة الحساب </label>
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
            <div class="row mt-1">
                <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">الاعدادات الخاصة بالموظف
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <td></td>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        اسم الموظف </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        وقت الحضور </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        وقت الانصراف </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        عدد الاجازات الاعتيادى </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عددالاجازات العارضة</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($staffSettings as $key => $staffSetting)
                                                <tr class="odd">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $staffSetting->staffs->name }}</td>
                                                    <td>{{ $staffSetting->attendance_time }}</td>
                                                    <td>{{ $staffSetting->leaving_time }}</td>
                                                    <td>{{ $staffSetting->normal_holiday_num }}</td>
                                                    <td>{{ $staffSetting->casual_holiday_num }}</td>
                                                    <td class="d-flex">
                                                        <button type="submit" class="btn bg-secondary ">
                                                            <a href="{{ route('staffSetting.edit', $staffSetting->id) }}"
                                                                class="text-white"><i class="far fa-edit "
                                                                    aria-hidden="true"></i></a>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('staffSetting.destroy', $staffSetting->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger  "><i
                                                                    class="fas fa-trash-alt"></i> </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            {{-- end table --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
