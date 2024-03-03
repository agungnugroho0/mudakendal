$(document).ready(function () {

  selesai();
});

function selesai() {
  setTimeout(function () {
    update();
    selesai();
  }, 1500);
}

$klp1 = Array();
$cnt1 = Array();
$klp2 = Array();
$cnt2 = Array();

function update() {
    $("table").empty();
    // menampilkan hasil perhitungan dari php
    //male
    $.getJSON("../../app/models/laporan.php", function (count) {
        var no = 1;
        $("table").append("<th>No</th><th>kelompok</th><th>Laki - Laki</th>");
        $.each(count.result, function () {
            $klp1 = this["kelompok"];
            $cnt1 = this["cnt"];
            $("table").append("<tr><td>" + no++ + "</td><td>" + $klp1 + "</td><td>" + $cnt1 + "</td></tr>")
        });
    });
    //female
    $.getJSON("../../app/models/laporan2.php", function (count) {
        $("tabel").empty();
        $("table").append("<th>No</th><th>kelompok</th><th>Perempuan</th>");
        var no = 1;
        $.each(count.result2, function () {
            $klp2 = this["kelompok"];
            $cnt2 = this["cnt"];
            $("table").append("<tr><td>" + no++ + "<td>" + $klp2 + "</td><td>" + $cnt2 +"</td></tr>");
    });
});
}
