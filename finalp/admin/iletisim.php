<?php
$sayfa="İletişim";
include ('inc/ahead.php');
$sorgu=$baglanti->prepare("select * from iletisim");
$sorgu->execute();
$sonuc=$sorgu->fetch();
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">İletişim Bilgileri</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">İletişim Bilgileri</li>

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
                                            <th>Haftaiçi ÇS.</th>
                                            <th>Cumartesi ÇS.</th>
                                            <th>Pazar ÇS.</th>
                                            <th>Adres Başlık</th>
                                            <th>Adres Alt Başlık</th>
                                            <th>İkinci Başlık</th>
                                            <th>Telefon</th>
                                            <th>Mail</th>
                                            <th>Güncelle</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><?=$sonuc["ibaslik"]?></td>
                                            <td><?=$sonuc["ihaftaici"]?></td>
                                            <td><?=$sonuc["icumart"]?></td>
                                            <td><?=$sonuc["ipazar"]?></td>
                                            <td><?=$sonuc["iadresbir"]?></td>
                                            <td><?=$sonuc["iadresiki"]?></td>
                                            <td><?=$sonuc["ibaslikiki"]?></td>
                                            <td><?=$sonuc["itelefon"]?></td>
                                            <td><?=$sonuc["imail"]?></td>
                                            <td class="text-center">

                                                <?php if($_SESSION["yetki"]=="1") { ?>

                                                <a href="iletisimGuncelle.php?id=<?=$sonuc["id"]?>">
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