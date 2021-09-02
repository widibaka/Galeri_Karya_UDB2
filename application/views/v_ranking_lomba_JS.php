<script type="text/javascript">
  function startTime() {
      var day_name = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      var month_name = ['Januari', 'Frebuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
          'Oktober', 'Novemner', 'Desember'
      ];
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      var day = today.getDay();
      var date = today.getDate();
      var month = today.getMonth();
  
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('clock').innerHTML = h + ":" + m + ":" + s + '';
      document.getElementById('date').innerHTML = day_name[day] + ', ' + date + ' ' + month_name[month] + ' ' + today
          .getFullYear();
      var t = setTimeout(startTime, 500);
  }
  
  function checkTime(i) {
      if (i < 10) {
          i = "0" + i
      }; // add zero in front of numbers < 10
      return i;
  }

  function refresh_ranking() {
    $('#loader_overlay').show();
    setTimeout(function () {
      $.ajax({
        url: '<?php echo base_url() ?>api/get_ranking_lomba',
        success: function (data) {
          $('#wadah_data').html(data);
          $('#loader_overlay').hide();
        }
      });
    }, 500);
  }

  // Kasih prefix nol
  Number.prototype.pad = function(n) {
      if (n==undefined)
          n = 2;

      return (new Array(n).join('0') + this).slice(-n);
  }
  // countdown
  function do_countdown() {
    var countdown = $("#hitung_mundur").data("time");
    // console.log(countdown.html())
    // Set the date we're counting down to 
    var countDownDate = new Date(countdown).getTime();

    // Get today's date and time
    var now = new Date().getTime();
      
    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    if (distance > 0) {
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24)).pad(2);
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).pad(2);
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).pad(2);
        var seconds = Math.floor((distance % (1000 * 60)) / 1000).pad(2);
          
        // Output the result in an element with id="demo"
        $("#hitung_mundur").html( days + " hari <br>" + hours + ":" + minutes + ":" + seconds );
          
    }else{
      $("#hitung_mundur").html("00:00:00");
    }
  }

  // RUN
  // startTime()
  do_countdown()
  refresh_ranking()
  setInterval(function () {
    refresh_ranking()
  }, 15000);
  setInterval(function () {
    do_countdown()
  }, 100);
</script>