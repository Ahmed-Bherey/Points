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
                                <h3 class="card-title header-title"> الانواع </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('types.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-6 form-floating">
                                            <select required class="form-control" name="ite_company_id" id="c">
                                                <option value="">اختر الشركة</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="c" class="col-form-label">الشركة </label>
                                        </div>
                                        <div class="col-sm-6 form-floating">
                                            <input type="text" class="form-control" value="{{ old('name') }}"
                                                id="t" placeholder="النوع" name="name">
                                            <label for="t" class="col-form-label"> النوع</label>
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
                {{-- start table --}}
                <div class="row mt-4">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;"> الانواع </h3>
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
                                                            الشركة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            النوع </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($types as $type)
                                                        <tr class="odd">
                                                            @isset($type->companies->name)
                                                                <td class="dtr-control sorting_1" tabindex="0">
                                                                    {{ $type->companies->name }}
                                                                </td>
                                                            @endisset
                                                            <td>{{ $type->name }}</td>
                                                            <td class="d-flex  align-items-center justify-content-center">
                                                                <button type="submit" class="btn bg-secondary  ">
                                                                    <a href="{{ route('types.edit', $type->id) }}"
                                                                        class="text-white"><i class="far fa-edit"></i></a>
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('types.destroy', $type->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger  "><i
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
                                {{-- end card table --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
