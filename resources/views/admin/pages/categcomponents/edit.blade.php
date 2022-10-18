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
                                <h3 class="card-title header-title"> مكونات الاصناف التى يتم تجمعها </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('categcomponent.update', $catrgComponents->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="item_id" id="name">
                                                <option>اختر الصنف</option>
                                                @foreach ($items as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="col-form-label"> اسم الصنف </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="d" placeholder="المصنعية"
                                                name="pay_cost">
                                            <label for="d" class="col-form-label"> المصنعية </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="cost"
                                                placeholder="تكلفة المنتج المجمع" name="combaibed_product_cost">
                                            <label for="cost" class="col-form-label"> تكلفة المنتج المجمع </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" plac="" name="unit_id" id="unit">
                                                <option>Select Unit</option>
                                                @foreach ($unites as $unite)
                                                    <option value="{{ $unite->id }}">{{ $unite->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="unit" class="col-form-label">الوحدة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="qu" placeholder="الكمية"
                                                name="quantity">
                                            <label for="qu" class="col-form-label"> الكمية</label>
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
