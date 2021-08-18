// Turunkan preloader
function turunkan_preloader() {
  $(".preloader").animate({height:"100vh"}, 130)
  $(".preloader").children().show()
}
function redirecting(href) {
  turunkan_preloader()
  setTimeout(function () {
    window.location.href = href
  }, 700)
}
// Transisi sebelum pindah halaman
$(".do_transition").click(function (event) {
  event.preventDefault()
  
  redirecting( $(this).attr("href") )
})