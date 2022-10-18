@extends('admin.layouts.includes.master')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12 ">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title">فاتورة مشتريات </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('buybill.update' , $totals->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6 row">
                                        <div class="col-md-6 form-floating mt-3">
                                            <input type="date" class="form-control" value="{{$totals->date}}" id="date"
                                                placeholder="" name="date">
                                            <label for="date" class="col-form-label"> التاريخ </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="text" class="form-control" value="{{$totals->invoice_num}}"
                                                id="num" placeholder=" رقم الفاتورة" name="invoice_num">
                                            <label for="num" class="col-form-label"> رقم الفاتورة
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <select required class="form-control" name="store_id"
                                                placeholder=" اسم المخزن" id="namestore">
                                                <option value="">اختر المخزن</option>
                                                @foreach($stores as $key => $store)
                                                <option value="{{ $store->id }}" @if ($totals->store_id == $store->id)
                                                    selected @endif >{{$store->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="namestore" class="col-form-label"> اسم المخزن
                                            </label>
                                        </div>

                                        <div class="col-md-6 form-floating mt-3 ">
                                            <select required class="form-control" name="payment_getway"
                                                onchange="consloSel(this)" id="unitname">
                                                <option value="" data-value='22'>نوع الدفع</option>
                                                <option value="1" data-value='0' @if ($totals->payment_getway == 1)
                                                    selected @endif >البنك</option>
                                                <option value="2" data-value='1' @if ($totals->payment_getway == 2)
                                                    selected @endif >نقدى</option>
                                                <option value="3" data-value='2' @if ($totals->payment_getway == 3)
                                                    selected @endif >اجل</option>
                                            </select>
                                            <label for="unitname" class=" col-form-label"> نوع الدفع
                                            </label>
                                        </div>
                                        <div class="row col-md-6 ps-0 selectDefault">

                                        </div>
                                        <div class="row col-md-6 ps-0 selectValShow">
                                            <div class="col-6 form-floating mt-3  ">
                                                <select class="form-control" name="bank_id" placeholder=" اسم البنك"
                                                    id="namestore">
                                                    <option value="">اختر البنك</option>
                                                    @foreach($banks as $key => $bank)
                                                    <option value="{{ $bank->id }}" @if ($totals->bank_id == $bank->id)
                                                        selected @endif>
                                                        {{$bank->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="bank_balance" class="col-form-label"> البنك </label>
                                            </div>

                                            <div class="col-6 form-floating mt-3 ps-0">
                                                <input type="number" class="form-control"
                                                    value="{{$totals->bank_balance}}" id="bank_balance" placeholder=""
                                                    name="bank_balance">
                                            </div>
                                        </div>
                                        <div class="row col-md-6 ps-0 selectValShow">
                                            <div class="col-6 form-floating mt-3">
                                                <select class="form-control" name="treasury_id"
                                                    placeholder=" اسم الخزينة" id="treasury_id">
                                                    <option value="">اختر الخزينة</option>
                                                    @foreach($treasuries as $key => $treasury)
                                                    <option value="{{ $treasury->id }}" @if ($totals->treasury_id ==
                                                        $treasury->id) selected @endif >{{$treasury->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="safe" class="col-form-label"> الخزينة </label>
                                            </div>
                                            <div class="col-6 form-floating mt-3 ps-0">
                                                <input type="number" class="form-control" id="balance" placeholder=""
                                                    name="balance">
                                            </div>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="number" class="form-control"
                                                value="{{$totals->total_before_discount}}" id="totalaBeforDiscount"
                                                placeholder="الاجمالى بعد الخصم" name="total_before_discount">
                                            <label for="totala" class="col-form-label"> الاجمالى قبل الخصم
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3  ">
                                            <input type="number" class="form-control"
                                                value="{{$totals->discount_valuee}}" id="Discount"
                                                placeholder=" قيمة الخصم" name="discount_valuee">
                                            <label for="Discount" class="col-form-label"> قيمة الخصم
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="number" class="form-control"
                                                value="{{$totals->total_after_discount}}" id="totalaAfterDiscount"
                                                placeholder="الاجمالى بعد الخصم" name="total_after_discount">
                                            <label for="totala" class="col-form-label"> الاجمالى بعد الخصم
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3 pe-1">
                                            <input type="number" class="form-control"
                                                value="{{$totals->tax_added_value_rate}}" onkeyup="payFun()" id="taxavg"
                                                placeholder="نسبةضريبة القيمة المضافة " name="tax_added_value_rate">
                                            <label for="taxavg" class=" col-form-label"> قيمة الضريبة
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">
                                        <div class="col-md-6 form-floating mt-3">
                                            <select required class="form-control" name="supplier_id"
                                                placeholder=" اسم المورد" id="namestore">
                                                <option value="">اختر المورد</option>
                                                @foreach($suppliers as $key => $supplier)
                                                <option value="{{ $supplier->id }}" @if ($totals->supplier_id ==
                                                    $supplier->id) selected @endif >{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="support" class="col-form-label"> اسم المورد
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating mt-3">
                                            <input type="text" class="form-control"
                                                value="{{$totals->supplier_balance}}" id="supplier_balance"
                                                placeholder=" رصيد المورد" name="supplier_balance">
                                            <label for="num" class="col-form-label"> رصيد المورد
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating mt-3">
                                            <select required class="form-control" name="delegate_id"
                                                placeholder=" اسم المندوب" id="namestore">
                                                <option value="">اختر المندوب</option>
                                                @foreach($delegates as $key => $delegate)
                                                <option value="{{ $delegate->id }}" @if ($totals->delegate_id ==
                                                    $delegate->id) selected @endif >{{$delegate->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="dname" class="col-form-label"> اسم المندوب
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating mt-3">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..."
                                                name="notes" id="n">{{$totals->notes}}</textarea>
                                            <label for="n" class=" col-form-label"> ملاحظات </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="number" class="form-control" value="{{$totals->total}}"
                                                id="pay" placeholder="المدفوع" name="total">
                                            <label for="pay" class="col-form-label">الاجمالى</label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="number" class="form-control" value="{{$totals->paid}}" id="pay"
                                                placeholder="المدفوع" name="paid">
                                            <label for="pay" class="col-form-label">المدفوع</label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="number" class="form-control" value="{{$totals->rest}}"
                                                id="rest" placeholder="الباقى" name="rest">
                                            <label for="rest" class="col-form-label"> الباقى</label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <select required class="form-control" name="purchase_status" id="unitname">
                                                <option value=""> تحديث السعر</option>
                                                <option value="1" @if ($totals->purchase_status == 1) selected @endif
                                                    >تحديث بالسعر الجديد</option>
                                                <option value="2" @if ($totals->purchase_status == 2) selected @endif
                                                    >ابقاء السعر القديم</option>
                                                <option value="3" @if ($totals->purchase_status == 3) selected @endif
                                                    >تحديث السعر بالمتوسط</option>
                                            </select>
                                            <label for="unitname" class=" col-form-label"> تحديث سعر الشراء
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th> اسم الصنف </th>
                                            <th> الكمية</th>
                                            {{-- <th> نصف الجملة</th> --}}
                                            <th> سعر الوحدة </th>
                                            <th> سعر البيع </th>
                                            <th> اخر سعر شراء </th>
                                            <th> الوحدة </th>
                                            <th> قيمة الخصم </th>
                                            <th> نسبة الخصم </th>
                                            <th> اجمالى سعر </th>
                                            <th>العملية </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach($buybills as $key => $buybill)
                                        <tr>
                                            <td>
                                                <select required class="form-control" name="data[item_id][]"
                                                    placeholder=" اسم الصنف" id="item_id">
                                                    @if($buybill->item_id != "")
                                                    <option value="{{$buybill->item_id}}">{{$buybill->items->name}}
                                                    </option>
                                                    @endif
                                                    <option value="">اختر الصنف</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" value="{{$buybill->quantity}}"
                                                    onkeyup="result()" id="qu" placeholder="الكمية"
                                                    name="data[quantity][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$buybill->unit_price}}" onkeyup="result()" id="priceunit"
                                                    placeholder="سعر الوحدة" name="data[unit_price][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$buybill->sell_price}}" id="pricesell"
                                                    placeholder=" سعر البيع" name="data[sell_price][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$buybill->purchasing_price}}" id="purchasing_price"
                                                    placeholder="  اخر سعر شراء" name="data[purchasing_price][]">
                                            </td>
                                            <td>
                                                <select required class="form-control" name="data[unit_id][]"
                                                    placeholder=" اسم الوحدة" id="unit_id">
                                                    @if($buybill->unit_id != "")
                                                    <option value="{{$buybill->unit_id}}">{{$buybill->units->name}}
                                                    </option>
                                                    @endif
                                                    <option value="">اختر الوحدة</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$buybill->discount_value}}" onkeyup="discountRateFun()"
                                                    id="discountValue" placeholder="قيمة الخصم"
                                                    name="data[discount_value][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$buybill->discount_rate}}" onkeyup="discountValueFun()"
                                                    id="discountRate" placeholder="نسبة الخصم "
                                                    name="data[discount_rate][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control pricetotal"
                                                    value="{{$buybill->total_price}}" placeholder="اجمالى سعر"
                                                    id="totalPrice" name="data[total_price][]">
                                            </td>
                                            <td>
                                                <button type="button" class="btn bg-success" id="add">
                                                    <i class="fas fa-plus-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tfoot>
                                </table>
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
            {{-- start card table --}}
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="treasury_id"]').on('change', function() {
            var stateID = $(this).val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var route = '{{ route('buybill.balance.ajax',['id'=>':id'])}}';
            route = route.replace(':id', stateID);
            if (stateID) {
                $.ajax({
                    beforeSend: function(x) {
                        return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                    },
                    url: route,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#balance').empty();
                        $('#balance').val(data);
                        $('#balance').trigger('change');
                    }
                });
            } else {
                $('select[name="balance"]').empty();
            }
        });


        $('select[name="bank_id"]').on('change', function() {
            var stateID = $(this).val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var route = '{{ route('buybill.bank.ajax',['id'=>':id'])}}';
            route = route.replace(':id', stateID);
            if (stateID) {
                $.ajax({
                    beforeSend: function(x) {
                        return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                    },
                    url: route,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#bank_balance').empty();
                        $('#bank_balance').val(data);
                        $('#bank_balance').trigger('change');
                    }
                });
            } else {
                $('select[name="balance"]').empty();
            }
        });


        $('select[name="store_id"]').on('change', function() {
            var stateID = $(this).val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var route = '{{ route('buybill.item.ajax',['id'=>':id'])}}';
            route = route.replace(':id', stateID);
            if (stateID) {
                $.ajax({
                    beforeSend: function(x) {
                        return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                    },
                    url: route,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#item_id').empty();
                        $.each(data, function(key, value) {
                            $('#item_id').append($(`<option>`, {
                                value: value.id,
                                text: value.items.name,
                            }));
                        });
                        $('#item_id').trigger('change');
                    }
                });
            } else {
                $('select[name="item_id"]').empty();
            }
        });


        $('select[name="data[item_id][]"]').on('change', function() {
            var stateID = $(this).val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var route = '{{ route('buybill.unit.ajax',['id'=>':id'])}}';
            route = route.replace(':id', stateID);
            if (stateID) {
                $.ajax({
                    beforeSend: function(x) {
                        return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                    },
                    url: route,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#unit_id').empty();
                        $.each(data, function(key, value) {
                            $('#unit_id').append($(`<option>`, {
                                value: value.id,
                                text: value.unites.name,
                            }));
                        });
                        $('#unit_id').trigger('change');
                    }
                });
            } else {
                $('select[name="data[unit_id][]"]').empty();
            }
        });


        $('select[name="data[item_id][]"]').on('change', function() {
            var stateID = $(this).val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var route = '{{ route('buybill.price.ajax',['id'=>':id'])}}';
            route = route.replace(':id', stateID);
            if (stateID) {
                $.ajax({
                    beforeSend: function(x) {
                        return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                    },
                    url: route,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#purchasing_price').empty();
                        $('#purchasing_price').val(data);
                        $('#purchasing_price').trigger('change');
                    }
                });
            } else {
                $('select[name="purchasing_price"]').empty();
            }
        });


        $('select[name="supplier_id"]').on('change', function() {
            var stateID = $(this).val();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var route = '{{ route('buybill.supplier.ajax',['id'=>':id'])}}';
            route = route.replace(':id', stateID);
            if (stateID) {
                $.ajax({
                    beforeSend: function(x) {
                        return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                    },
                    url: route,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#supplier_balance').empty();
                        $('#supplier_balance').val(data);
                        $('#supplier_balance').trigger('change');
                    }
                });
            } else {
                $('select[name="purchasing_price"]').empty();
            }
        });
    });


    let selectValShow= document.querySelectorAll('.selectValShow');
    let selectDefault= document.querySelector('.selectDefault');
    selectValShow.forEach(el=>{
        el.style.display='none';
    })
    function consloSel(e){
        let val=e.options[e.selectedIndex].getAttribute('data-value');
        console.log(val);
        selectValShow.forEach(el=>{
        el.style.display='none';
        selectDefault.style.display='block'
    })
        if(val==0 || val==1){
            selectValShow[val].style.display='flex';
            selectDefault.style.display='none'
        }
    }
