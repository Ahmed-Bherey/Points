@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card ">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title"> إشعار خصم وأضافة لمورد </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('discountAddNotification.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" plac="" id="Notice"
                                            name="discountAddNotification_type">
                                            <option value="">اختر نوع الشعار</option>
                                            <option value="1">خصم</option>
                                            <option value="2">إضافة</option>
                                        </select>
                                        <label for="Notice" class="col-form-label"> نوع الاشعار</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" plac="" id="suppler" name="supplier_id">
                                            <option value="">اختر اسم المورد</option>
                                            @foreach($suppliers as $key => $supplier)
                                            <option value="{{ $supplier->id }}">{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="suppler" class="col-form-label"> اسم المورد </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="date"
                                            placeholder="التاريخ" name="date">
                                        <label for="date" class="col-sm-3 col-form-label"> التاريخ
                                        </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="money" placeholder="المبلغ"
                                            name="amount">
                                        <label for="money" class="col-form-label"> المبلغ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="prevaccount"
                                            placeholder=" الرصيد السابق" name="last_balance">
                                        <label for="prevaccount" class="col-form-label"> الرصيد السابق
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="البيان ..." name="notes"
                                            id="note"></textarea>
                                        <label for="note" class="col-form-label">
                                            البيان</label>
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
            {{-- start table card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card border border-1 mt-3 bg-light">
                        <div class="card-header">
                            <h3 class="card-title "> إشعار خصم واضافة لمورد </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline no-footer"
                                            aria-describedby="example1_info" role="grid">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="example1" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        اسم المورد</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        نوع الاشعار</th>
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
                                                        المبلغ</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($discountAddNotifications as $key => $discountAddNotification)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{$discountAddNotification->suppliers->name}}</td>
                                                    <td>
                                                        @if($discountAddNotification->discountAddNotification_type == 1)
                                                        خصم
                                                        @else
                                                        إضافة
                                                        @endif
                                                    </td>
                                                    <td>{{$discountAddNotification->date}}</td>
                                                    <td>{{$discountAddNotification->last_balance}}</td>
                                                    <td>{{$discountAddNotification->amount}}</td>
                                                    <td>
                                                        <a href="{{ route('discountAddNotification.edit', $discountAddNotification->id) }}"
                                                            class="btn bg-secondary"><i class="far fa-edit"
                                                                aria-hidden="true"></i></a>
                                                        <a href="{{ route('discountAddNotification.destroy', $discountAddNotification->id) }}"
                                                            onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
            <!-- /.card-body -->
        </div>
    </div>
</div>
{{-- end table card --}}
</div><!-- /.container-fluid -->
</div><!-- /.content-header -->
</div>
@endsection
