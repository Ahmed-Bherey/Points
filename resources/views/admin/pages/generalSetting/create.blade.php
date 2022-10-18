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
                                <h3 class="card-title header-title"> إعدادات حسابات الموظفين </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('generalSetting.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="days"
                                                placeholder="عدد ايام العمل بالمؤسسة اسبوعيا" name="working_days">
                                            <label for="days" class="col-form-label">عدد ايام العمل بالمؤسسة اسبوعيا
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="main_holiday" id="vac2">
                                                <option value="">اختر اليوم</option>
                                                <option value="1">السبت</option>
                                                <option value="2">الاحد</option>
                                                <option value="3">الاثنين</option>
                                                <option value="4">الثلاثاء</option>
                                                <option value="5">الاربعاء</option>
                                                <option value="6">الخميس</option>
                                                <option value="7">الجمعة</option>
                                            </select>
                                            <label for="vac2" class="col-form-label"> يوم الاجازة
                                                الرسمى 1
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
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
                                        {{-- row 1 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-4 form-floating">
                                                <input type="time" class="form-control" id="presence"
                                                    placeholder="وقت الحضور" name="attendance_time">
                                                <label for="presence" class="col-form-label">وقت الحضور </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="time" class="form-control" id="departure"
                                                    placeholder="وقت الانصراف" name="leaveing_time">
                                                <label for="departure" class="col-form-label">وقت الانصراف </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="time" class="form-control" id="minite"
                                                    placeholder=" مدى الحضور والانصراف بالدقائق"
                                                    name="attendance_leaving_duration">
                                                <label for="minite" class="col-form-label"> مدى الحضور والانصراف
                                                    بالدقائق</label>
                                            </div>
                                        </div>
                                        {{-- row 1 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" id="clock" placeholder=""
                                                    name="work_hours">
                                                <label for="clock" class="col-form-label"> ساعات
                                                    العمل
                                                    اليومية
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" id="a" placeholder="يوم"
                                                    name="absence_day">
                                                <label for="a" class="col-form-label">كل يوم غياب ب </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" id="b" placeholder="ساعة"
                                                    name="delay_hour">
                                                <label for="b" class="col-form-label">كل ساعة تأخير ب </label>
                                            </div>
                                        </div>
                                        {{-- row 1 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" id="c"
                                                    placeholder="ساعة" name="extra_hour">
                                                <label for="c" class="col-form-label">كل ساعة إضافية ب </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" id="i"
                                                    placeholder="يوم" name="basedOnNumOfMonthDay">
                                                <label for="i" class="col-form-label">
                                                    الحساب على اساس عدد أيام الشهر </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <select required class="form-control" name="cost_type" id="d">
                                                    <option value="">اختر نوع الحساب</option>
                                                    <option value="1">أيام</option>
                                                    <option value="2">مبلغ ثابت</option>
                                                </select>
                                                <label for="d" class="col-form-label"> نوع الحساب
                                                </label>
                                            </div>
                                        </div>
                                        {{-- row 1 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" id="e" placeholder=""
                                                    name="basedOnFixedAmount">
                                                <label for="e" class="col-form-label"> أو
                                                    بمبلغ
                                                    ثابت </label>
                                            </div>
                                            {{-- <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" id="f"
                                                    placeholder=" أو بمبلغ ثابت" name="">
                                                <label for="f" class="col-form-label"> أو بمبلغ ثابت </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" id="g"
                                                    placeholder="أو بمبلغ ثابت " name="">
                                                <label for="g" class="col-form-label"> أو بمبلغ ثابت </label>
                                            </div> --}}
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">إعدادات حسابات الموظفين
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
                                                        <td>#</td>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            عدد ايام العمل اسبوعيا </th>
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
                                                            يوم الاجازة الرسمى1 </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            يوم الاجازة الرسمى2</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($generalSettings as $key => $generalSetting)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $generalSetting->working_days }}</td>
                                                            <td>{{ $generalSetting->attendance_time }}</td>
                                                            <td>{{ $generalSetting->leaveing_time }}</td>
                                                            <td>
                                                                @if($generalSetting->main_holiday == 1)
                                                                السبت
                                                                @elseif($generalSetting->main_holiday == 2)
                                                                الاحد
                                                                @elseif($generalSetting->main_holiday == 3)
                                                                الاثنين
                                                                @elseif($generalSetting->main_holiday == 4)
                                                                الثلاثاء
                                                                @elseif($generalSetting->main_holiday == 5)
                                                                الاربعاء
                                                                @elseif($generalSetting->main_holiday == 6)
                                                                الخميس
                                                                @else
                                                                الجمعة
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($generalSetting->sub_holiday == 1)
                                                                السبت
                                                                @elseif($generalSetting->sub_holiday == 2)
                                                                الاحد
                                                                @elseif($generalSetting->sub_holiday == 3)
                                                                الاثنين
                                                                @elseif($generalSetting->sub_holiday == 4)
                                                                الثلاثاء
                                                                @elseif($generalSetting->sub_holiday == 5)
                                                                الاربعاء
                                                                @else
                                                                الخميس
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('generalSetting.edit', $generalSetting->id) }}"
                                                                    class="btn bg-secondary"><i class="far fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                                <a href="{{ route('generalSetting.destroy', $generalSetting->id) }}"
                                                                    class="btn btn-danger"><i
                                                                        class="fas fa-trash-alt"></i> </a>
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
