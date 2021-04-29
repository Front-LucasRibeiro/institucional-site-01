function showPage() {
  let url = window.location.href;

  if (url.indexOf('/fale-conosco') !== -1) {
    $('.institucional.fale-conosco').show();
  }

  if (url.indexOf('/autor') !== -1) {
    $('.institucional.autor').show();
  }
}



$(document).ready(function () {
  showPage();
})