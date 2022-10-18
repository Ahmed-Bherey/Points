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
                            <h3 class="card-title header-title">إضافة مندوب لمستخدم </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('addRepresent.update', $represents->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 3 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input requiredtype="text" class="form-control" id="name"
                                            placeholder="اسم المستخدم" name="name">
                                        <label for="name" class="col-form-label">اسم المستخدم</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="representative_id" id="name">
                                            <option value="">اختر المندوب</option>
                                            @foreach ($representatives as $representative)
                                            <option value="{{ $representative->id }}">
                                                {{ $representative->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="name" class="col-form-label">اسم المندوب</label>
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
            {{-- start card table --}}
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
