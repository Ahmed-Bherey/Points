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
                            <h3 class="card-title" style="float: right"> سحب وإيداع القروض </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal"
                            action="{{route('withdrawPayLoan.update' , $withdrawPayLoans->id)}}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <select required class="form-control" name="borrowData_id" id="name">
                                            <option value="">اختر الاسم</option>
                                            @foreach($borrowsData as $key => $borrowData)
                                            <option value="{{ $borrowData->id }}" @if ($withdrawPayLoans->borrowData_id
                                                == $borrowData->id) selected @endif>{{$borrowData->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="name" class="col-form-label">الاسم </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="date" class="form-control" value="{{$withdrawPayLoans->date}}"
                                            id="date" placeholder="التاريخ" name="date">
                                        <label for="date" class="col-form-label"> التاريخ </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <select class="form-control" name="treasury_id" id="name">
                                            <option value="">اختر الخزينة</option>
                                            @foreach($treasuries as $key => $treasury)
                                            <option value="{{ $treasury->id }}" @if ($withdrawPayLoans->treasury_id ==
                                                $treasury->id) selected @endif>{{$treasury->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> الخزينة </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <select class="form-control" name="bank_id" id="name">
                                            <option value="">اختر البنك</option>
                                            @foreach($banks as $key => $bank)
                                            <option value="{{ $bank->id }}" @if ($withdrawPayLoans->bank_id ==
                                                $bank->id) selected @endif>{{$bank->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="bank" class="col-form-label"> البنك </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$withdrawPayLoans->paidFrom}}" id="payee" placeholder="مدفوع لة"
                                            name="paidFrom">
                                        <label for="payee" class="col-form-label">مدفوع لة </label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" value="{{$withdrawPayLoans->paidTo}}"
                                            id="paid from" placeholder="مدفوع منة" name="paidTo">
                                        <label for="paid from" class="col-form-label"> مدفوع منة</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <input type="number" class="form-control" value="{{$withdrawPayLoans->rest}}"
                                            id="account" placeholder="باقى لحسابة(لة)" name="rest">
                                        <label for="account" class="col-form-label"> باقى لحسابة(لة)</label>
                                    </div>
                                    <div class="col-sm-3 mb-3 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                            id="note">{{$withdrawPayLoans->notes}}</textarea>
                                        <label for="note" class="col-form-label">ملاحظات</label>
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
    </div> <!-- /.content-header -->
</div>{{-- content-wrapper --}}
@endsection
