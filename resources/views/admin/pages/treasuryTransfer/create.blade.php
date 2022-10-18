@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header header-bg">
                            <h3 class="card-title" style="float: right"> التحويل من خزينة الى اخرى</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('treasuryTransfer.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="date"
                                            placeholder="" name="date">
                                        <label for="date" class="col-form-label">تاريخ التحويل</label>
                                    </div>
                                    <div class="col-sm-4  form-floating">
                                        <select requried class="form-control" name="treasuryFrom_id" id="safe">
                                            <option value="">اختر الخزينة</option>
                                            @foreach ($treasuriesFrom as $key => $Transfer)
                                            <option value="{{ $Transfer->id }}">{{ $Transfer->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> التحويل من </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select requried class="form-control" name="treasuryTo_id" id="safe">
                                            <option value="">اختر الخزينة</option>
                                            @foreach ($treasuriesTo as $key => $Transfer)
                                            <option value="{{ $Transfer->id }}">{{ $Transfer->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> التحويل الى </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="value"
                                            placeholder="القيمة الخزينة " name="value">
                                        <label for="value" class="col-form-label">القيمة الخزينة </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                            id="note"></textarea>
                                        <label for="note" class="col-form-label">ملاحظات</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-success-2 mr-3">
                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                                </button>
                                <button type="submit" onclick="history.back()" class="btn bg-secondary">
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
                            <h3 class="card-title" style="float:right; font-weight:bold;"> التحويل من خزينة الى اخرى
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
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        تاريخ التحويل </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        الخزينة المحول منها </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        الخزينة المحول اليها </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        القيمة</th>
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
                                                @foreach ($treasuriesTransfer as $key => $Transfer)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $Transfer->date }}
                                                    </td>
                                                    <td>{{ $Transfer->treasuryFrom->name }}</td>
                                                    <td>{{ $Transfer->treasuryTo->name }}</td>
                                                    <td>{{ $Transfer->value }}</td>
                                                    <td>{{ $Transfer->notes }}</td>
                                                    <td class="d-flex">
                                                        <button type="submit" class="btn bg-secondary ">
                                                            <a href="{{ route('treasuryTransfer.edit', $Transfer->id) }}"
                                                                class="text-white"><i class="far fa-edit "
                                                                    aria-hidden="true"></i></a>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('treasuryTransfer.destroy', $Transfer->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger  "><i
                                                                    class="fas fa-trash-alt "></i> </button>
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
