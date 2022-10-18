@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title" style="float: right"> إضافة بنك لمستخدم</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form action="{{ route('userBank.update', $userBanks->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="user" class="col-sm-3 col-md-3 col-lg-3 col-xl-2 col-form-label"> اسم
                                        المستخدم </label>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <input type="text" class="form-control" value="{{ $userBanks->name }}" id="user"
                                            placeholder="" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="safe" class="col-sm-3 col-md-3 col-lg-3 col-xl-2 col-form-label">اسم
                                        البنك</label>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <select class="form-control" name="bank_id" id="safe">
                                            <option>Select Bank</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}" @if ($userBanks->bank_id == $bank->id)
                                                selected @endif>
                                                {{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button onclick="history.back()" class="btn  bg-danger mr-3"><i class="fas fa-undo"></i>
                                </button>
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
