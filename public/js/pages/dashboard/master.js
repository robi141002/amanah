$("body").on("submit", "#form-master", function (e) {
  e.preventDefault();
  if ($(this)[0].checkValidity() == false) {
    $(this).trigger("reportValidity");
  }
  const data = {};
  $(this)
    .serializeArray()
    .map((e) => {
      data[e.name] = e.value;
    });
  $.ajax({
    type: "POST",
    url: $(this).attr("action"),
    data: data,
    dataType: "json",
    success: (res) => {
      $.each(res.messages, function (i, t) {
        Toast.fire({
          icon: i,
          title: t,
        });
      });
      $(this).closest(".modal").modal("close");
    },
  });
});
$("body").on("submit", "#form-password", function (e) {
  e.preventDefault();
  if ($(this)[0].checkValidity() == false) {
    $(this).trigger("reportValidity");
  }
  const data = {};
  $(this)
    .serializeArray()
    .map((e) => {
      data[e.name] = e.value;
    });
  if (data.password != data.password_confirm) {
    return Toast.fire({
      icon: "error",
      title: "Password tidak sama",
    });
  }
  $.ajax({
    type: "POST",
    url: baseUrl + "api/pasien/" + data.id,
    data: data,
    dataType: "json",
    success: (res) => {
      $.each(res.messages, function (i, t) {
        Toast.fire({
          icon: i,
          title: t,
        });
      });
      $(this).closest(".modal").modal("close");
    },
  });
});

$(document).ready(function () {
  $(".modal").modal({
    dismissible: false,
    onOpenStart: function () {
      $("#form-password [nama=password]").val("");
      $("#form-password [nama=password_confirm]").val("");
    },
    onCloseEnd: function () {
      $("#form-password [nama=password], #form-password [nama=password_confirm]").val("");
    },
  });
});
