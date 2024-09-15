const yearsLabel = [moment().year() - 2, moment().year() - 1, moment().year(), moment().year() + 1, moment().year() + 2];
const monthLabel = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

const chart = {
  bulanan: new Chart(document.getElementById("chart-bulanan"), {
    type: "bar",
    data: {
      labels: monthLabel,
      datasets: [
        {
          label: "# Booking Bulanan",
          data: Array(monthLabel.length).fill(0),
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          tickInterval: 1
        },
      },
    },
  }),
  tahunan: new Chart(document.getElementById("chart-tahunan"), {
    type: "bar",
    data: {
      labels: yearsLabel,
      datasets: [
        {
          label: "# Booking Tahunan",
          data: Array(yearsLabel.length).fill(0),
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          tickInterval: 1
        },
      },
    },
  }),
};

$(document).ready(async function () {
  cloud
    .add(baseUrl + "api/kamar", {
      name: "kamar",
    })
    .then((kamar) => {
      $("#count-kamar").text(kamar.length).counterUp({
        delay: 100,
        time: 500,
      });
      cloud
        .add(baseUrl + "api/booking/booked", {
          name: "booked",
        })
        .then((booked) => {
          $("#count-avail")
            .text(kamar.length - booked.length)
            .counterUp({
              delay: 100,
              time: 500,
            });
        });
    });
  cloud
    .add(baseUrl + "api/pasien", {
      name: "pasien",
    })
    .then((pasien) => {
      $("#count-pasien").text(pasien.length).counterUp({
        delay: 100,
        time: 500,
      });
    });
  cloud
    .add(baseUrl + "api/booking", {
      name: "booking",
    })
    .then((booking) => {
      booking.forEach((b) => {
        console.log(b.date_in);
        chart.bulanan.data.datasets[0].data[moment(b.date_in).month()] += 1;
        chart.tahunan.data.datasets[0].data[yearsLabel.indexOf(moment(b.date_in).year())] += 1;
      });
      chart.bulanan.update();
      chart.tahunan.update();
    });
});
