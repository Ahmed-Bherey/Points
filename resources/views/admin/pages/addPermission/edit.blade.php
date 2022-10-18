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
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title"> إذن صرف أصناف </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{ route('addPermission.update' , $totals->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                {{-- row 1 --}}
                                <div class="row mb-3">
                                    <div class="col-sm-4 form-floating">
                                        <input type="date" class="form-control" value="{{$totals->date}}"
                                            placeholder="التاريخ" name="date">
                                        <label for="date" class=" col-form-label info">التاريخ</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <select class="form-control store" name="store_id" id="namestore">
                                            <option>اختر مخزن</option>
                                            @foreach ($stStores as $stStore)
                                            <option value="{{ $stStore->id }}" @if ($totals->store_id == $stStore->id)
                                                selected @endif>{{ $stStore->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <label for="namestore" class="col-form-label">اسم المخزن</label>
                                    </div>
                                    <div class="col-sm-4 form-floating">
                                        <textarea class="form-control" rows="3" id="note" placeholder="ملاحظات ..."
                                            name="notes">{{$totals->notes}}</textarea>
                                        <label for="note" class=" col-form-label">ملاحظات</label>
                                    </div>
                                </div>
                                {{-- row 2 --}}
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>اسم الصنف</th>
                                            <th>الكمية</th>
                                            <th>السعر</th>
                                            <th>العملية</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach($addPermissions as $key => $addPermission)
                                        <tr>
                                            <td style=" width: 25%;">
                                                <select name="data[items_id][]" class="form-control drop">
                                                    <option value="">اختر الصنف</option>
                                                    @foreach($items as $item)
                                                    <option value="{{ $item->id }}" @if ($addPermission->items_id ==
                                                        $item->id) selected @endif>{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$addPermission->quantity}}" id="qu" placeholder="الكمية"
                                                    name="data[quantity][]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control"
                                                    value="{{$addPermission->price}}" name="data[price][]"
                                                    placeholder="السعر">
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
            {{-- end card table --}}
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
<script>
    let add = document.getElementById('add'),
    tbody = document.getElementById('tbody');

    add.addEventListener(('click'), () => {
        var new_row = document.createElement('tr')
        // new_row.classList.add('row')
        // new_row.classList.add('mb-3')
        // new_row.classList.add('align-items-center')
        new_row.innerHTML =
            `
            <td style=" width: 30%; ">
                <select name="data[items_id][]" class="form-control drop">
                    <option value="">اختر الصنف</option>
                    @foreach($items as $item)
                    <option value="{{ $item->id }}">{{$item->name}}</option>
                    @endforeach
                </select>
                </td>
                <td>
                    <input type="number" class="form-control" id="qu" placeholder="الكمية"
                    name="data[quantity][]">
                </td>
                <td>
                    <input type="number" class="form-control" name="data[price][]"
                    placeholder="السعر">
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
@endsection
