<?php
$sayfa="Magazalar";
include ('inc/ahead.php');

?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Mağazalar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Mağazalar</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="magazaekle.php" class="btn btn-primary"> Mağaza Ekle </a></div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>İlk Başlık</th>
                                            <th>İkinci Başlık</th>
                                            <th>Fotoğraf</th>
                                            <th>Paragraf</th>
                                            <th>Aktiflik</th>
                                            <th>Güncelle</th>
                                            <th>Sil</th>

                                        </tr>
                                    </thead>
                                <?php $sorgu=$baglanti->prepare("select * from magaza");
                                    $sorgu->execute();
                                    while ($sonuc=$sorgu->fetch())
                                {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$sonuc["mbaslikbir"]?></td>
                                            <td><?=$sonuc["mbaslikiki"]?></td>
                                            <td><img width="200" src="../assets/img/<?=$sonuc["mfotbir"]?>" alt=""></td>
                                            <td><?=$sonuc["mybir"]?></td>
                                            <td><?=$sonuc["aktif"]?></td>

                                            <td class="text-center">

                                                <?php if($_SESSION["yetki"]=="1") { ?>

                                                <a href="magazalarGuncelle.php?id=<?=$sonuc["id"]?>">
                                              <span class="fa fa-edit fa-2x"></span>
                                                </a>
                                                <?php
                                            }
                                                ?>

                                            <td class="text-center">
                                                <?php if($_SESSION["yetki"]=="1") { ?>
                                                    <a href="#!" data-bs-toggle="modal" data-bs-target="#silModal<?=$sonuc["id"] ?>"><i class="fa fa-trash fa-2x text-danger"></i></a>


                                                    <!-- Modal -->
                                                    <div class="modal fade" id="silModal<?=$sonuc["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img width="200" src="../assets/img/<?=$sonuc["mfotbir"]?>" alt="">

                                                                    Silmek istediğinize emin misiniz?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                                                                    <a href="sil.php?id=<?=$sonuc["id"] ?>&tablo=magaza" class="btn btn-danger">Evet</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }?>

                                            </td>

                                                </td>


                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include ('inc/afooter.php');
?>