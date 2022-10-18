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
</div>
@endsection
