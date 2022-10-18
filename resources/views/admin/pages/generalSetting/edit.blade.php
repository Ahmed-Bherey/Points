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
                            <form class="form-horizontal" action="{{ route('generalSetting.update' , $generalSettings->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" value="{{$generalSettings->working_days}}" id="days"
                                                placeholder="عدد ايام العمل بالمؤسسة اسبوعيا" name="working_days">
                                            <label for="days" class="col-form-label">عدد ايام العمل بالمؤسسة اسبوعيا
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="main_holiday" id="vac2">
                                                <option value="">اختر اليوم</option>
                                                <option value="1" @if ($generalSettings->main_holiday == 1 ) selected @endif>السبت</option>
                                                <option value="2" @if ($generalSettings->main_holiday == 2 ) selected @endif>الاحد</option>
                                                <option value="3" @if ($generalSettings->main_holiday == 3 ) selected @endif>الاثنين</option>
                                                <option value="4" @if ($generalSettings->main_holiday == 4 ) selected @endif>الثلاثاء</option>
                                                <option value="5" @if ($generalSettings->main_holiday == 5 ) selected @endif>الاربعاء</option>
                                                <option value="6" @if ($generalSettings->main_holiday == 6 ) selected @endif>الخميس</option>
                                                <option value="7" @if ($generalSettings->main_holiday == 7 ) selected @endif>الجمعة</option>
                                            </select>
                                            <label for="vac2" class="col-form-label"> يوم الاجازة
                                                الرسمى 1
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="sub_holiday" id="vac2">
                                                <option value="">اختر اليوم</option>
                                                <option value="1" @if ($generalSettings->sub_holiday == 1 ) selected @endif>السبت</option>
                                                <option value="2" @if ($generalSettings->sub_holiday == 2 ) selected @endif>الاحد</option>
                                                <option value="3" @if ($generalSettings->sub_holiday == 3 ) selected @endif>الاثنين</option>
                                                <option value="4" @if ($generalSettings->sub_holiday == 4 ) selected @endif>الثلاثاء</option>
                                                <option value="5" @if ($generalSettings->sub_holiday == 5 ) selected @endif>الاربعاء</option>
                                                <option value="6" @if ($generalSettings->sub_holiday == 6 ) selected @endif>الخميس</option>
                                            </select>
                                            <label for="vac2" class="col-form-label"> يوم الاجازة
                                                الرسمى 2
                                            </label>
                                        </div>
                                        {{-- row 1 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-4 form-floating">
                                                <input type="time" class="form-control" value="{{$generalSettings->attendance_time}}" id="presence"
                                                    placeholder="وقت الحضور" name="attendance_time">
                                                <label for="presence" class="col-form-label">وقت الحضور </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="time" class="form-control" value="{{$generalSettings->leaveing_time}}" id="departure"
                                                    placeholder="وقت الانصراف" name="leaveing_time">
                                                <label for="departure" class="col-form-label">وقت الانصراف </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="time" class="form-control" value="{{$generalSettings->attendance_leaving_duration}}" id="minite"
                                                    placeholder=" مدى الحضور والانصراف بالدقائق"
                                                    name="attendance_leaving_duration">
                                                <label for="minite" class="col-form-label"> مدى الحضور والانصراف
                                                    بالدقائق</label>
                                            </div>
                                        </div>
                                        {{-- row 1 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" value="{{$generalSettings->work_hours}}" id="clock" placeholder=""
                                                    name="work_hours">
                                                <label for="clock" class="col-form-label"> ساعات
                                                    العمل
                                                    اليومية
                                                </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" value="{{$generalSettings->absence_day}}" id="a" placeholder="يوم"
                                                    name="absence_day">
                                                <label for="a" class="col-form-label">كل يوم غياب ب </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" value="{{$generalSettings->delay_hour}}" id="b" placeholder="ساعة"
                                                    name="delay_hour">
                                                <label for="b" class="col-form-label">كل ساعة تأخير ب </label>
                                            </div>
                                        </div>
                                        {{-- row 1 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" value="{{$generalSettings->extra_hour}}" id="c"
                                                    placeholder="ساعة" name="extra_hour">
                                                <label for="c" class="col-form-label">كل ساعة إضافية ب </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" value="{{$generalSettings->basedOnNumOfMonthDay}}" id="i"
                                                    placeholder="يوم" name="basedOnNumOfMonthDay">
                                                <label for="i" class="col-form-label">
                                                    الحساب على اساس عدد أيام الشهر </label>
                                            </div>
                                            <div class="col-sm-4 form-floating">
                                                <select required class="form-control" name="cost_type" id="d">
                                                    <option value="">اختر نوع الحساب</option>
                                                    <option value="1" @if ($generalSettings->cost_type == 1 ) selected @endif>أيام</option>
                                                    <option value="2" @if ($generalSettings->cost_type == 2 ) selected @endif>مبلغ ثابت</option>
                                                </select>
                                                <label for="d" class="col-form-label"> نوع الحساب
                                                </label>
                                            </div>
                                        </div>
                                        {{-- row 1 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-4 form-floating">
                                                <input type="number" class="form-control" value="{{$generalSettings->basedOnFixedAmount}}" id="e" placeholder=""
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
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
