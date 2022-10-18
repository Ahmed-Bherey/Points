@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card ">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> أصناف بلون واحد </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('items.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="name" placeholder=" اسم الصنف"
                                                name="name">
                                            <label for="name" class="col-form-label"> اسم الصنف
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="company_id" id="company">
                                                <option>Select Company</option>
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}">
                                                        {{ $company->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="company" class="col-form-label"> الشركة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="type_id" id="type">
                                                <option>Select Type</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">
                                                        {{ $type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="type" class=" col-form-label"> النوع</label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="unit_id" id="units">
                                                <option>1</option>
                                                <option>3</option>
                                                <option>3</option>
                                            </select>
                                            <label for="units" class=" col-form-label"> الوحدة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="color_id" id="color">
                                                <option>Select Color</option>
                                                @foreach ($colors as $color)
                                                    <option value="{{ $color->id }}">
                                                        {{ $color->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="color" class=" col-form-label"> اللون</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="price" placeholder="سعر الشراء"
                                                name="pur_price">
                                            <label for="price" class="col-form-label"> سعر الشراء</label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="persent"
                                                placeholder=" اقصى نسبة خصم" name="max_discount">
                                            <label for="persent" class="col-form-label"> اقصى نسبة خصم
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="qu" placeholder="اقصى كمية بيع"
                                                name="max_sell">
                                            <label for="qu" class="col-form-label"> اقصى كمية بيع
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="min"
                                                placeholder=" الحد الأدنى للكمية" name="min_qty">
                                            <label for="min" class="col-form-label"> الحد الأدنى
                                                للكمية
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="max"
                                                placeholder="الحد الأقصى للكمية" name="max_qty">
                                            <label for="max" class="col-form-label"> الحد الأقصى للكمية
                                            </label>
                                        </div>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> أصناف بلون واحد</h3>
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
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        اسم الصنف</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        الشركة</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        النوع</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        الوحدة </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        اللون</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        المخزن</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        سعر الشراء</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        أقصى نسبة خصم</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        أقصي كمية بيع</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        الحد الادنى للكمية</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        الحد الاقصى للكمية</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $item)
                                                    <tr class="odd">
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->companies->name }}</td>
                                                        <td>{{ $item->types->name }}</td>
                                                        <td>{{ $item->unit_id }}</td>
                                                        <td>{{ $item->colors->name }}</td>
                                                        <td>{{ $item->stStores->name }}</td>
                                                        <td>{{ $item->pur_price }}</td>
                                                        <td>{{ $item->max_discount }}</td>
                                                        <td>{{ $item->max_sell }}</td>
                                                        <td>{{ $item->min_qty }}</td>
                                                        <td>{{ $item->max_qty }}</td>
                                                        <td class="d-flex justify-content-center align-items-center">
                                                            <button type="submit" class="btn btn bg-secondary">
                                                                <a href="{{ route('items.edit', $item->id) }}"
                                                                    class="text-white"><i class="far btn fa-edit "
                                                                        aria-hidden="true"></i></a>
                                                            </button>
                                                            <form method="post"
                                                                action="{{ route('items.destroy', $item->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn bg-secondary"><i
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
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    </div>
@endsection
