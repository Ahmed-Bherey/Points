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
                            <h3 class="card-title header-title"> التحويل من مخزن لاخر </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('transfer.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                            name="date" value="{{date('Y-m-d')}}" required>
                                        <label for="date" class="col-form-label">التاريخ </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control drop" name="storeFrom_id" id="store_id">
                                            <option value="">اختر المخزن</option>
                                            @foreach ($storesFrom as $storeFrom)
                                            <option value="{{ $storeFrom->id }}">{{ $storeFrom->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="movefrom" class="col-form-label">الترحيل من </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control drop " name="storeTo_id" id="movefrom">
                                            <option value="">اختر المخزن</option>
                                            @foreach ($storesTo as $storeTo)
                                            <option value="{{ $storeTo->id }}">{{ $storeTo->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="moveto" class="col-form-label">الترحيل الى </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>اسم الصنف</th>
                                            <th> الوحده</th>
                                            <th>الكمية</th>
                                            <th>السعر</th>
                                            <th>العملية</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr>
                                            <td style=" width: 25%;">
                                                <select required class="form-control" name="data[item_id][]"
                                                    id="item_id">
                                                    <option value="">اختر الصنف</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control unit_id" name="data[unit_id][]"
                                                    id="namestore">
                                                    <option>اختر الوحدة</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="qu" placeholder="الكمية"
                                                    name="data[quantity][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" placeholder="السعر">
                                            </td>
                                            <td>
                                                <button type="button" class="btn bg-success" id="add">
                                                    <i class="fas fa-plus-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> التحويل من مخزن لاخر</h3>
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
                                                    <td>#</td>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        التاريخ </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        الترحيل من </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        الترحيل الى </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        عمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($totals as $key => $total)
                                                <tr class="odd">
                                                    <td>{{$loop->iteration}}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $total->date }}</td>
                                                    <td>{{ $total->storeFrom->name }}</td>
                                                    <td>{{ $total->storeTo->name }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <button type="submit" class="btn bg-secondary ">
                                                            <a href="{{ route('transfer.edit', $total->id) }}"
                                                                class="text-white"><i class="far fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                        </button>
                                                        <form method="POST"
                                                            action="{{ route('transfer.destroy', $total->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.content-header -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>

<script type="text/javascript">
    $(document).ready(function() {
    $('select[name="storeFrom_id"]').on('change', function() {
        var stateID = $(this).val();
        var csrf = $('meta[name="csrf-token"]').attr('content');

        var route = '{{ route('store.items.ajax',['id' => ':id']) }}';
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
                    $('#item_id').empty();
                    $.each(data, function(key, value) {
                        $('#item_id').append($('<option>', {
                            value: value.id,
                            text: value.items.name
                        }));
                    });
                    $('#item_id').trigger('change');
                }
            });
        } else {
            $('select[name="item_id"]').empty();
        }
    });




    $('select[name="data[item_id][]"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route ='{{ route('transfer.units.ajax', ['id' => ':id', 'store_id' => ':store_id']) }}';
                route = route.replace(':id', stateID).replace(':store_id', $('#store_id option:selected')
                    .val());
                if (stateID) {
                    $.ajax({
                        beforeSend: function(x) {
                            return x.setRequestHeader('X-CSRF-TOKEN', csrf);
                        },
                        url: route,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('.unit_id').empty();
                            $.each(data, function(key, value) {
                                $('.unit_id').append($(`<option>`, {
                                    value: value.id,
                                    text: value.units.name,
                                }));
                            });
                            $('.unit_id').trigger('change');
                        }
                    });
                } else {
                    $('select[name="unit_id"]').empty();
                }
            });
});
</script>
<script>
    var $drops = $('.drop');
        $drops.change(function () {
        $drops.find("option").show();
        $drops.each(function(index, el) {
            var val = $(el).val();
            if (val) {
            var $other = $drops.not(this);
            $other.find("option[value=" + $(el).val() + "]").hide();
            }
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection
