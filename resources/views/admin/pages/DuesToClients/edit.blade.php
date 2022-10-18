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
                                <h3 class="card-title header-title"> استحقاقات علي العملاء </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('duesToClient.update', $duesToClients->id) }}"
                                method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="client_id" id="customer">
                                                <option value="">اختر العميل</option>
                                                @foreach ($clients as $key => $client)
                                                    <option value="{{ $client->id }}"
                                                        @if ($duesToClients->client_id == $client->id) selected @endif>
                                                        {{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customer" class="col-form-label">اسم
                                                العميل</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" value="{{ $duesToClients->amount }}"
                                                id="mon" placeholder="المبلغ" name="amount">
                                            <label for="mon" class="col-form-label">المبلغ </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" value="{{ $duesToClients->date }}"
                                                id="date" placeholder=" تاريخ الاستحقاق" name="date">
                                            <label for="date" class="col-form-label"> تاريخ الاستحقاق </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note">{{ $duesToClients->notes }}</textarea>
                                            <label for="note" class="col-form-label">ملاحظات</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="reset" class="btn bg-danger mr-3"><i class="fas fa-undo"></i>
                                    </button>
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
