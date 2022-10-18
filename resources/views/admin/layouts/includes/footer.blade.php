<footer class="main-footer non-distable text-center">
    <strong>جميع الحقوق محفوظة لدي <a href="http://najezsoft.com">NAJEZ SOFT</a> &copy; 2021-2022</strong>
    <div class="float-right d-none d-sm-inline-block">
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</footer>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{ asset('public/assets/plugins/all.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

@include('admin.layouts.includes.datatable.js')
<!-- overlayScrollbars -->
<script src="{{ asset('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/assets/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('public/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/assets/dist/js/demo.js') }}"></script>
<script src="{{ asset('public/admin/dist/js/addRow.js') }}"></script>
<!-- <script>
    $(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});
</script> -->
<!-- <script type="text/javascript">
    $(function () {
        var params = window.location.pathname;
        params = params.toLowerCase();
console.log(params)
        if (params != "/") {
            $(".nav-sidebar li a").each(function (i) {
                var obj = this;
                var url = $(this).attr("href");
                if (url == "" || url == "#") {
                    return true;
                }
                url = url.toLowerCase();
                if (url.indexOf(params) > -1) {
                    $(this).parent().addClass("active open menu-open");
                    $(this).parent().parent().addClass("active open menu-open");
                    $(this).parent().parent().parent().addClass("active open menu-open");
                    $(this).parent().parent().parent().parent().addClass("active open menu-open");
                    $(this).parent().parent().parent().parent().parent().addClass("active open menu-open");
                    return false;
                }
            });
        }
    });
</script> -->
<!-- <script>
    document.querySelectorAll('.nav-item').forEach(el=>{
        el.addEventListener('click',()=>{
            document.querySelector('.nav-item.menu-open');
        })
    })
</script> -->

