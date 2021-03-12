
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Cek Sertifikat</title>

<style type="text/css">
body {
    background-color: white;
    background-image: url(asset/bgblue.png);
    background-repeat: repeat-x;
    background-position-y: -248px;
}
</style>

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="" class="navbar-brand">
            <img src="./asset/gkmlogo.png" width="50" class="d-inline-block align-top" alt="">
            Sertifikat Elektronik Gelar Karya Mahasiswa 2020
            </a>
        </div>
    </nav>
    <br><br>
    <div class="container" >
        <div class="card" style="margin-top: 55px">
            <div class="card-header text-center">
                E - Sertifikat Gelar Karya Mahasiswa 2020
            </div>
            <div class="container">
                <div class="card-body">
                    <label for="cek">Download E - Sertifikat</label>
                    <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Masukkan NIM anda" name="no" id="no">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" onclick="data()">Cek Validasi</button>
                            </div>
                    </div>
                        <script>
                            let data = function(){

                                no = document.querySelector("#no");
                                no = no.value;
                                no = no.replace(".","");
                                no = no.replace(".","");
                                // noSubs1 = parseInt(no);
                                // noSubs2 = no.substr(9,11);
                                // final = noSubs1+noSubs2;
                                x = document.querySelector('#no').value;
                                if (x == "") {
                                    alert("Harap diisi");
                                    return false;
                                }
                                document.location.replace("sertif.php?no="+no);
                            }
                        </script>
                   
                    <br>
                </div>
            </div>
            <div class="card-footer text-muted text-center">
                Created with 🔥 by IT Support Forum Asisten Universitas Amikom Yogyakarta
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>