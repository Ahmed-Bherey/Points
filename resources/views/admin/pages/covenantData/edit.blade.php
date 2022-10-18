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
                                <h3 class="card-title" style="float: right"> بيانات أصحاب العهد </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form action="{{ route('covenantData.update', $covenants->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" value="{{ $covenants->name }}"
                                                id="borrower" placeholder="الاسم" name="name">
                                            <label for="borrower" class="col-form-label">الاسم
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" value="{{ $covenants->address }}"
                                                id="address" placeholder="العنوان" name="address">
                                            <label for="address" class="col-form-label">العنوان</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" value="{{ $covenants->tel }}"
                                                id="tel" placeholder="التليفون" name="tel">
                                            <label for="tel" class="col-form-label">التليفون
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="البيان ..." name="notes"
                                                id="note">{{ $covenants->notes }}</textarea>
                                            <label for="note" class="col-form-label">البيان </label>
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
