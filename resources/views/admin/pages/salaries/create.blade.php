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
                            <form class="form-horizontal" action="{{ route('salary.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 mb-3 form-floating">
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
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="الاساسي"
                                                name="main">
                                            <label for="value" class="col-form-label">
                                                الاساسي</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="سلف" name="loan">
                                            <label for="value" class="col-form-label">
                                                سلف</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder=" عدد أيام الغياب"
                                                name="absent">
                                            <label for="value" class="col-form-label">
                                                عدد أيام الغياب</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="قيمة الغياب"
                                                name="absent_value">
                                            <label for="value" class="col-form-label">
                                                قيمة الغياب</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="تأمينات"
                                                name="insurance">
                                            <label for="value" class="col-form-label">
                                                تأمينات</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id=""
                                                placeholder="عدد الساعات الاضافية" name="hours">
                                            <label for="value" class="col-form-label">
                                                عدد الساعات الاضافية</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id=""
                                                placeholder="قيمة الساعات الاضافية" name="hours_value">
                                            <label for="value" class="col-form-label">
                                                قيمة الساعات الاضافية</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id=""
                                                placeholder=" عدد ساعات التاخير" name="delay">
                                            <label for="value" class="col-form-label">
                                                عدد ساعات التاخير</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="قيمة التاخير"
                                                name="delay_value">
                                            <label for="value" class="col-form-label"> قيمة التاخير</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="net_salary"
                                                placeholder=" صافى المرتب" name="net_salary">
                                            <label for="net_salary" class="col-form-label"> صافى المرتب</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="بدل وجبات"
                                                name="meal">
                                            <label for="value" class=" col-form-label"> بدل وجبات</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="بدل إنتقال"
                                                name="transition">
                                            <label for="value" class="col-form-label">
                                                بدل إنتقال</label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="مكافئات"
                                                name="reward">
                                            <label for="value" class="col-form-label">
                                                مكافئات </label>
                                        </div>
                                        <div class="col-sm-3 mb-3 form-floating">
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">مرتبات الموظفين
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
                                                            الاساسي </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            مكافئات </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            خصومات </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            صافى المرتب </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($salaries as $key => $salary)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $salary->staffs->name }}</td>
                                                            <td>{{ $salary->main }}</td>
                                                            <td>{{ $salary->reward }}</td>
                                                            <td>{{ $salary->discount }}</td>
                                                            <td>{{ $salary->net_salary }}</td>
                                                            <td class="d-flex justify-content-center">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('salary.edit', $salary->id) }}"
                                                                        class="text-white"><i class="far btn fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="POST"
                                                                    action="{{ route('salary.destroy', $salary->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        onclick="return confirm('Are you sure?')"
                                                                        class="btn btn-danger"><i
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
