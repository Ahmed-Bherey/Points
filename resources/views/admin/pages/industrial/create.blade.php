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
                            <h3 class="card-title header-title">الصنايعية</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('industrial.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="text" class="form-control" id="industrial"
                                            placeholder="اسم الصنايعى" name="name">
                                        <label for="industrial" class="col-form-label">اسم الصنايعى</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" id="tel"
                                            placeholder="تليفون الصنايعى " name="industrial_tel">
                                        <label for="tel" class="col-form-label">تليفون الصنايعى </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="text" class="form-control" id="fax" placeholder="الفاكس"
                                            name="fax">
                                        <label for="fax" class="col-form-label"> الفاكس
                                        </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="text" class="form-control" id="address"
                                            placeholder="عنوان الصنايعى" name="address">
                                        <label for="address" class="col-form-label">عنوان الصنايعى</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" id="mob" placeholder=" رقم الموبايل "
                                            name="tel">
                                        <label for="mob" class="col-form-label"> رقم الموبايل </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
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
                <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float:right; font-weight:bold;"> الصنايعية </h3>
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
                                                        اسم الصنايعى </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        عنوان الصنايعى </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        تليفون الصنايعى </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        رقم الموبايل </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        الفاكس</th>
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
                                                @foreach($industrials as $key => $industrial)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">{{$industrial->name}}
                                                    </td>
                                                    <td>{{$industrial->industrial_tel}}</td>
                                                    <td>{{$industrial->fax}}</td>
                                                    <td>{{$industrial->address}}</td>
                                                    <td>{{$industrial->tel}}</td>
                                                    <td>{{$industrial->notes}}</td>
                                                    <td>
                                                        <a href="{{ route('industrial.edit', $industrial->id) }}"
                                                            class="btn bg-secondary"><i class="far fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a href="{{ route('industrial.destroy', $industrial->id) }}"
                                                            onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
