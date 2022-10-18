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
                            <h3 class="card-title header-title">مسحوبات الصنايعية</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('drawal.update' , $drawals->id)}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <select required class="form-control" plac="" name="drawal_id" id="type">
                                            <option value="">اسم الصنايعى</option>
                                            @foreach($industrials as $key => $industrial)
                                            <option value="{{ $industrial->id }}" @if ($drawals->drawal_id ==
                                                $industrial->id) selected @endif>{{$industrial->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" value="{{$drawals->invoice_num}}"
                                            id="tel" placeholder="1" name="invoice_num">
                                        <label for="tel" class="col-sm-4 col-lg-4 col-xl-3 col-form-label"> رقم
                                            الفاتورة </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" value="{{$drawals->withdrawal_value}}"
                                            id="value" placeholder="1" name="withdrawal_value">
                                        <label for="value" class="col-sm-4 col-xl-3 col-form-label">قيمة
                                            المسحوبات</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="date" class="form-control" value="{{$drawals->date}}" id="date"
                                            placeholder="1" name="date">
                                        <label for="date" class="col-sm-4 col-lg-4 col-xl-3 col-form-label">التاريخ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="date" class="form-control" value="{{$drawals->invoice_date}}"
                                            id="date" placeholder="1" name="invoice_date">
                                        <label for="date" class="col-sm-4 col-lg-4 col-xl-3 col-form-label"> تاريخ
                                            الفاتورة </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn bg-danger mr-3"><i class="fas fa-undo"></i></button>
                        <button type="submit" class="btn bg-success"><i class="fa fa-check text-light"
                                aria-hidden="true"></i></button>
                    </div>
                    <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        {{-- end card --}}
        {{-- start card table --}}
        {{-- end card table --}}
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
</div>
@endsection
