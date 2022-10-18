@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <!-- /.row -->
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title">المندوبون</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal"
                            action="{{ route('representative.update', $representatives->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 6 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" id="represent" placeholder="اسم المندوب"
                                            name="name" required>
                                        <label for="represent" class="col-form-label">اسم المندوب</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" id="address" placeholder="العنوان"
                                            name="address">
                                        <label for="address" class=" col-form-label">العنوان</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="target" placeholder="التارجت"
                                            name="target">
                                        <label for="target" class="col-form-label">التارجت</label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" id="active" placeholder="حالة المندوب"
                                            name="status">
                                        <label for="active" class="col-form-label">حالة المندوب</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="tel" placeholder="التليفون"
                                            name="tel">
                                        <label for="tel" class="col-form-label">التليفون</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="mon" placeholder="العمولة"
                                            name="commission">
                                        <label for="mon" class="col-form-label">العمولة</label>
                                    </div>
                                </div>
                                {{-- row 3 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="note"
                                            id="n"></textarea>
                                        <label for="n" class=" col-form-label">ملاحظات </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn bg-success-2 mr-3">
                                    <i class="fa fa-check text-light" aria-hidden="true"></i>
                                </button>
                                <button type="reset" class="btn bg-secondary" onclick="history.back()" type="submit">
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
