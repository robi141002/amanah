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

  $(".counter#count-kamar").text(cloud.get("kamar").length).counterUp({
    delay: 100,
    time: 500,
  });
});
