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
                            <h3 class="card-title" style="float: right"> مسحوبات وإيدعات الشركاء </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('partner-process.update' , $partners->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="client_id" id="name">
                                            <option value="">اختر العميل</option>
                                            @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" @if ($partners->client_id == $client->id)
                                                selected @endif>{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="name" class="col-form-label">الاسم </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" id="process" name="process">
                                            <option value="">اختر نوع المعاملة</option>
                                            <option value="1" @if ($partners->process == 1) selected @endif>سحب</option>
                                            <option value="2" @if ($partners->process == 2) selected @endif>إيداع
                                            </option>
                                        </select>
                                        <label for="process" class="col-form-label"> المعاملة </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="treasure_id" id="name">
                                            <option value="">اختر الخزينة</option>
                                            @foreach ($treasuries as $treasury)
                                            <option value="{{ $treasury->id }}" @if ($partners->treasure_id ==
                                                $treasury->id) selected @endif>{{ $treasury->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> الخزينة </label>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="bank_id" id="name">
                                            <option value="">اختر البنك</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}" @if ($partners->bank_id == $bank->id)
                                                selected @endif>{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="bank" class="col-form-label"> البنك </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{$partners->date}}" id="date"
                                            placeholder="التاريخ" name="date">
                                        <label for="date" class="col-form-label"> التاريخ </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" value="{{$partners->amount}}" id="mon"
                                            placeholder="المبلغ" name="amount">
                                        <label for="mon" class="col-form-label"> المبلغ </label>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                            id="note">{{$partners->notes}}</textarea>
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
