<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css file-->
    <title>report</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #fafafa;
        font: 12pt "";
        direction: rtl;
    }

    .date {
        text-align: center;
    }

    p {
        /* padding: 0px; */
        margin: 0px;
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .book {
        position: relative;
    }

    .page {
        width: 21.7cm;
        min-height: 29cm;
        padding: 1cm;
        margin: 1cm auto;
        border: 2px #d3d3d3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        display: none;
    }

    .page.active {
        display: block;
    }

    .subpage {
        padding: 0.1cm;
        border: 1px black solid;
        height: 27cm;
        outline: 1cm #fff solid;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .row>* {
        flex-shrink: 0;
        width: 100%;
        max-width: 100%;
    }

    .col {
        flex: 1 0 0%;
    }

    .first-row {
        margin-top: 10px;
        font-weight: bold;
        margin-right: 25px;
    }

    .first-row p {
        margin-bottom: 10px;
        font-size: 17px;
    }

    /* pagination */
    nav {
        display: flex;
        width: 21.7cm;
        margin: auto;
        justify-content: space-between;
        align-items: center;
        margin-bottom: -20px;
    }

    .pagination {
        background-color: #7883a3;
        list-style: none;
        display: flex;
    }

    .pagination .page-item {
        padding: 10px;
    }

    .page-item {
        margin: 10px 0;
    }

    .pagination a {
        text-decoration: none;
    }

    .print {
        font-size: 20px;
        padding: 10px 35px;
        background: rgb(63, 63, 142);
        color: #fff;
        border-radius: 3px;
    }

    /*start header*/

    .header-right p {
        line-height: 24px;
        font-weight: bold;
        text-align: center;
    }

    .header-center img {
        width: 75px;
        height: 75px;
        margin: 0 auto;
        margin-right: 116px;
    }

    .header-left p {
        font-size: 14.5px;
        font-weight: bold;
        text-align: center;
    }

    .sub-header {
        border-top: 2px solid black;
        border-bottom: 2px solid black;
    }

    .sub-header p {
        margin: auto 50px;
        font-size: 12px;
        font-weight: bold;
        padding: 5px;
    }

    /*end header*/

    /*start contan*/
    .contain {
        height: 216mm;
        margin-top: 4px;
    }

    table {
        border: 1px solid black;
        border-collapse: collapse;
    }

    tr,
    td {
        border: 1px solid black;
    }

    td {
        font-weight: bold;
        padding: 2px;
        font-size: 15px;
    }

    hr {
        border: 1px solid black;
    }

    table.data {
        width: 95%;
        margin: 9px auto 0;
    }

    .title {
        font-weight: bold;
        display: block;
        margin: 0 auto 15px;
        width: 262px;
        font-size: 17px;
        color: white;
        border-radius: 11px;
        background-color: #7883a3;
        padding: 6px;

        text-align: center;
    }

    /* .footer {
        border-top: 2px solid black;
    } */

    .footer-right p {
        font-size: 14.5px;
        text-align: right;
        width: 130%;
    }

    .footer-right {
        margin-left: 0cm;
    }

    .footer-right span {
        font-weight: bold;
    }

    .footer-left {
        width: -10cm !important;
        width: 2cm;
    }

    .footer-left p {
        font-size: 14px;
        text-align: left;
        width: 40%;
        background: gray;
        float: left;
    }

    button {
        border: none;
        cursor: pointer;
        margin-right: 5px;
    }

    img {
        width: 20px;
        height: 20px;
        display: block;
        margin: 0 auto;
    }

    thead {
        background-color: #d5d5ef;

        text-align: right;
    }

    table thead td {
        font-size: 17px;
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {
        .page {
            display: block;
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
            -webkit-print-color-adjust: exact;
        }

        .pagination,
        .print {
            display: none;
        }

    }
</style>

<body>
    <div class="book">
        <nav>
            <ul class="pagination">
            </ul>
            <button onclick="window.print()" class="print">print</button>
        </nav>
        <!--start page1-->
        <div class="page active">
            <div class="subpage">
                <!--start header-->
                <div class="header">
                    <div class="row">
                        <div class="col header-right">
                            <p>{{App\Models\CompanySitting::value('name')}}</p>
                        </div>
                        <div class="col header-center">
                            <img src=" @isset($companySittings) {{ asset('/public/' . Storage::url($companySittings->logo)) }} @endisset"
                                id="imgshow">
                        </div>
                        <div class="col header-left">
                            <p>{{App\Models\CompanySitting::value('nameEn')}}</p>
                        </div>
                    </div>
                    <h3 class="date">من {{$from}} الى {{$to}}</h3>
                </div>
                <!--end header-->
                <!--start contain-->
                <div class="contain">
                    <table class="data">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>التاريخ</td>
                                <td>المخزن</td>
                                <td>اسم الصنف</td>
                                <td>الكمية</td>
                                <td>السعر</td>
                                <td>ملاحظات</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($totals as $key => $total)
                            @foreach(App\Models\CashPermission::where('total_id',$total->id)->get() as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $total->date }}</td>
                                <td>{{ $total->stores->name }}</td>
                                <td>{{ $item->items->name}}</td>
                                <td>{{ $item->quantity}}</td>
                                <td>{{ $item->price}}</td>
                                <td>{{ $total->notes }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--end contain-->
                <!--start footer-->
                <div class="footer">
                </div>
                <!--end footer-->
            </div>
        </div>
        <!--endpage 1-->
    </div>
    <script src="{{asset('public/admin/dist/js/scriptReport.js')}}"></script>
</body>

</html>
