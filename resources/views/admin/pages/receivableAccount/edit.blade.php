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
                            <div class="card-header">
                                <h3 class="card-title" style="float: right"> جارى حسابات الذمم المختلفة </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('receivableAccount.update', $receivableAccounts->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control"
                                                value="{{ $receivableAccounts->name }}" id="name" placeholder="الاسم"
                                                name="name" required>
                                            <label for="name" class="col-form-label">الاسم </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required class="form-control" name="process" id="process">
                                                <option value>Select Process</option>
                                                <option value="1" @if ($receivableAccounts->process == 1) selected @endif> إضافة
                                                    مديونية</option>
                                                <option value="2" @if ($receivableAccounts->process == 2) selected @endif>سداد
                                                    مديونية </option>
                                            </select>
                                            <label for="process" class="col-form-label">المعاملة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control"
                                                value="{{ $receivableAccounts->amount }}" id="mon" placeholder="المبلغ"
                                                name="amount">
                                            <label for="mon" class="col-form-label">المبلغ</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control"
                                                value="{{ $receivableAccounts->date }}" id="date" placeholder="التاريخ"
                                                name="date">
                                            <label for="date" class="col-form-label">التاريخ
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                                id="note">{{ $receivableAccounts->notes }}</textarea>
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
                {{-- end card --}}
                {{-- start card table --}}
                {{-- end card table --}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
