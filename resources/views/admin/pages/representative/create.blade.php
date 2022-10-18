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
                            <h3 class="card-title header-title">المندوبون</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('representative.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 6 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="text" class="form-control" id="represent" placeholder="اسم المندوب"
                                            name="name" required>
                                        <label for="represent" class="col-form-label">اسم المندوب</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="text" class="form-control" id="address" placeholder="العنوان"
                                            name="address">
                                        <label for="address" class=" col-form-label">العنوان</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="target" placeholder="التارجت"
                                            name="target">
                                        <label for="target" class="col-form-label">التارجت</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="text" class="form-control" id="active" placeholder="حالة المندوب"
                                            name="status">
                                        <label for="active" class="col-form-label">حالة المندوب</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="tel" placeholder="التليفون"
                                            name="tel">
                                        <label for="tel" class="col-form-label">التليفون</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" id="mon" placeholder="العمولة"
                                            name="commission">
                                        <label for="mon" class="col-form-label">العمولة</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="note"
                                            id="n"></textarea>
                                        <label for="n" class=" col-form-label">ملاحظات </label>
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
                            <h3 class="card-title ">المندوبين</h3>
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
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        اسم المندوب
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        العنوان
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        التارجت
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        ملاحظات
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        حالة المندوب
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        تليفون
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        العمولة
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        عمليات
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($representatives as $key =>$representative)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration }}</td>
                                                    <td>{{ $representative->name }}</td>
                                                    <td>{{ $representative->address }}</td>
                                                    <td>{{ $representative->target }}</td>
                                                    <td>{{ $representative->note }}</td>
                                                    <td>{{ $representative->status }}</td>
                                                    <td>{{ $representative->tel }}</td>
                                                    <td>{{ $representative->commission }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <button type="submit" class="btn bg-secondary">
                                                            <a href="{{ route('representative.edit', $representative->id) }}"
                                                                class="text-white"><i class="far fa-edit "
                                                                    aria-hidden="true"></i></a>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('representative.destroy', $representative->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>
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
