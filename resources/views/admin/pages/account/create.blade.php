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
                            <h3 class="card-title header-title"> أرصدة البنوك أول المدة</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form action="{{ route('account.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="bank_id" id="bank">
                                            <option value="">اختر البنك</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="bank" class="col-sm-3 col-md-3 col-lg-4 col-xl-3 col-form-label">اسم
                                            البنك</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="mon" placeholder="1"
                                            name="amount">
                                        <label for="mon"
                                            class="col-sm-3 col-lg-4 col-xl-3 col-form-label">المبلغ</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="date" value="{{ date('Y-m-d') }}"
                                            placeholder="1" name="date">
                                        <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">التاريخ
                                        </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" onclick="history.back()" class="btn  bg-danger mr-3"><i
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
        {{-- start card table --}}
        <div class="row mt-1">
            <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="float:right; font-weight:bold;"> أرصدة البنوك أول المدة
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    اسم البنك </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    المبلغ </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    التاريخ </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    عمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($accounts as $account)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $account->banks->name }}
                                                </td>
                                                <td>{{ $account->amount }}</td>
                                                <td>{{ $account->date }}</td>
                                                <td class="d-flex justify-content-center">
                                                    <button type="submit" class="btn bg-secondary">
                                                        <a href="{{ route('account.edit', $account->id) }}">
                                                            <i class="far fa-edit" aria-hidden="true"></i>
                                                        </a>
                                                    </button>
                                                    <form action="{{ route('account.destroy', $account->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger"><i
                                                                class="fas fa-trash-alt"></i></button>
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
