const table = {
  kamar: $("table#kamar").DataTable({
    processing: true,
    responsive: true,
    ajax: baseUrl + "/api/kamar?wrap=data",
    columns: [
      {
        data: "name",
        render: function (data, type, row) {
          return "Kamar " + data;
        },
      },
      {
        data: "desc",
        render: function (data, type, row) {
          return data;
        },
      },
      {
        data: "id",
        render: function (data, type, row) {
          return `<div style="display: flex; gap: 5px; color: white;">
              <a href="#!" class="btn-control btn-slider btn-edit orange darken-1" data-title="Edit" data-target="form" data-id="${data}">
                  <i class="material-icons">edit</i>
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
  $(`.page-slider[data-slider=${page}]`).find("form").find("input[name=id]").val("");
});
$("body").on("click", ".btn-edit", function (e) {
  const id = $(this).data("id");
  const data = cloud.get("kamar").find((e) => e.id == id);
  $.each(data, function (i, v) {
    $(`[name=${i}]`).val(v);
  });
  M.updateTextFields();
  M.textareaAutoResize($("#desc"));
});
$("body").on("click", ".btn-delete", function (e) {
  const id = $(this).data("id");
  const data = cloud.get("kamar").find((e) => e.id == id);
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
        url: baseUrl + "api/kamar/" + id,
        dataType: "json",
        success: (res) => {
          $.each(res.messages, function (i, t) {
            Toast.fire({
              icon: "success",
              title: "Data berhasil di hapus",
            });
          });
          cloud.pull("kamar");
        },
      });
    }
  });
});

$("body").on("submit", "#form-kamar", function (e) {
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
  const id = $(this).find("input[name=id]").val();
  $.ajax({
    type: "POST",
    url: baseUrl + "api/kamar" + (id ? `/${id}` : ""),
    data: data,
    dataType: "json",
    success: (res) => {
      $.each(res.messages, function (i, t) {
        Toast.fire({
          icon: i,
          title: t,
        });
      });
      cloud.pull("kamar");
      $(this).closest(".page-slider").removeClass("active");
    },
  });
});

$(document).ready(async function () {
  await cloud.add(baseUrl + "api/kamar", {
    name: "kamar",
  });
  await cloud.add(baseUrl + "api/booking", {
    name: "booking",
  });
  cloud.addCallback("kamar", function () {
    table.kamar.ajax.reload();
  });

  $("#schedule").evoCalendar({ todayHighlight: true });
  $.each(cloud.get("kamar"), function (i, k) { 
    $("select#list-kamar").append(`<option value="${k.id}">Kamar ${k.name}</option>`);
  });
  $("select#list-kamar").formSelect();
});
