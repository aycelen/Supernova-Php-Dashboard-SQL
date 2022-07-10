<?php
$sayfa="Hakkimizda";
include ('inc/ahead.php');
$sorgu=$baglanti->prepare("select * from hakkimizda");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Hakkımızda</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Hakkımızda</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Fotoğraf</th>
                                            <th>İlk Başlık</th>
                                            <th>İkinci Başlık</th>
                                            <th>Paragraf</th>
                                            <th>Güncelle</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><img width="200" src="../assets/img/<?=$sonuc["hfoto"]?>" alt=""></td>
                                            <td><?=$sonuc["hybir"]?></td>
                                            <td><?=$sonuc["hyiki"]?></td>
                                            <td><?=$sonuc["hyuc"]?></td>


                                            <td class="text-center">

                                                <?php if($_SESSION["yetki"]=="1") { ?>

                                                <a href="hakkimizdaGuncelle.php?id=<?=$sonuc["id"]?>">
                                              <span class="fa fa-edit fa-2x"></span>
                                                </a>
                                                <?php
                                            }
                                                ?>

                                                </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include ('inc/afooter.php');
?>