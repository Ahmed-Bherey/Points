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
                            <h3 class="card-title header-title">دفع أقساط العملاء </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('payInstallment.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="التاريخ" name="date">
                                        <label for="date" class="col-form-label">التاريخ</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="client_id" id="customar">
                                            <option value="">اختر اسم العميل</option>
                                            @foreach ($clients as $key => $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="customar" class="col-sm-4  col-form-label"> اختر اسم العميل</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="billnumber" placeholder="القسط/رقم الفاتورة" name="invoice_num">
                                        <label for="billnumber" class="col-form-label">القسط/رقم الفاتورة
                                        </label>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">

                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="billdate" placeholder="" name="invoice_date">
                                        <label for="billdate" class="col-form-label">تاريخ الفاتورة</label>


                                    </div>
                                    <div class="col-sm-4 form-floating d-flex">
                                        <div class="col-sm-6 form-floating">
                                            <select required class="form-control" name="treasury_id" id="customar">
                                                <option value="">اختر الخزينة </option>
                                                @foreach ($treasuries as $key => $treasury)
                                                <option value="{{ $treasury->id }}">{{ $treasury->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label for="customar" class="col-sm-4  col-form-label"> الخزينة</label>
                                            <!-- <label for="safe" class="col-form-label"> الخزينة </label> -->
                                        </div>

                                        <div class="col-sm-6 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="" name="">
                                            <label for="bank" class="col-form-label"> رصيد الخزينة </label>

                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-floating d-flex">
                                        <div class="col-sm-6 form-floating">
                                            <select required class="form-control" name="bank_id" id="customar">
                                                <option value="">اختر البنك </option>
                                                @foreach ($banks as $key => $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="bank" class="col-form-label"> البنك </label>
                                        </div>
                                        <div class="col-sm-6 form-floating">
                                            <input type="number" class="form-control" id="" placeholder="" name="">
                                            <label for="bank" class="col-form-label"> رصيد الخزينة </label>

                                        </div>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="value" placeholder=" إجمالى المتبقي من كل الاقساط" name="total_of_all_installment">
                                        <label for="value" class="col-form-label"> إجمالى المتبقي من كل
                                            الاقساط</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="precent" placeholder="المتبقي من أقساط الفاتورة" name="rest">
                                        <label for="precent" class="col-form-label">المتبقي من أقساط الفاتورة </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="total" placeholder="الاجمالى الشهرى" name="monthly_total">
                                        <label for="total" class="col-form-label"> الاجمالى الشهرى</label>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="n"></textarea>
                                        <label for="n" class="col-sm-4  col-form-label">ملاحظات </label>
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
                            <h3 class="card-title " style="float:right; font-weight:bold;">دفع أقساط العملاء</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                        التاريخ
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                        اسم العميل
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                        رقم الفاتورة
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                        تاريخ الفاتورة
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                        إجمالى
                                                        المتبقى من كل الاقساط </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                        المتبقي من أقساط الفاتورة
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                        الاجمالى الشهرى
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                        ملاحظات
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                        عمليات
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payInstallments as $key => $payInstallment)
                                                <tr class="odd">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $payInstallment->date }}</td>
                                                    <td>{{ $payInstallment->clients->name }}</td>
                                                    <td>{{ $payInstallment->invoice_num }}</td>
                                                    <td>{{ $payInstallment->invoice_date }}</td>
                                                    <td>{{ $payInstallment->total_of_all_installment }}</td>
                                                    <td>{{ $payInstallment->rest }}</td>
                                                    <td>{{ $payInstallment->monthly_total }}</td>
                                                    <td>{{ $payInstallment->notes }}</td>
                                                    <td>
                                                        <a href="{{ route('payInstallment.edit', $payInstallment->id) }}" class="btn bg-secondary"><i class="far fa-edit" aria-hidden="true"></i></a>
                                                        <a href="{{ route('payInstallment.destroy', $payInstallment->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
    </div><!-- /.content-header -->
</div><!-- /.content-wrapper -->
@endsection
