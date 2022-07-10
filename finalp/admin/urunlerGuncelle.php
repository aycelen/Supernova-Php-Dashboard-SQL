<?php
$sayfa="Urunler";
include ('inc/ahead.php');

if($_SESSION["yetki"]!="1"){

    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    echo "<script> Swal.fire ({title:'Hatalı!',text:'Yetkisiz Kullanıcı !', icon:'error', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='urunler.php'}})</script>";
    exit;
}



$sorgu=$baglanti->prepare("select * from urunler where id=:id");
$sorgu->execute(["id"=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();

if($_POST) {
    $guncelleSorgu = $baglanti->prepare("Update urunler set ufoto=:ufoto, ybaslik=:ybaslik, yaltbaslik=:yaltbaslik, yparag=:yparag, aktif=:aktif  where id=:id");
    $guncelle = $guncelleSorgu->execute([

        'ufoto' => $_FILES["ufoto"],
        'ybaslik' => $_POST["ybaslik"],
        'yaltbaslik' => $_POST["yaltbaslik"],
        'yparag' => $_POST["yparag"],
        'aktif' => (int)$_POST["aktif"],
        'id' => (int)$_GET["id"]
    ]);

    if ($guncelle) {
        echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire ({title:'Başarılı!',text:'Güncelleme Başarılı!', icon:'success', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='urunler.php'}})</script>";
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
                                        <label>Fotoğraf</label>
                                        <input type="file" name="ufoto" required class="form-control-file" value="<?= $sonuc["ufoto"]?>">
                                    </div>
                                    <br>
                                <div class="form-group">
                                    <label>İlk Başlık (250) </label>
                                    <input type="text" name="ybaslik" required class="form-control" value="<?= $sonuc["ybaslik"]?>">
                                </div>
                                <div class="form-group">
                                    <label>Alt Başlık (250) </label>
                                    <input type="text" name="yaltbaslik" required class="form-control" value="<?= $sonuc["yaltbaslik"]?>">
                                </div>
                                <div class="form-group">
                                    <label>Paragraf (250) </label>
                                    <input type="text" name="yparag" required class="form-control" value="<?= $sonuc["yparag"]?>">
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