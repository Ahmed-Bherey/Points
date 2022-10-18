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
                            <h3 class="card-title" style="float: right"> المصروفات التأسيسية </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('startUpExpense.update' , $startUpExpenses->id)}}"
                            method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{$startUpExpenses->date}}"
                                            id="date" placeholder="" name="date">
                                        <label for="date" class="col-form-label">التاريخ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input required type="text" class="form-control"
                                            value="{{$startUpExpenses->name}}" id="" placeholder="" name="name">
                                        <label for="expense" class="col-form-label">بيان المصروف
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" value="{{$startUpExpenses->amount}}"
                                            id="mon" placeholder="المبلغ" name="amount">
                                        <label for="mon" class="col-form-label">المبلغ</label>
                                    </div>
                                </div>
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4  row p-0 m-0">
                                        <div class="col-sm-6 form-floating">
                                            <select required class="form-control" name="treasury_id" id="safe">
                                                <option value="">اختر الخزينة</option>
                                                @foreach($treasuries as $key => $treasury)
                                                <option value="{{$treasury->id }}" @if ($startUpExpenses->treasury_id ==
                                                    $treasury->id) selected @endif>{{$treasury->name}}</option>
                                                @endforeach
                                            </select>
                                            <label for="safe" class="col-form-label"> الخزينة
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="" placeholder="" name="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder=">ملاحظات ..." name="notes"
                                            id="note">{{$startUpExpenses->notes}}</textarea>
                                        <label for="note" class="col-form-label">ملاحظات
                                        </label>
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
