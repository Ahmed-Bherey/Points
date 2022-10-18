@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    @if ($companies->isEmpty())
    <h3 class="pt-3">لا يوجد شركات من فضلك أضف شركة</h3>
    <a href="{{ route('companies.create') }}">الذهاب لاضافة شركة</a>
    @elseif($stStores->isEmpty())
    <h3 class="pt-3">لا يوجد مخازن من فضلك أضف مخزن</h3>
    <a href="{{ route('stores.all.index') }}">الذهاب لاضافة مخزن</a>
    @else
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title"> الأصناف </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('items.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-6 row ">
                                        <div class="col-md-6 mb-3 form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="اسم الصنف"
                                                name="name" required>
                                            <label for="name" class="col-form-label"> اسم الصنف
                                            </label>
                                        </div>
                                        <div class="col-md-6 mb-3 row m-0 p-0">
                                            <div class="col-sm-6 form-floating ps-1">
                                                <input type="text" class="form-control" id=""
                                                    placeholder="الكود العالمي" name="global_code">
                                                <label for="name" class="col-form-label"> الكود العالمي
                                                </label>
                                            </div>
                                            <div class="col-sm-6 form-floating pe-1">
                                                <input type="text" class="form-control" id="" placeholder="الكود المحلي"
                                                    name="local_code">
                                                <label for="name" class="col-form-label"> الكود المحلي
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <select required class="form-control" plac="" name="unit_id" id="type">
                                                <option value="">اخترالوحدة</option>
                                                @foreach ($unites as $unit)
                                                <option value="{{ $unit->id }}">
                                                    {{ $unit->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="unit" class=" col-form-label"> الوحدة
                                                الرئيسية</label>
                                        </div>
                                        <div class="col-md-6 mb-3 form-floating">
                                            <select required class="form-control" plac="" name="company_id"
                                                id="company">
                                                <option value="">اختر الشركة</option>
                                                @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">
                                                    {{ $company->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="company" class=" col-form-label"> الشركة</label>
                                        </div>
                                        <div class="col-md-6 mb-3 form-floating">
                                            <select class="form-control" plac="" name="type_id" id="type">
                                                <option value="">لا يوجد</option>
                                                @foreach ($types as $type)
                                                <option value="{{ $type->id }}">
                                                    {{ $type->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="type" class=" col-form-label"> النوع</label>
                                        </div>
                                        <div class="col-md-6 mb-3 form-floating">
                                            <select class="form-control" plac="" name="size_id" id="measure">
                                                <option value="">لا يوجد</option>
                                                @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">
                                                    {{ $size->size }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="measure" class=" col-form-label"> المقاس</label>
                                        </div>
                                        <div class="col-md-12 mb-3 form-floating">
                                            <select class="form-control" plac="" name="color_id" id="color">
                                                <option value="">لا يوجد</option>
                                                @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">
                                                    {{ $color->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="color" class=" col-form-label"> اللون</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" id="sellprice"
                                                placeholder=" سعر البيع" name="sale_price" required>
                                            <label for="sellprice" class="col-form-label"> سعر البيع
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" id="percent"
                                                placeholder="اقصى نسبة خصم" name="max_discount">
                                            <label for="percent" class="col-form-label"> اقصى نسبة خصم
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" id="totprice"
                                                placeholder="سعر الجملة" name="wholesale_price">
                                            <label for="totprice" class="col-form-label"> سعر الجملة
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" id="qu"
                                                placeholder=" اقصى كمية بيع" name="max_sell">
                                            <label for="qu" class="col-form-label"> اقصى كمية بيع
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" id="Half" placeholder=" نصف جملة"
                                                name="half_wholesale">
                                            <label for="Half" class="col-form-label"> نصف جملة
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" id="min"
                                                placeholder="الحد الأدنى للكمية" name="min_qty">
                                            <label for="min" class="col-form-label"> الحد الأدنى للكمية
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" id="buy" placeholder=" سعر الشراء"
                                                name="pur_price">
                                            <label for="buy" class="col-form-label" required> سعر الشراء</label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" id="max" placeholder="ة"
                                                name="max_qty">
                                            <label for="max" class="col-form-label"> الحد الأقصى للكمية
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <h3 class="card-title m-0" style="float:right; font-weight:bold;">
                                                المخازن
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="example2"
                                                        class="table table-bordered table-hover dataTable no-footer dtr-inline"
                                                        role="grid" aria-describedby="example2_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0"
                                                                    aria-controls="example2" rowspan="1" colspan="1"
                                                                    aria-sort="ascending"
                                                                    aria-label="اسم المخزن: activate to sort column descending">
                                                                    اسم المخزن</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="example2" rowspan="1" colspan="1"
                                                                    aria-label="اسم الصنف: activate to sort column ascending">
                                                                    رصيد اول مدة</th>
                                                                <th>#</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody">
                                                            <tr role="row" class="odd">
                                                                <td tabindex="0" class="sorting_1">
                                                                    <select required class="form-control" plac=""
                                                                        name="data[store_id][]" id="store_id">
                                                                        <option value="">اختر المخزن</option>
                                                                        @foreach ($stStores as $stStore)
                                                                        <option value="{{ $stStore->id }}">
                                                                            {{ $stStore->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td style=" width: 30%; ">
                                                                    <input type="number" class="form-control" id=""
                                                                        placeholder="رصيد اول المدة" required
                                                                        name="data[first_balance][]">
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn bg-success"
                                                                        id="add">
                                                                        <i class="fas fa-plus-square"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
            <!-- /.card-header -->
            {{-- end card --}}
            {{-- start card table --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float:right; font-weight:bold;"> الأصناف</h3>
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
                                                        سعر الشراء</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        سعر البيع</th>
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
                                                    @isset($item->companies->name)
                                                    <td>{{ $item->companies->name }}</td>
                                                    @endisset
                                                    @isset($item->types->name)
                                                    <td>{{ $item->types->name }}</td>
                                                    @endisset
                                                    <td>{{ $item->pur_price }}</td>
                                                    <td>{{ $item->sale_price }}</td>
                                                    <td class="d-flex justify-content-center align-items-center">
                                                        <a href="{{ route('items.edit', $item->id) }}"
                                                            class="btn btn-secondary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form method="post"
                                                            action="{{ route('items.destroy', $item->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn btn-danger"><i
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
    @endif
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
</div>
@endsection
