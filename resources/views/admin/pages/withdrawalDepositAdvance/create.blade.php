@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header header-bg">
                            <h3 class="card-title" style="float: right"> سحب وإيداع السلف </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('withdrawalDepositAdvance.store')}}"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="borrowerData_id" id="name">
                                            <option value="">اختر صاحب السلفة</option>
                                            @foreach($borrowersData as $key => $borrowerData)
                                            <option value="{{ $borrowerData->id }}">{{ $borrowerData->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="name" class="col-form-label">الاسم </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="date"
                                            placeholder="التاريخ" name="date">
                                        <label for="date" class="col-form-label"> التاريخ </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="mon" placeholder="المبلغ"
                                            name="amount">
                                        <label for="mon" class="col-form-label"> المبلغ </label>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select class="form-control" id="safe" name="treasury_id">
                                            <option value="">اختر الخزينة</option>
                                            @foreach($treasuries as $key => $treasury)
                                            <option value="{{$treasury->id}}">{{$treasury->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="safe" class="col-form-label"> الخزينة </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select class="form-control" name="bank_id" id="bank">
                                            <option value="">اختر البنك</option>
                                            @foreach($banks as $key => $bank)
                                            <option value="{{ $bank->id }}">{{$bank->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="bank" class="col-form-label"> البنك </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="borrower_order" id="person">
                                            <option value="">اختر صاحب السلفة</option>
                                            <option value="1">موظف</option>
                                            <option value="2">غير موظف</option>
                                        </select>
                                        <label for="person" class="col-form-label"> صاحب السلفة </label>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" id="process" name="process_type">
                                            <option value="">اختر نوع العملية</option>
                                            <option value="1">سحب</option>
                                            <option value="2">إيداع</option>
                                        </select>
                                        <label for="process" class="col-form-label"> نوع العملية </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="rest" placeholder=" باقى علية"
                                            name="rest">
                                        <label for="rest" class="col-form-label"> باقى علية</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                            id="note"></textarea>
                                        <label for="note" class="col-form-label">ملاحظات</label>
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
                <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float:right; font-weight:bold;"> سحب وإيداع السلف </h3>
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
                                                        الاسم </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        نوع السالف</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending"> نوع
                                                        العملية</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">المبلغ
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">باقى
                                                        علية</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        ملاحظات</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($withdrawalDepositAdvances as $key =>
                                                $withdrawalDepositAdvance)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{$withdrawalDepositAdvance->borrowersData->name}}</td>
                                                    <td>
                                                        @if($withdrawalDepositAdvance->borrower_order == 1)
                                                        موظف
                                                        @else
                                                        غير موظف
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($withdrawalDepositAdvance->process_type == 1)
                                                        سحب
                                                        @else
                                                        ايداع
                                                        @endif
                                                    </td>
                                                    <td>{{$withdrawalDepositAdvance->amount}}</td>
                                                    <td>{{$withdrawalDepositAdvance->rest}}</td>
                                                    <td>{{$withdrawalDepositAdvance->notes}}</td>
                                                    <td>
                                                        <a href="{{route('withdrawalDepositAdvance.edit' , $withdrawalDepositAdvance->id)}}"
                                                            type="submit" class="btn bg-secondary"><i
                                                                class="far fa-edit" aria-hidden="true"></i></a>
                                                        <a href="{{route('withdrawalDepositAdvance.destroy', $withdrawalDepositAdvance->id)}}"
                                                            type="submit" onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            {{-- end table --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->
</div>{{-- content-wrapper --}}
@endsection
