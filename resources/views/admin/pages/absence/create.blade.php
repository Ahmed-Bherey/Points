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
                                <h3 class="card-title header-title"> تسجيل الغياب </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('absence.store') }}" method="POST">
                                @csrf
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
                                            <label for="employee" class="col-form-label">اسم
                                                الموظف
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="days" placeholder="عدد الايام"
                                                name="days">
                                            <label for="days" class="col-form-label">عدد الايام</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="holidy_id" id="vaction">
                                                <option value=""> اختر النوع</option>
                                                <option value="1"> اعتيادى</option>
                                                <option value="2"> عارضة</option>
                                                <option value="3"> عادى</option>
                                            </select>
                                            <label for="vaction" class="col-form-label"> نوع
                                                الاجازة</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="1" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">ملاحظات
                                            </label>
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
                                <h3 class="card-title">الغياب
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
                                                            اسم الموظف</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            التاريخ </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            نوع الاجازة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            عدد الايام </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            ملاحظات</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($absences as $key => $absence)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $absence->staffs->name }}</td>
                                                            <td>{{ $absence->date }}</td>
                                                            <td>
                                                                @if ($absence->holidy_id == 1)
                                                                    اعتيادي
                                                                @elseif($absence->holidy_id == 2)
                                                                    عارضة
                                                                @else
                                                                    عادي
                                                                @endif
                                                            </td>
                                                            <td>{{ $absence->days }} ايام</td>
                                                            <td>{{ $absence->notes }}</td>
                                                            <td class="d-flex justify-content-center align-items-center">
                                                                <button type="submit" class="btn bg-secondary ">
                                                                    <a href="{{ route('absence.edit', $absence->id) }}"
                                                                        class="text-white"><i
                                                                            class="far btn fa-edit"></i></a>
                                                                </button>
                                                                <form method="POST"
                                                                    action="{{ route('absence.destroy', $absence->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        onclick="return confirm('Are you sure?')"
                                                                        class="btn btn-danger "><i
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
