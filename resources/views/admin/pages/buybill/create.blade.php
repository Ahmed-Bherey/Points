@extends('admin.layouts.includes.master')

@section('content')
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
                        <form class="form-horizontal" action="{{route('buybill.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 row">
                                        <div class="col-md-6 form-floating mt-3">
                                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                                id="date" placeholder="" name="date">
                                            <label for="date" class="col-form-label"> التاريخ </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="text" class="form-control"
                                                value="{{ str_pad($leatest + 1, 7, '0', STR_PAD_LEFT) }}" id="num"
                                                placeholder=" رقم الفاتورة" name="invoice_num">
                                            <label for="num" class="col-form-label"> رقم الفاتورة
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <select required class="form-control" name="store_id"
                                                placeholder=" اسم المخزن" id="namestore">
                                                <option value="">اختر المخزن</option>
                                                @foreach($stores as $key => $store)
                                                <option value="{{ $store->id }}">{{$store->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="namestore" class="col-form-label"> اسم المخزن
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating mt-3 ">
                                            <select required class="form-control" name="payment_getway"
                                                onchange="consloSel(this)" id="unitname">
                                                <option value="" data-value='22'>نوع الدفع</option>
                                                <option value="1" data-value='0'>البنك</option>
                                                <option value="2" data-value='1'>نقدى</option>
                                                <option value="3" data-value='2'>اجل</option>
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
                                                    <option value="{{ $bank->id }}" data-balance="$bank->balance">
                                                        {{$bank->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="bank_balance" class="col-form-label"> البنك </label>
                                            </div>
                                            <div class="col-6 form-floating mt-3 ps-0">
                                                <input type="number" class="form-control" id="bank_balance"
                                                    placeholder="" name="bank_balance">
                                            </div>
                                        </div>
                                        <div class="row col-md-6 ps-0 selectValShow">
                                            <div class="col-6 form-floating mt-3">
                                                <select class="form-control" name="treasury_id"
                                                    placeholder=" اسم الخزينة" id="treasury_id">
                                                    <option value="">اختر الخزينة</option>
                                                    @foreach($treasuries as $key => $treasury)
                                                    <option value="{{ $treasury->id }}">{{$treasury->name}}</option>
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
                                            <input type="number" class="form-control" id="totalaBeforDiscount"
                                                placeholder="الاجمالى بعد الخصم" name="total_before_discount">
                                            <label for="totala" class="col-form-label"> الاجمالى قبل الخصم
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3  ">
                                            <input type="number" class="form-control" id="Discount"
                                                placeholder=" قيمة الخصم" name="discount_valuee">
                                            <label for="Discount" class="col-form-label"> قيمة الخصم
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="number" class="form-control" id="totalaAfterDiscount"
                                                placeholder="الاجمالى بعد الخصم" name="total_after_discount">
                                            <label for="totala" class="col-form-label"> الاجمالى بعد الخصم
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3 pe-1">
                                            <input type="number" class="form-control" onkeyup="payFun()" id="taxavg"
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
                                                <option value="{{ $supplier->id }}">{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="support" class="col-form-label"> اسم المورد
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating mt-3">
                                            <input type="text" class="form-control" id="supplier_balance"
                                                placeholder=" رصيد المورد" name="supplier_balance">
                                            <label for="num" class="col-form-label"> رصيد المورد
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating mt-3">
                                            <select required class="form-control" name="delegate_id"
                                                placeholder=" اسم المندوب" id="namestore">
                                                <option value="">اختر المندوب</option>
                                                @foreach($delegates as $key => $delegate)
                                                <option value="{{ $delegate->id }}">{{$delegate->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="dname" class="col-form-label"> اسم المندوب
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-floating mt-3">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..."
                                                name="notes" id="n"></textarea>
                                            <label for="n" class=" col-form-label"> ملاحظات </label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="number" class="form-control" id="pay" placeholder="المدفوع"
                                                name="total">
                                            <label for="pay" class="col-form-label">الاجمالى</label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="number" class="form-control" onkeyup="restFun()" id="paid"
                                                placeholder="المدفوع" name="paid">
                                            <label for="pay" class="col-form-label">المدفوع</label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <input type="number" class="form-control" id="rest" placeholder="الباقى"
                                                name="rest">
                                            <label for="rest" class="col-form-label"> الباقى</label>
                                        </div>
                                        <div class="col-md-3 form-floating mt-3">
                                            <select required class="form-control" name="purchase_status" id="unitname">
                                                <option value=""> تحديث السعر</option>
                                                <option value="1">تحديث بالسعر الجديد</option>
                                                <option value="2">ابقاء السعر القديم</option>
                                                <option value="3">تحديث السعر بالمتوسط</option>
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
                                        <tr>
                                            <td>
                                                <select required class="form-control item_id" name="data[item_id][]"
                                                    placeholder=" اسم الصنف" id="items_id0"
                                                    onchange="selectValue('items_id0',0)">
                                                    <option value="">اختر الصنف</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" onkeyup="result()" id="qu"
                                                    placeholder="الكمية" name="data[quantity][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control unit_price" onkeyup="result()"
                                                    id="priceunit" myid='unitPrice0' placeholder="سعر الوحدة"
                                                    name="data[unit_price][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control sell_price" id="pricesell"
                                                    myid='sellPrice0' placeholder=" سعر البيع"
                                                    name="data[sell_price][]">
                                            </td>
                                            <td>
                                                {{-- value="{{$leatestPrice->purchasing_price}}" --}}
                                                <input type="number" class="form-control" id="purchasing_price0"
                                                    placeholder="  اخر سعر شراء" name="data[purchasing_price][]">
                                            </td>
                                            <td>
                                                <!-- <select required class="form-control unit_id" name="data[unit_id][]"
                                                    placeholder=" اسم الوحدة" id="">
                                                    <option value="">اختر الوحدة</option>
                                                </select> -->
                                                <select required id="unitesName0" class="form-control"
                                                    name="data[unit_id][]">
                                                    <option value="">اختر الوحدة</option>
                                                </select>
                                                <!-- <input type="text" class="form-control  unit_id" myid="unitesName0"
                                                    placeholder=" اسم الوحدة" name="data[unit_id][]" > -->
                                            </td>
                                            <td>
                                                <input type="number" class="form-control discountValue"
                                                    onkeyup="discountRateFun()" id="discountValue"
                                                    placeholder="قيمة الخصم" name="data[discount_value][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control discountRate"
                                                    onkeyup="discountValueFun()" id="discountRate"
                                                    placeholder="نسبة الخصم " name="data[discount_rate][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control pricetotal totalPrice"
                                                    placeholder="اجمالى سعر" id="totalPrice" name="data[total_price][]">
                                            </td>
                                            <td>
                                                <button type="button" class="btn bg-success" id="add">
                                                    <i class="fas fa-plus-square"></i>
                                                </button>
                                            </td>
                                        </tr>
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
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float:right; font-weight:bold;"> فاتورة مشتريات </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        # </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        رقم الفاتورة </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        المخزن </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        التاريخ </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($totals as $total)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $total->invoice_num }}
                                                    </td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $total->stores->name }}
                                                    </td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $total->date }}
                                                    </td>
                                                    <td class="d-flex justify-content-center">
                                                        <button type="submit" class="btn bg-info">
                                                            <a href="{{ route('ReturnedPurchaseEdit.all', $total->id) }}"
                                                                title="مرتجع" class="text-white"><i
                                                                    class="fa-solid fa-right-left"></i></a>
                                                        </button>
                                                        <button type="submit" class="btn bg-secondary">
                                                            <a href="{{ route('buybill.edit', $total->id) }}"
                                                                class="text-white"><i class="far fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('buybill.destroy', $total->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        $('.item_id').empty();
                        $.each(data, function(key, value) {
                            $('.item_id').append($(`<option>`, {
                                value: value.id,
                                text: value.items.name,
                                unit_price:value.items.pur_price,
                                sale_price:value.items.sale_price,
                                unites_name:value.items.unites.name,
                                unites_id:value.items.unites.id,
                                pur_price:value.items.pur_price,
                            }));
                        });
                        $('.item_id').trigger('change');
                    }
                });
            } else {
                $('select[name="item_id"]').empty();
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



</script>
<script>
    let selectValShow= document.querySelectorAll('.selectValShow');
    let selectDefault= document.querySelector('.selectDefault');
    selectValShow.forEach(el=>{
        el.style.display='none';
    })
    function consloSel(e){
        let val=e.options[e.selectedIndex].getAttribute('data-value');
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
        payFun();
        restFun();
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
        payFun();
        restFun();
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
        payFun();
        restFun();
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
    let sum=(document.querySelector('#taxavg').value * document.querySelector('#totalaAfterDiscount').value)/100
    document.querySelector('#pay').value = sum + +document.querySelector('#totalaAfterDiscount').value;
    restFun();
}
function restFun(){
    document.querySelector('#rest').value =document.querySelector('#pay').value - document.querySelector('#paid').value
}
</script>
<script>
    //  vreat new row
// let add = document.getElementById('add'),
//     tbody = document.getElementById('tbody');

// add.addEventListener(('click'), () => {
//     var new_row = document.createElement('tr')
// new_row.innerHTML = `<tr>
//                 <td>
//                     <select required class="form-control item_id" name="data[item_id][]"
//                         placeholder=" اسم الصنف" id="">
//                         <option value="">اختر الصنف</option>
//                     </select>
//                 </td>
//                 <td>
//                     <input type="number" class="form-control" onkeyup="result()" id="qu"
//                         placeholder="الكمية" name="data[quantity][]">
//                 </td>
//                 <td>
//                     <input type="number" class="form-control unit_price" onkeyup="result()"
//                         id="" placeholder="سعر الوحدة" name="data[unit_price][]">
//                 </td>
//                 <td>
//                     <input type="number" class="form-control sell_price" id=""
//                         placeholder=" سعر البيع" name="data[sell_price][]">
//                 </td>
//                 <td>
//                     <input type="number" class="form-control purchasing_price" id=""
//                         placeholder="  اخر سعر شراء" name="data[purchasing_price][]">
//                 </td>
//                 <td>
//                     <select required class="form-control unit_id" name="data[unit_id][]"
//                         placeholder=" اسم الوحدة" id="">
//                         <option value="">اختر الوحدة</option>
//                     </select>
//                 </td>
//                 <td>
//                     <input type="number" class="form-control discountValue" onkeyup="discountRateFun()"
//                         id="" placeholder="قيمة الخصم"
//                         name="data[discount_value][]">
//                 </td>
//                 <td>
//                     <input type="number" class="form-control discountRate" onkeyup="discountValueFun()"
//                         id="" placeholder="نسبة الخصم "
//                         name="data[discount_rate][]">
//                 </td>
//                 <td>
//                     <input type="number" class="form-control pricetotal totalPrice"
//                         placeholder="اجمالى سعر" id="" name="data[total_price][]">
//                 </td>
//                 <td>
//                     <button type="button" class="btn bg-danger" id="delet">
//                         <i class="fas fa-plus-square"></i>
//                     </button>
//                 </td>
//             </tr>`;
//     tbody.appendChild(new_row)
// })

// delet  row
// let delet = document.querySelectorAll('.delet');

// document.addEventListener(('click'), () => {
//     let delet = document.querySelectorAll('.delet');
//     for (let i = 0; i < delet.length; i++) {
//         delet[i].addEventListener(('click'), () => {
//             tbody.children[i].classList.add('d-none')
//                 // totlePrice[i].value = 0
//         })
//     }
//     // delef frist row
//     delet[0].addEventListener(('click'), () => {
//         tbody.children[0].classList.add('d-none')
//             // totlePrice[0].value = 0
//     })
// })

</script>
<!-- wakwak -->
<script>
    function selectValue(id,index){
        let select =document.getElementById(id);


        document.querySelector(`[myid = unitPrice${index}]`).value=select.options[select.selectedIndex].getAttribute('unit_price');
        document.querySelector(`[myid = sellPrice${index}]`).value=select.options[select.selectedIndex].getAttribute('sale_price');
        let unitesName=select.options[select.selectedIndex].getAttribute('unites_name');
        let unitesId=select.options[select.selectedIndex].getAttribute('unites_id');
        document.getElementById(`unitesName${index}`).innerHTML = `<option value='${unitesId}'>${unitesName}</option>`;
        document.getElementById(`purchasing_price${index}`).value = select.options[select.selectedIndex].getAttribute('pur_price');
    }
</script>
@endsection
