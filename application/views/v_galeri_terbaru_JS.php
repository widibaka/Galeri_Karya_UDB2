<script type="text/javascript">

	var open_searchfilter = function () {
		$('#advanced_search').toggle(400);
		if ( $('#advanced_search_btn').html() == 'Sembunyikan' ) {
			$('#advanced_search_btn').html('Filter');
			window.localStorage.setItem("filter", "false");
		}else{
			$('#advanced_search_btn').html('Sembunyikan');
			window.localStorage.setItem("filter", "true");
		}
	}

	if ( window.localStorage.getItem("filter") == 'true' ) {
		open_searchfilter();
	}

	$('#advanced_search_btn').click(function () {
		open_searchfilter()
	});

	// auto submit kalau user mengubah kategori atau urutan
	$("#kategori").change(function () {
		turunkan_preloader(function () {
			setTimeout(function() {
				$('#form_search').submit();
			}, 500);
		});
	})
	$("#urut").change(function () {
		turunkan_preloader(function () {
			setTimeout(function() {
				$('#form_search').submit();
			}, 500);
		});
	})
</script>