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
                                <h3 class="card-title header-title"> إستلام الصيانة من المهندس </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('receiptFrom.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="text" class="form-control" id="engineer"
                                                placeholder="اسم المهندس" name="name">
                                            <label for="engineer" class="col-form-label">اسم المهندس</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="result" id="result">
                                                <option> لم يوفق</option>
                                                <option> ليس لة حل</option>
                                                <option> تم التصليح</option>
                                            </select>
                                            <label for="result" class="col-form-label">النتيجة
                                            </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="datetime-local" class="form-control" placeholder="تاريخ الاستلام"
                                                id="Delivery" name="date">
                                            <label for="Delivery" class="col-form-label"> تاريخ
                                                الاستلام</label>
                                        </div>
                                    </div>
                                    {{-- row 2 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" step=".01" id="bons"
                                                placeholder=" بونص المهندس " name="tip">
                                            <label for="bons" class="col-form-label"> بونص المهندس </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" step=".01" id=""
                                                placeholder="التكلفة" name="cost">
                                            <label for="" class="col-form-label"> التكلفة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="2" placeholder="ملحوظة ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-form-label">ملحوظة
                                            </label>
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
                <div class="row mt-1">
                    <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="float:right; font-weight:bold;"> إستلام الصيانة من
                                    المهندس
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
                                                            اسم المهندس </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            بونص المهندس</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            التكلفة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            النتيجة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            تاريخ الاستلام من المهندس</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            ملحوظة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($receipts as $key => $receipt)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $receipt->name }}</td>
                                                            <td>{{ $receipt->result }}</td>
                                                            <td>{{ $receipt->date }}</td>
                                                            <td>{{ $receipt->tip }}</td>
                                                            <td>{{ $receipt->cost }}</td>
                                                            <td>{{ $receipt->notes }}</td>
                                                            <td class="d-flex">
                                                                <button type="submit" class="btn bg-secondary">
                                                                    <a href="{{ route('receiptFrom.edit', $receipt->id) }}"
                                                                        class="text-white"><i class="far btn fa-edit "
                                                                            aria-hidden="true"></i></a>
                                                                </button>
                                                                <form method="post"
                                                                    action="{{ route('receiptFrom.destroy', $receipt->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        onclick="return confirm('Are you sure?')"
                                                                        class="btn btn-danger"><i
                                                                            class="fas fa-trash-alt"></i> </button>
                                                                </form>
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


            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    </div>
@endsection
