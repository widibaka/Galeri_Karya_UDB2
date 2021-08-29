

<script type="text/javascript">
	get_contact( 1000, $('#input_cari_contact').val() );

	get_online_terakhir( $('[name="id_user_penerima"]').val() )
	setInterval(function() {
		// refresh setiap 5 detik
		get_contact( 1000, $('#input_cari_contact').val() )

		// hanya ketika admin membuka salah satu kontak
		if ( $('[name="id_user_penerima"]').val() != '' ) {
			get_online_terakhir( $('[name="id_user_penerima"]').val() )

			// hitung pesan baru
			count_unread_msg_for_admin( $('[name="id_user_penerima"]').val(), function (unread_msg) {
				// Kalau ada pesan baru, maka refresh
				if ( unread_msg != "0" ) {
					open_chat_for_admin( $('[name="id_user_penerima"]').val() )

					// clear_unread_msg_for_admin
					clear_unread_msg_for_admin( $('[name="id_user_penerima"]').val() )
				}
			} )
			
		}
		
	}, 5000)
</script>