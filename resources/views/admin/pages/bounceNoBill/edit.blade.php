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
                            <h3 class="card-title header-title"> مرتجع مشتريات بدون فاتورة</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('bounceNoBill.update' , $bounceNoBills->id)}}"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <select required class="form-control" name="supplier_id" id="supplier">
                                            <option value="">اختر المورد</option>
                                            @foreach($suppliers as $key => $supplier)
                                            <option value="{{ $supplier->id }}" @if ($bounceNoBills->supplier_id ==
                                                $supplier->id) selected @endif>{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="supplier" class="col-form-label"> اسم المورد </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="date" class="form-control" value="{{$bounceNoBills->date}}"
                                            id="date" placeholder="" name="date">
                                        <label for="date" class="col-form-label"> التاريخ </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$bounceNoBills->last_balance}}" id="accountb"
                                            placeholder="الرصيد السابق" name="last_balance">
                                        <label for="accountb" class="col-form-label"> الرصيد السابق
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$bounceNoBills->receipt_num}}" id="numbill"
                                            placeholder=" رقم الايصال" name="receipt_num">
                                        <label for="numbill" class="col-form-label"> رقم الايصال </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <select required class="form-control" name="item_id" id="supplier">
                                            <option value="">اختر الصنف</option>
                                            @foreach($items as $key => $item)
                                            <option value="{{ $item->id }}" @if ($bounceNoBills->item_id == $item->id)
                                                selected @endif>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="namecat" class="col-form-label"> اسم الصنف </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <select required class="form-control" name="unit_id" id="supplier">
                                            <option value="">اختر الوحدة</option>
                                            @foreach($units as $key => $unit)
                                            <option value="{{ $unit->id }}" @if ($bounceNoBills->unit_id == $unit->id)
                                                selected @endif>{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="unitname" class="col-form-label"> الوحدة </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <select required class="form-control" name="store_id" id="supplier">
                                            <option value="">اختر المخزن</option>
                                            @foreach($stores as $key => $store)
                                            <option value="{{ $store->id }}" @if ($bounceNoBills->store_id ==
                                                $store->id) selected @endif>{{$store->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="namestore" class="col-form-label"> اسم المخزن </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$bounceNoBills->quantity}}"
                                            id="qu" placeholder="الكمية" name="quantity">
                                        <label for="qu" class="col-form-label"> الكمية</label>
                                    </div>
                                </div>
                                {{-- row 3 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$bounceNoBills->unit_price}}"
                                            id="priceunit" placeholder="سعر الوحدة" name="unit_price">
                                        <label for="priceunit" class="col-form-label"> سعر الوحدة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$bounceNoBills->discount_value}}" id="Value"
                                            placeholder="قيمة الخصم" name="discount_value">
                                        <label for="Value" class="col-form-label"> قيمة الخصم</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$bounceNoBills->discount_rate}}" id="s" placeholder="نسبة الخصم"
                                            name="discount_rate">
                                        <label for="s" class="col-form-label"> نسبة الخصم </label>
                                    </div>
                                </div>
                                {{-- row 4 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$bounceNoBills->total_item_price}}" id="total"
                                            placeholder="اجمالى سعر الصنف" name="total_item_price">
                                        <label for="total" class="col-form-label"> اجمالى سعر الصنف</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$bounceNoBills->tax_added_value}}" id="taxvalue"
                                            placeholder="قيمة ضريبة القيمة المضافة" name="tax_added_value">
                                        <label for="taxvalue" class="col-form-label"> قيمة ضريبة القيمة المضافة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$bounceNoBills->tax_added_rate}}" id="taxpercent"
                                            placeholder="نسبة ضريبة القيمة المضافة" name="tax_added_rate">
                                        <label for="taxpercent" class="col-form-label"> نسبة ضريبة القيمة
                                            المضافة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$bounceNoBills->total_return}}" id="returned"
                                            placeholder="إجمالى المرتجع" name="total_return">
                                        <label for="returned" class="col-form-label"> إجمالى المرتجع </label>
                                    </div>
                                </div>
                                {{-- row 5 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$bounceNoBills->paid}}"
                                            id="pay" placeholder="" name="paid">
                                        <label for="pay" class="col-form-label">المدفوع</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" value="{{$bounceNoBills->rest}}"
                                            id="rest" placeholder="" name="rest">
                                        <label for="rest" class="col-form-label"> الباقى</label>
                                    </div>
                                    <div class="col-sm-3 row m-0 p-0">
                                        <div class="col-9 form-floating">
                                            <select required class="form-control" name="treasury_id" id="supplier">
                                                <option value="">اختر الخزينة</option>
                                                @foreach($treasuries as $key => $treasury)
                                                <option value="{{ $treasury->id }}" @if ($bounceNoBills->treasury_id ==
                                                    $treasury->id) selected @endif>{{$treasury->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="safe" class="col-form-label"> الخزينة </label>
                                        </div>
                                        <div class="col-3 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="" name="">
                                        </div>
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
