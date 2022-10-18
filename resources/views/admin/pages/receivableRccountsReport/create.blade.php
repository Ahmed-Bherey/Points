@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> تقرير حسابات الذمم المختلفة </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('receivableRccountsReport.store') }}"
                                method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-sm-4 mb-3 form-floating">
                                    <select class="form-control" required plac="" type="text" id="seral"
                                                    name="receivable_id">
                                                    <option value="">اختر الاسم</option>
                                                    @foreach ($receivables as $key => $receivable)
                                                    <option value="{{ $receivable->id }}">
                                                        {{ $receivable->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <label for="seral" class="col-sm-3 col-form-label"> الاسم </label>
                                        </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                    <input type="date" class="form-control" id="date" placeholder=""
                                                    name="dateFrom">
                                                <label for="date" class="col-sm-3 col-form-label"> من </label>
                                        </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                    <input type="date" class="form-control" id="d" placeholder=""
                                                    name="dateTo">
                                                <label for="d" class="col-sm-3 col-form-label"> إلى </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button onclick="history.back()" type="submit" class="btn  bg-danger mr-3"><i
                                            class="fas fa-undo"></i> </button>
                                    <button type="submit" class="btn  bg-success"><i class="fa fa-check text-light"
                                            aria-hidden="true"></i></button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                {{-- end card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> تقرير حسابات الذمم المختلفة
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
                                                            اسم الموظف</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            من </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            الى </th>
                                                        <td>العمليات</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($reports as $key => $report)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $report->Receivables->name }}</td>
                                                            <td>{{ $report->dateFrom }}</td>
                                                            <td>{{ $report->dateTo }}</td>
                                                            <td class="d-flex justify-content-center">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('receivableRccountsReport.edit', $report->id) }}"
                                                                        class="text-white"><i class="far fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('receivableRccountsReport.destroy', $report->id) }}">
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
