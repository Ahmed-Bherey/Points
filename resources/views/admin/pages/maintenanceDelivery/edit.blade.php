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
                                <h3 class="card-title header-title"> تسليم الصيانة للعملاء </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('maintenanceDelivery.update', $maintenances->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="engineer_id" id="result">
                                                <option>Select Engineer</option>
                                                @foreach ($engineers as $engineer)
                                                    <option value="{{ $engineer->id }}">{{ $engineer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="" class="col-form-label"> القائم بالتسلي </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="result" id="result">
                                                <option> لم يوفق</option>
                                                <option> ليس لة حل</option>
                                                <option> تم التصليح</option>
                                            </select>
                                            <label for="result" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">النتيجة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="datetime-local" class="form-control" id="Delivery"
                                                placeholder="تاريخ التسليم" name="date">
                                            <label for="Delivery" class="col-sm-3 col-lg-4 col-xl-3 col-form-label"> تاريخ
                                                التسليم</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="2" placeholder="ملحوظة ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-sm-3 col-lg-4 col-xl-3 col-form-label">ملحوظة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="bons" placeholder="تكلفة الصيانة"
                                                name="maintenance_cost">
                                            <label for="bons" class="col-form-label">
                                                تكلفة الصيانة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="" placeholder="سعر قطع الغيار"
                                                name="price">
                                            <label for="" class="col-form-label">
                                                سعر قطع الغيار
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="" placeholder="الاجمالى"
                                                name="total">
                                            <label for="" class="col-form-label"> الاجمالى </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="" placeholder="المدفوع سابقا"
                                                name="pre_paid">
                                            <label for="" class="col-form-label"> المدفوع سابقا </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="" placeholder="الصافي" name="net">
                                            <label for="" class="col-form-label"> الصافي </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="" placeholder="المدفوع"
                                                name="paid">
                                            <label for="" class="col-form-label"> المدفوع </label>
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
