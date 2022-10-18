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
                        <form class="form-horizontal"
                            action="{{route('discountAddNotification.update', $discountAddNotifications->id)}}"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" plac="" id="Notice"
                                            name="discountAddNotification_type">
                                            <option value="">اختر نوع الشعار</option>
                                            <option value="1" @if ($discountAddNotifications->
                                                discountAddNotification_type == 1) selected @endif>خصم</option>
                                            <option value="2" @if ($discountAddNotifications->
                                                discountAddNotification_type == 2) selected @endif>إضافة</option>
                                        </select>
                                        <label for="Notice" class="col-form-label"> نوع الاشعار</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" plac="" id="suppler" name="supplier_id">
                                            <option value="">اختر اسم المورد</option>
                                            @foreach($suppliers as $key => $supplier)
                                            <option value="{{ $supplier->id }}" @if ($discountAddNotifications->
                                                supplier_id == $supplier->id) selected @endif>{{$supplier->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="suppler" class="col-form-label"> اسم المورد </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control"
                                            value="{{$discountAddNotifications->date}}" id="date" placeholder="التاريخ"
                                            name="date">
                                        <label for="date" class="col-sm-3 col-form-label"> التاريخ
                                        </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$discountAddNotifications->amount}}" id="money"
                                            placeholder="المبلغ" name="amount">
                                        <label for="money" class="col-form-label"> المبلغ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control"
                                            value="{{$discountAddNotifications->last_balance}}" id="prevaccount"
                                            placeholder=" الرصيد السابق" name="last_balance">
                                        <label for="prevaccount" class="col-form-label"> الرصيد السابق
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="البيان ..." name="notes"
                                            id="note">{{$discountAddNotifications->notes}}</textarea>
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
            <!-- /.card-body -->
        </div>
    </div>
</div>
{{-- end table card --}}
</div><!-- /.container-fluid -->
</div><!-- /.content-header -->
</div>
@endsection
