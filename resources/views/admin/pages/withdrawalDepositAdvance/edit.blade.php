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
                            <h3 class="card-title" style="float: right"> سحب وإيداع السلف </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal"
                            action="{{route('withdrawalDepositAdvance.update' , $withdrawalDepositAdvances->id)}}"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="borrowerData_id" id="name">
                                            <option value="">اختر صاحب السلفة</option>
                                            @foreach($borrowersData as $key => $borrowerData)
                                            <option value="{{ $borrowerData->id }}" @if ($withdrawalDepositAdvances->
                                                borrowerData_id == $borrowerData->id) selected @endif>{{
                                                $borrowerData->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="name" class="col-form-label">الاسم </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control"
                                            value="{{$withdrawalDepositAdvances->date}}" id="date" placeholder="التاريخ"
                                            name="date">
                                        <label for="date" class="col-form-label"> التاريخ </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$withdrawalDepositAdvances->amount}}" id="mon" placeholder="المبلغ"
                                            name="amount">
                                        <label for="mon" class="col-form-label"> المبلغ </label>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select class="form-control" id="safe" name="treasury_id">
                                            <option value="">اختر الخزينة</option>
                                            @foreach($treasuries as $key => $treasury)
                                            <option value="{{$treasury->id}}" @if ($withdrawalDepositAdvances->
                                                treasury_id == $treasury->id) selected @endif>{{$treasury->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> الخزينة </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select class="form-control" name="bank_id" id="bank">
                                            <option value="">اختر البنك</option>
                                            @foreach($banks as $key => $bank)
                                            <option value="{{ $bank->id }}" @if ($withdrawalDepositAdvances->bank_id ==
                                                $bank->id) selected @endif>{{$bank->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="bank" class="col-form-label"> البنك </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="borrower_order" id="person">
                                            <option value="">اختر صاحب السلفة</option>
                                            <option value="1" @if ($withdrawalDepositAdvances->borrower_order == 1)
                                                selected @endif>موظف</option>
                                            <option value="2" @if ($withdrawalDepositAdvances->borrower_order == 2)
                                                selected @endif>غير موظف</option>
                                        </select>
                                        <label for="person" class="col-form-label"> صاحب السلفة </label>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" id="process" name="process_type">
                                            <option value="">اختر نوع العملية</option>
                                            <option value="1" @if ($withdrawalDepositAdvances->process_type == 1)
                                                selected @endif>سحب</option>
                                            <option value="2" @if ($withdrawalDepositAdvances->process_type == 2)
                                                selected @endif>إيداع</option>
                                        </select>
                                        <label for="process" class="col-form-label"> نوع العملية </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$withdrawalDepositAdvances->rest}}" id="rest"
                                            placeholder=" باقى علية" name="rest">
                                        <label for="rest" class="col-form-label"> باقى علية</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                            id="note">{{$withdrawalDepositAdvances->notes}}</textarea>
                                        <label for="note" class="col-form-label">ملاحظات</label>
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
        </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->
</div>{{-- content-wrapper --}}
@endsection
