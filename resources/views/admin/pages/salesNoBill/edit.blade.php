@extends('admin.layouts.includes.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12 ">
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> مرتجع مبيعات بدون فاتورة</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('salesNoBill.update', $salesNoBill->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="customer_id" id="namecat">
                                                <option value="">اختر العميل</option>
                                                @foreach ($customers as $key => $customer)
                                                    <option value="{{ $customer->id }}"
                                                        @if ($salesNoBill->customer_id == $customer->id) selected @endif>
                                                        {{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="client" class="col-form-label"> اسم العميل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="date" class="form-control" value="{{$salesNoBill->date}}" id="date" placeholder="التاريخ"
                                                name="date">
                                            <label for="date" class="col-form-label"> التاريخ </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="delegate_id" id="namecat">
                                                <option value="">اختر المندوب</option>
                                                @foreach ($representatives as $key => $representative)
                                                    <option value="{{ $representative->id }}"
                                                        @if ($salesNoBill->delegate_id == $representative->id) selected @endif>
                                                        {{ $representative->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="represent" class="col-form-label"> اسم المندوب </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $salesNoBill->last_balance }}" id="accountb"
                                                placeholder="الرصيد السابق" name="last_balance">
                                            <label for="accountb" class="col-form-label"> الرصيد السابق
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $salesNoBill->invoice_num }}" id="numbill"
                                                placeholder="رقم الايصال" name="invoice_num">
                                            <label for="numbill" class="col-form-label"> رقم الايصال </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="item_id" id="namecat">
                                                <option value="">اختر الصنف</option>
                                                @foreach ($items as $key => $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($salesNoBill->item_id == $item->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="namecat" class="col-form-label"> اسم الصنف </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="unit_id" id="namecat">
                                                <option value="">اختر الوحدة</option>
                                                @foreach ($unites as $key => $unite)
                                                    <option value="{{ $unite->id }}"
                                                        @if ($salesNoBill->unit_id == $unite->id) selected @endif>
                                                        {{ $unite->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="unitname" class="col-form-label"> الوحدة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="store_id" id="namecat">
                                                <option value="">اختر المخزن</option>
                                                @foreach ($stores as $key => $store)
                                                    <option value="{{ $store->id }}"
                                                        @if ($salesNoBill->store_id == $store->id) selected @endif>
                                                        {{ $store->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="namestore" class="col-form-label"> اسم المخزن </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $salesNoBill->quantity }}"
                                                id="qu" placeholder="الكمية" name="quantity">
                                            <label for="qu" class="col-form-label"> الكمية</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $salesNoBill->unit_price }}" id="priceunit"
                                                placeholder="سعر الوحدة" name="unit_price">
                                            <label for="priceunit" class="col-form-label"> سعر الوحدة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $salesNoBill->code }}"
                                                id="code" placeholder="الكود" name="code">
                                            <label for="code" class="col-form-label"> الكود</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $salesNoBill->discount_value }}" id="Value"
                                                placeholder="قيمة الخصم" name="discount_value">
                                            <label for="Value" class="col-form-label"> قيمة الخصم</label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $salesNoBill->discount_rate }}" id="s"
                                                placeholder="نسبة الخصم" name="discount_rate">
                                            <label for="s" class="col-form-label"> نسبة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $salesNoBill->total_price }}" id="total"
                                                placeholder="اجمالى سعر الصنف" name="total_price">
                                            <label for="total" class="col-form-label"> اجمالى سعر الصنف </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $salesNoBill->added_tax_value }}" id="taxvalue"
                                                placeholder="قيمة ضريبة القيمة المضافة" name="added_tax_value">
                                            <label for="taxvalue" class="col-form-label"> قيمة ضريبة القيمة
                                                المضافة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $salesNoBill->added_tax_rate }}" id="taxpercent"
                                                placeholder="نسبة ضريبة القيمة" name="added_tax_rate">
                                            <label for="taxpercent" class="col-form-label"> نسبة ضريبة القيمة
                                                المضافة</label>
                                        </div>
                                    </div>
                                    {{-- row 5 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 row m-0 p-0">
                                            <div class="col-9 form-floating">
                                                <select required class="form-control" name="treasury_id" id="namecat">
                                                    <option value="">اختر الخزينة</option>
                                                    @foreach ($treasuries as $key => $treasury)
                                                        <option value="{{ $treasury->id }}"
                                                            @if ($salesNoBill->treasury_id == $treasury->id) selected @endif>
                                                            {{ $treasury->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="safe" class="col-form-label"> الخزينة </label>
                                            </div>
                                            <div class="col-3 form-floating">
                                                <input type="number" class="form-control" id="safe" placeholder=""
                                                    name="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 row m-0 p-0">
                                            <div class="col-9 form-floating">
                                                <select required class="form-control" name="bank_id" id="namecat">
                                                    <option value="">اختر البنك</option>
                                                    @foreach ($banks as $key => $bank)
                                                        <option value="{{ $bank->id }}"
                                                            @if ($salesNoBill->bank_id == $bank->id) selected @endif>
                                                            {{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="bank" class="col-form-label"> البنك </label>
                                            </div>
                                            <div class="col-3 form-floating">
                                                <input type="number" class="form-control" id="" placeholder=""
                                                    name="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $salesNoBill->total_returned }}" id="returned"
                                                placeholder="إجمالى المرتجع" name="total_returned">
                                            <label for="returned" class="col-form-label"> إجمالى المرتجع </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $salesNoBill->paid }}"
                                                id="pay" placeholder="المدفوع" name="paid">
                                            <label for="pay" class="col-form-label">المدفوع</label>
                                        </div>
                                    </div>
                                    {{-- row 6 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $salesNoBill->rest }}"
                                                id="rest" placeholder="الباقى" name="rest">
                                            <label for="rest" class="col-form-label"> الباقى</label>
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
        </div>
        <!-- /.content-header -->
    </div>
@endsection
