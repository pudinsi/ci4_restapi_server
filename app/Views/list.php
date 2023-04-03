<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h1>Jumlah Data <span id="PDNJmlTableJson"></span></h1>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" width="100%" style="width:100%;" id="PDNTableJson">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            function pdn_tableJson() {
                var pdn_url = '<?= base_url("api/table"); ?>';
                $.ajax({
                    url: pdn_url,
                    type: "POST",
                    dataType: "json",
                    success: function(data) {
                        //menghitung jumlah data
                        jmlData = data.length;
                        //variabel untuk menampung tabel yang akan digenerasikan
                        buatTabel = "";
                        //perulangan untuk menayangkan data dalam tabel
                        for (a = 0; a < jmlData; a++) {

                            //mencetak baris baru
                            buatTabel += "<tr>" +
                                "<td class='text-center'>" + (a + 1) + "</td>" +
                                "<td>" + data[a]["nip"] + "</td>" +
                                "<td>" + data[a]["nama"] + "</td>" +
                                "<td>" + data[a]["email"] + "</td>" +
                                "<tr/>";
                        }
                        //menayangkan jumlah data
                        document.getElementById("PDNJmlTableJson").innerHTML = jmlData;
                        //mencetak tabel
                        document.getElementById("PDNTableJson").innerHTML += buatTabel;
                        //console.log(span_Text)
                    }
                });
            }
            //TAMPILKAN
            pdn_tableJson();
            //setInterval(pdn_tableJson, 36000);
        });
    </script>
</body>

</html>