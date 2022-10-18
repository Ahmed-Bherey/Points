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
                                <h3 class="card-title header-title"> مرتجع مشتريات </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="col-lg-12 border border-1 ">
                                <!-- form start -->
                                @include('admin.layouts.alerts.success')
                                @include('admin.layouts.alerts.errors')
                                <form class="form-horizontal"
                                    action="{{ route('returnedPurchase.update', $returnedPurchases->id) }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">
                                        {{-- row 1 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-3 form-floating">
                                                <input type="text" class="form-control"
                                                    value="{{ $returnedPurchases->invoice_num }}" id="numbill"
                                                    placeholder="رقم الفاتورة" name="invoice_num">
                                                <label for="numbill" class="col-form-label"> رقم الفاتورة</label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <select class="form-control" name="supplier_id" id="namecat">
                                                    <option value="">اختر المورد</option>
                                                    @foreach ($suppliers as $key => $supplier)
                                                        <option value="{{ $supplier->id }}"
                                                            @if ($returnedPurchases->supplier_id == $supplier->id) selected @endif>
                                                            {{ $supplier->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="suppler" class="col-form-label"> اسم المورد</label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="date" class="form-control"
                                                    value="{{ $returnedPurchases->date }}" id="date"
                                                    placeholder="التاريخ" name="date">
                                                <label for="date" class="col-form-label"> التاريخ </label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->total_before_discount }}" id="totalb"
                                                    placeholder="الاجمالى قبل الخصم" name="total_before_discount">
                                                <label for="totalb" class="col-form-label"> الاجمالى قبل
                                                    الخصم</label>
                                            </div>
                                        </div>
                                        {{-- row 2 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->discount_rate1 }}" id="averg"
                                                    placeholder="نسبة الخصم" name="discount_rate1">
                                                <label for="averg" class="col-form-label">نسبة الخصم </label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->discount_value1 }}" id="Discount"
                                                    placeholder="قيمة الخصم" name="discount_value1">
                                                <label for="Discount" class="col-form-label"> قيمة الخصم
                                                </label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="" class="form-control"
                                                    value="{{ $returnedPurchases->added_tax_value }}" id="tax"
                                                    placeholder=" قيمة الضريبة المضافة" name="added_tax_value">
                                                <label for="tax" class="col-form-label"> قيمة الضريبة المضافة
                                                </label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->total_after_discount }}" id="totala"
                                                    placeholder="الاجمالى بعد الخصم" name="total_after_discount">
                                                <label for="totala" class="col-form-label"> الاجمالى بعد الخصم
                                                </label>
                                            </div>
                                        </div>
                                        {{-- row 3 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-3 form-floating">
                                                <select class="form-control" name="item_id" id="namecat">
                                                    <option value="">اختر الصنف</option>
                                                    @foreach ($items as $key => $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($returnedPurchases->item_id == $item->id) selected @endif>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="namecat" class="col-form-label"> اسم الصنف </label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <select class="form-control" name="unit_id" id="namecat">
                                                    <option value="">اختر الوحدة</option>
                                                    @foreach ($units as $key => $unit)
                                                        <option value="{{ $unit->id }}"
                                                            @if ($returnedPurchases->unit_id == $unit->id) selected @endif>
                                                            {{ $unit->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="unitname" class="col-form-label"> الوحدة </label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <select class="form-control" name="store_id" id="namecat">
                                                    <option value="">اختر المخزن</option>
                                                    @foreach ($stores as $key => $store)
                                                        <option value="{{ $store->id }}"
                                                            @if ($returnedPurchases->store_id == $store->id) selected @endif>
                                                            {{ $store->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="namestore" class="col-form-label"> اسم المخزن
                                                </label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="text" class="form-control"
                                                    value="{{ $returnedPurchases->quantity }}" id="qu"
                                                    placeholder="الكمية" name="quantity">
                                                <label for="qu" class="col-form-label"> الكمية</label>
                                            </div>
                                        </div>
                                        {{-- row 4 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->unit_price }}" id="priceunit"
                                                    placeholder="سعر الوحدة" name="unit_price">
                                                <label for="priceunit" class="col-form-label"> سعر الوحدة</label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="text" class="form-control"
                                                    value="{{ $returnedPurchases->code }}" id="code"
                                                    placeholder="الكود" name="code">
                                                <label for="code" class="col-form-label"> الكود</label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->discount_value2 }}" id="Value"
                                                    placeholder="قيمة الخصم" name="discount_value2">
                                                <label for="Value" class="col-form-label"> قيمة الخصم</label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->total_item_price }}" id="pricetotal"
                                                    placeholder=" اجمالى سعر الصنف" name="total_item_price">
                                                <label for="c" class="col-form-label"> اجمالى سعر الصنف
                                                </label>
                                            </div>
                                        </div>
                                        {{-- row 5 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->discount_rate2 }}" id="s"
                                                    placeholder="" name="discount_rate2">
                                                <label for="s" class="col-form-label"> نسبة الخصم </label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->added_tax_rate }}" id="taxvalue"
                                                    placeholder="" name="added_tax_rate">
                                                <label for="taxvalue" class="col-form-label"> نسبة ضريبة القيمة
                                                    المضافة</label>
                                            </div>
                                            <div class="col-sm-3 row m-0 p-0">
                                                <div class="col-9 form-floating">
                                                    <select class="form-control" name="treasury_id" id="namecat">
                                                        <option value="">اختر الخزينة</option>
                                                        @foreach ($treasuries as $key => $treasury)
                                                            <option value="{{ $treasury->id }}"
                                                                @if ($returnedPurchases->treasury_id == $treasury->id) selected @endif>
                                                                {{ $treasury->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="safe" class="col-form-label"> الخزينة </label>
                                                </div>
                                                <div class="col-3 form-floating">
                                                    <input type="number" class="form-control" id=""
                                                        placeholder="" name="">
                                                </div>
                                            </div>
                                            <div class="col-sm-3 row m-0 p-0">
                                                <div class="col-9 form-floating">
                                                    <select class="form-control" name="bank_id" id="namecat">
                                                        <option value="">اختر البنك</option>
                                                        @foreach ($banks as $key => $bank)
                                                            <option value="{{ $bank->id }}"
                                                                @if ($returnedPurchases->bank_id == $bank->id) selected @endif>
                                                                {{ $bank->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="safe" class="col-form-label"> البنك </label>
                                                </div>
                                                <div class="col-3 form-floating">
                                                    <input type="number" class="form-control" id=""
                                                        placeholder="" name="">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- row 6 --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->total_returned }}" id="returned"
                                                    placeholder="إجمالى المرتجع" name="total_returned">
                                                <label for="returned" class="col-form-label"> إجمالى المرتجع
                                                </label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->paid }}" id="pay"
                                                    placeholder="المدفوع" name="paid">
                                                <label for="pay" class="col-form-label">المدفوع</label>
                                            </div>
                                            <div class="col-sm-3 form-floating">
                                                <input type="number" class="form-control"
                                                    value="{{ $returnedPurchases->rest }}" id="rest"
                                                    placeholder="الباقى" name="rest">
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
                </div>
                {{-- end card --}}
                {{-- start card table --}}
                {{-- end card table --}}
                {{-- start card table --}}
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
