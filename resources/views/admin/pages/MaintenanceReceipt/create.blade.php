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
                            <form class="form-horizontal" action="{{ route('maintenanceRequest.store') }}" method="POST">
                                @csrf
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
                                                <option value="">اختر المخزن</option>
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
                                            aria-hidden="true"></i></button>

                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>

                {{-- end card --}}
                {{-- start card table --}}
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;"> استلام الصيانة من العميل
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1"
                                                class="table table-bordered table-striped dataTable dtr-inline"
                                                aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <td></td>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            رقم الايصال</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            اسم الصنف </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            اسم العميل </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            تليفون العميل </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            تاريخ الاستلام</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            تاريخ التسليم </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            المستلم </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            شكوي العميل</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($maintenanceRequests as $key => $maintenanceRequest)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $maintenanceRequest->receipt_num }}</td>
                                                            <td>{{ $maintenanceRequest->items->name }}</td>
                                                            <td>{{ $maintenanceRequest->clients->name }}</td>
                                                            <td>{{ $maintenanceRequest->client_tel }}</td>
                                                            <td>{{ $maintenanceRequest->date_from }}</td>
                                                            <td>{{ $maintenanceRequest->date_to }}</td>
                                                            <td>{{ $maintenanceRequest->engineers->name }}</td>
                                                            <td>{{ $maintenanceRequest->problem }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('maintenanceRequest.edit', $maintenanceRequest->id) }}"
                                                                        class="text-white"><i class="far btn fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('maintenanceRequest.destroy', $maintenanceRequest->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        onclick="return confirm('Are you sure?')"
                                                                        class="btn btn-danger"><i
                                                                            class="fas fa-trash-alt"></i> </button>
                                                                </form>
                                                                {{-- <button type="submit" class="btn  "><i class="fas fa-toolbox text-success"></i></button> --}}
                                                                <button type="submit" class="btn"
                                                                    data-toggle="modal" data-target="#Modal1"> <img
                                                                        src="{{ asset('public/assets/dist/img/worker (1).png') }}"
                                                                        alt="" title="تسليم الصيانة للمهندس"
                                                                        class=" brand-image  "></button>
                                                                <button type="submit" class="btn"
                                                                    data-toggle="modal" data-target="#Modal3"> <img
                                                                        src="{{ asset('public/assets/dist/img/switch.png') }}"
                                                                        alt="" title="التحويل من مهندس الى اخر"
                                                                        class=" brand-image  "></button>
                                                                <button type="submit" class="btn"
                                                                    data-toggle="modal" data-target="#Modal2"> <img
                                                                        src="{{ asset('public/assets/dist/img/repair.png') }}"
                                                                        alt="" title="استلام الصيانة من المهندس"
                                                                        class=" brand-image "></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                {{-- end table --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end card table --}}
                <!-- Modal تسليم الصيانة للمهندس-->
                <div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="row ">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card" style="width: 120%">
                                    <div class="card-header header-bg">
                                        <h3 class="card-title header-title"> تسليم الصيانة للمهندس </h3>
                                    </div>
                                    <!-- /.card-header -->

                                    <!-- form start -->
                                    <form class="form-horizontal" action="" method="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4 form-floating">
                                                    <label for="engineer" class="col-sm-4 col-form-label">اسم
                                                        المهندس
                                                    </label>
                                                    <div class="col-sm-8 ">
                                                        <input type="text" class="form-control" id="engineer"
                                                            placeholder="" name="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 form-floating">
                                                    <label for="Delivery" class="col-sm-4  col-form-label"> تاريخ
                                                        التسليم للمهندس</label>
                                                    <div class="col-sm-8">
                                                        <input type="datetime-local" class="form-control" id="Delivery"
                                                            name="birthdaytime">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn bg-success-2 mr-3">
                                                <i class="fa fa-check text-light" aria-hidden="true"></i>
                                            </button>
                                            <button type="reset" class="btn bg-secondary">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- Modal استلام الصيانة من المهندس-->
                <div class="modal fade" id="Modal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="row ">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card" style="width: 150%">
                                    <div class="card-header header-bg">
                                        <h3 class="card-title header-title"> إستلام الصيانة من المهندس </h3>
                                    </div>
                                    <!-- /.card-header -->

                                    <!-- form start -->
                                    <form class="form-horizontal" action="" method="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="col-sm-4 form-floating">
                                                        <label for="engineer" class="col-sm-5 col-form-label">اسم
                                                            المهندس
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="engineer"
                                                                placeholder="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-floating">
                                                        <label for="result" class="col-sm-5 col-form-label">النتيجة
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control" name="" id="result">
                                                                <option> لم يوفق</option>
                                                                <option> ليس لة حل</option>
                                                                <option> تم التصليح</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-floating">
                                                        <label for="Delivery" class="col-sm-5 col-form-label">
                                                            تاريخ
                                                            الاستلام</label>
                                                        <div class="col-sm-7">
                                                            <input type="datetime-local" class="form-control"
                                                                id="Delivery" name="birthdaytime">
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="col-sm-4 form-floating">
                                                        <label for="bons" class="col-sm-5 col-form-label">
                                                            بونص المهندس
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <input type="number" class="form-control" id="bons"
                                                                placeholder="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-floating">
                                                        <label for="" class="col-sm-5 col-form-label">
                                                            التكلفة
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <input type="number" class="form-control" id=""
                                                                placeholder="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-floating">
                                                        <label for="note" class="col-sm-5 col-form-label">ملحوظة
                                                        </label>
                                                        <div class="col-sm-7">
                                                            <textarea class="form-control" rows="2" placeholder="Enter ..." name="notes" id="note"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="reset" class="btn  bg-danger mr-3"><i
                                                    class="fas fa-undo"></i>
                                            </button>
                                            <button type="submit" class="btn  bg-success"><i
                                                    class="fa fa-check text-light" aria-hidden="true"></i></button>
                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- Modal  التحويل من مهندس لاخر-->
                <div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="row ">
                            <div class="col-sm-12 col-lg-12">
                                <div class="card" style="width: 120%">
                                    <div class="card-header header-bg">
                                        <h3 class="card-title header-title"> التحويل من مهندس لاخر </h3>
                                    </div>
                                    <!-- /.card-header -->

                                    <!-- form start -->
                                    <form class="form-horizontal" action="" method="">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="col-sm-4 form-floating">
                                                        <label for="from" class="col-sm-4 col-form-label">التحويل من
                                                            المهندس

                                                        </label>
                                                        <div class="col-sm-8 ">
                                                            <input type="text" class="form-control" id="from"
                                                                placeholder="" name="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 form-floating">
                                                        <label for="to" class="col-sm-4  col-form-label">إلى المهندس
                                                        </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="to" name="">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button type="reset" class="btn  bg-danger mr-3"><i
                                                    class="fas fa-undo"></i>
                                            </button>
                                            <button type="submit" class="btn  bg-success"><i
                                                    class="fa fa-check text-light" aria-hidden="true"></i></button>

                                        </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
