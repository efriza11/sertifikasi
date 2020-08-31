	<footer class="main-footer navbar-fixed-bottom" id="footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 1.0.0
		</div>
		<strong>Created by <i>Firman Fiqri Firdaus</i> &copy; 2020
	</footer>
	<!--
	<div id="loading-overlay" onclick="off()"><div id="loading-text"><i class="fa fa-refresh fa-spin"></i> Loading...</div></div>
	-->
</div>

<script>

	function show_loading() {
		document.getElementById('loading').style.display = "block";
	}

	function hide_loading() {
		document.getElementById('loading').style.display = "none";
	}

	$(window).on('load', function() {
		setTimeout(function() {
			$('body').addClass('loaded');
		}, 200);
		
	});
	
</script>

<div id="loading"><p>Processing . . .</p></div>

</body>
</html>