</script>
<script>
    function result(){
        totalPrice();
        discountValueFun();
        totalaBeforDiscountFun();
        totalDiscountValueFun();
        totalPriceFun();

    }
    function discountValueFun(){
        let discountRate =document.querySelectorAll('#discountRate');
        discountRate.forEach(el=>{
            let newEl=el.parentElement.parentElement;
            let priceunit=newEl.querySelector('#priceunit').value;
            let qu=newEl.querySelector('#qu').value;
            newEl.querySelector('#discountValue').value = (priceunit * qu * el.value)/100
        })
        totalPrice();
        totalDiscountValueFun();
        totalPriceFun();
    }
    function totalPrice(){
        let pricetotal= document.querySelectorAll('.pricetotal');
        pricetotal.forEach(el=>{
            let newEl=el.parentElement.parentElement;
            let priceunit=newEl.querySelector('#priceunit').value;
            let qu=newEl.querySelector('#qu').value;
            let discountValue=newEl.querySelector('#discountValue').value;

            if(priceunit && qu){
                el.value = priceunit * qu -discountValue;
            }else{
                el.value ='';
            }
        })
        payFun();
    }

    function discountRateFun(){
        let discountRate =document.querySelectorAll('#discountRate');
        discountRate.forEach(el=>{
            let newEl=el.parentElement.parentElement;
            let priceunit=newEl.querySelector('#priceunit').value;
            let qu=newEl.querySelector('#qu').value;
            newEl.querySelector('#discountRate').value = (100* newEl.querySelector('#discountValue').value)/(priceunit*qu);
        })
        totalPrice();
        totalDiscountValueFun();
        totalPriceFun();
    }
function totalaBeforDiscountFun(){
    let qus=document.querySelectorAll('#qu'),
    priceunits=document.querySelectorAll('#priceunit');
    let totalaBeforDiscountSum=0;
    for(let i=0;i<qus.length;i++){
        totalaBeforDiscountSum += qus[i].value*priceunits[i].value;
    }
    document.querySelector('#totalaBeforDiscount').value = totalaBeforDiscountSum;
}
function totalDiscountValueFun(){
    let discountValues = document.querySelectorAll('#discountValue');
    let discountValueSum = 0;
    discountValues.forEach(el=>{
        discountValueSum += +el.value;

    });
    document.querySelector('#Discount').value = discountValueSum;
}

function totalPriceFun(){
    let totalPrice =document.querySelectorAll('#totalPrice');
    let totalPriceSum= 0;
    totalPrice.forEach(el=>{
        totalPriceSum += +el.value;
    })
    document.querySelector('#totalaAfterDiscount').value =totalPriceSum
}
function payFun(){
    document.querySelector('#pay').value = ((document.querySelector('#taxavg').value * document.querySelector('#totalaAfterDiscount').value)/100);
    console.log('sldjflsdk')
}
</script>
@endsection
