@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
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
                        <form class="form-horizontal" action="{{route('bounceNoBill.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <select required class="form-control" name="supplier_id" id="supplier">
                                            <option value="">اختر المورد</option>
                                            @foreach($suppliers as $key => $supplier)
                                            <option value="{{ $supplier->id }}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="supplier" class="col-form-label"> اسم المورد </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="" name="date">
                                        <label for="date" class="col-form-label"> التاريخ </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="accountb"
                                            placeholder="الرصيد السابق" name="last_balance">
                                        <label for="accountb" class="col-form-label"> الرصيد السابق
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="numbill"
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
                                            <option value="{{ $item->id }}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="namecat" class="col-form-label"> اسم الصنف </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <select required class="form-control" name="unit_id" id="supplier">
                                            <option value="">اختر الوحدة</option>
                                            @foreach($units as $key => $unit)
                                            <option value="{{ $unit->id }}">{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="unitname" class="col-form-label"> الوحدة </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <select required class="form-control" name="store_id" id="supplier">
                                            <option value="">اختر المخزن</option>
                                            @foreach($stores as $key => $store)
                                            <option value="{{ $store->id }}">{{$store->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="namestore" class="col-form-label"> اسم المخزن </label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="qu" placeholder="الكمية"
                                            name="quantity">
                                        <label for="qu" class="col-form-label"> الكمية</label>
                                    </div>
                                </div>
                                {{-- row 3 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="priceunit"
                                            placeholder="سعر الوحدة" name="unit_price">
                                        <label for="priceunit" class="col-form-label"> سعر الوحدة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="Value" placeholder="قيمة الخصم"
                                            name="discount_value">
                                        <label for="Value" class="col-form-label"> قيمة الخصم</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="s" placeholder="نسبة الخصم"
                                            name="discount_rate">
                                        <label for="s" class="col-form-label"> نسبة الخصم </label>
                                    </div>
                                </div>
                                {{-- row 4 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="total"
                                            placeholder="اجمالى سعر الصنف" name="total_item_price">
                                        <label for="total" class="col-form-label"> اجمالى سعر الصنف</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="taxvalue"
                                            placeholder="قيمة ضريبة القيمة المضافة" name="tax_added_value">
                                        <label for="taxvalue" class="col-form-label"> قيمة ضريبة القيمة المضافة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="taxpercent"
                                            placeholder="نسبة ضريبة القيمة المضافة" name="tax_added_rate">
                                        <label for="taxpercent" class="col-form-label"> نسبة ضريبة القيمة
                                            المضافة</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="returned"
                                            placeholder="إجمالى المرتجع" name="total_return">
                                        <label for="returned" class="col-form-label"> إجمالى المرتجع </label>
                                    </div>
                                </div>
                                {{-- row 5 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="pay" placeholder="" name="paid">
                                        <label for="pay" class="col-form-label">المدفوع</label>
                                    </div>
                                    <div class="col-sm-3 form-floating">
                                        <input type="number" class="form-control" id="rest" placeholder="" name="rest">
                                        <label for="rest" class="col-form-label"> الباقى</label>
                                    </div>
                                    <div class="col-sm-3 row m-0 p-0">
                                        <div class="col-9 form-floating">
                                            <select required class="form-control" name="treasury_id" id="supplier">
                                                <option value="">اختر الخزينة</option>
                                                @foreach($treasuries as $key => $treasury)
                                                <option value="{{ $treasury->id }}">{{$treasury->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="safe" class="col-form-label"> الخزينة </label>
                                        </div>
                                        <div class="col-3 form-floating">
                                            <input type="number" class="form-control" id="treasury_value" placeholder="" name="treasury_value">
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
            <div class="row">
                <div class="col-sm-12 col-lg-12 mt-1">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> مشتريات بدون فاتورة</h3>
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
                                                        اسم المورد </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        التاريخ</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        الرصيد السابق</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        رقم الايصال</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        اسم الصنف</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bounceNoBills as $key => $bounceNoBill)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{$bounceNoBill->suppliers->name}}</td>
                                                    <td>{{$bounceNoBill->date}}</td>
                                                    <td>{{$bounceNoBill->last_balance}}</td>
                                                    <td>{{$bounceNoBill->receipt_num}}</td>
                                                    <td>{{$bounceNoBill->items->name}}</td>
                                                    <td>
                                                        <a href="{{route('bounceNoBill.edit' , $bounceNoBill->id)}}"
                                                            class="btn bg-secondary"> <i class="far fa-edit"></i></a>
                                                        <a href="{{route('bounceNoBill.destroy' , $bounceNoBill->id)}}"
                                                            class="btn btn-danger"><i class="fas fa-trash-alt "></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
    $(document).ready(function() {
            $('select[name="treasury_id"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('bounceNoBill.treasury.ajax', ['id' => ':id']) }}';
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
                $('#treasury_value').empty();
                $('#treasury_value').val(data);
                $('#treasury_value').trigger('change');
            }
                    });
                } else {
                    $('select[name="treasury_value"]').empty();
                }
            });
        });
</script>
@endsection
