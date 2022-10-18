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
                                <h3 class="card-title header-title"> إستلام الصيانة من العميل </h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal"
                                action="{{ route('maintenanceRequest.update', $maintenanceRequests->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select required="required" class="form-control" name="item_id"
                                                id="recipient">
                                                <option value="">اختر الصنف</option>
                                                @foreach ($items as $key => $item)
                                                    <option value={{ $item->id }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="categ" class="col-form-label">اسم الصنف </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="num" placeholder="رقم الايصال "
                                                name="receipt_num">
                                            <label for="num" class="col-form-label">رقم الايصال </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required="required" class="form-control" name="client_id"
                                                id="recipient">
                                                <option value="">اختر العميل</option>
                                                @foreach ($clients as $key => $client)
                                                    <option value={{ $client->id }}>{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customer" class="col-form-label">اسم العميل </label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="tel" placeholder="تليفون العميل"
                                                name="client_tel">
                                            <label for="tel" class="col-form-label">تليفون العميل </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="address"
                                                placeholder="عنوان العميل" name="address">
                                            <label for="address" class="col-form-label">عنوان
                                                العميل</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required="required" class="form-control" name="store_id"
                                                id="recipient">
                                                <option value="">اختر المخزن </option>
                                                @foreach ($stores as $key => $store)
                                                    <option value={{ $store->id }}>{{ $store->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="store" class="col-form-label">
                                                المخزن/الفرع </label>
                                        </div>
                                    </div>
                                    {{-- row 3 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="datetime-local" class="form-control" id="receipt"
                                                placeholder="تاريخ ووقت الاستلام " name="date_from">
                                            <label for="receipt" class="col-form-label">تاريخ
                                                ووقت الاستلام </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="datetime-local" class="form-control" id="date"
                                                placeholder="تاريخ ووقت التسليم" name="date_to">
                                            <label for="date" class="col-form-label"> تاريخ ووقت
                                                التسليم</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select required="required" class="form-control" name="engineer_id"
                                                id="recipient">
                                                <option value="">Select Engineer</option>
                                                @foreach ($engineers as $key => $engineer)
                                                    <option value={{ $engineer->id }}>{{ $engineer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="recipient" class="col-form-label"> المستلم </label>
                                        </div>
                                    </div>
                                    {{-- row 4 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="brand" placeholder="الماركة"
                                                name="brand">
                                            <label for="brand" class="col-form-label">الماركة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="model" placeholder="الموديل"
                                                name="model">
                                            <label for="model" class="col-form-label">الموديل
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="rapair_place"
                                                placeholder=" مكان الاصلاح" name="rapair_place">
                                            <label for="rapair_place" class="col-form-label">
                                                مكان الاصلاح</label>
                                        </div>
                                    </div>
                                    {{-- row 5 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="serial"
                                                placeholder="سيريال الجهاز" name="serial">
                                            <label for="serial" class="col-form-label">سيريال الجهاز </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="capacity"
                                                placeholder="قدرة الجهاز" name="capacity">
                                            <label for="capacity" class="col-form-label">قدرة الجهاز </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="problem" placeholder="المشكلة"
                                                name="problem">
                                            <label for="problem" class="col-form-label"> المشكلة
                                            </label>
                                        </div>
                                    </div>
                                    {{-- row 5 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" step=".01" id="cost"
                                                placeholder="التكلفة القصوى" name="max_cost">
                                            <label for="cost" class="col-form-label">التكلفة القصوى </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="شكوي العميل ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">شكوي العميل </label>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" onclick="history.back()" class="btn  bg-danger mr-3"><i
                                            class="fas fa-undo"></i> </button>
                                    <button type="submit" class="btn  bg-success "><i class="fa fa-check text-light"
                                            aria-hidden="true"></i>
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
                <!-- Modal تسليم الصيانة للمهندس-->

                <!-- Modal استلام الصيانة من المهندس-->

                <!-- Modal  التحويل من مهندس لاخر-->

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
