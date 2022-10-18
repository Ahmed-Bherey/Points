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
                            <h3 class="card-title header-title">تقرير اذن صرف اصناف</h3>
                        </div>
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('cashpremission.show') }} " method="Get">
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating mb-3">
                                        <input type="date" class="form-control" id="date" name="dateFrom">
                                        <label for="date" class="col-form-label">من</label>
                                    </div>
                                    <div class="col-sm-4 form-floating mb-3">
                                        <input type="date" class="form-control" id="date" name="dateTo">
                                        <label for="date" class="col-form-label">الى</label>
                                    </div>
                                    <div class="col-sm-4 form-floating mb-3">
                                        <select required class="form-control" name="store_id" id="customar">
                                            <option value="">اختر المخزن</option>
                                            @foreach($stores as $key => $store)
                                            <option value="{{ $store->id }}">{{$store->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="customar" class="col-form-label">اسم المخزن</label>
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
