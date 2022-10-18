@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card ">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title">تسوية كميات المخزن</h3>
                        </div>
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        @foreach($totals as $total)
                        <div class="card-body">
                            {{-- row 1 --}}
                            <div class="row mb-3">
                                <div class="col-sm-4 form-floating">
                                    <input type="date" class="form-control" placeholder="التاريخ" name="date"
                                        value='{{$total->date}}'>
                                    <label for="date" class="col-form-label info">التاريخ </label>
                                </div>
                                <div class="col-sm-4 form-floating">
                                    <select required class="form-control store" name="store_id" id="store_id">
                                        <option value="">{{$total->stores->name}} </option>
                                    </select>
                                    <label for="namestore" class="col-form-label">اسم المخزن</label>
                                </div>
                                <div class="col-sm-4 form-floating">
                                    <textarea class="form-control" rows="3" id="note" placeholder="ملاحظات ..."
                                        name="note"></textarea>
                                    <label for="note" class=" col-form-label info">ملاحظات </label>
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
                                    @foreach(App\Models\EqualizQuantite::where('total_id', $total->id)->get(); as
                                    $equalizQuantite )
                                    <tr>
                                        <td style="width: 30%;">
                                            <select required class="form-control items_id">
                                                <option value="">{{$equalizQuantite->items->name}} </option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control quantity" id="quantity0"
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
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
@endsection
