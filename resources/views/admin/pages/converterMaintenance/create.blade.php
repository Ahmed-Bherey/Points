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
                                <h3 class="card-title header-title"> العملاء المحولين للصيانة </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('converterMaintenance.store') }}" method="POST">
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
                                            <label for="customer" class="col-form-label">اسم
                                                العميل
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="technician_id" id="customer">
                                                <option>Select Technician</option>
                                                @foreach ($technicians as $key => $technician)
                                                    <option value="{{ $technician->id }}">
                                                        {{ $technician->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="place" class="col-form-label">
                                                اسم الفنى
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="date" placeholder="اسم الجهاز"
                                                name="device_name">
                                            <label for="Device" class="col-form-label">اسم الجهاز
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
                                <h3 class="card-title"> العملاء المحولين للصيانة
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
                                                            اسم الجهاز </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            اسم الفنى </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($converters as $key => $converter)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $converter->clients->name }}</td>
                                                            <td>{{ $converter->device_name }}</td>
                                                            <td>{{ $converter->technicians->name }}</td>
                                                            <td class="d-flex justify-content-center">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('converterMaintenance.edit', $converter->id) }}"
                                                                        class="text-white"><i class="far btn fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="POST"
                                                                    action="{{ route('converterMaintenance.destroy', $converter->id) }}">
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
