const table = {
  booking: $("table#kamar").DataTable({
    processing: true,
    responsive: true,
    ajax: {
      url: baseUrl + "/api/booking",
      dataSrc: function (data) {
        return data.filter((e) => e.status == 1);
      },
    },
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
          switch (row.status) {
            case 1:
              return `<div class="center" style="display: flex; gap: 5px; color: white;"><a href="${origin}/invoice/${data}" class="btn blue" target="_blank">Cetak</a><a href="${origin}/invoice/download/${data}" class="btn-pdf btn blue" download>Unduh</a></div>`;
            default:
              return `-`;
          }
        },
      },
    ],
  }),
};

const localeEn = {
  days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"],
  daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
  daysMin: ["Mg", "Sn", "Sl", "Rb", "Km", "Jm", "Sb"],
  months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
  monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des"],
  today: "Hari Ini",
  clear: "Hapus",
  dateFormat: "yyyy-MM-dd",
  timeFormat: "hh:ii aa",
  firstDay: 0,
};

let dateIn, dateOut;

const store = {
  get form() {
    const data = {};
    $("#form-booking")
      .serializeArray()
      .map((e) => {
        data[e.name] = e.value;
      });
    return data;
  },
};

$("body").on("click", ".btn-back", function (e) {
  e.preventDefault();
  const target = $(this).data("target");
  $(this)
    .closest(".part")
    .fadeOut("fast", () => {
      $(`.${target}`).fadeIn("fast");
    });
});
$("body").on("click", ".room", function (e) {
  e.preventDefault();
  $(".room").removeClass("active");
  $(this).addClass("active");
  const id = $(this).data("id");
  $("input[name=room_id]").val(id);
});
$("body").on("submit", "#form-booking", function (e) {
  e.preventDefault();
  if ($(this).find("input[name=room_id]").val() == "") {
    Toast.fire({
      icon: "error",
      title: "Kamar belum dipilih",
    });
    return false;
  }
  if ($(this)[0].checkValidity() == false) {
    $(this).trigger("reportValidity");
    return false;
  }
  $.ajax({
    url: baseUrl + "api/booking",
    type: "POST",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType: "json",
    success: function (reserv) {
      $.each(reserv.messages, function (i, t) {
        Toast.fire({
          icon: i,
          title: t,
        }).then(() => {
          window.location.reload();
        });
      });
      cloud.pull("booking");
      $(".part.form-ready").fadeOut("fast", () => {
        $("#form-booking")[0].reset();
        $("#form-booking").find("input[name=room_id]").val("");
        $(".part.done").fadeIn("fast").removeClass("hide");
      });
    },
    error: function (err) {
      console.log(err);
    },
  });
});

$(document).ready(async function () {
  cloud
    .add(baseUrl + "api/kamar", {
      name: "kamar",
    })
    .then((data) => {
      $(".room-selector").empty();
      $.each(data, function (i, k) {
        $(".room-selector").append(`<div class="room" data-id="${k.id}">Kamar ${k.name}</div>`);
      });
    });
  cloud.add(baseUrl + "api/booking", {
    name: "booking",
  });
  cloud.addCallback("booking", function () {
    table.booking.ajax.reload();
  });
  cloud.addCallback("kamar", function (data) {
    $(".room-selector").empty();
    $.each(data, function (i, k) {
      $(".room-selector").append(`<div class="room" data-id="${k.id}">Kamar ${k.name}</div>`);
    });
  });
  cloud.addCallback("booking", function (data) {
    console.log(data);
  });

  $(".modal").modal({
    dismissible: false,
    onOpenStart: function () {},
    onCloseEnd: function () {},
  });
});
