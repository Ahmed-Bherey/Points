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
                            <h3 class="card-title" style="float: right"> البنوك</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form action="{{ route('bank.update', $banks->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="date" value="{{ $banks->date }}"
                                            placeholder="1" name="date">
                                        <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">التاريخ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" value="{{ $banks->name }}" id="bank"
                                            placeholder="اسم البنك" name="name">
                                        <label for="bank" class="col-form-label">اسم البنك</label>
                                    </div>
                                    <div class="col-sm-4 form-floating mb-3">
                                        <input type="number" class="form-control" value="{{ $banks->amount }}"
                                            id="amount" placeholder="المبلغ" name="amount">
                                        <label for="amount" class="col-form-label">المبلغ</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" value="{{ $banks->commission_rate }}"
                                            id="honest" placeholder="نسبة العمولة " name="commission_rate">
                                        <label for="honest" class="col-form-label">نسبة العمولة </label>
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
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
