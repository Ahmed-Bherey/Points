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
                                <h3 class="card-title header-title"> تجميع صنف </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('collectquantity.store') }}" method="POST"
                                id="store">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="name"
                                                placeholder="اسم الصنف المراد تجميعة" name="name">
                                            <label for="name" class="col-form-label"> اسم الصنف المراد تجميعة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="max"
                                                placeholder="أقصى كمية يمكن تجمعها" name="max_qty">
                                            <label for="max" class="col-form-label"> أقصى كمية يمكن تجمعها
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="collect"
                                                placeholder="الكمية المراد تجمعها" name="quantity">
                                            <label for="collect" class="col-form-label"> الكمية المراد تجمعها
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="actual"
                                                placeholder="الكمية الفعلية" name="actual_qty">
                                            <label for="actual" class="col-form-label"> الكمية الفعلية </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="storeFrom_id" id="collectfrom">
                                                <option>Select Store</option>
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="collectfrom" class="col-form-label">المخزن المراد التجميع منة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="storeTo_id" id="collectfrom">
                                                <option>Select Store</option>
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="collecton" class="col-form-label">المخزن المراد التجميع
                                                فية </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="num" placeholder="رقم التشغيلة"
                                                name="turn_num">
                                            <label for="num" class="col-form-label"> رقم التشغيلة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="date"
                                                placeholder="تاريخ التشغيلة " name="date">
                                            <label for="date" class="col-form-label"> تاريخ التشغيلة </label>
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
                <div class="row mt-4">
                    <div class="col-sm-12 col-lg-12 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> تجميع صنف </h3>
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
                                                            اسم الصنف المراد تجميعة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            اقصى كمية يمكن تجمعها </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الكمية المراد تجمعها </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الكمية الفعلية </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            المخزن المراد التجميع منة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            المخزن المراد التجميع فية</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            رقم التشغيلة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            تاريخ التشغيلة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($collectquantities as $collectquantitie)
                                                        <tr class="odd">
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $collectquantitie->name }}</td>
                                                            <td>{{ $collectquantitie->max_qty }}</td>
                                                            <td>{{ $collectquantitie->quantity }}</td>
                                                            <td>{{ $collectquantitie->actual_qty }}</td>
                                                            <td>{{ $collectquantitie->storeFrom->name }}</td>
                                                            <td>{{ $collectquantitie->storeTo->name }}</td>
                                                            <td>{{ $collectquantitie->turn_num }}</td>
                                                            <td>{{ $collectquantitie->date }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn bg-secondary ">
                                                                    <a href="{{ route('collectquantity.edit', $collectquantitie->id) }}"
                                                                        class="text-white"><i class="far fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="post" id="delete"
                                                                    action="{{ route('collectquantity.destroy', $collectquantitie->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" from="delete"
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
