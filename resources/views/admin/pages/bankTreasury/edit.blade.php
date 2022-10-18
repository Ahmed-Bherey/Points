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
                        <div class="card-header header-bg">
                            <h3 class="card-title" style="float: right"> التحويل من بنك الى اخر</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('bankTransfer.update', $banksTransfer->id) }}"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{$banksTransfer->date}}"
                                            id="date" placeholder="" name="date">
                                        <label for="date" class="col-form-label">تاريخ التحويل</label>
                                    </div>
                                    <div class="col-sm-4  form-floating">
                                        <select requried class="form-control" name="bankFrom_id" id="safe">
                                            <option value="">اختر البنك</option>
                                            @foreach ($banksFrom as $key => $bankFrom)
                                            <option value="{{ $bankFrom->id }}" @if ($banksTransfer->bankFrom_id ==
                                                $bankFrom->id) selected @endif>{{ $bankFrom->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> التحويل من </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select requried class="form-control" name="bankTo_id" id="safe">
                                            <option value="">اختر البنك</option>
                                            @foreach ($banksTo as $key => $bankTo)
                                            <option value="{{ $bankTo->id }}" @if ($banksTransfer->bankTo_id ==
                                                $bankTo->id) selected @endif>{{ $bankTo->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> التحويل الى </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" value="{{$banksTransfer->value}}"
                                            id="value" placeholder="قيمة البنك " name="value">
                                        <label for="value" class="col-form-label">قيمة البنك </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                            id="note">{{$banksTransfer->notes}}</textarea>
                                        <label for="note" class="col-form-label">ملاحظات</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-success-2 mr-3">
                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                                </button>
                                <button type="submit" onclick="history.back()" class="btn bg-secondary">
                                    <i class="fas fa-undo"></i>
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
