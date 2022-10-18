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
                                <h3 class="card-title header-title"> أرصدة البنوك أول المدة</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form action="{{ route('account.update', $accounts->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="bank"
                                                    class="col-sm-3 col-md-3 col-lg-4 col-xl-3 col-form-label">اسم
                                                    البنك</label>
                                                <div class="col-sm-9 col-md-9 col-lg-8 col-xl-9">
                                                    <select required class="form-control" name="bank_id" id="bank">
                                                        <option value="">اختر البنك</option>
                                                        @foreach ($banks as $bank)
                                                            <option value="{{ $bank->id }}"
                                                                @if ($accounts->bank_id == $bank->id) selected @endif>
                                                                {{ $bank->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="mon"
                                                    class="col-sm-3 col-lg-4 col-xl-3 col-form-label">المبلغ</label>
                                                <div class="col-sm-9 col-lg-8 col-xl-9">
                                                    <input type="number" class="form-control"
                                                        value="{{ $accounts->amount }}" id="mon" placeholder=""
                                                        name="amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label for="date"
                                                    class="col-sm-3  col-lg-4 col-xl-3 col-form-label">التاريخ
                                                </label>
                                                <div class="col-sm-9  col-lg-8 col-xl-9">
                                                    <input type="date" class="form-control"
                                                        value="{{ $accounts->date }}" id="date" placeholder=""
                                                        name="date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" onclick="history.back()" class="btn  btn-danger mr-3"><i
                                            class="fas fa-undo"></i>
                                    </button>
                                    <button type="submit" class="btn  bg-success"><i class="fa fa-check text-light"
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
