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
                                <h3 class="card-title header-title"> حسابات العملاء </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('clientAccount.update', $clientAccounts->id) }}"
                                method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="client_id" id="customer">
                                                <option value="">اختر العميل</option>
                                                @foreach ($clients as $key => $client)
                                                    <option value="{{ $client->id }}"
                                                        @if ($clientAccounts->client_id == $client->id) selected @endif>
                                                        {{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customer" class="col-sm-3 col-form-label">اسم العميل</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" value="{{ $clientAccounts->tel }}"
                                                id="tel" placeholder="رقم الموبايل" name="tel">
                                            <label for="tel" class="col-sm-3 col-form-label">رقم الموبايل </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $clientAccounts->receipt_num }}" id="receiptnum"
                                                placeholder="رقم الايصال" name="receipt_num">
                                            <label for="receiptnum" class="col-sm-3 col-form-label">رقم الايصال </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $clientAccounts->invoice_num }}" id="billnum"
                                                placeholder="رقم الفاتورة " name="invoice_num">
                                            <label for="billnum" class="col-sm-3 col-form-label">رقم الفاتورة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="representative_id" id="customer">
                                                <option value="">اختر مندوب التحصيل</option>
                                                @foreach ($representatives as $key => $representative)
                                                    <option value="{{ $representative->id }}"
                                                        @if ($clientAccounts->representative_id == $representative->id) selected @endif>
                                                        {{ $representative->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="represent" class="col-sm-3 col-form-label">مندوب التحصل </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" value="{{ $clientAccounts->date }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-sm-3 col-form-label"> التاريخ </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <label for="safe" class="col-sm-3 col-form-label"> الخزينة </label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="treasury_id" id="customer">
                                                    <option value="">اختر الخزينة</option>
                                                    @foreach ($treasuries as $key => $treasury)
                                                        <option value="{{ $treasury->id }}"
                                                            @if ($clientAccounts->treasury_id == $treasury->id) selected @endif>
                                                            {{ $treasury->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="safe" placeholder=""
                                                    name="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <label for="bank" class="col-sm-3 col-form-label"> البنك </label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="bank_id" id="customer">
                                                    <option value="">اختر البنك</option>
                                                    @foreach ($banks as $key => $bank)
                                                        <option value="{{ $bank->id }}"
                                                            @if ($clientAccounts->bank_id == $bank->id) selected @endif>
                                                            {{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="bank" placeholder=""
                                                    name="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $clientAccounts->paid_to }}"id="payee"
                                                placeholder="مدفوع لة " name="paid_to">
                                            <label for="payee" class="col-sm-3 col-form-label">مدفوع لة </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $clientAccounts->paid_from }}" id="paid from"
                                                placeholder="مدفوع منة" name="paid_from">
                                            <label for="paid from" class="col-sm-3 col-form-label"> مدفوع منة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $clientAccounts->rest }}" id="account"
                                                placeholder=" باقى لحسابة(لة)" name="rest">
                                            <label for="account" class="col-sm-3 col-form-label"> باقى لحسابة(لة)</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note">{{ $clientAccounts->notes }}</textarea>
                                            <label for="note" class="col-sm-3 col-form-label">ملاحظات</label>
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
                {{-- end card --}}
                {{-- start card table --}}
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div> <!-- /.content-header -->
    </div>{{-- content-wrapper --}}
@endsection
