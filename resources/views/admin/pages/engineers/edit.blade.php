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
                                <h3 class="card-title header-title"> المهندسين </h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('engineer.update', $engineers->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" value="{{ $engineers->name }}"
                                                id="engineer" placeholder="اسم المهندس" name="name">
                                            <label for="engineer" class="col-form-label">اسم المهندس </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" value="{{ $engineers->address }}"
                                                id="address" placeholder="العنوان" name="address">
                                            <label for="address" class="col-form-label">العنوان</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required="required" class="form-control" name="store_id" id="store">
                                                <option value="">المخزن الرئيسى</option>
                                                @foreach ($stores as $key => $store)
                                                    <option value="{{ $store->id }}"
                                                        @if ($engineers->store_id == $store->id) selected @endif>
                                                        {{ $store->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="store" class="col-form-label">المخزن/الفرع</label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" value="{{ $engineers->tel }}"
                                                id="tel" placeholder="التليفون" name="tel">
                                            <label for="tel" class="col-form-label">التليفون
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" value="{{ $engineers->rate }}"
                                                id="percent" placeholder="نسبة العمولة" name="rate">
                                            <label for="percent" class="col-form-label">نسبة العمولة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                                id="note">{{ $engineers->notes }}</textarea>
                                            <label for="note" class="col-form-label">ملاحظات</label>
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
