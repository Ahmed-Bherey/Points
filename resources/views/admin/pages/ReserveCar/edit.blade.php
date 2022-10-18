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
                                <h3 class="card-title header-title">إذن تحميل سيارة </h3>
                            </div>
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('reserveCar.update', $reserveCars->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row  1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->statement_num }}" id="num"
                                                placeholder=" رقم البيان" name="statement_num">
                                            <label for="num" class="col-form-label"> رقم البيان </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="permission_type" id="bill">
                                                <option value="">اختر نوع اذن التحميل</option>
                                                <option value="1" @if ($reserveCars->permission_type == 1) selected @endif>1
                                                </option>
                                                <option value="2" @if ($reserveCars->permission_type == 2) selected @endif>2
                                                </option>
                                            </select>
                                            <label for="bill" class="col-form-label"> نوع إذن التحميل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="client_id" id="customer">
                                                <option value="">اختر العميل</option>
                                                @foreach ($clients as $key => $client)
                                                    <option value="{{ $client->id }}"
                                                        @if ($reserveCars->client_id == $client->id) selected @endif>
                                                        {{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customer" class="col-form-label">اسم العميل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="storeFrom_id" id="customer">
                                                <option value="">اختر المخزن</option>
                                                @foreach ($storesFrom as $key => $storeFrom)
                                                    <option value="{{ $storeFrom->id }}"
                                                        @if ($reserveCars->storeFrom_id == $storeFrom->id) selected @endif>
                                                        {{ $storeFrom->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="source" class="col-form-label"> اسم المخزن المصدر </label>
                                        </div>
                                    </div>
                                    {{-- row  2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="storeTo_id" id="customer">
                                                <option value="">اختر المخزن</option>
                                                @foreach ($storesTo as $key => $storeTo)
                                                    <option value="{{ $storeTo->id }}"
                                                        @if ($reserveCars->storeTo_id == $storeTo->id) selected @endif>
                                                        {{ $storeTo->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="target" class="col-form-label"> اسم المخزن الهدف </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="representative_id" id="customer">
                                                <option value="">اختر المندوب</option>
                                                @foreach ($representatives as $key => $representative)
                                                    <option value="{{ $representative->id }}"
                                                        @if ($reserveCars->representative_id == $representative->id) selected @endif>
                                                        {{ $representative->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="support" class="col-form-label"> اسم المندوب </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="date" class="form-control" value="{{ $reserveCars->date }}"
                                                id="date" placeholder="التاريخ" name="date">
                                            <label for="date" class="col-form-label"> التاريخ </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $reserveCars->target }}"
                                                id="target" placeholder="التارجت" name="target">
                                            <label for="target" class="col-form-label">التارجت
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $reserveCars->from }}"
                                                id="from" placeholder="من" name="from">
                                            <label for="from" class="col-form-label">من
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <textarea class="form-control" rows="4" placeholder="ملاحظات ..." name="notes" id="n">{{ $reserveCars->notes }}</textarea>
                                            <label for="n" class="col-form-label"> ملاحظات </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->final_balance }}" id="final"
                                                placeholder="الرصيدالنهائى" name="final_balance">
                                            <label for="final" class="col-form-label">الرصيدالنهائى
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->previous_balance }}" id="account"
                                                placeholder="الرصيد السابق" name="previous_balance">
                                            <label for="account" class="col-form-label">الرصيد السابق
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->total_before_discount }}" id="totalb"
                                                placeholder="الاجمالى قبل الخصم" name="total_before_discount">
                                            <label for="totalb" class="col-form-label"> الاجمالى قبل الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->discount_value1 }}" id="Discount"
                                                placeholder=" قيمة الخصم" name="discount_value1">
                                            <label for="Discount" class="col-form-label"> قيمة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->discount_rate1 }}" id="averg"
                                                placeholder="نسبة الخصم" name="discount_rate1">
                                            <label for="averg" class="col-form-label">نسبة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="" class="form-control"
                                                value="{{ $reserveCars->sales_tax }}" id="taxsale"
                                                placeholder="ضريبة المبيعات" name="sales_tax">
                                            <label for="taxsale" class="col-form-label"> ضريبة المبيعات </label>
                                        </div>
                                    </div>
                                    {{-- row 5 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->transportation_cost }}" id="cost"
                                                placeholder="تكلفة النقل" name="transportation_cost">
                                            <label for="cost" class="col-form-label"> تكلفة النقل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->total_after_discount }}" id="totala"
                                                placeholder=" الاجمالى بعد الخصم" name="total_after_discount">
                                            <label for="totala" class="col-form-label"> الاجمالى بعد الخصم
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->profit }}" id="won" placeholder="الربحية"
                                                name="profit">
                                            <label for="won" class="col-form-label">الربحية</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $reserveCars->code }}"
                                                id="code" placeholder="الكود" name="code">
                                            <label for="code" class="col-form-label"> الكود</label>
                                        </div>
                                    </div>
                                    {{-- row 6 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->quantity }}" id="qu" placeholder="الكمية"
                                                name="quantity">
                                            <label for="qu" class="col-form-label"> الكمية</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->unit_price }}" id="priceunit"
                                                placeholder="سعر الوحدة" name="unit_price">
                                            <label for="priceunit" class="col-form-label"> سعر الوحدة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->quantity_discount }}" id="q"
                                                placeholder="خصم كمية" name="quantity_discount">
                                            <label for="q" class="col-form-label"> خصم كمية </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->addition_rate }}" id="persentadd"
                                                placeholder="نسبة الاضافة" name="addition_rate">
                                            <label for="persentadd" class="col-form-label">نسبة الاضافة</label>
                                        </div>
                                    </div>
                                    {{-- row 7 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="item_id" id="customer">
                                                <option value="">اختر الصنف</option>
                                                @foreach ($items as $key => $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($reserveCars->item_id == $item->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="namecat" class="col-form-label"> اسم الصنف </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="unit_id" id="customer">
                                                <option value="">اختر الوحدة</option>
                                                @foreach ($units as $key => $unit)
                                                    <option value="{{ $unit->id }}"
                                                        @if ($reserveCars->unit_id == $unit->id) selected @endif>
                                                        {{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="unitname" class="col-form-label"> الوحدة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->discount_value2 }}" id="Value"
                                                placeholder="قيمة الخصم" name="discount_value2">
                                            <label for="Value" class="col-form-label"> قيمة الخصم</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->discount_rate2 }}" id="s"
                                                placeholder="نسبة الخصم" name="discount_rate2">
                                            <label for="s" class="col-form-label"> نسبة الخصم </label>
                                        </div>
                                    </div>
                                    {{-- row 8 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->current_balance }}" id="s"
                                                placeholder=" الرصيد الحالى" name="current_balance">
                                            <label for="s" class="col-form-label"> الرصيد الحالى </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $reserveCars->total_item_price }}" id="pricetotal"
                                                placeholder=" اجمالى سعرالصنف" name="total_item_price">
                                            <label for="pricetotal" class="col-form-label"> اجمالى سعرالصنف </label>
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
