<script type="text/javascript">
	$('#advanced_search_btn').click(function () {
		$('#advanced_search').toggle(400);
		if ( $('#advanced_search_btn').html() == 'Sembunyikan' ) {
			$('#advanced_search_btn').html('Advanced Search');
		}else{
			$('#advanced_search_btn').html('Sembunyikan');
		}
	});
</script>