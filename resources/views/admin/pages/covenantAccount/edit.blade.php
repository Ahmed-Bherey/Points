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
                                <h3 class="card-title" style="float: right"> جارى حسابات العهد </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('covenantAccount.update', $covenantAccounts->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="covenant_id" id="name">
                                                <option value="">اختر الاسم</option>
                                                @foreach ($covenants as $key => $covenant)
                                                    <option value="{{ $covenant->id }}"
                                                        @if ($covenantAccounts->covenant_id == $covenant->id) selected @endif>
                                                        {{ $covenant->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="col-form-label">الاسم </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" value="{{ $covenantAccounts->date }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label"> التاريخ </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $covenantAccounts->amount }}" id="mon" placeholder="المبلغ"
                                                name="amount">
                                            <label for="mon" class="col-form-label"> المبلغ </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <label for="safe" class="col-form-label"> الخزينة </label>
                                            <div class="col-sm-5">
                                                <select required class="form-control" name="treasury_id" id="name">
                                                    <option value="">اختر الخزينة</option>
                                                    @foreach ($treasuries as $key => $treasury)
                                                        <option value="{{ $treasury->id }}"
                                                            @if ($covenantAccounts->treasury_id == $treasury->id) selected @endif>
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
                                            <label for="bank" class="col-form-label"> البنك </label>
                                            <div class="col-sm-5">
                                                <select required class="form-control" name="bank_id" id="name">
                                                    <option value="">اختر الخزينة</option>
                                                    @foreach ($banks as $key => $bank)
                                                        <option value="{{ $bank->id }}"
                                                            @if ($covenantAccounts->bank_id == $bank->id) selected @endif>
                                                            {{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="bank" placeholder=""
                                                    name="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="custodian" id="person">
                                                <option value="">اختر صاحب العهدة</option>
                                                <option value="1" @if ($covenantAccounts->custodian == 1) selected @endif>موظف
                                                </option>
                                                <option value="2" @if ($covenantAccounts->custodian == 2) selected @endif> غير
                                                    موظف</option>
                                            </select>
                                            <label for="person" class="col-form-label"> صاحب العهدة </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" id="process" name="process">
                                                <option value="">اختر العملية</option>
                                                <option value="1" @if ($covenantAccounts->process == 1) selected @endif> إضافة
                                                    عهدة</option>
                                                <option value="2" @if ($covenantAccounts->process == 2) selected @endif>رد عهدة
                                                </option>
                                            </select>
                                            <label for="process" class="col-form-label"> نوع العملية </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $covenantAccounts->rest }}" id="rest" placeholder="باقى علية"
                                                name="rest">
                                            <label for="rest" class="col-form-label"> باقى علية</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                                id="note">{{ $covenantAccounts->notes }}</textarea>
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
                {{-- end card --}}
                {{-- start card table --}}
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div> <!-- /.content-header -->
    </div>{{-- content-wrapper --}}
@endsection
