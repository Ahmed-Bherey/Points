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
                        <form class="form-horizontal" action="{{ route('salesBill.store') }}" method="POST">
                            @csrf
                            <div class="card-body row">
                                {{-- row 1 --}}
                                <div class="col-sm-3 form-floating mt-3">
                                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="date"
                                        placeholder="" name="date">
                                    <label for="date" class="col-form-label"> التاريخ </label>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <select required class="form-control" name="client_id" id="man">
                                        <option value="">اختر العميل</option>
                                        @foreach ($clients as $key => $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="man" class="col-form-label"> اسم العميل </label>
                                </div>
                                {{-- row 2 --}}
                                <div class="col-sm-3 form-floating mt-3">
                                    <select required class="form-control" name="representative_id" id="man">
                                        <option value="">اختر المندوب</option>
                                        @foreach ($representatives as $key => $representative)
                                        <option value="{{ $representative->id }}">{{ $representative->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label for="support" class="col-form-label"> اسم المندوب </label>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <input type="text" class="form-control" id="num"
                                        value="{{ str_pad($leatest + 1, 7, '0', STR_PAD_LEFT) }}"
                                        placeholder="رقم الفاتورة" name="bill_num">
                                    <label for="num" class="col-form-label"> رقم الفاتورة </label>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <select required class="form-control" name="store_id" id="man">
                                        <option value="">اختر المخزن</option>
                                        @foreach ($stores as $key => $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="namestore" class="col-form-label"> اسم المخزن </label>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <select required class="form-control" name="payment_getway" id="sale"
                                        onchange="consloSel(this)">
                                        <option value="" data-value='22'>اختر نوع الدفع</option>
                                        <option value="1" data-value='0'>بنك</option>
                                        <option value="2" data-value='1'>خزينة</option>
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
                                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
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
                                            <option value="{{ $treasury->id }}">{{ $treasury->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> الخزينة </label>
                                    </div>
                                    <div class="col-3 form-floating">
                                        <input type="number" class="form-control balance" id="" placeholder=""
                                            name="">
                                    </div>
                                </div>
                                <div class="col-sm-3 form-floating mt-3">
                                    <textarea class="form-control" rows="4" placeholder="ملاحظات ..." name="notes"
                                        id="n"></textarea>
                                    <label for="n" class="col-form-label"> ملاحظات </label>
                                </div>
                                <div class="col-md-6 row ">
                                    <div class="col-sm-3 form-floating mt-3">
                                        <input type="number" class="form-control" id="totalb" placeholder="الاجمالى قبل"
                                            name="total_before_discount">
                                        <label for="totalb" class="col-form-label"> الاجمالى قبل
                                            الخصم </label>
                                    </div>
                                    <div class="col-sm-3 form-floating mt-3">
                                        <input type="number" class="form-control" id="Discount"
                                            placeholder="قيمة الخصم " name="discount_value">
                                        <label for="Discount" class="col-form-label"> قيمة الخصم </label>
                                    </div>
                                    <div class="col-sm-3 form-floating mt-3">
                                        <input type="number" class="form-control" id="totala"
                                            placeholder="الاجمالى بعد الخصم" name="total_after_discount">
                                        <label for="totala" class="col-form-label"> الاجمالى بعد الخصم
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating mt-3">
                                        <input type="number" class="form-control" id="tax"
                                            placeholder="قيمة الضريبة المضافة" name="added_tax_value">
                                        <label for="tax" class="col-form-label"> قيمة الضريبة المضافة
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 row ">
                                    <div class="col-sm-4 form-floating mt-3">
                                        <input type="number" class="form-control" id="averg" name="total"
                                            placeholder=" الاجمالى ">
                                        <label for="averg" class="col-form-label"> الاجمالى </label>
                                    </div>
                                    <div class="col-sm-4 form-floating mt-3">
                                        <input type="number" class="form-control" name="paid" id="taxavg"
                                            placeholder="المدفوع">
                                        <label for="taxavg" class="col-form-label"> المدفوع
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating mt-3">
                                        <input type="number" class="form-control" name="rest" id="cost"
                                            placeholder=" الباقى">
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
                                        <tr>
                                            <td>
                                                <select required class="form-control item_id" name="data[item_id][]"
                                                id="items_id0"
                                                    onchange="selectValue('items_id0',0)">
                                                    <option value="">اختر الصنف</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="qu" placeholder="الكمية"
                                                    name="data[quantity][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"  id="priceunit" myid='unitPrice0'
                                                    placeholder="سعر الوحدة" name="data[unit_price][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="pricesell" myid='sellPrice0'
                                                    placeholder=" سعر البيع" name="data[sale_price][]">
                                            </td>
                                            <td>
                                                <select required id="unitesName0" class="form-control" name="data[unit_id][]"
                                                    >
                                                    <option value="">اختر الوحدة</option>
                                                </select>
                                                <!-- {{-- <input type="text" class="form-control  unit_id" id="unitesName0"
                                                    placeholder=" اسم الوحدة" name="data[unit_id][]"> --}} -->
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="Value"
                                                    placeholder="قيمة الخصم" name="data[discount_value2][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="s"
                                                    placeholder="نسبة الخصم " name="data[discount_rate2][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="pricetotal"
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
            <div class="row mt-4">
                <div class="col-sm-12 col-lg-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> فاتورة مبيعات </h3>
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
                                                    <td>#</td>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        رقم الفاتورة </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($totalBuyBills as $key => $totalBuyBill)
                                                <tr class="odd">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $totalBuyBill->bill_num }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <button type="submit" class="btn bg-info">
                                                            <a href="{{ route('returnedSalesEdit.all', $totalBuyBill->id) }}"
                                                                title="مرتجع" class="text-white"><i
                                                                    class="fa-solid fa-right-left"></i></a>
                                                        </button>
                                                        <button type="submit" class="btn bg-secondary">
                                                            <a href="{{ route('salesBill.edit', $totalBuyBill->id) }}"
                                                                class="text-white"><i class="far fa-edit "
                                                                    aria-hidden="true"></i></a>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('salesBill.destroy', $totalBuyBill->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger"><i
                                                                    class="fas fa-trash-alt"></i></button>
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
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<script>
    //  creat new row
        // let tbody = document.getElementById('tbody');

        // function onDelete(ele) {
        //     ele.parentElement.parentElement.parentElement.remove()
        // }

        // function onAdd(ele) {
        //     var new_row = document.createElement('tr')
        //     new_row.innerHTML =
        //         `
        //         <td>
        //             <select required class="form-control item_id" name="data[item_id][]" id="item_id">
        //                 <option value="">اختر الصنف</option>
        //             </select>
        //         </td>
        //         <td>
        //             <input type="number" class="form-control" id="qu" placeholder="الكمية"
        //                 name="data[quantity][]">
        //         </td>
        //         <td>
        //             <input type="number" class="form-control" id="priceunit"
        //                 placeholder="سعر الوحدة" name="data[unit_price][]">
        //         </td>
        //         <td>
        //             <input type="number" class="form-control" id="pricesell"
        //                 placeholder=" سعر البيع" name="data[sale_price][]">
        //         </td>
        //         <td>
        //             <select requried class="form-control" name="data[unit_id][]" id="unit_id">
        //                 <option value="">اختر الوحدة</option>
        //             </select>
        //         </td>
        //         <td>
        //             <input type="number" class="form-control" id="Value"
        //                 placeholder="قيمة الخصم" name="data[discount_value2][]">
        //         </td>
        //         <td>
        //             <input type="number" class="form-control" id="s"
        //                 placeholder="نسبة الخصم " name="data[discount_rate2][]">
        //         </td>
        //         <td>
        //             <input type="number" class="form-control" id="pricetotal"
        //                 placeholder="اجمالى سعر" name="data[total_price][]">
        //         </td>
        //         <td class="d-flex justify-content-evenly p-1">
        //             <!-- delete -->
        //             <div class="">
        //                 <a class="delet btn btn-danger" onclick="onDelete(this)" ><span
        //                         class="far fa-trash-alt text-light"></span></a>
        //             </div>
        //         </td>`;
        //     tbody.appendChild(new_row)
        // }
        // document.addEventListener('keyup', () => {
        //     let price = document.querySelectorAll('.price'),
        //         halfPrice = document.querySelectorAll('.half-price'),
        //         persentAdd = document.querySelectorAll('.persent-add'),
        //         totle = document.querySelectorAll('.totle');
        //     for (let i = 0; i < price.length; i++) {
        //         totle[i].value = price[i].value * 1 + halfPrice[i].value * 1 + persentAdd[i].value * 1
        //     }
        // })
</script>
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

            // $('select[name="data[item_id][]"]').on('change', function() {
            //     var stateID = $(this).val();
            //     var csrf = $('meta[name="csrf-token"]').attr('content');
            //     var route = '{{ route('salesBill.unit.ajax',['id'=>':id'])}}';
            //     route = route.replace(':id', stateID);
            //     if (stateID) {
            //         $.ajax({
            //             beforeSend: function(x) {
            //                 return x.setRequestHeader('X-CSRF-TOKEN', csrf);
            //             },
            //             url: route,
            //             type: "GET",
            //             dataType: "json",
            //             success: function(data) {
            //                 $('#unit_id').empty();
            //                 $.each(data, function(key, value) {
            //                     $('#unit_id').append($(`<option>`, {
            //                         value: value.id,
            //                         text: value.unites.name,
            //                     }));
            //                 });
            //                 $('#unit_id').trigger('change');
            //             }
            //         });
            //     } else {
            //         $('select[name="data[unit_id][]"]').empty();
            //     }
            // });
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

