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
                                <h3 class="card-title header-title"> الأصناف </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('classCommission.update', $classes->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="item_id" id="categ">
                                                <option value="">اختر الصنف</option>
                                                @foreach ($items as $key => $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="categ" class="col-form-label">اسم الصنف
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="price" placeholder="السعر"
                                                name="price">
                                            <label for="price" class="col-form-label">السعر
                                            </label>
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
