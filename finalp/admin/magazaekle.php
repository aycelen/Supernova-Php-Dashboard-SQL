<?php
$sayfa="Magaza Ekle";
include ('inc/ahead.php');

if($_SESSION["yetki"]!="1"){

    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    echo "<script> Swal.fire ({title:'Hatalı!',text:'Yetkisiz Kullanıcı !', icon:'error', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='magazalar.php'}})</script>";
    exit;
}

if($_POST) {

    $aktif = 0;
    if (isset($_POST["aktif"])) $aktif = 1;
    $hata = '';

    if ($_POST["mbaslikbir"] != '' && $_POST["mbaslikiki"] != ''  &&  $_FILES["mfotbir"]['name'] && $_POST["mybir"] != '' ) {

        if ($_FILES['mfotbir']['error'] != 0) {

            $hata .= 'Dosya yüklenirken hata oluştu.';
        }

        else if (file_exists('../assets/img/' . strtolower($_FILES["mfotbir"]['name']))) {
            $hata .= 'Aynı isimli dosya';
        }

        else if ($_FILES['mfotbir']['size'] > (1024 * 1024 * 2)) {
            $hata .= 'Dosya boyutu çok büyük 2MB aşağı olmalı';
        }

        else {
            copy($_FILES['mfotbir']['tmp_name'], '../assets/img/' . strtolower($_FILES["mfotbir"]['name']));
            $eklesorgu = $baglanti->prepare('INSERT INTO magaza SET mfotbir=:mfotbir, mbaslikbir=:mbaslikbir, mbaslikiki=:mbaslikiki, mybir=:mybir, aktif=:aktif');
            $ekle = $eklesorgu->execute([

                    'mbaslikbir' => $_POST["mbaslikbir"],
                'mfotbir' => strtolower($_FILES["mfotbir"]["name"]),
                'mbaslikiki' => $_POST["mbaslikiki"],
                'mybir' => $_POST["mybir"],
                'aktif' => $aktif
            ]);

            if ($ekle) {

                echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
                echo "<script> Swal.fire ({title:'Başarılı!',text:'Ekleme Başarılı !', icon:'success', confirmButtonText: 'Kapat'}).then((value)=>{
                    if(value.isConfirmed){window.location.href='magazalar.php'}})</script>";
            }
        }

        if ($hata != '') {
            echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
            echo "<script> Swal.fire ({title:'Hatalı!',text:'$hata', icon:'error', confirmButtonText: 'Kapat'})</script>";
        }
    }
}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Magaza Ekle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Magaza Ekle</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body" >
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>İlk Başlık (250) </label>
                                        <input type="text" name="ybir" required class="form-control" value="<?=@$_POST["mbaslikbir"]?>">
                                    </div><br>
                                    <div class="form-group">
                                        <label>Fotoğraf</label>
                                        <input type="file" name="mfotbit" required class="form-control-file">
                                    </div><br>
                                    <div class="form-group">
                                        <label>İlk Başlık (250) </label>
                                        <input type="text" name="ybaslik" required class="form-control" value="<?=@$_POST["mbaslikiki"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Alt Başlık (250) </label>
                                        <input type="text" name="yaltbaslik" required class="form-control" value="<?=@$_POST["mybir"]?> ">
                                    </div>
                                    <div class="form-group form-check">
                                        <label>
                                        <input type="checkbox" name="aktif"  class="form-check-input" >Aktif mi</label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="submit" value="Ekle" class="btn btn-primary">
                                    </div>
                            </div>
                        </div>
                </main>
<?php
include ('inc/afooter.php');
?>