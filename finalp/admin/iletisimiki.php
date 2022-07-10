<?php
$sayfa="Mesaj Gönderimi";
include ('inc/ahead.php');
 ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Mesaj Gönderimi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Mesaj Gönderimi</li>

                        </ol>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">

                                    <thead>
                                        <tr>
                                            <th>İsim</th>
                                            <th>Email</th>
                                            <th>Mesaj</th>
                                            <th>Tarih</th>
                                        </tr>
                                    </thead>
                                    <?php $sorgu=$baglanti->prepare("select * from iletisimiki");
                                    $sorgu->execute();
                                    while($sonuc=$sorgu->fetch()){
                                        ?>

                                    <tbody>
                                        <tr>
                                            <td><?=$sonuc["ad"]?></td>
                                            <td><?=$sonuc["email"]?></td>
                                            <td><?=$sonuc["mesaj"]?></td>
                                            <td><?=$sonuc["tarih"]?></td>
                                        </tr>
                                        <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<?php
include ('inc/afooter.php');
?>