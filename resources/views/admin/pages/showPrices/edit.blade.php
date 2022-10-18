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
                                <h3 class="card-title header-title">بيان أسعار</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('showPrice.update', $showPrices->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $showPrices->show_prices_num }}" id="shownum"
                                                placeholder="رقم عرض الاسعار" name="show_prices_num" required>
                                            <label for="shownum" class="col-form-label">رقم عرض الاسعار
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="show_prices_type" id="showtype">
                                                <option value="">اختر نوع عرض الاسعار</option>
                                                <option value="1" @if ($showPrices->show_prices_type == 1) selected @endif>1
                                                </option>
                                                <option value="2" @if ($showPrices->show_prices_type == 2) selected @endif>2
                                                </option>
                                            </select>
                                            <label for="showtype" class="col-form-label">نوع عرض الاسعار
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="customer_id" id="customer_id">
                                                <option>اختر العميل</option>
                                                @foreach ($customers as $key => $customer)
                                                    <option value="{{ $customer->id }}"
                                                        @if ($showPrices->customer_id == $customer->id) selected @endif>
                                                        {{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customer_id" class=" col-form-label">اسم العميل</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="item_id" id="customer_id">
                                                <option>اختر الصنف</option>
                                                @foreach ($items as $key => $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($showPrices->item_id == $item->id) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="namecateg" class=" col-form-label">اسم الصنف</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="unit_id" id="customer_id">
                                                <option>اختر الوحدة</option>
                                                @foreach ($unites as $key => $unite)
                                                    <option value="{{ $unite->id }}"
                                                        @if ($showPrices->unit_id == $unite->id) selected @endif>
                                                        {{ $unite->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="unit" class=" col-form-label">الوحدة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" value="{{ $showPrices->code }}"
                                                id="code" placeholder="الكود" name="code">
                                            <label for="code" class="col-form-label">الكود</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" value="{{ $showPrices->quantity }}"
                                                id="qu" placeholder="الكمية" name="quantity">
                                            <label for="qu" class="col-form-label">الكمية </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="n">{{ $showPrices->notes }}</textarea>
                                            <label for="n" class=" col-form-label">ملاحظات </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $showPrices->unit_price }}" id="price"
                                                placeholder="سعر الوحدة" name="unit_price">
                                            <label for="price" class="col-form-label">سعر الوحدة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $showPrices->dicount_value }}" id="value"
                                                placeholder="قيمة الخصم" name="dicount_value">
                                            <label for="value" class="col-form-label"> قيمة الخصم</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $showPrices->dicount_rate }}" id="precent"
                                                placeholder="نسبة الخصم" name="dicount_rate">
                                            <label for="precent" class="col-form-label">نسبة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $showPrices->total_item_price }}" id="total"
                                                placeholder="اجمالى سعر الصنف" name="total_item_price">
                                            <label for="total" class="col-form-label"> اجمالى سعر الصنف</label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $showPrices->total_items }}" id="totalall"
                                                placeholder="اجمالى الاصناف" name="total_items">
                                            <label for="totalall" class="col-form-label"> اجمالى الاصناف</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $showPrices->added_tax_value }}" id="taxvalue"
                                                placeholder=" قيمة ضريبة القيمة" name="added_tax_value">
                                            <label for="taxvalue" class="col-form-label"> قيمة ضريبة القيمة
                                                المضافة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $showPrices->added_tax_rate }}" id="taxpercent"
                                                placeholder=" نسبة ضريبة القيمة" name="added_tax_rate">
                                            <label for="taxpercent" class="col-form-label"> نسبة ضريبة القيمة
                                                المضافة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $showPrices->profit }}" id="pure" placeholder="الصافى"
                                                name="profit">
                                            <label for="pure" class="col-form-label"> الصافى</label>
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
