@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"><i class="fas fa-edit ml-2"></i> تعديل المخازن </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <!-- /.row -->
                            <form action="{{ route('stores.edit.update', $store->id) }}" method="POST"
                                class="form-horizontal-split" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $store->name }}"
                                                id="store" placeholder="اسم المخزن" name="name" required>
                                            <label for="store" class="col-form-label">اسم المخزن</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $store->phone }}" id="t"
                                                placeholder="تليفون" name="phone" required>
                                            <label for="t" class="col-form-label"> تليفون</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $store->stMan_name }}"
                                                id="p" placeholder="امين المخزن" name="stMan_name" required>
                                            <label for="p" class="col-form-label">امين المخزن</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $store->address }}" id="a"
                                                placeholder="العنوان" name="address">
                                            <label for="a" class="col-form-label">العنوان</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <textarea class="form-control" rows="2" placeholder="ملاحظات ..." name="notes" id="n">{{ $store->notes }}</textarea>
                                            <label for="n" class="col-form-label">ملاحظات
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
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
