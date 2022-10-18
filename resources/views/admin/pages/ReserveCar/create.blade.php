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
                            <form class="form-horizontal" action="{{ route('reserveCar.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row  1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="num"
                                                placeholder=" رقم البيان" name="statement_num">
                                            <label for="num" class="col-form-label"> رقم البيان </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="permission_type" id="bill">
                                                <option value="">اختر نوع اذن التحميل</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                            <label for="bill" class="col-form-label"> نوع إذن التحميل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="client_id" id="customer">
                                                <option value="">اختر العميل</option>
                                                @foreach ($clients as $key => $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customer" class="col-form-label">اسم العميل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="storeFrom_id" id="customer">
                                                <option value="">اختر المخزن</option>
                                                @foreach ($storesFrom as $key => $storeFrom)
                                                    <option value="{{ $storeFrom->id }}">{{ $storeFrom->name }}</option>
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
                                                    <option value="{{ $storeTo->id }}">{{ $storeTo->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="target" class="col-form-label"> اسم المخزن الهدف </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="representative_id" id="customer">
                                                <option value="">اختر المندوب</option>
                                                @foreach ($representatives as $key => $representative)
                                                    <option value="{{ $representative->id }}">{{ $representative->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="support" class="col-form-label"> اسم المندوب </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                                name="date">
                                            <label for="date" class="col-form-label"> التاريخ </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="target" placeholder="التارجت"
                                                name="target">
                                            <label for="target" class="col-form-label">التارجت
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="from" placeholder="من"
                                                name="from">
                                            <label for="from" class="col-form-label">من
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <textarea class="form-control" rows="4" placeholder="ملاحظات ..." name="notes" id="n"></textarea>
                                            <label for="n" class="col-form-label"> ملاحظات </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="final"
                                                placeholder="الرصيدالنهائى" name="final_balance">
                                            <label for="final" class="col-form-label">الرصيدالنهائى
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="account"
                                                placeholder="الرصيد السابق" name="previous_balance">
                                            <label for="account" class="col-form-label">الرصيد السابق
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="totalb"
                                                placeholder="الاجمالى قبل الخصم" name="total_before_discount">
                                            <label for="totalb" class="col-form-label"> الاجمالى قبل الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="Discount"
                                                placeholder=" قيمة الخصم" name="discount_value1">
                                            <label for="Discount" class="col-form-label"> قيمة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="averg"
                                                placeholder="نسبة الخصم" name="discount_rate1">
                                            <label for="averg" class="col-form-label">نسبة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="" class="form-control" id="taxsale"
                                                placeholder="ضريبة المبيعات" name="sales_tax">
                                            <label for="taxsale" class="col-form-label"> ضريبة المبيعات </label>
                                        </div>
                                    </div>
                                    {{-- row 5 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="cost"
                                                placeholder="تكلفة النقل" name="transportation_cost">
                                            <label for="cost" class="col-form-label"> تكلفة النقل </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="totala"
                                                placeholder=" الاجمالى بعد الخصم" name="total_after_discount">
                                            <label for="totala" class="col-form-label"> الاجمالى بعد الخصم
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="won"
                                                placeholder="الربحية" name="profit">
                                            <label for="won" class="col-form-label">الربحية</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="code"
                                                placeholder="الكود" name="code">
                                            <label for="code" class="col-form-label"> الكود</label>
                                        </div>
                                    </div>
                                    {{-- row 6 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="qu"
                                                placeholder="الكمية" name="quantity">
                                            <label for="qu" class="col-form-label"> الكمية</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="priceunit"
                                                placeholder="سعر الوحدة" name="unit_price">
                                            <label for="priceunit" class="col-form-label"> سعر الوحدة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="q"
                                                placeholder="خصم كمية" name="quantity_discount">
                                            <label for="q" class="col-form-label"> خصم كمية </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="persentadd"
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
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="namecat" class="col-form-label"> اسم الصنف </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select required class="form-control" name="unit_id" id="customer">
                                                <option value="">اختر الوحدة</option>
                                                @foreach ($units as $key => $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="unitname" class="col-form-label"> الوحدة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="Value"
                                                placeholder="قيمة الخصم" name="discount_value2">
                                            <label for="Value" class="col-form-label"> قيمة الخصم</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="s"
                                                placeholder="نسبة الخصم" name="discount_rate2">
                                            <label for="s" class="col-form-label"> نسبة الخصم </label>
                                        </div>
                                    </div>
                                    {{-- row 8 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="s"
                                                placeholder=" الرصيد الحالى" name="current_balance">
                                            <label for="s" class="col-form-label"> الرصيد الحالى </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="pricetotal"
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
                <div class="row mt-4">
                    <div class="col-sm-12 col-lg-12 mt-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;"> إذن تحميل سيارة </h3>
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
                                                            الكود </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            اسم الصنف</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الوحدة </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الكمية</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            سعر الوحدة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            قيمة الخصم</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            نسبة الخصم </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            الاجمالى </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($reserveCars as $key => $reserveCar)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $reserveCar->code }}</td>
                                                            <td>{{ $reserveCar->items->name }}</td>
                                                            <td>{{ $reserveCar->units->name }}</td>
                                                            <td>{{ $reserveCar->quantity }}</td>
                                                            <td>{{ $reserveCar->unit_price }}</td>
                                                            <td>{{ $reserveCar->discount_value1 }}</td>
                                                            <td>{{ $reserveCar->discount_rate1 }}</td>
                                                            <td>{{ $reserveCar->total_item_price }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('reserveCar.edit', $reserveCar->id) }}"
                                                                        class="text-white"><i class="far fa-edit"></i></a>
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('reserveCar.destroy', $reserveCar->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"><i
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
@endsection
