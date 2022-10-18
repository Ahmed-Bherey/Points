@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                @include('admin.layouts.alerts.success')
                @include('admin.layouts.alerts.errors')
                <section class="content card pt-3  pb-3 m-2">
                    <div class="container-fluid counter_section">
                        <h3 class="m-0 mb-3 text-info">Numbers</h3>
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="#">{{\App\Models\IteItem::count()}}</h3>
                                        <p>الاصناف</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag">{{\App\Models\IteItem::count()}}</i>
                                    </div>
                                    <a href="{{route('items.create')}}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-orange">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="#">{{\App\Models\StStore::count()}}</h3>
                                        <p>المخازن</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars">{{\App\Models\StStore::count()}}</i>
                                    </div>
                                    <a href="{{route('stores.all.index')}}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-gray">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="#">{{\App\Models\AddCompany::count()}}</h3>
                                        <p>الشركات</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add">{{\App\Models\AddCompany::count()}}</i>
                                    </div>
                                    <a href="{{route('companies.create')}}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-success">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="">{{\App\Models\IteSize::count()}}</h3>
                                        <p>المقاسات
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph">{{\App\Models\IteSize::count()}}</i>
                                    </div>
                                    <a href="{{route('sizes.create')}}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-red">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="#">{{\App\Models\Treasury::count()}}</h3>
                                        <p>الخزائن</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph">{{\App\Models\Treasury::count()}}</i>
                                    </div>
                                    <a href="{{route('treasuries.create')}}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-maroon">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="#">
                                            {{\App\Models\Bank::count()}}</h3>
                                        <p>البنوك </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph">{{\App\Models\Bank::count()}}</i>
                                    </div>
                                    <a href="{{route('bank.create')}}" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                    <div class="container-fluid counter_section">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="#">{{\App\Models\Client::count()}}</h3>
                                        <p>العملاء</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag">{{\App\Models\Client::count()}}</i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="#">{{\App\Models\Supplier::count()}}</h3>
                                        <p>الموردين</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars">{{\App\Models\Supplier::count()}}</i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="#">{{\App\Models\Representative::count()}}</h3>
                                        <p>المندوبين</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add">{{\App\Models\Representative::count()}}</i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="">{{\App\Models\StaffData::count()}}</h3>
                                        <p>الموظفين</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph">{{\App\Models\StaffData::count()}}</i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="">{{\App\Models\Engineer::count()}}</h3>
                                        <p>المهندسين</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph">{{\App\Models\Engineer::count()}}</i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-info">
                                    <div class="inner nums">
                                        <h3 class="num" data-goal="">#</h3>
                                        <p>today Departure </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph">#</i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                                <!-- ./col -->
                            </div>
                        </div>
                </section>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
@endsection
