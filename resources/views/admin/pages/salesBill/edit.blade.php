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
                            <h3 class="card-title header-title">فاتورة مبيعات </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('salesBill.update' , $totals->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body row">
                                {{-- row 1 --}}
                                <div class="col-sm-3 form-floating mt-3">
                                    <input type="date" class="form-control" value="{{$totals->date}}" id="date"
                                        placeholder="" name="date">
                                    <label for="date" class="col-form-label"> التاريخ </label>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <select required class="form-control" name="client_id" id="man">
                                        <option value="">اختر العميل</option>
                                        @foreach ($clients as $key => $client)
                                        <option value="{{ $client->id }}" @if ($totals->client_id == $client->id)
                                            selected @endif>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="man" class="col-form-label"> اسم العميل </label>
                                </div>
                                {{-- row 2 --}}
                                <div class="col-sm-3 form-floating mt-3">
                                    <select required class="form-control" name="representative_id" id="man">
                                        <option value="">اختر المندوب</option>
                                        @foreach ($representatives as $key => $representative)
                                        <option value="{{ $representative->id }}" @if ($totals->representative_id ==
                                            $representative->id) selected @endif>{{ $representative->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label for="support" class="col-form-label"> اسم المندوب </label>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <input type="text" class="form-control" value="{{$totals->bill_num}}" id="num"
                                        placeholder="رقم الفاتورة" name="bill_num">
                                    <label for="num" class="col-form-label"> رقم الفاتورة </label>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <select required class="form-control" name="store_id" id="man">
                                        <option value="">اختر المخزن</option>
                                        @foreach ($stores as $key => $store)
                                        <option value="{{ $store->id }}" @if ($totals->store_id == $store->id) selected
                                            @endif>{{
                                            $store->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="namestore" class="col-form-label"> اسم المخزن </label>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <select required class="form-control" name="payment_getway" id="sale"
                                        onchange="consloSel(this)">
                                        <option value="" data-value='22'>اختر نوع الدفع</option>
                                        <option value="1" data-value='0' @if ($totals->payment_getway == 1) selected
                                            @endif>بنك</option>
                                        <option value="2" data-value='1' @if ($totals->payment_getway == 2) selected
                                            @endif>خزينة</option>
                                    </select>
                                    <label for="pay" class="col-form-label"> نوع الدفع </label>
                                </div>
                                <div class="col-sm-3 row m-0 p-0 mt-3 selectDefault">
                                </div>
                                <div class="col-sm-3 row m-0 p-0 mt-3 selectValShow">
                                    <div class="col-9 form-floating">
                                        <select class="form-control" name="bank_id" id="bank_id">
                                            <option value="">اختر البنك</option>
                                            @foreach ($banks as $key => $bank)
                                            <option value="{{ $bank->id }}" @if ($totals->bank_id == $bank->id) selected
                                                @endif>{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="bank" class="col-form-label"> البنك </label>
                                    </div>
                                    <div class="col-3 form-floating">
                                        <input type="number" class="form-control bank_balance" id="" placeholder=""
                                            name="">
                                    </div>
                                </div>
                                <div class="col-sm-3 row m-0 p-0 mt-3 selectValShow">
                                    <div class="col-9 form-floating">
                                        <select class="form-control" name="treasury_id" id="treasury_id">
                                            <option value="">اختر الخزينة</option>
                                            @foreach ($treasuries as $key => $treasury)
                                            <option value="{{ $treasury->id }}" @if ($totals->treasury_id ==
                                                $treasury->id) selected @endif>{{ $treasury->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> الخزينة </label>
                                    </div>
                                    <div class="col-3 form-floating">
                                        <input type="number" class="form-control balance" id="" placeholder="" name="">
                                    </div>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <textarea class="form-control" rows="4" placeholder="ملاحظات ..." name="notes"
                                        id="n">{{$totals->notes}}</textarea>
                                    <label for="n" class="col-form-label"> ملاحظات </label>
                                </div>
                                <div class="col-md-6 row ">
                                    <div class="col-sm-3 form-floating mt-3">
                                        <input type="number" class="form-control"
                                            value="{{$totals->total_before_discount}}" id="totalb"
                                            placeholder="الاجمالى قبل" name="total_before_discount">
                                        <label for="totalb" class="col-form-label"> الاجمالى قبل
                                            الخصم </label>
                                    </div>
                                    <div class="col-sm-3 form-floating mt-3">
                                        <input type="number" class="form-control" value="{{$totals->discount_value}}"
                                            id="Discount" placeholder="قيمة الخصم " name="discount_value">
                                        <label for="Discount" class="col-form-label"> قيمة الخصم </label>
                                    </div>
                                    <div class="col-sm-3 form-floating mt-3">
                                        <input type="number" class="form-control"
                                            value="{{$totals->total_after_discount}}" id="totala"
                                            placeholder="الاجمالى بعد الخصم" name="total_after_discount">
                                        <label for="totala" class="col-form-label"> الاجمالى بعد الخصم
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating mt-3">
                                        <input type="number" class="form-control" value="{{$totals->added_tax_value}}"
                                            id="tax" placeholder="قيمة الضريبة المضافة" name="added_tax_value">
                                        <label for="tax" class="col-form-label"> قيمة الضريبة المضافة
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 row ">
                                    <div class="col-sm-4 form-floating mt-3">
                                        <input type="number" class="form-control" value="{{$totals->total}}" id="averg"
                                            name="total" placeholder=" الاجمالى ">
                                        <label for="averg" class="col-form-label"> الاجمالى </label>
                                    </div>
                                    <div class="col-sm-4 form-floating mt-3">
                                        <input type="number" class="form-control" value="{{$totals->paid}}" name="paid"
                                            id="taxavg" placeholder="المدفوع">
                                        <label for="taxavg" class="col-form-label"> المدفوع
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating mt-3">
                                        <input type="number" class="form-control" value="{{$totals->rest}}" name="rest"
                                            id="cost" placeholder=" الباقى">
                                        <label for="cost" class="col-form-label"> الباقى </label>
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
                                            <th> الوحدة </th>
                                            <th> قيمة الخصم </th>
                                            <th> نسبة الخصم </th>
                                            <th> اجمالى سعر </th>
                                            <th>العملية </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach($saleBills as $key => $saleBill)
                                        <tr>
                                            <td>
                                                <select required class="form-control item_id" name="data[item_id][]"
                                                    id="items_id0" onchange="selectValue('items_id0',0)">
                                                    @if($saleBill->item_id != "")
                                                    <option value="{{$saleBill->item_id}}">{{$saleBill->items->name}}
                                                    </option>
                                                    @endif
                                                    <option value="">اختر الصنف</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$saleBill->quantity}}" id="qu" placeholder="الكمية"
                                                    name="data[quantity][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$saleBill->unit_price}}" id="priceunit" myid='unitPrice0'
                                                    placeholder="سعر الوحدة" name="data[unit_price][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$saleBill->sale_price}}" id="pricesell" myid='sellPrice0'
                                                    placeholder=" سعر البيع" name="data[sale_price][]">
                                            </td>
                                            <td>
                                                <select required id="unitesName0" class="form-control"
                                                    name="data[unit_id][]">
                                                    @if($saleBill->unit_id != "")
                                                    <option value="{{$saleBill->unit_id}}">{{$saleBill->units->name}}
                                                    </option>
                                                    @endif
                                                    <option value="">اختر الوحدة</option>
                                                </select>
                                                <!-- {{-- <input type="text" class="form-control  unit_id" id="unitesName0"
                                                    placeholder=" اسم الوحدة" name="data[unit_id][]"> --}} -->
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$saleBill->discount_value2}}" id="Value"
                                                    placeholder="قيمة الخصم" name="data[discount_value2][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$saleBill->discount_rate2}}" id="s"
                                                    placeholder="نسبة الخصم " name="data[discount_rate2][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$saleBill->total_price}}" id="pricetotal"
                                                    placeholder="اجمالى سعر" name="data[total_price][]">
                                            </td>
                                            <!-- <td class="d-flex justify-content-evenly p-1"> -->
                                            <!-- add -->
                                            <!-- <div class="">
                                                    <a class="btn btn-success" onclick="onAdd(this)"><span
                                                            class="far fa-plus-square text-light"></span></a>
                                                </div> -->
                                            <!-- {{-- <div class="">
                                                    <p class="btn"><span></span></p>
                                                </div> --}} -->
                                            <!-- </td> -->
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<script type="text/javascript">
    $(document).ready(function() {
            $('select[name="treasury_id"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('salesBill.treasury.ajax',['id'=>':id'])}}';
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
                            $('.balance').empty();
                            $('.balance').val(data);
                            $('.balance').trigger('change');
                        }
                    });
                } else {
                    $('select[name="balance"]').empty();
                }
            });


            $('select[name="bank_id"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('salesBill.bank.ajax',['id'=>':id'])}}';
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
                            $('.bank_balance').empty();
                            $('.bank_balance').val(data);
                            $('.bank_balance').trigger('change');
                        }
                    });
                } else {
                    $('select[name="balance"]').empty();
                }
            });

            $('select[name="store_id"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('salesBill.item.ajax',['id'=>':id'])}}';
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
                                        unites_id:value.items.unites.id
                                }));
                            });
                            $('.item_id').trigger('change');
                        }
                    });
                } else {
                    $('select[name="item_id"]').empty();
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
    function selectValue(id,index){
        let select =document.getElementById(id);


        document.querySelector(`[myid = unitPrice${index}]`).value=select.options[select.selectedIndex].getAttribute('unit_price');
        document.querySelector(`[myid = sellPrice${index}]`).value=select.options[select.selectedIndex].getAttribute('sale_price');
        let unitesName=select.options[select.selectedIndex].getAttribute('unites_name');
        let unitesId=select.options[select.selectedIndex].getAttribute('unites_id');
        document.getElementById(`unitesName${index}`).innerHTML = `<option value='${unitesId}'>${unitesName}</option>`;

    }
</script>
@endsection
