const table = {
  booking: $("table#kamar").DataTable({
    processing: true,
    responsive: true,
    ajax: baseUrl + "/api/booking?wrap=data",
    layout: {
      topStart: {
        buttons: ["copy", "csv", "excel", "pdf", "print"],
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
        data: "name",
        render: function (data, type, row) {
          return data;
        },
      },
      {
        data: "address",
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

$(document).ready(async function () {
  $(".collapsible").collapsible();
  cloud.add(baseUrl + "api/kamar", {
    name: "kamar",
  });
  cloud.add(baseUrl + "api/booking", {
    name: "booking",
  });
  cloud.addCallback("booking", function () {
    table.booking.ajax.reload();
  });
  dateIn = new AirDatepicker("#date-in", {
    locale: localeEn,
    startDate: new Date(),
    inline: true,
    onSelect({ date }) {
      dateOut.update({
        minDate: date,
      });
    },
  });
  dateOut = new AirDatepicker("#date-out", {
    locale: localeEn,
    startDate: new Date(),
    inline: true,
    onSelect({ date }) {
      dateIn.update({
        maxDate: date,
      });
    },
  });

  $("body").on("click", "#btn-filter", function (e) {
    const data = {};
    console.log(dateIn.selectedDates, dateOut.selectedDates);
    if (dateIn.selectedDates.length > 0) data.dari = moment(dateIn.selectedDates[0]).format("YYYY-MM-DD");
    if (dateOut.selectedDates.length > 0) data.ke = moment(dateOut.selectedDates[0]).format("YYYY-MM-DD");

    table.booking.ajax.url(baseUrl + "api/booking?wrap=data&" + $.param(data)).load();
  });
});
