<div class="col-lg-12">
<footer class="footer pt-0">
	<div class="row align-items-center justify-content-lg-between">
	  <div class="col-lg-6">
		<div class="copyright text-center  text-lg-left  text-muted">
		  &copy; 2020 <a href="https://stocksgems.in" class="font-weight-bold ml-1" target="_blank">Stocksgems</a> Design & Develop By :Dilip Gauswami
		</div>
	  </div>
	  <div class="col-lg-6">
		<ul class="nav nav-footer justify-content-center justify-content-lg-end">
		  <li class="nav-item">
			<a href="https://stocksgems.in" class="nav-link" target="_blank">Stocksgems</a>
		  </li>
		  <li class="nav-item">
			<a href="excel/sharelist.php" class="nav-link" target="_blank">Excel Download</a>
		  </li>
		</ul>
	  </div>		  
	</div>
  </footer>
</div>
</div>
<script src="<?php echo CSS_JS_URL;?>vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php echo CSS_JS_URL;?>vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo CSS_JS_URL;?>vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo CSS_JS_URL;?>vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo CSS_JS_URL;?>vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script>
 var t = $('#share_list').DataTable( {   
	"aLengthMenu": [
		[10,25, 50, 100, -1],
		[10,25, 50, 100, "All"]
	],
	 "columnDefs": [ {
			"searchable": false,
			"orderable": false,
			"targets": 0
		} ],
		"order": [[ 1, 'asc' ]]
});
 t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
</script>
</body>
</html>