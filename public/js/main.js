const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  },
});

const cloud = new Puller();

$("body").on("click", ".panel-nav-toggler", function (e) {
  e.preventDefault();
  $("body").toggleClass("panel-nav-active");
});

$("body").on("click",".btn-slider:not(.dispose)", function (e) {
  e.preventDefault();
  const target = $(this).data("target");
  $(`.page-slider[data-slider=${target}]`).addClass("active");
});
$("body").on("click",".btn-slider.dispose", function (e) {
  e.preventDefault();
  $(this).closest(".page-slider").removeClass("active");
});

$(document).ready(function () {
  $("select").formSelect();
});
