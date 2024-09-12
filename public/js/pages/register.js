$("body").on("submit", "#form-register", function (e) {
  e.preventDefault();
  const data = {};
  $(this)
    .serializeArray()
    .map((e) => {
      data[e.name] = e.value;
    });
  $(this).find("button[type=submit]").prop("disabled", true);
  $.ajax({
    type: "POST",
    url: baseUrl + "api/pasien",
    data: data,
    dataType: "json",
    success: (res) => {
      $.each(res.messages, function (i, t) {
        return Toast.fire({
          icon: i,
          title: "Anda berhasil mendaftar, silahkan login",
        }).then(() => {
          window.location.href = origin + "/login";
        });
      });
    },
    complete: () => {
      $(this).find("button[type=submit]").prop("disabled", false);
    },
  });
});
