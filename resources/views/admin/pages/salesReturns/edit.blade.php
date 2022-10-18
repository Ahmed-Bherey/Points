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
                                <h3 class="card-title header-title"> مرتجع مبيعات </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('salesReturn.update', $sales->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $sales->invoice_num }}"
                                                id="numbill" placeholder="رقم الفاتورة" name="invoice_num">
                                            <label for="numbill" class="col-form-label"> رقم الفاتورة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $sales->name }}"
                                                id="client" placeholder="اسم العميل" name="name">
                                            <label for="client" class="col-form-label"> اسم العميل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $sales->delegate }}"
                                                id="represent" placeholder=" اسم المندوب" name="delegate">
                                            <label for="represent" class="col-form-label"> اسم المندوب </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="date" class="form-control" value="{{ $sales->date }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label"> التاريخ </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $sales->last_balance }}"
                                                id="accountb" placeholder="الرصيد السابق" name="last_balance">
                                            <label for="accountb" class="col-form-label">الرصيد السابق </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $sales->total_before_discount }}" id="totalb"
                                                placeholder=" الاجمالى قبل الخصم" name="total_before_discount">
                                            <label for="totalb" class="col-form-label"> الاجمالى قبل الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $sales->discount_rate1 }}"
                                                id="averg" placeholder="نسبة الخصم " name="discount_rate1">
                                            <label for="averg" class="col-form-label">نسبة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $sales->discoun_value1 }}"
                                                id="Discount" placeholder="قيمة الخصم" name="discoun_value1">
                                            <label for="Discount" class="col-form-label"> قيمة الخصم </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="" class="form-control" value="{{ $sales->added_tax_value }}"
                                                id="tax" placeholder="قيمة الضريبة المضافة" name="added_tax_value">
                                            <label for="tax" class="col-form-label"> قيمة الضريبة المضافة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $sales->total_after_discount }}" id="totala"
                                                placeholder=" الاجمالى بعد الخصم" name="total_after_discount">
                                            <label for="totala" class="col-form-label"> الاجمالى بعد الخصم
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="item_id" id="namecat">
                                                <option value="">اختر الصنف</option>
                                                @foreach ($items as $key => $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($sales->item_id == $item->id) selected @endif>
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
                                                        @if ($sales->unit_id == $unite->id) selected @endif>
                                                        {{ $unite->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="unitname" class="col-form-label"> الوحدة </label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="store_id" id="namecat">
                                                <option value="">اختر المخزن</option>
                                                @foreach ($stores as $key => $store)
                                                    <option value="{{ $store->id }}"
                                                        @if ($sales->store_id == $store->id) selected @endif>
                                                        {{ $store->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="namestore" class="col-form-label"> اسم المخزن </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $sales->quantity }}"
                                                id="qu" placeholder="الكمية" name="quantity">
                                            <label for="qu" class="col-form-label"> الكمية</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $sales->unit_price }}"
                                                id="priceunit" placeholder="سعر الوحدة" name="unit_price">
                                            <label for="priceunit" class="col-form-label"> سعر الوحدة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $sales->code }}"
                                                id="code" placeholder="الكود" name="code" readonly>
                                            <label for="code" class="col-form-label"> الكود</label>
                                        </div>
                                    </div>
                                    {{-- row 5 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $sales->discoun_value2 }}" id="Value"
                                                placeholder="قيمة الخصم" name="discoun_value2">
                                            <label for="Value" class="col-form-label"> قيمة الخصم</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $sales->total_price }}"
                                                id="pricetotal" placeholder=" اجمالى سعر الصنف" name="total_price">
                                            <label for="c" class="col-form-label"> اجمالى سعر الصنف </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $sales->discount_rate2 }}" id="s"
                                                placeholder="نسبة الخصم" name="discount_rate2 ">
                                            <label for="s" class="col-form-label"> نسبة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $sales->added_tax_rate }}" id="taxvalue"
                                                placeholder=" نسبة ضريبة القيمة المضافة" name="added_tax_rate">
                                            <label for="taxvalue" class="col-form-label"> نسبة ضريبة القيمة
                                                المضافة</label>
                                        </div>
                                    </div>
                                    {{-- row 6 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $sales->total_returned }}" id="returned" placeholder=""
                                                name="total_returned">
                                            <label for="returned" class="col-form-label"> إجمالى المرتجع</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $sales->paid }}"
                                                id="pay" placeholder="" name="paid">
                                            <label for="pay" class="col-form-label">المدفوع</label>
                                        </div>
                                        <div class="col-sm-3 row m-0 p-0">
                                            <div class="col-9 form-floating">
                                                <select required class="form-control" name="treasury_id" id="namecat">
                                                    <option value="">اختر الخزينة</option>
                                                    @foreach ($treasuries as $key => $treasury)
                                                        <option value="{{ $treasury->id }}"
                                                            @if ($sales->treasury_id == $treasury->id) selected @endif>
                                                            {{ $treasury->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="safe" class="col-form-label"> الخزينة </label>
                                            </div>
                                            <div class="col-3 form-floating">
                                                <input type="number" class="form-control" id="" placeholder=""
                                                    name="">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 row m-0 p-0">
                                            <div class="col-9 form-floating">
                                                <select required class="form-control" name="bank_id" id="namecat">
                                                    <option value="">اختر البنك</option>
                                                    @foreach ($banks as $key => $bank)
                                                        <option value="{{ $bank->id }}"
                                                            @if ($sales->bank_id == $bank->id) selected @endif>
                                                            {{ $bank->name }}</option>
                                                    @endforeach
                                                    <label for="bank" class="col-form-label"> البنك </label>
                                            </div>
                                            <div class="col-3 form-floating">
                                                <input type="number" class="form-control" id="" placeholder=""
                                                    name="">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- row 7 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $sales->rest }}"
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
