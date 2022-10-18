@extends('admin.layouts.includes.master')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header header-bg">
                            <h3 class="card-title" style="float: right"> الشيكات </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form action="{{ route('check.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 row m-0 p-0 ">
                                        <div class="col-9 form-floating">
                                            <select required class="form-control" name="name" id="name">
                                                <option value="">اختر صاحب الشيك</option>
                                                <option value="1">عميل</option>
                                                <option value="2">مورد</option>
                                            </select>
                                            <label for="bank" class="col-form-label">صاحب الشيك </label>
                                        </div>
                                        <div class="col-3 form-floating">
                                            <select class="form-control" name="data" id="data">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="bank_id" id="safe">
                                            <option value="">اختر البنك</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="bank" class="col-form-label">اسم البنك
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="account" placeholder="قيمة الشيك"
                                            name="amount">
                                        <label for="process" class="col-form-label">قيمة
                                            الشيك </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="تاريخ الاستحقاق"
                                            name="date">
                                        <label for="date" class="col-sm-3  col-lg-4 col-xl-3 col-form-label">تاريخ
                                            الاستحقاق
                                        </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="number" class="form-control" id="mon" placeholder="رقم الشيك"
                                            name="check_num">
                                        <label for="mon" class="col-form-label">رقم
                                            الشيك</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <input type="text" class="form-control" id="mon" placeholder="لمن يستحق"
                                            name="to">
                                        <label for="mon" class="col-form-label">لمن
                                            يستحق</label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes"
                                            id="note"></textarea>
                                        <label for="note" class="col-form-label">ملاحظات
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">تم السداد </label>
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
            <div class="row mt-1">
                <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="float:right; font-weight:bold;"> الشيكات
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
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        صاحب الشيك </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        اسم البنك </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        رقم الشيك </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        قيمة الشيك </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        تاريخ الاستحقاق </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        لمن يستحق </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        ملاحظات </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($checks as $check)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        @if( $check->name == 1)
                                                        {{$check->clients->name}}
                                                        @else
                                                        {{$check->suppliers->name}}
                                                        @endif
                                                    </td>
                                                    <td>{{ $check->banks->name }}</td>
                                                    <td>{{ $check->check_num }}</td>
                                                    <td>{{ $check->amount }}</td>
                                                    <td>{{ $check->date }}</td>
                                                    <td>{{ $check->to }}</td>
                                                    <td>{{ $check->notes }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <button type="submit" class="btn bg-secondary">
                                                            <a href="{{ route('check.edit', ['check'=>$check->id]) }}"
                                                                class="text-white"><i class="far fa-edit "
                                                                    aria-hidden="true"></i></a>
                                                        </button>
                                                        <form method="POST"
                                                            action="{{ route('check.destroy', $check->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i>
                                                            </button>
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
<script type="text/javascript">
    $(document).ready(function() {
            $('select[name="name"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('check.checkName.ajax',['id'=>':id'])}}';
                route = route.replace(':id', stateID);
                if (stateID) {
                    $.ajax({
                        beforeSend: function(x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#data').empty();
                            $.each(data, function(key, value) {
                                $('#data').append($(`<option>`, {
                                    value: value.id,
                                    text: value.name,
                                }));
                            });
                            $('#data').trigger('change');
                        }
                    });
                } else {
                    $('select[name="data"]').empty();
                }
            });
        });
</script>
@endsection
