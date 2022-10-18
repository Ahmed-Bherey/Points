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
                        <form class="form-horizontal" action="{{ route('transfer.update' ,$totals->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                            name="date" value="{{$totals->date}}" required>
                                        <label for="date" class="col-form-label">التاريخ </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="storeFrom_id" id="store_id">
                                            <option value="">اختر المخزن</option>
                                            @foreach ($storesFrom as $storeFrom)
                                            <option value="{{ $storeFrom->id }}" @if ($totals->storeFrom_id ==
                                                $storeFrom->id)
                                                selected @endif>{{ $storeFrom->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="movefrom" class="col-form-label">الترحيل من </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select required class="form-control" name="storeTo_id" id="movefrom">
                                            <option value="">اختر المخزن</option>
                                            @foreach ($storesTo as $storeTo)
                                            <option value="{{ $storeTo->id }}" @if ($totals->storeTo_id == $storeTo->id)
                                                selected @endif>{{ $storeTo->name }}
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
                                        @foreach($transfers as $key => $transfer)
                                        <tr>
                                            <td style=" width: 25%;">
                                                <select required class="form-control" name="data[item_id][]"
                                                    id="item_id">
                                                    @if ($transfer->item_id != "")
                                                    <option value="{{$transfer->item_id}}">{{$transfer->items->name}}
                                                    </option>
                                                    @endif
                                                    <option value="">اختر الصنف</option>
                                                    @foreach($items as $key => $item)
                                                    <option value="{{ $item->id }}" @if ($transfer->item_id ==
                                                        $item->id) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select required class="form-control" name="data[unit_id][]"
                                                    id="unit_id">
                                                    @if ($transfer->unit_id != "")
                                                    <option value="{{$transfer->unit_id}}">{{$transfer->unites->name}}
                                                    </option>
                                                    @endif
                                                    <option value="">اختر الوحدة</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$transfer->quantity}}" id="qu" placeholder="الكمية"
                                                    name="data[quantity][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" value="" placeholder="السعر">
                                            </td>
                                            <td>
                                                <button type="button" class="btn bg-success" id="add">
                                                    <i class="fas fa-plus-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
        </div>
    </div>
</div>
<script>
    let add = document.getElementById('add'),
        tbody = document.getElementById('tbody');
        add.addEventListener(('click'), () => {
            var new_row = document.createElement('tr')
            new_row.innerHTML =
                `
                        <td style=" width: 25%;">
                            <select required class="form-control" name="data[item_id][]" id="namestore">
                                <option value="">اختر الصنف</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        <select required class="form-control" name="data[unit_id][]" id="unit_id">
                            <option value="">اختر الوحدة</option>
                            @foreach ($units as $unit)
                            @endforeach
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
                    <button type="button" class="btn bg-danger" onclick='delet(this)'>
                        <i class="fas fa-trash-alt text-light"></i>
                    </button>
                </td>`;
            tbody.appendChild(new_row)
        })
        function delet (ele) {
            ele.parentElement.parentElement.remove()
        }
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
                            value: value.item_id,
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
                            $('#unit_id').empty();
                            $.each(data, function(key, value) {
                                $('#unit_id').append($(`<option>`, {
                                    value: value.id,
                                    text: value.units.name,
                                }));
                            });
                            $('#unit_id').trigger('change');
                        }
                    });
                } else {
                    $('select[name="unit_id"]').empty();
                }
            });

});
</script>
@endsection
