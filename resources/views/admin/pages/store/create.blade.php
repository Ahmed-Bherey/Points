@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- /.row -->
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title"> المخازن</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('stores.create.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row ">
                                    <div class="col-sm-4 form-floating mb-3">
                                        <input type="text" class="form-control" id="store" placeholder="اسم المخزن"
                                            name="name" required>
                                        <label for="store" class="col-form-label">اسم المخزن</label>
                                    </div>
                                    <div class="col-sm-4 form-floating mb-3">
                                        <input type="number" pattern="{5,10}" class="form-control" id="t" placeholder="تليفون"
                                            name="phone" required>
                                        <label for="t" class="col-form-label"> تليفون</label>
                                    </div>
                                    <div class="col-sm-4 form-floating mb-3">
                                        <input type="text" class="form-control" id="p" placeholder="امين المخزن"
                                            name="stMan_name" required>
                                        <label for="p" class="col-form-label">امين المخزن</label>
                                    </div>
                                    <div class="col-sm-4 form-floating mb-3">
                                        <input type="text" class="form-control" id="a" placeholder="العنوان"
                                            name="address">
                                        <label for="a" class="col-form-label">العنوان</label>
                                    </div>
                                    <div class="col-sm-4 form-floating mb-3">
                                        <textarea class="form-control" rows="2" placeholder="ملاحظات ..." name="notes"
                                            id="n"></textarea>
                                        <label for="n" class="col-form-label">ملاحظات
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
                <div class="col-sm-12 col-lg-12">
                    <div class="card border border-1 mt-3 bg-light">
                        <div class="card-header">
                            <h3 class="card-title " style="float:right; font-weight:bold;">بيانات المخازن</h3>
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
                                                        اسم المخزن
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        امين المخزن
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        العنوان
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        رقم التليفون
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        عمليات
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($stores as $key => $store)
                                                <tr class="odd">
                                                    <td>{{ $store->name }}</td>
                                                    <td>{{ $store->stMan_name }}</td>
                                                    <td>{{ $store->address }}</td>
                                                    <td>{{ $store->phone }}</td>
                                                    <td>
                                                        <a href="{{ route('stores.edit.index', $store->id) }}"
                                                            class="btn btn-secondary"><i class="far fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('stores.delete', $store->id) }}"
                                                            class="btn btn-danger"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="fas fa-trash-alt"></i></i> </a>
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
