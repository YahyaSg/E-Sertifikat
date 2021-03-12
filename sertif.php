<?php 
        $host = 'forumasisten.or.id';
        $user = 'u3540527';
        $pass = '7#qCDhzr#e';
        $db = 'u3540527_gkm';
    
        $connect = mysqli_connect($host, $user, $pass, $db);
    
        if (!$connect) {
            die('Ngga konek');
        }

        // $nid = substr($_GET['no'],0,1);
        // $id = $nid;
        $id = $_GET['no'];

        $query = "SELECT * FROM peserta where nim = $id";
        $result = mysqli_query ($connect, $query);
        $rows = mysqli_num_rows($result);

        //$key = mysqli_fetch_array($result);

        // $nim = $key['nim'];
        // $unique = substr($nim,6,9);

        // $nosert = $key['nomor_sertifikat'];
        // $code = $nosert.$unique;

        //echo $code;


        // $test = '1-2020-0105';
        // $test1 = substr($test,0,1);
        // $test2 = substr($test,7,10);

        // echo $test1.$test2;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"">

    <title>Cek Sertifikat</title>
    <style type="text/css">
body {
    background-color: white;
    background-image: url(asset/bgblue.png);
    background-repeat: repeat-x;
}
</style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="" class="navbar-brand">
            <i class="fas fa-arrow-left"></i>
            <img src="./asset/gkmlogo.png" width="50" class="d-inline-block align-top" alt="">
            Sertifikat Elektronik Gelar Karya Mahasiswa 2020
            </a>
        </div>
    </nav>
    <br><br>
    <div class="container">
    <?php while($sertifikat = mysqli_fetch_array($result)): ?>
        <div class="card">
            <div class="card-header text-center">
                E - Sertifikat Gelar Karya Mahasiswa 2020
            </div>
            <div class="container">
                <div class="card-body">
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
                                document.location.replace("sertif.php/?no="+no);
                            }
                        </script>
                   
                    <br>
                    <h5 style="color: green">Sertifikat anda valid</h5>
                    <br>
                    <table style="width:40%">
                        <tr>
                            <td>
                                <p class="card-text">No Sertifikat</p>
                                <p class="card-text">Nama</p>
                                <p class="card-text">Predikat</p>
                                <p class="card-text">Kategori</p>
                                <p class="card-text">Nama Produk</p>
                            </td>
                            <td>
                                <p class="card-text"><?=$sertifikat['no_sertifikat']."/SERT-FIK/AMIKOM/I/2020"?></p>
                                <p class="card-text"><?=$sertifikat['nama_peserta']?></p>
                                <p class="card-text"><?=$sertifikat['partisipasi']?></p>
                                <p class="card-text"><?=$sertifikat['kategori']?></p>
                                <p class="card-text"><?=$sertifikat['nama_produk']?></p>
                            </td>
                        </tr>
                   

                    </table>
                    <br>
                    <b>Tetap semangat, Kami tunggu partisipasimu di Gelar Karya Mahasiswa 2021</b> <br>
                    FOR EVERYTHING BIG, WE START HERE <br>
                    <br>
                    <button type="button" class="btn btn-outline-primary">
                    <a href="sertifikat.php/?no=<?=$id?>&no_sert=<?=$sertifikat['no_sertifikat']?>" target="_blank">Download E-Sertifikat</a></button>
                    <br><br>
                    <a href="index.php">Kembali</a>
                   
                </div>
            </div>
            <div class="card-footer text-muted text-center">
                Created with 🔥 by IT Support Forum Asisten Universitas Amikom Yogyakarta
            </div>
        </div>
        <br>
    <?php endwhile ?>
    
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>