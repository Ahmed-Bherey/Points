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
                            <h3 class="card-title header-title"> إضافة شركة</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('companies.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="ar"
                                            placeholder="اسم الشركة باللغة العربية" name="name" required>
                                        <label for="ar" class="col-form-label">اسم الشركة باللغة العربية
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="en"
                                            placeholder="اسم الشركة باللغةالانجليزية" name="en_name">
                                        <label for="en" class="col-form-label">اسم الشركة
                                            باللغة الانجليزية
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="" class="form-control" id="ad" placeholder="عنوان الشركة"
                                            name="address">
                                        <label for="ad" class="col-form-label"> عنوان الشركة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="text" class="form-control" id="site" placeholder="موقع الويب"
                                            name="website">
                                        <label for="site" class="col-form-label"> موقع الويب</label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="fax" placeholder="الفاكس"
                                            name="fax">
                                        <label for="fax" class="col-form-label"> الفاكس</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="tel" placeholder="تليفون الشركة"
                                            name="phone">
                                        <label for="tel" class="col-form-label">تليفون الشركة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="email" class="form-control" id="email"
                                            placeholder="البريد الالكترونى" name="email">
                                        <label for="email" class="col-form-label"> البريد الالكترونى</label>
                                    </div>
                                </div>
                                {{-- row 3 --}}
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-success-2 mr-3">
                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
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
            {{-- start card table --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card border border-1 mt-3 bg-light">
                        <div class="card-header">
                            <h3 class="card-title " style="float:right; font-weight:bold;"> الشركات</h3>
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
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        اسم الشركة باللغة العربية </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        اسم الشركة باللغة الانجليزية
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        عنوان الشركة
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        تليفون الشركة
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        الفاكس
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        موقع الويب
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        البريد الالكترونى
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        عمليات
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($companies as $company)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $company->name }}</td>
                                                    <td>{{ $company->en_name }}</td>
                                                    <td>{{ $company->address }}</td>
                                                    <td>{{ $company->phone }}</td>
                                                    <td>{{ $company->fax }}</td>
                                                    <td>{{ $company->website }}</td>
                                                    <td>{{ $company->email }}</td>
                                                    <td class="d-flex  align-items-center justify-content-center">
                                                        <button type="submit" class="btn bg-secondary">
                                                            <a href="{{ route('companies.edit', $company->id) }}"
                                                                class="text-white"><i class="far fa-edit"></i></a>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('companies.destroy', $company->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger"><i class="fas fa-trash-alt "></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
