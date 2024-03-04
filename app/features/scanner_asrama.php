<script>
    
document.getElementById("sesi").addEventListener("change",function(e){
    var sesi = document.getElementById("sesi").value;
    // var keluar = document.getElementById("hasil").innerHTML = sesi;
    // console.log(sesi);
    
    //buat rekam tgl
    var date = new Date();
    var current_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
    
    //scanner
    const html5QrCode = new Html5Qrcode("reader");
    const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        /* handle success */
        $.ajax({
            type: 'POST',
            url: '../../app/models/proses.php',
            data: {
                "id_mumi": decodedText,
                "type": "insert",
                "tanggal": current_date,
                "waktu": waktu,
                "sesi": sesi
            },
            success: function(data) {
                alert(data);
            }

        });
    };

    //config camera
    const config = {
        fps: 10,
        qrbox: {
            width: 20,
            height: 20
        }
    };
    //eksekutor
    html5QrCode.start({
        facingMode: "environment"
    }, config, qrCodeSuccessCallback);
})





</script>