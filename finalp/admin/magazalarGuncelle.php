<?php
$sayfa="Magazalar";
include ('inc/ahead.php');

if($_SESSION["yetki"]!="1"){

    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    echo "<script> Swal.fire ({title:'Hatalı!',text:'Yetkisiz Kullanıcı !', icon:'error', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='magazalar.php'}})</script>";
    exit;
}

$sorgu=$baglanti->prepare("select * from magaza where id=:id");
$sorgu->execute(["id"=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();

if($_POST) {
    $guncelleSorgu = $baglanti->prepare("Update magaza set mbaslikbir=:mbaslikbir, mbaslikiki=:mbaslikiki, mfotbir=:mfotbir, mybir=:mybir, aktif=:aktif  where id=:id");
    $guncelle = $guncelleSorgu->execute([

        'mbaslikbir' => $_POST["mbaslikbir"],
        'mbaslikiki' => $_POST["mbaslikiki"],
        'mfotbir' => $_POST["mfotbir"],
        'mybir' => $_POST["mybir"],
        'aktif' => $_POST["aktif"],
        'id' => (int)$_GET["id"]
    ]);

    if ($guncelle) {
        echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire ({title:'Başarılı!',text:'Güncelleme Başarılı!', icon:'success', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='magazalar.php'}})</script>";
    }
}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ürünler Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Ürünler Güncelle</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>İlk Başlık</label>
                                        <input type="text" name="mbaslikbir" required class="form-control" value="<?= $sonuc["mbaslikbir"]?>">
                                    </div>
                                <div class="form-group">
                                    <label>İkinci Başlık (250) </label>
                                    <input type="text" name="mbaslikiki" required class="form-control" value="<?= $sonuc["mbaslikiki"]?>">
                                </div>
                                <div class="form-group">
                                    <label>Fotoğraf</label>
                                    <input type="text" name="mfotbir" required class="form-control" value="<?= $sonuc["mfotbir"]?>">
                                </div>
                                <div class="form-group">
                                    <label>Paragraf </label>
                                    <input type="text" name="mybir" required class="form-control" value="<?= $sonuc["mybir"]?>">
                                </div>
                                <div class="form-group">
                                    <label>Aktiflik </label>
                                    <input type="text" name="aktif" required class="form-control" value="<?= $sonuc["aktif"]?>">
                                </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="submit" value="Güncelle" class="btn btn-primary">
                                    </div>
                        </div>
                    </div>
                </main>
<?php
include ('inc/afooter.php');
?>