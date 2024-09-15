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
    .add(baseUrl + "api/booking", {
      name: "booking",
    })
    .then((booking) => {
      $("#count-booking").text(booking.length).counterUp({
        delay: 100,
        time: 500,
      });
    });
});
