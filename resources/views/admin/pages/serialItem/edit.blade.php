@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-10">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> سريالات الاصناف</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('serial.update', $serials->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="number"
                                                placeholder=" رقم الفاتورة" name="invoice_number">
                                            <label for="number" class="col-form-label"> رقم الفاتورة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="store_id" id="name">
                                                <option>Select Store</option>
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="namestore" class="col-form-label">اسم المخزن </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="item_id" id="name">
                                                <option>اختر الصنف</option>
                                                @foreach ($items as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="namecatq" class="col-form-label">اسم الصنف </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="seral" placeholder="اضافة سيريال"
                                                name="serial">
                                            <label for="seral" class="col-form-label"> اضافة سيريال</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="تاريخ الفاتورة"
                                                name="date">
                                            <label for="date" class="col-form-label">تاريخ الفاتورة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="supplier_id" id="name">
                                                <option>Select Supplier</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="col-form-label">اسم المورد</label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="qu" placeholder=" كمية الصنف"
                                                name="quantity">
                                            <label for="qu" class="col-form-label"> كمية الصنف</label>
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
                {{-- end card table --}}

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
