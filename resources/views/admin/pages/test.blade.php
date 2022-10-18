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
        background: red;
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
                        <div class="col header-right ">
                            <p>وزارة التعليم العالي والبحث العلمى</p>
                            <p>المعهد العالي للهندسة والتكنولوجيا</p>
                            <p><span>بالمنوفيه</span></p>
                        </div>
                        <div class="col header-left ">
                            <p>Ministry of Higher Education and <br>Scientific Research <br>Higher Institute of
                                Engineering and Technology <br>Menoufia</p>
                        </div>
                    </div>
                </div>
                <!--end header-->
                <!--start contain-->
                <div class="contain">
                    <p class="title"> أسماءالطلاب الحاصلين علي الإنذار الأول </p>
                    <div class="row first-row">
                        <div class=" col">
                            <p> الفرقة : <span> الاعدادى</span></p>
                        </div>
                        <div class="col ">
                            <p> القسم : <span> عام</span></p>
                        </div>
                        <div class="col ">
                            <p> العام الدراسى: <span>2022/2021 </span></p>
                        </div>
                        <div class="col ">
                            <p> الفصل الدراسى : <span> الثانى</span></p>
                        </div>
                    </div>
                    <table class=" data ">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>اسم الطالب</td>
                                <td>عدد المواد</td>
                                <td>المواد الحاصل علي إنذار أول</td>
                                <td> ملاحظات</td>
                                <td>عمليات</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>احمد اسماعيل</td>
                                <td>3</td>
                                <td>مادة1 |||| مادة2 |||| مادة3 </td>
                                <td></td>
                                <td><img src="css/images/whatsapp (3).png"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>احمد اسماعيل</td>
                                <td>3</td>
                                <td>مادة1 |||| مادة2 |||| مادة3 </td>
                                <td></td>
                                <td><img src="css/images/whatsapp (3).png"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>احمد اسماعيل</td>
                                <td>3</td>
                                <td>مادة1 |||| مادة2 |||| مادة3 </td>
                                <td></td>
                                <td><img src="css/images/whatsapp (3).png"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>احمد اسماعيل</td>
                                <td>3</td>
                                <td>مادة1 |||| مادة2 |||| مادة3 </td>
                                <td></td>
                                <td><img src="css/images/whatsapp (3).png"></td>
                            </tr>
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
