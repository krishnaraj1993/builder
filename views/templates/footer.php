 <!--<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2018-2020 <a href="https://acharya.io">acharya</a>.</strong> All rights
    reserved.
  </footer>-->
  <div class="control-sidebar-bg"></div>
</div>

<script src="config/core/bower_components/jquery/dist/jquery.min.js"></script>
<script src="config/core/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="config/Scripts/app_script.js" type="text/javascript"></script>
<script src="config/Scripts/xlsx.full.min.js" type="text/javascript"></script>
<script>
	$.widget.bridge('uibutton', $.ui.button);
	$('#page_loader_div').on('focus','#datepicker',function(){
		$(this).datepicker({
			autoclose: true
		});
	});
	
</script>
<script src="config/core/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="config/core/bower_components/raphael/raphael.min.js"></script>
<script src="config/core/bower_components/morris.js/morris.min.js"></script>
<script src="config/core/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="config/core/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="config/core/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="config/core/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="config/core/bower_components/moment/min/moment.min.js"></script>
<script src="config/core/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="config/core/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="config/core/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="config/core/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="config/core/bower_components/fastclick/lib/fastclick.js"></script>
<script src="config/core/dist/js/adminlte.min.js"></script>
<script src="config/core/dist/js/pages/dashboard.js"></script>
<script src="config/core/dist/js/demo.js"></script>
<script src="config/core/dist/js/money_to_word.js"></script>

<script src="config/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
<link href="config/themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
<link href="config/Scripts/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />

<script src="config/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script src="config/Scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
<!--<script src="config/Scripts/jtable/localization/jquery.jtable.tr.js" type="text/javascript"></script>-->

<script type="text/javascript">
	$(function() {        
	$('.menu_click').click(function(){
		var page = $(this).data('page');
		$('#present_active').text($(this).data('title'));
		$('#current_act').text($(this).data('title'));
		$('#page_loader_div').load('views/'+page);
	});	
	});
</script>
</body>
</html>