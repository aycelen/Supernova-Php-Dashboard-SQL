<?php
$sayfa="İletisim";
include ('inc/ahead.php');

if($_SESSION["yetki"]!="1"){

    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    echo "<script> Swal.fire ({title:'Hatalı!',text:'Yetkisiz Kullanıcı !', icon:'error', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='magazalar.php'}})</script>";
    exit;
}

$sorgu=$baglanti->prepare("select * from iletisim where id=:id");
$sorgu->execute(["id"=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();

if($_POST) {
    $guncelleSorgu = $baglanti->prepare("Update iletisim set ibaslik=:ibaslik, ihaftaici=:ihaftaici  , icumart=:icumart, ipazar=:ipazar, iadresbir=:iadresbir,
                    iadresiki=:iadresiki, ibaslikiki=:ibaslikiki, itelefon=:itelefon, imail	=:imail	  where id=:id");
    $guncelle = $guncelleSorgu->execute([

        'ibaslik' => $_POST["ibaslik"],
        'ihaftaici' => $_POST["ihaftaici"],
        'icumart' => $_POST["icumart"],
        'ipazar' => $_POST["ipazar"],
        'iadresbir' => $_POST["iadresbir"],
        'iadresiki' => $_POST["iadresiki"],
        'ibaslikiki' => $_POST["ibaslikiki"],
        'itelefon' => $_POST["itelefon"],
        'imail' => $_POST["imail"],
        'id' => (int)$_GET["id"]
    ]);

    if ($guncelle) {
        echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire ({title:'Başarılı!',text:'Güncelleme Başarılı!', icon:'success', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='iletisim.php'}})</script>";
    }
}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">İletişim Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">İletişim Güncelle</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>İlk Başlık</label>
                                        <input type="text" name="ibaslik" required class="form-control" value="<?= $sonuc["ibaslik"]?>">
                                    </div>
                                <div class="form-group">
                                    <label>Haftaiçi ÇS. (250) </label>
                                    <input type="text" name="ihaftaici" required class="form-control" value="<?= $sonuc["ihaftaici"]?>">
                                </div>
                                <div class="form-group">
                                    <label>Cumartesi ÇS.</label>
                                    <input type="text" name="icumart" required class="form-control" value="<?= $sonuc["icumart"]?>">
                                </div>
                                <div class="form-group">
                                    <label>Pazar ÇS. </label>
                                    <input type="text" name="ipazar" required class="form-control" value="<?= $sonuc["ipazar"]?>">
                                </div>
                                <div class="form-group">
                                    <label>Adres Başlığı </label>
                                    <input type="text" name="iadresbir" required class="form-control" value="<?= $sonuc["iadresbir"]?>">
                                </div>
                                    <div class="form-group">
                                        <label>Adres İki </label>
                                        <input type="text" name="ibaslikiki" required class="form-control" value="<?= $sonuc["ibaslikiki"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon </label>
                                        <input type="text" name="itelefon" required class="form-control" value="<?= $sonuc["itelefon"]?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Mail </label>
                                        <input type="text" name="imail" required class="form-control" value="<?= $sonuc["imail"]?>">
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