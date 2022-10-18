@extends('admin.layouts.includes.master')

@section('content')
<script src="{{ asset('public/assets/plugins/jquery/jquery.min.js') }}"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card card-info">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title"> الهالك </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('damge.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                            name="date">
                                        <label for="date" class="col-form-label">التاريخ </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="store_id" id="store_id">
                                            <option value="">اختر المخزن</option>
                                            @foreach ($stores as $store)
                                            <option value="{{ $store->id }}"> {{ $store->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="namestore" class="col-form-label">اسم المخزن</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="note"
                                            id="note"></textarea>
                                        <label for="note" class=" col-form-label">ملاحظات </label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>اسم الصنف</th>
                                            <th>الوحدة</th>
                                            <th>الكمية</th>
                                            <th>السعر</th>
                                            <th>العملية</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        <tr>
                                            <td style=" width: 25%;">
                                                <select class="form-control items_id"
                                                    onchange="selectValue('items_id0',0)" name="data[items_id][]"
                                                    id="items_id0">
                                                    <option>اختر الصنف</option>
                                                </select>
                                            </td>
                                            <td style=" width: 25%;">
                                                <select class="form-control unit_id" name="data[unit_id][]"
                                                    id="namestore">
                                                    <option>اختر الوحدة</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="quantity0"
                                                    placeholder="الكمية" name="data[quantity][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[price][]"
                                                    placeholder="السعر">
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
                            <h3 class="card-title">الهالك</h3>
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
                                                        # </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        التاريخ </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        المخزن </th>
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
                                                @foreach ($totals as $total)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $loop->iteration }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $total->date }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $total->stores->name }}</td>
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $total->note }}</td>
                                                    <td class="d-flex justify-content-center">
                                                        <button type="submit" class="btn bg-info">
                                                            <a href="{{ route('damge.edit', $total->id) }}"
                                                                class="text-white"><i class="fas fa-eye"></i></a>
                                                        </button>
                                                        <form method="post"
                                                            action="{{ route('damge.destroy', $total->id) }}">
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
                        </div>
                    </div>
                </div>
            </div>
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
{{-- <script>
    let add = document.getElementById('add'),
        tbody = document.getElementById('tbody');

        add.addEventListener(('click'), () => {
            var new_row = document.createElement('tr')
            // new_row.classList.add('row')
            // new_row.classList.add('mb-3')
            // new_row.classList.add('align-items-center')
            new_row.innerHTML =
                `<td>
                    <input type="number" class="form-control" id="" placeholder="الكود"
                        name="">
                </td>
                <td style=" width: 25%;">
                    <select class="form-control" name="item_id" id="namestore">
                        <option>اختر الصنف</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td style=" width: 25%;">
                    <select class="form-control" name="unit_id" id="namestore">
                        <option>Select Unit</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}"> {{ $unit->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" id="qu" placeholder="الكمية"
                        name="quantity">
                </td>
                <td>
                    <input type="number" class="form-control" placeholder="السعر">
                </td>
                <td>
                    <button type="button" class="btn bg-danger" onclick='delet(this)'>
                        <i class="fas fa-trash-alt text-light"></i>
                    </button>
                </td>`;
            tbody.appendChild(new_row)
        })
        function delet (ele) {
            ele.parentElement.parentElement.remove()
        }
</script> --}}
<script>
    $(document).ready(function() {
            $('select[name="store_id"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('damge.item.ajax', ['id' => ':id']) }}';
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
                            $('.items_id').empty();
                            $.each(data, function(key, value) {
                                $('.items_id').append($(`<option>`, {
                                    value: value.id,
                                    text: value.items.name,
                                    class: value.amount
                                }));
                            });
                            $('.items_id').trigger('change');
                        }
                    });
                } else {
                    $('select[name="data[items_id][]"]').empty();
                }
            });


        $('select[name="data[items_id][]"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route ='{{ route('damge.units.ajax', ['id' => ':id', 'store_id' => ':store_id']) }}';
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
@endsection
