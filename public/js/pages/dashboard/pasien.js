const table = {
  pasien: $("table#pasien").DataTable({
    processing: true,
    responsive: true,
    ajax: baseUrl + "/api/pasien?wrap=data",
    columns: [
      {
        data: "id",
        render: function (data, type, row) {
          return "RSA" + data;
        },
      },
      {
        data: "user.nama",
      },
      {
        data: "phone",
      },
      {
        data: "address",
      },
      {
        data: "user.identities[0].secret",
      },
      {
        data: "id",
        render: function (data, type, row) {
          return `<div style="display: flex; gap: 5px; color: white;">
              <a href="#modal1" class="btn-control btn-edit modal-trigger orange darken-1" data-title="Edit" data-id="${data}">
                  <i class="material-icons">edit</i>
              </a>
              <a href="#modal2" class="btn-control btn-edit-password modal-trigger blue darken-1" data-title="Password" data-id="${data}">
                  <i class="material-icons">vpn_key</i>
              </a>
              <a href="#!" class="btn-control btn-delete red darken-2" data-title="Hapus" data-id="${data}">
                  <i class="material-icons">delete</i>
              </a>
          </div>`;
        },
      },
    ],
  }),
};

$("body").on("click", ".btn-slider[data-target=form]", function (e) {
  const page = $(this).data("target");
  $(`.page-slider[data-slider=${page}]`).find("form").trigger("reset");
});
$("body").on("click", ".btn-edit", function (e) {
  const id = $(this).data("id");
  const data = cloud.get("pasien").find((e) => e.id == id);
  $(`#form-edit [name=id]`).val(data.id);
  $(`#form-edit [name=nama]`).val(data.user.nama);
  $(`#form-edit [name=address]`).val(data.address);
  M.updateTextFields();
  M.textareaAutoResize($("#address"));
});
$("body").on("click", ".btn-edit-password", function (e) {
  const id = $(this).data("id");
  const data = cloud.get("pasien").find((e) => e.id == id);
  $(`#form-password [name=id]`).val(data.id);
  M.updateTextFields();
});
$("body").on("click", ".btn-delete", function (e) {
  const id = $(this).data("id");
  const data = cloud.get("pasien").find((e) => e.id == id);
  Swal.fire({
    title: "Apakah data ini ingin di hapus ?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "DELETE",
        url: baseUrl + "api/pasien/" + id,
        dataType: "json",
        success: (res) => {
          $.each(res.messages, function (i, t) {
            Toast.fire({
              icon: "success",
              title: "Data berhasil di hapus",
            });
          });
          cloud.pull("pasien");
        },
      });
    }
  });
});

$("body").on("submit", "#form-pasien", function (e) {
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
    url: baseUrl + "api/pasien",
    data: data,
    dataType: "json",
    success: (res) => {
      $.each(res.messages, function (i, t) {
        Toast.fire({
          icon: i,
          title: t,
        });
      });
      cloud.pull("pasien");
      $(this).closest(".page-slider").removeClass("active");
    },
  });
});
$("body").on("submit", "#form-edit", function (e) {
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
      cloud.pull("pasien");
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
      cloud.pull("pasien");
      $(this).closest(".modal").modal("close");
    },
  });
});

$(document).ready(async function () {
  await cloud.add(baseUrl + "api/pasien", {
    name: "pasien",
  });
  await cloud.add(baseUrl + "api/booking", {
    name: "booking",
  });
  cloud.addCallback("pasien", function () {
    table.pasien.ajax.reload();
  });

  $("#schedule").evoCalendar({ todayHighlight: true });
  $.each(cloud.get("pasien"), function (i, k) {
    $("select#list-pasien").append(`<option value="${k.id}">pasien ${k.name}</option>`);
  });
  $("select#list-pasien").formSelect();
  $(".modal").modal({
    dismissible: false,
    onOpenStart: function () {
      $("#form-pasien")[0].reset();
    },
    onCloseEnd: function () {
      $("#form-pasien")[0].reset();
    },
  });
});
