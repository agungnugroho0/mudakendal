<script>
    
    var sesi = 1;
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
            width: 250,
            height: 250
        }
    };
    //eksekutor
    html5QrCode.start({
        facingMode: "environment"
    }, config, qrCodeSuccessCallback);





</script>