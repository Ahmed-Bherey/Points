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
                                <h3 class="card-title header-title"> أصناف بلون واحد </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('items.update', $items->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label"> اسم الصنف
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id=""
                                                        value="{{ $items->name }}" placeholder="" name="name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label"> الشركة
                                                </label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" plac="" name="company_id">
                                                        <option>Select Company</option>
                                                        @foreach ($companies as $company)
                                                            <option value="{{ $company->id }}"
                                                                @if ($items->id == $company->id) selected @endif>
                                                                {{ $company->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3  col-form-label"> النوع</label>
                                                <div class="col-sm-8 ">
                                                    <select class="form-control" plac="" name="type_id">
                                                        <option>Select Type</option>
                                                        @foreach ($types as $type)
                                                            <option value="{{ $type->id }}"
                                                                @if ($items->id == $type->id) selected @endif>
                                                                {{ $type->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3  col-form-label"> الوحدة
                                                </label>
                                                <div class="col-sm-8 ">
                                                    <select class="form-control" plac="" name="unit_id">
                                                        <option>1</option>
                                                        <option>3</option>
                                                        <option>3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3  col-form-label"> الحجم</label>
                                                <div class="col-sm-8 ">
                                                    <select class="form-control" plac="" name="size_id">
                                                        <option>Select Size</option>
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size->id }}"
                                                                @if ($items->id == $size->id) selected @endif>
                                                                {{ $size->size }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3  col-form-label"> اللون</label>
                                                <div class="col-sm-8 ">
                                                    <select class="form-control" plac="" name="color_id">
                                                        <option>Select Color</option>
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->id }}"
                                                                @if ($items->id == $color->id) selected @endif>
                                                                {{ $color->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-3  col-form-label"> المخزن</label>
                                                <div class="col-sm-8 ">
                                                    <select class="form-control" plac="" name="store_id">
                                                        <option>Select Store</option>
                                                        @foreach ($stStores as $stStore)
                                                            <option value="{{ $stStore->id }}"
                                                                @if ($items->id == $stStore->id) selected @endif>
                                                                {{ $stStore->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label"> سعر
                                                    الشراء</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id=""
                                                        value="{{ $items->pur_price }}" placeholder="" name="pur_price">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label"> اقصى نسبة خصم
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id=""
                                                        value="{{ $items->max_discount }}" placeholder=""
                                                        name="max_discount">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label"> اقصى كمية بيع
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id=""
                                                        value="{{ $items->max_sell }}" placeholder="" name="max_sell">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label"> الحد الأدنى
                                                    للكمية
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id=""
                                                        value="{{ $items->min_qty }}" placeholder="" name="min_qty">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-3 col-form-label"> الحد الأقصى
                                                    للكمية
                                                </label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id=""
                                                        value="{{ $items->max_qty }}" placeholder="" name="max_qty">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button onclick="history.back()" class="btn  bg-danger mr-3"><i
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
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
