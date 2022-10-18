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
                        <div class="card">
                            <div class="card-header header-bg">
                                <h3 class="card-title header-title"> حسابات العملاء </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @include('admin.layouts.alerts.success')
                            @include('admin.layouts.alerts.errors')
                            <form class="form-horizontal" action="{{ route('clientAccount.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="client_id" id="customer">
                                                <option value="">اختر العميل</option>
                                                @foreach ($clients as $key => $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            <label for="customer" class="col-sm-3 col-form-label">اسم العميل</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="tel"
                                                placeholder="رقم الموبايل" name="tel">
                                            <label for="tel" class="col-sm-3 col-form-label">رقم الموبايل </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="receiptnum"
                                                placeholder="رقم الايصال" name="receipt_num">
                                            <label for="receiptnum" class="col-sm-3 col-form-label">رقم الايصال </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="billnum"
                                                placeholder="رقم الفاتورة " name="invoice_num">
                                            <label for="billnum" class="col-sm-3 col-form-label">رقم الفاتورة </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <select class="form-control" name="representative_id" id="customer">
                                                <option value="">اختر مندوب التحصيل</option>
                                                @foreach ($representatives as $key => $representative)
                                                    <option value="{{ $representative->id }}">{{ $representative->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="represent" class="col-sm-3 col-form-label">مندوب التحصل </label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="date" class="form-control" id="date" placeholder="التاريخ"
                                                name="date">
                                            <label for="date" class="col-sm-3 col-form-label"> التاريخ </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating d-flex">
                                            <div class="col-sm-9 form-floating">
                                                <select class="form-control" name="treasury_id" id="customer">
                                                    <option value="">اختر الخزينة</option>
                                                    @foreach ($treasuries as $key => $treasury)
                                                    <option value="{{ $treasury->id }}">{{ $treasury->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="safe" class="col-sm-3 col-form-label"> الخزينة </label>
                                            </div>
                                            <div class="col-sm-3 p-0">
                                                <input type="number" class="form-control" id="balance" placeholder=""
                                                    name="balance">
                                            </div>
                                        </div>
                                        <div class="col-sm-4  d-flex">
                                            <div class="col-sm-9 form-floating">
                                                <select class="form-control" name="bank_id" id="customer">
                                                    <option value="">اختر البنك</option>
                                                    @foreach ($banks as $key => $bank)
                                                    <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="bank" class="col-sm-3 col-form-label"> البنك </label>
                                            </div>
                                            <div class="col-sm-3 p-0">
                                                <input type="number" class="form-control" id="bank_balance" placeholder=""
                                                    name="bank_balance">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="payee"
                                                placeholder="مدفوع لة " name="paid_to">
                                            <label for="payee" class="col-sm-3 col-form-label">مدفوع لة </label>
                                        </div>
                                    </div>
                                    {{-- row 1 --}}
                                    <div class="row mb-3">
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="paid from"
                                                placeholder="مدفوع منة" name="paid_from">
                                            <label for="paid from" class="col-sm-3 col-form-label"> مدفوع منة</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <input type="number" class="form-control" id="account"
                                                placeholder=" باقى لحسابة(لة)" name="rest">
                                            <label for="account" class="col-sm-3 col-form-label"> باقى لحسابة(لة)</label>
                                        </div>
                                        <div class="col-sm-4 form-floating">
                                            <textarea class="form-control" rows="3" placeholder="ملاحظات ..." name="notes" id="note"></textarea>
                                            <label for="note" class="col-sm-3 col-form-label">ملاحظات</label>
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
                                <h3 class="card-title"> حسابات العملاء</h3>
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
                                                            اسم العميل </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            رقم الايصال </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            التاريخ</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">المدفوع
                                                            لة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">المدفوع
                                                            منة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">باقى
                                                            لحسابة</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Browser: activate to sort column ascending">
                                                            ملاحظات</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            عمليات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clientAccounts as $key => $clientAccount)
                                                        <tr class="odd">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $clientAccount->clients->name }}</td>
                                                            <td>{{ $clientAccount->receipt_num }}</td>
                                                            <td>{{ $clientAccount->date }}</td>
                                                            <td>{{ $clientAccount->paid_to }}</td>
                                                            <td>{{ $clientAccount->paid_from }}</td>
                                                            <td>{{ $clientAccount->rest }}</td>
                                                            <td>{{ $clientAccount->notes }}</td>
                                                            <td>
                                                                <a href="{{ route('clientAccount.edit', $clientAccount->id) }}"
                                                                    class="btn bg-secondary"> <i class="far  fa-edit "
                                                                        aria-hidden="true"></i></a>
                                                                <a href="{{ route('clientAccount.destroy', $clientAccount->id) }}"
                                                                    onclick="return confirm('Are you sure?')"
                                                                    class="btn btn-danger"><i
                                                                        class="fas fa-trash-alt "></i> </a>
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
        </div> <!-- /.content-header -->
    </div>{{-- content-wrapper --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="treasury_id"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('treasury.balance.ajax',['id'=>':id'])}}';
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
                            $('#balance').empty();
                            $('#balance').val(data);
                            $('#balance').trigger('change');
                        }
                    });
                } else {
                    $('select[name="balance"]').empty();
                }
            });


            $('select[name="bank_id"]').on('change', function() {
                var stateID = $(this).val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var route = '{{ route('clientAccount.bank.ajax',['id'=>':id'])}}';
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
                            $('#bank_balance').empty();
                            $('#bank_balance').val(data);
                            $('#bank_balance').trigger('change');
                        }
                    });
                } else {
                    $('select[name="balance"]').empty();
                }
            });
        });
    </script>
@endsection
