<?php
$sayfa="Hakkimizda";
include ('inc/ahead.php');

if($_SESSION["yetki"]!="1"){

    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    echo "<script> Swal.fire ({title:'Hatalı!',text:'Yetkisiz Kullanıcı !', icon:'error', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='hakkimizda.php'}})</script>";
    exit;
}



$sorgu=$baglanti->prepare("select * from hakkimizda where id=:id");
$sorgu->execute(["id"=>(int)$_GET["id"]]);
$sonuc=$sorgu->fetch();

if($_POST) {
    $guncelleSorgu = $baglanti->prepare("Update hakkimizda    set hfoto=:hfoto, hybir=:hybir, hyiki=:hyiki, hyuc=:hyuc where id=:id");
    $guncelle = $guncelleSorgu->execute([

        'hfoto' => $_POST["hfoto"],
        'hybir' => $_POST["hybir"],
        'hyiki' => $_POST["hyiki"],
        'hyuc' => $_POST["hyuc"],
        'id' => (int)$_GET["id"]
    ]);

    if ($guncelle) {
        echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire ({title:'Başarılı!',text:'Güncelleme Başarılı!', icon:'success', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='hakkimizda.php'}})</script>";
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
                                    <br>
                                    <div class="form-group">
                                        <label>Fotoğraf (250) </label>
                                        <input type="file" name="hfoto" required class="form-control-file" value="<?= $sonuc["hfoto"]?>">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                    <label>İlk Başlık (250) </label>
                                    <input type="text" name="hybir" required class="form-control" value="<?= $sonuc["hybir"]?>">
                                </div>
                                    <div class="form-group">
                                        <label>Paragraf (250) </label>
                                        <input type="text" name="hyiki" required class="form-control" value="<?= $sonuc["hyiki"]?>">
                                    </div>
                                <div class="form-group">
                                    <script src="js/ckeditor5/ckeditor5-build-classic/ckeditor.js"></script>
                                    <label>İkinci Başlık (250) </label>

                                    <textarea name="hyuc" id="editor" > <?= @$_POST[ "hyuc"]?></textarea>
                                    <script>
                                        ClassicEditor
                                            .create( document.querySelector( '#editor' ) )
                                            .then( editor => {
                                                console.log( editor );
                                            } )
                                            .catch( error => {
                                                console.error( error );
                                            } );
                                    </script>
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