@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <form class="d-flex m-auto" role="search" type="get" action="{{route('buybill.search.all.Reports')}}">
                <input class="form-control me-2" name="query" type="search" placeholder="بحث عن فاتورة مشتريات"
                    aria-label="Search">
                <button class="btn btn-outline-success" type="submit">بحث</button>
            </form>
        </div>
    </nav>
    @if($buyBillTotals->isEmpty())
    <h4 class="mt-5">لا يوجد نتائج</h4>
    @else
    <div class="row mt-1">
        <div class="col-sm-12 col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="float:right; font-weight:bold;"> فاتورة مشتريات </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                # </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                رقم الفاتورة </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                المخزن </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                التاريخ </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                عمليات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($buyBillTotals as $buyBillTotal)
                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $buyBillTotal->invoice_num }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $buyBillTotal->stores->name }}
                                            </td>
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                {{ $buyBillTotal->date }}
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <button type="submit" class="btn bg-info">
                                                    <a href="{{ route('ReturnedPurchaseEdit.all', $buyBillTotal->id) }}"
                                                        title="مرتجع" class="text-white"><i
                                                            class="fa-solid fa-right-left"></i></a>
                                                </button>
                                                <button type="submit" class="btn bg-secondary">
                                                    <a href="{{ route('buybill.edit', $buyBillTotal->id) }}"
                                                        class="text-white"><i class="far fa-edit"
                                                            aria-hidden="true"></i></a>
                                                </button>
                                                <form method="post"
                                                    action="{{ route('buybill.destroy', $buyBillTotal->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')"
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
    @endif
</div>
@endsection
