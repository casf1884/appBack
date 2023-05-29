<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
    const base_url = "<?=base_url();?>";
    const smoney = "<?=SMONEY;?>";
</script>
<!-- jQuery -->
<script src="<?=media()?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=media()?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?=media()?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=media()?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=media()?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=media()?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=media()?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=media()?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=media()?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=media()?>/plugins/jszip/jszip.min.js"></script>
<script src="<?=media()?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=media()?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=media()?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=media()?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=media()?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="<?=media()?>/plugins/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?=media()?>/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?=media()?>/plugins/summernote/lang/summernote-es-ES.js"></script>
<!-- AdminLTE App -->
<script src="<?=media()?>/js/adminlte.min.js"></script>
<!-- Font Awesome -->
<script src="<?=media()?>/plugins/fontawesome-free/fontawesome.js" crossorigin="anonymous"></script>
<!-- Bootstrap Switch -->
<script src="<?=media()?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BarCode -->
<script src="<?=media()?>/plugins/barcode/JsBarcode.all.min.js"></script>

<!-- Funciones -->
<script src="<?=media()?>/js/function_admin.js"></script>
<script src="<?=media()?>/js/<?=$data['page_functions_js']?>"></script>

</body>

</html>