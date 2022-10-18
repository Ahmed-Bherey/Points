@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="card card-info">
                            <div class="card-header header-bg">
                                <h3 class="card-title" style="float: right"> تقرير حسابات العهد </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('covenantReport.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" plac="" type="text" id="seral"
                                                name="covenant_id">
                                                <option value="">اختر الاسم</option>
                                                @foreach ($covenants as $key => $covenant)
                                                    <option value="{{ $covenant->id }}">{{ $covenant->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="seral" class="col-form-label"> الاسم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" plac="" type="text" id="seral"
                                                name="custodian">
                                                <option value="">اختر صاحب العهدة</option>
                                                <option value="1">موظف</option>
                                                <option value="2">غير موظف</option>
                                            </select>
                                            <label for="seral" class="col-form-label"> صاحب العهدة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="من"
                                                name="dateFrom">
                                            <label for="date" class="col-form-label"> من </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="date" class="form-control" id="d" placeholder="إلى"
                                                name="dateTo">
                                            <label for="d" class="col-form-label"> إلى </label>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa-solid fa-eye"></i>
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> تقرير حسابات العهد</h3>
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
                                                            الاسم </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            صاحب العهدة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            من</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            الى </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($covenantReports as $covenantReport)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $covenantReport->covenants->name }}</td>
                                                            <td>
                                                                @if ($covenantReport->custodian == 1)
                                                                    موظف
                                                                @else
                                                                    غير موظف
                                                                @endif
                                                            </td>
                                                            <td>{{ $covenantReport->dateFrom }}</td>
                                                            <td>{{ $covenantReport->dateTo }}</td>
                                                            <td class="d-flex justify-content-center">
                                                                <button type="submit" class="btn bg-secondary ">
                                                                    <a href="{{ route('covenantReport.edit', $covenantReport->id) }}"
                                                                        class="text-white"><i class="far fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('covenantReport.destroy', $covenantReport->id) }}">
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
