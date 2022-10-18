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
                                <h3 class="card-title header-title">دفع أقساط العملاء </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('payInstallment.update', $payInstallments->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" value="{{ $payInstallments->date }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label">التاريخ</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="client_id" id="customar">
                                                <option value="">اختر اسم العميل</option>
                                                @foreach ($clients as $key => $client)
                                                    <option value="{{ $client->id }}"
                                                        @if ($payInstallments->client_id == $client->id) selected @endif>
                                                        {{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customar" class="col-sm-4  col-form-label"> اختر اسم العميل</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $payInstallments->invoice_num }}" id="billnumber"
                                                placeholder="القسط/رقم الفاتورة" name="invoice_num">
                                            <label for="billnumber" class="col-form-label">القسط/رقم الفاتورة
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <label for="billdate" class="col-form-label">تاريخ الفاتورة</label>
                                            <div class="col-sm-8 ">
                                                <input type="date" class="form-control"
                                                    value="{{ $payInstallments->invoice_date }}" id="billdate"
                                                    placeholder="" name="invoice_date">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <label for="safe" class="col-form-label"> الخزينة </label>
                                            <div class="col-sm-4">
                                                <select required class="form-control" name="treasury_id" id="customar">
                                                    <option value="">اختر الخزينة </option>
                                                    @foreach ($treasuries as $key => $treasury)
                                                        <option value="{{ $treasury->id }}"
                                                            @if ($payInstallments->treasury_id == $treasury->id) selected @endif>
                                                            {{ $treasury->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="" placeholder=""
                                                    name="">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <label for="bank" class="col-form-label"> البنك </label>
                                            <div class="col-sm-4">
                                                <select required class="form-control" name="bank_id" id="customar">
                                                    <option value="">اختر البنك </option>
                                                    @foreach ($banks as $key => $bank)
                                                        <option value="{{ $bank->id }}"
                                                            @if ($payInstallments->bank_id == $bank->id) selected @endif>
                                                            {{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="" placeholder=""
                                                    name="">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $payInstallments->total_of_all_installment }}" id="value"
                                                placeholder=" إجمالى المتبقي من كل الاقساط" name="total_of_all_installment">
                                            <label for="value" class="col-form-label"> إجمالى المتبقي من كل
                                                الاقساط</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" value="{{ $payInstallments->rest }}"
                                                id="precent" placeholder="المتبقي من أقساط الفاتورة" name="rest">
                                            <label for="precent" class="col-form-label">المتبقي من أقساط الفاتورة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $payInstallments->monthly_total }}" id="total"
                                                placeholder="الاجمالى الشهرى" name="monthly_total">
                                            <label for="total" class="col-form-label"> الاجمالى الشهرى</label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="n">{{ $payInstallments->notes }}</textarea>
                                            <label for="n" class="col-sm-4  col-form-label">ملاحظات </label>
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
        </div><!-- /.content-header -->
    </div><!-- /.content-wrapper -->
@endsection
