<?php
$sayfa="Ana Sayfa";
include ('inc/ahead.php');

if($_SESSION["yetki"]!="1"){

    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    echo "<script> Swal.fire ({title:'Hatalı!',text:'Yetkisiz Kullanıcı !', icon:'error', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='anasayfa.php'}})</script>";
    exit;
}



$sorgu=$baglanti->prepare("select * from anasayfa where id=:id");
$sorgu->execute(["id"=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();

if($_POST) {
    $guncelleSorgu = $baglanti->prepare("Update anasayfa set ybir=:ybir, yiki=:yiki, yuc=:yuc, ydort=:ydort, ybes=:ybes, yalti=:yalti, yyedi=:yyedi, foto=:foto where id=:id");
    $guncelle = $guncelleSorgu->execute([

        'ybir' => $_POST["ybir"],
        'yiki' => $_POST["yiki"],
        'yuc' => $_POST["yuc"],
        'ydort' => $_POST["ydort"],
        'ybes' => $_POST["ybes"],
        'yalti' => $_POST["yalti"],
        'yyedi' => $_POST["yyedi"],
        'foto' => $_POST["foto"],
        'id' => (int)$_GET["id"]
    ]);

    if ($guncelle) {
        echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire ({title:'Başarılı!',text:'Güncelleme Başarılı!', icon:'success', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='anasayfa.php'}})</script>";
    }
}
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ana Sayfa Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Ana Sayfa Güncelle</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>İlk Başlık (250) </label>
                                        <input type="text" name="ybir" required class="form-control" value="<?= $sonuc["ybir"]?>">
                                    </div>
                                <div class="form-group">
                                    <label>İkinci Başlık (250) </label>
                                    <input type="text" name="yiki" required class="form-control" value="<?= $sonuc["yiki"]?>">
                                </div>
                                <div class="form-group">
                                    <label>İlk Paragraf (250) </label>
                                    <input type="text" name="yuc" required class="form-control" value="<?= $sonuc["yuc"]?>">
                                </div>
                                <div class="form-group">
                                    <label>Link (250) </label>
                                    <input type="text" name="ydort" required class="form-control" value="<?= $sonuc["ydort"]?>">
                                </div>
                                <div class="form-group">
                                    <label>İlk Alt Başlık (250) </label>
                                    <input type="text" name="ybes" required class="form-control" value="<?= $sonuc["ybes"]?>">
                                </div>
                                <div class="form-group">
                                    <label>İkinci Alt Başlık (250) </label>
                                    <input type="text" name="yalti" required class="form-control" value="<?= $sonuc["yalti"]?>">
                                </div>
                                <div class="form-group">
                                    <label>İkinci Paragraf (250) </label>
                                    <input type="text" name="yyedi" required class="form-control" value="<?= $sonuc["yyedi"]?>">
                                </div>

                                    <br><div class="form-group">
                                    <label>Fotoğraf (100) </label>
                                        <input type="file" name="foto" required class="form-control-file" value="<?= $sonuc["foto"]?>">
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