@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-10 ">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> تجميع صنف </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('collectquantity.update', $collectquantities->id) }}" method="POST"
                                id="store">
                                @csrf
                                @method('PUT')
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
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
