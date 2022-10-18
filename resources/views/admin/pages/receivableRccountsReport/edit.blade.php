@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> تقرير حسابات الذمم المختلفة </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('receivableRccountsReport.update', $reports->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="seral" class="col-sm-3 col-form-label"> الاسم </label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" required plac="" type="text" id="seral"
                                                        name="receivable_id">
                                                        <option value="">اختر الاسم</option>
                                                        @foreach ($receivables as $key => $receivable)
                                                            <option value="{{ $receivable->id }}"
                                                                @if ($reports->receivable_id == $receivable->id) selected @endif>
                                                                {{ $receivable->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="date" class="col-sm-3 col-form-label"> من </label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control"
                                                        value="{{ $reports->dateFrom }}" id="date" placeholder=""
                                                        name="dateFrom">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="d" class="col-sm-3 col-form-label"> إلى </label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" value="{{ $reports->dateTo }}"
                                                        id="d" placeholder="" name="dateTo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button onclick="history.back()" type="submit" class="btn  bg-danger mr-3"><i
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
