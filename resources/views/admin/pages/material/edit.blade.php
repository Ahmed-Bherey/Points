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
                            <div class="card-header header-bg ">
                                <h3 class="card-title header-title"> المواد الخام </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('material.update', $materials->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="store_id" id="store">
                                                <option value="">Select Store</option>
                                                @foreach ($stores as $key => $store)
                                                    <option value="{{ $store->id }}"
                                                        @if ($materials->store_id == $store->id) selected @endif>
                                                        {{ $store->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="store" class="col-form-label">اسم المخزن</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $materials->material_num }}" id="num"
                                                placeholder="رقم المواد الخام" name="material_num">
                                            <label for="num" class="col-form-label">رقم المواد الخام</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" value="{{ $materials->date }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label">التاريخ</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" value="{{ $materials->quantity }}"
                                                id="quantity" placeholder="الكمية" name="quantity">
                                            <label for="quantity" class="col-form-label">الكمية
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="material_type" id="material">
                                                <option value="">اختر نوع المواد الخام</option>
                                                <option value="1" @if ($materials->material_type == 1) selected @endif>
                                                    type 1</option>
                                                <option value="2" @if ($materials->material_type == 2) selected @endif>
                                                    type 2</option>
                                            </select>
                                            <label for="material" class="col-form-label">نوع المواد الخام</label>
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
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
