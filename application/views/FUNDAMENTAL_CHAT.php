<script type="text/javascript">

	// Fundamental chat STARTS
		var GLOBAL_limit_chat = 50;

		function get_chats(id_user, limit, callback = function(){}) {
			// Masukkan id_user_penerima ke form
			$('[name="id_user_penerima"]').val(id_user)
			// Munculkan loading
			$('.overlay').show()
			// Lalu mulai ajax get
			setTimeout(function () {
				$.ajax({
				  url: "<?php echo base_url() ?>api/get_chats/" + id_user + "/" + limit, 
				  success: function(response){
				  		let data = JSON.parse(response);
				  		// console.log(data)
				  		let content = ``;
				  		for (var i = 0; i < data.length; i++) {
				  			// Kalau cocok dengan id_user yg login saat ini, maka pakai yang kanan, else pilih kiri
				  			if ( data[i].id_user == <?php echo $this->session->userdata('id_user') ?> ) {
				  				content += `
					  				<!-- Message to the right -->
					  				<div class="direct-chat-msg right" id="chat-${data[i].id_chat}">
					  				  <div class="direct-chat-infos clearfix">
					  				    <span class="direct-chat-name float-right text-dark">${data[i].username}</span>
					  				    <span class="direct-chat-timestamp float-left text-gray">${data[i].time}</span>
					  				  </div>
					  				  <!-- /.direct-chat-infos -->
					  				  <img class="direct-chat-img elevation-2" src="<?php echo base_url() ?>assets/uploads/foto_profil/${data[i].photo}" alt="message user image">
					  				  <!-- /.direct-chat-img -->
					  				  <div class="direct-chat-text elevation-2">${data[i].msg}</div>
					  				  <!-- /.direct-chat-text -->
					  				</div>
				  				`;
				  			}
				  			else {
				  				content += `
				  					<!-- Message. Default to the left -->
				  					<div class="direct-chat-msg" id="chat-${data[i].id_chat}">
				  					  <div class="direct-chat-infos clearfix">
				  					    <span class="direct-chat-name float-left text-dark">${data[i].username}</span>
				  					    <span class="direct-chat-timestamp float-right text-gray">${data[i].time}</span>
				  					  </div>
				  					  <!-- /.direct-chat-infos -->
				  					  <img class="direct-chat-img elevation-2" src="<?php echo base_url() ?>assets/uploads/foto_profil/${data[i].photo}" alt="message user image">
				  					  <!-- /.direct-chat-img -->
				  					  <div class="direct-chat-text elevation-2">${data[i].msg}</div>
				  					  <!-- /.direct-chat-text -->
				  					</div>
				  					<!-- /.direct-chat-msg -->
				  				`;
				  			}
				  		}
				  		
				  		$('.wadah-untuk-chat-messages').html(content);
				  		// tambah tombol load more
				  		let tombol_loadmore = `<a role="button" class="btn btn-block btn-default w-100" id="load_more" onclick="load_more(100)">Muat Lebih Banyak</a>`;
				  		$('.wadah-untuk-chat-messages').append(tombol_loadmore);

				  		$('.overlay').hide();

				  		callback();
				  }
				});
			}, 500)
		}

		$("#form_input_chat").submit(function (e) {
			e.preventDefault();
			let this_form = $(this);

			// Kalau belum memilih lawan chatting / user, maka tidak boleh submit chat
			if ( this_form.find('[name="id_user_penerima"]').val() == '' ) {
				Swal.fire({
					title: "Silakan pilih kontak dahulu!",
					icon: "warning",
				})
				return 0;
			}

			// Kalau sudha pilih kontak, maka ...
			$.ajax({
			    type : 'POST',
			    url : '<?php echo base_url() . 'api' ?>/send_chat',
			    data : $(this).serialize(),
			    success: function(r) {
			    	let data = JSON.parse(r)
			    	if ( data.status == true ) {
			    		get_chats( this_form.find('[name="id_user_penerima"]').val() , GLOBAL_limit_chat);
			    		$('[name="msg"]').val('')
			    	}
			    }
			})
		})

		function get_contact(limit, callback = function(){}) {		
			// Lalu mulai ajax get
			$.ajax({
			  url: "<?php echo base_url() ?>api/get_contact/" + limit, 
			  success: function(response){
			  		let data = JSON.parse(response);
			  		let content = ``;
			  		for (var i = 0; i < data.length; i++) {
		  				content += `
							<li class="contact-item" id="contact-${data[i].id_user}">
							  <a href="javascript:void(0)" onclick="open_chat(${data[i].id_user})">
							    <div class="contacts-list-img" style="
							    background: url('<?php echo base_url() ?>assets/uploads/foto_profil/${data[i].photo}');
							    height: 40px;
							    width: 40px;
							    background-size: cover;
							    background-position: center;
							    "></div>

							    <div class="contacts-list-info">
							      <span class="contacts-list-name text-dark">
							        ${data[i].username}
							        <small class="contacts-list-date float-right text-gray">${data[i].latest_msg_time}</small>
							      </span>
							      <span class="contacts-list-msg text-gray">${data[i].latest_msg}</span>
							    </div>
							    <!-- /.contacts-list-info -->
							  </a>
							</li>
						`;
			  		}
			  		
			  		$('.contacts-list').html(content);

			  		callback();
			  }
			});
		}

		// Membuat highlight .active untuk kontak list
		function open_chat(id_user) {
			$('.contacts-list .active').each(function() {
				$(this).removeClass('active')
			})
			$('#contact-'+id_user).addClass('active')

			get_chats(id_user, GLOBAL_limit_chat)
		}


		// Refresh chats
		function refresh_chat(callback = function(){}) {
			let id_user = $('#form_input_chat').find('[name="id_user_penerima"]').val();
			get_chats(id_user, GLOBAL_limit_chat, callback);
		}

		// Load more message
		function load_more(limit_msg) {
			GLOBAL_limit_chat = limit_msg;
			refresh_chat(function () {
				$('#load_more').hide()
			});
		}
	// Fundamental chat ENDS

</script>