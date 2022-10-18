@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title" style="float: right"> تقرير حسابات العهد </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('covenantReport.update', $covenantReports->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" plac="" type="text" id="seral"
                                                name="covenant_id">
                                                <option value="">اختر الاسم</option>
                                                @foreach ($covenants as $key => $covenant)
                                                    <option value="{{ $covenant->id }}"
                                                        @if ($covenantReports->covenant_id == $covenant->id) selected @endif>
                                                        {{ $covenant->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="seral" class="col-form-label"> الاسم </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" plac="" type="text" id="seral"
                                                name="custodian">
                                                <option value="">اختر صاحب العهدة</option>
                                                <option value="1" @if ($covenantReports->custodian == 1) selected @endif>موظف
                                                </option>
                                                <option value="2" @if ($covenantReports->custodian == 2) selected @endif>غير موظف
                                                </option>
                                            </select>
                                            <label for="seral" class="col-form-label"> صاحب العهدة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control"
                                                value="{{ $covenantReports->dateFrom }}" id="date" placeholder="من"
                                                name="dateFrom">
                                            <label for="date" class="col-form-label"> من </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control"
                                                value="{{ $covenantReports->dateTo }}" id="d" placeholder="إلى"
                                                name="dateTo">
                                            <label for="d" class="col-form-label"> إلى </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn bg-success-2 mr-3">
                                        <i class="fa-solid fa-eye"></i>
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
