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
                            <form class="form-horizontal" action="{{ route('showPrice.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="shownum"
                                                placeholder="رقم عرض الاسعار" name="show_prices_num" required>
                                            <label for="shownum" class="col-form-label">رقم عرض الاسعار
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="show_prices_type" id="showtype">
                                                <option>اختر نوع عرض الاسعار</option>
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                            <label for="showtype" class="col-form-label">نوع عرض الاسعار
                                            </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="customer_id" id="customer_id">
                                                <option>اختر العميل</option>
                                                @foreach ($customers as $key => $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customer_id" class=" col-form-label">اسم العميل</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <select class="form-control" name="item_id" id="customer_id">
                                                <option>اختر الصنف</option>
                                                @foreach ($items as $key => $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                                    <option value="{{ $unite->id }}">{{ $unite->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="unit" class=" col-form-label">الوحدة </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="text" class="form-control" id="code" placeholder="الكود"
                                                name="code">
                                            <label for="code" class="col-form-label">الكود</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="qu" placeholder="الكمية"
                                                name="quantity">
                                            <label for="qu" class="col-form-label">الكمية </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="n"></textarea>
                                            <label for="n" class=" col-form-label">ملاحظات </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="price"
                                                placeholder="سعر الوحدة" name="unit_price">
                                            <label for="price" class="col-form-label">سعر الوحدة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="value"
                                                placeholder="قيمة الخصم" name="dicount_value">
                                            <label for="value" class="col-form-label"> قيمة الخصم</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="precent"
                                                placeholder="نسبة الخصم" name="dicount_rate">
                                            <label for="precent" class="col-form-label">نسبة الخصم </label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="total"
                                                placeholder="اجمالى سعر الصنف" name="total_item_price">
                                            <label for="total" class="col-form-label"> اجمالى سعر الصنف</label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="totalall"
                                                placeholder="اجمالى الاصناف" name="total_items">
                                            <label for="totalall" class="col-form-label"> اجمالى الاصناف</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="taxvalue"
                                                placeholder=" قيمة ضريبة القيمة" name="added_tax_value">
                                            <label for="taxvalue" class="col-form-label"> قيمة ضريبة القيمة
                                                المضافة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="taxpercent"
                                                placeholder=" نسبة ضريبة القيمة" name="added_tax_rate">
                                            <label for="taxpercent" class="col-form-label"> نسبة ضريبة القيمة
                                                المضافة</label>
                                        </div>
                                        <div class="col-sm-3 form-floating">
                                            <input type="number" class="form-control" id="pure"
                                                placeholder="الصافى" name="profit">
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-lg-12">
                        <div class="card border border-1 mt-3 bg-light">
                            <div class="card-header">
                                <h3 class="card-title ">بيان اسعار</h3>
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
                                                        <td></td>
                                                        <th class="sorting sorting_asc" tabindex="0"
                                                            aria-controls="example1" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="Rendering engine: activate to sort column descending">
                                                            الكود
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            اسم الصنف
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Engine version: activate to sort column ascending">
                                                            الكمية
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            سعر الوحدة
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            الاجمالى
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            نسبة الخصم
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            الوحدة
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            عمليات
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($showPrices as $key => $showPrice)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $showPrice->code }}</td>
                                                            <td>{{ $showPrice->items->name }}</td>
                                                            <td>{{ $showPrice->quantity }}</td>
                                                            <td>{{ $showPrice->unit_price }}</td>
                                                            <td>{{ $showPrice->total_item_price }}</td>
                                                            <td>{{ $showPrice->dicount_rate }}</td>
                                                            <td>{{ $showPrice->units->name }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('showPrice.edit', $showPrice->id) }}"
                                                                        class="text-white"><i class="far fa-edit"></i></a>
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('showPrice.destroy', $showPrice->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"><i
                                                                            class="fas fa-trash-alt"></i> </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
