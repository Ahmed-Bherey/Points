@extends('admin.layouts.includes.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
                        <form class="form-horizontal" action="{{ route('damge.update' , $totals->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{$totals->date}}" id="date"
                                            placeholder="التاريخ" name="date">
                                        <label for="date" class="col-form-label">التاريخ </label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select class="form-control" name="store_id" id="store_id">
                                            <option>اختر المخزن</option>
                                            @foreach ($stores as $store)
                                            <option value="{{ $store->id }}" @if ($totals->store_id == $store->id)
                                                selected @endif> {{ $store->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="namestore" class="col-form-label">اسم المخزن</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="note"
                                            id="note">{{$totals->note}}</textarea>
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
                                        @foreach($damges as $key => $damge)
                                        <tr>
                                            <td style=" width: 25%;">
                                                <select class="form-control items_id"
                                                    onchange="selectValue('items_id0',0)" name="data[items_id][]"
                                                    id="items_id0">
                                                    {{-- @if ($damge->item_id !="")
                                                    <option value="{{$damge->item_id}}">{{$damge->items->name}}</option>
                                                    @endif --}}
                                                    <option value="">اختر الصنف</option>
                                                </select>
                                            </td>
                                            <td style=" width: 25%;">
                                                <select class="form-control unit_id" name="data[unit_id][]"
                                                    id="namestore">
                                                    @if ($damge->unit_id !="")
                                                    <option value="{{$damge->unit_id}}">{{$damge->units->name}}</option>
                                                    @endif
                                                    <option value="">اختر الوحدة</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" value="{{$damge->quantity}}"
                                                    id="quantity0" placeholder="الكمية" name="data[quantity][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" value="{{$damge->price}}"
                                                    name="data[price][]" placeholder="السعر">
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
</script>
@endsection
