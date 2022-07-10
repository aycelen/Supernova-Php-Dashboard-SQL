<?php
$sayfa="Ana Sayfa";
include ('inc/ahead.php');
$sorgu=$baglanti->prepare("select * from anasayfa");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ana Sayfa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Ana Sayfa</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>İlk Başlık</th>
                                            <th>İkinci Başlık</th>
                                            <th>İlk Paragraf</th>
                                            <th>Link</th>
                                            <th>İlk Alt Başlık</th>
                                            <th>İkinci Alt Başlık</th>
                                            <th>İkinci Paragraf</th>
                                            <th>Fotoğraf</th>
                                            <th>Güncelle</th>
                                            <th>Sil</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><?=$sonuc["ybir"]?></td>
                                            <td><?=$sonuc["yiki"]?></td>
                                            <td><?=$sonuc["yuc"]?></td>
                                            <td><?=$sonuc["ydort"]?></td>
                                            <td><?=$sonuc["ybes"]?></td>
                                            <td><?=$sonuc["yalti"]?></td>
                                            <td><?=$sonuc["yyedi"]?></td>
                                            <td><img width="200" src="../assets/img/<?=$sonuc["foto"]?>" alt=""></td>

                                            <td class="text-center">

                                                <?php if($_SESSION["yetki"]=="1") { ?>

                                                <a href="anasayfaGuncelle.php?id=<?=$sonuc["id"]?>">
                                              <span class="fa fa-edit fa-2x"></span>
                                                </a>
                                                <?php
                                            }
                                                ?></td>
                                            <td class="text-center">
                                            Sil
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