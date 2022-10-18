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
                            <form class="form-horizontal" action="{{ route('discounts.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                                name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">ملاحظات
                                            </label>
                                        </div>
                                        <div class=" col-sm-3 mb-3 form-floating">
                                                    <select required class="form-control" name="staff_id" id="employee">
                                                        <option value="">Select Employee</option>
                                                        @foreach ($staffs as $key => $staff)
                                                        <option value="{{ $staff->id }}">{{ $staff->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="employee" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">اسم
                                                            الموظف
                                                        </label>
                                                </div>
                                                <div class=" col-sm-3 mb-3 form-floating">
                                                    <input type="date" class="form-control" id="date" placeholder=""
                                                    name="date">
                                                    <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">التاريخ
                                                    </label>
                                                </div>
                                                <div class="col-sm-3 mb-3 form-floating">
                                                    <input type="number" class="form-control" id="value" placeholder=""
                                                        name="discount_value">
                                                        <label for="value" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">
                                                            قيمة الخصم</label>
                                                </div>
                                                <div class="col-sm-3 mb-3 form-floating">
                                                    <select required class="form-control" name="value_per_day" id="day">
                                                        <option value="">Select Value</option>
                                                        <option value="1">يوم</option>
                                                        <option value="2">نصف يوم </option>
                                                        <option value="3"> ربع يوم</option>
                                                    </select>
                                                    <label for="day" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">
                                                        قيمتة باليوم</label>
                                                </div>
                                                <div class="col-sm-3 mb-3 form-floating">
                                                <textarea class="form-control" rows="3" placeholder="Enter ..." name="notes" id="note"></textarea>
                                                <label for="note" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">سبب
                                                    الخصم
                                                </label>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <div class="form-group row">

                                            </div>


                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row ">

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="form-group row">

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
                                <h3 class="card-title">خصومات الموظفين
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
                                                            قيمة الخصم </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            سبب الخصم</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($discounts as $key => $discount)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $discount->staffs->name }}</td>
                                                            <td>{{ $discount->date }}</td>
                                                            <td>{{ $discount->discount_value }}</td>
                                                            <td>{{ $discount->notes }}</td>
                                                            <td class="d-flex justify-content-center">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('discounts.edit', $discount->id) }}"
                                                                        class="text-white"><i class="far btn fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="POST"
                                                                    action="{{ route('discounts.destroy', $discount->id) }}">
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
