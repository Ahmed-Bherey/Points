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
                                <h3 class="card-title header-title"> تسجيل بيانات صيانة لعميل </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('customerMaintenance.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="client_id" id="customer">
                                                <option>Select Client</option>
                                                @foreach ($clients as $key => $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="customer" class="col-form-label">اسم العميل
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="date" placeholder="اسم الجهاز"
                                                name="dev_name">
                                            <label for="Device" class="col-form-label">اسم الجهاز
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="date"
                                                placeholder=" تاريخ اخر صيانة لفلتر" name="date">
                                            <label for="date" class="col-form-label">
                                                تاريخ اخر صيانة لفلتر
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="status" id="condition">
                                                <option> متعاقد</option>
                                                <option> غير متعاقد</option>
                                            </select>
                                            <label for="condition" class="col-form-label">حالة العميل</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="" placeholder=" عدد الشمعات"
                                                name="hanger_num">
                                            <label for="" class="col-form-label">
                                                عدد الشمعات
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="mainten_status" id="deserved">
                                                <option>نعم</option>
                                                <option>لا</option>
                                            </select>
                                            <label for="deserved" class="col-form-label">مستحق للصيانة
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
                                <h3 class="card-title"> تسجيل بيانات صيانة لعميل
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
                                                            اسم العميل</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            حالة العميل </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            اسم الجهاز </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            عدد الشمعات </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            مستحق للصيانة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            تاريخ اخر صيانة لفلتر </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <<<<<<< HEAD <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">s</td>
                                                        <td>dsdf </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <button type="submit" class="btn"> <i
                                                                    class="far fa-edit" aria-hidden="true"></i></button>
                                                            <button type="submit" class="btn "><i
                                                                    class="fas fa-trash-alt"></i> </button>
                                                        </td>
                                                        </tr>
                                                        @foreach ($customers as $key => $customer)
                                                            <tr class="odd">
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td class="dtr-control sorting_1" tabindex="0">
                                                                    {{ $customer->clients->name }}</td>
                                                                <td>{{ $customer->dev_name }}</td>
                                                                <td>{{ $customer->date }}</td>
                                                                <td>{{ $customer->status }}</td>
                                                                <td>{{ $customer->hanger_num }}</td>
                                                                <td>{{ $customer->mainten_status }}</td>
                                                                <td class="d-flex justify-content-center">
                                                                    <button type="submit" class="btn bg-secondary">
                                                                        <a href="{{ route('customerMaintenance.edit', $customer->id) }}"
                                                                            class="text-white"><i
                                                                                class="far btn fa-edit "
                                                                                aria-hidden="true"></i></a>
                                                                    </button>
                                                                    <form method="POST"
                                                                        action="{{ route('customerMaintenance.destroy', $customer->id) }}">
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
