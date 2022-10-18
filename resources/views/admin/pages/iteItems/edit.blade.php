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
                        <form class="form-horizontal" action="{{ route('items.update', $items->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-6 row ">
                                        <div class="col-md-6 mb-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $items->name }}" id="name"
                                                placeholder="اسم الصنف" name="name" required>
                                            <label for="name" class="col-form-label"> اسم الصنف
                                            </label>
                                        </div>
                                        <div class="col-md-6 mb-3 row m-0 p-0">
                                            <div class="col-sm-6 form-floating ps-1">
                                                <input type="text" class="form-control"
                                                    value="{{ $items->global_code }}" id="" placeholder="الكود العالمي"
                                                    name="global_code">
                                                <label for="name" class="col-form-label"> الكود العالمي
                                                </label>
                                            </div>
                                            <div class="col-sm-6 form-floating pe-1">
                                                <input type="text" class="form-control" value="{{ $items->local_code }}"
                                                    id="" placeholder="الكود المحلي" name="local_code">
                                                <label for="name" class="col-form-label"> الكود المحلي
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <select required class="form-control" plac="" name="unit_id" id="type">
                                                <option value="">اخترالوحدة</option>
                                                @foreach ($unites as $unit)
                                                <option value="{{ $unit->id }}" @if ($items->unit_id == $unit->id)
                                                    selected @endif>
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
                                                <option value="{{ $company->id }}" @if ($items->company_id ==
                                                    $company->id) selected @endif>
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
                                                <option value="{{ $type->id }}" @if ($items->type_id == $type->id)
                                                    selected @endif>
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
                                                <option value="{{ $size->id }}" @if ($items->size_id == $size->id)
                                                    selected @endif>
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
                                                <option value="{{ $color->id }}" @if ($items->color_id == $color->id)
                                                    selected @endif>
                                                    {{ $color->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="color" class=" col-form-label"> اللون</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" value="{{ $items->sale_price }}"
                                                id="sellprice" placeholder=" سعر البيع" name="sale_price">
                                            <label for="sellprice" class="col-form-label"> سعر البيع
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" value="{{ $items->max_discount }}"
                                                id="percent" placeholder="اقصى نسبة خصم" name="max_discount">
                                            <label for="percent" class="col-form-label"> اقصى نسبة خصم
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $items->wholesale_price }}" id="totprice"
                                                placeholder="سعر الجملة" name="wholesale_price">
                                            <label for="totprice" class="col-form-label"> سعر الجملة
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" value="{{ $items->max_sell }}"
                                                id="qu" placeholder=" اقصى كمية بيع" name="max_sell">
                                            <label for="qu" class="col-form-label"> اقصى كمية بيع
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $items->half_wholesale }}" id="Half" placeholder=" نصف جملة"
                                                name="half_wholesale">
                                            <label for="Half" class="col-form-label"> نصف جملة
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" value="{{ $items->min_qty }}"
                                                id="min" placeholder="الحد الأدنى للكمية" name="min_qty">
                                            <label for="min" class="col-form-label"> الحد الأدنى للكمية
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" value="{{ $items->pur_price }}"
                                                id="buy" placeholder=" سعر الشراء" name="pur_price">
                                            <label for="buy" class="col-form-label"> سعر الشراء</label>
                                        </div>
                                        <div class="col-md-6 form-floating">
                                            <input type="number" class="form-control" value="{{ $items->max_qty }}"
                                                id="max" placeholder="ة" name="max_qty">
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
            <!-- /.card-header -->
            {{-- end card --}}
            {{-- start card table --}}
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    @endif
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->
</div>
@endsection
