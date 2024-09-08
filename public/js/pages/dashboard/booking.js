const table = {
  booking: $("table#kamar").DataTable({
    processing: true,
    responsive: true,
    ajax: baseUrl + "/api/booking?wrap=data",
    columns: [
      {
        data: "code",
        render: function (data, type, row) {
          return data;
        },
      },
      {
        data: "kamar",
        render: function (data, type, row) {
          return "Kamar " + data.name;
        },
      },
      {
        data: "name",
        render: function (data, type, row) {
          return data;
        },
      },
      {
        data: "date_in",
        render: function (data, type, row) {
          return `${row.date_in.toString().replace(/(\d{4})-(\d{2})-(\d{2})/, "$3/$2/$1")} - ${row.date_out.toString().replace(/(\d{4})-(\d{2})-(\d{2})/, "$3/$2/$1")}`;
        },
      },
      {
        data: "status",
        render: function (data, type, row) {
          switch (data) {
            case 1:
              return "Dikonfirmasi";
            default:
              return "Belum dikonfirmasi";
          }
        },
      },
      {
        data: "id",
        render: function (data, type, row) {
          const btnCek = `<a href="${row.ktp}" data-lightbox="file-${row.code}" class="btn-control btn-check blue darken-1" data-title="Cek data" data-id="${data}"><i class="material-icons">folder_open</i></a>`;
          const btnConfirm = `<a href="#!" class="btn-control btn-confirm green darken-2" data-title="Konfirmasi" data-id="${data}"><i class="material-icons">done</i></a>`;
          let images = ``;
          $.each(["kk", "rujukan", "bpjs", "pasfoto", "sktm"], function (i, k) { 
            if(row[k] != null) {
              images += `<a class="hide" href="${row[k]}" data-lightbox="file-${row.code}" data-title="${k}"</a>`;
            }
          });
          switch (row.status) {
            case 1:
              return `<div class="center" style="display: flex; gap: 5px; color: white;">${btnCek}${images}</div>`;
            default:
              return `<div class="center" style="display: flex; gap: 5px; color: white;">${btnCek}${images}${btnConfirm}</div>`;
          }
        },
      },
    ],
  }),
};
$("body").on("click", ".btn-confirm", function (e) {
  const id = $(this).data("id");
  const data = cloud.get("booking").find((e) => e.id == id);
  Swal.fire({
    title: "Apakah data booking ini sudah valid ?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Konfirmasi",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: baseUrl + "api/booking/" + id,
        dataType: "json",
        data: {
          status: 1,
        },
        success: (res) => {
          $.each(res.messages, function (i, t) {
            Toast.fire({
              icon: "success",
              title: "Data berhasil di simpan",
            });
          });
          cloud.pull("booking");
        },
      });
    }
  });
});

$(document).ready(async function () {
  await cloud.add(baseUrl + "api/kamar", {
    name: "kamar",
  });
  await cloud.add(baseUrl + "api/booking", {
    name: "booking",
  });
  cloud.addCallback("booking", function () {
    table.booking.ajax.reload();
  });
});
