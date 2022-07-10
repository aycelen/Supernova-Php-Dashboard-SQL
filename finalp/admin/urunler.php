<?php
$sayfa="Ürünler";
include ('inc/ahead.php');
?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ürünler</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                            <li class="breadcrumb-item active">Ürünler</li>

                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="urunekle.php" class="btn btn-primary"> Ürün Ekle </a></div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>İlk Başlık</th>
                                            <th>İkinci Başlık</th>
                                            <th>Paragraf</th>
                                            <th>Aktif</th>
                                            <th>Güncelle</th>
                                            <th>Sil</th>

                                        </tr>
                                    </thead>
                                    <?php $sorgu=$baglanti->prepare("select * from urunler");
                                    $sorgu->execute();
                                    while ($sonuc=$sorgu->fetch()){
?>
                                    <tbody>
                                        <tr>
                                            <td><img width="200" src="../assets/img/<?=$sonuc["ufoto"]?>" alt=""></td>
                                                <td><?=$sonuc["ybaslik"]?></td>
                                            <td><?=$sonuc["yaltbaslik"]?></td>
                                            <td><?=$sonuc["yparag"]?></td>
                                            <td>
                                                <link href="css/switch.css" rel="stylesheet"/>
                                                <label class="switch">
                                                    <!-- checkbox a id ve checked bilgilerini ekliyoruz -->
                                                    <input type="checkbox" id='<?= $sonuc['id'] ?>' class="aktifPasif" <?= $sonuc['aktif']==1?'checked':'' ?>  />
                                                    <span class="slider round"></span>
                                                </label>

                                                </span></td>
                                            <td> <?php if($_SESSION["yetki"]=="1") { ?>

                                                    <a href="urunlerGuncelle.php?id=<?=$sonuc["id"]?>">
                                                        <span class="fa fa-edit fa-2x"></span>
                                                    </a>
                                                    <?php
                                                }
                                                ?></td>

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
                                                                <img width="200" src="../assets/img/<?=$sonuc["ufoto"]?>" alt="">
                                                                Silmek istediğinize emin misiniz?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
                                                                <a href="sil.php?id=<?=$sonuc["id"] ?>&tablo=urunler" class="btn btn-danger">Evet</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }?>

                                                </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
include ('inc/afooter.php');
?>
<script>
    $(document).ready(function () {
        $('.aktifPasif').click(function (event) {
            var id = $(this).attr("id");  //id değerini alıyoruz

            var durum = ($(this).is(':checked')) ? '1' : '0';
            //checkbox a göre aktif mi pasif mi bilgisini alıyoruz.

            $.ajax({
                type: 'POST',
                url: 'inc/aktifPasif.php',  //işlem yaptığımız sayfayı belirtiyoruz
                data: { id:'id', tablo:'urunler',durum:'durum' }, //datamızı yolluyoruz
                success: function (result) {
                    $('#sonuc').text(result);
                    //gelen sonucu h2 tagında gösteriyoruz
                },
                error: function () {
                    alert('Hata');
                }
            });
        });
    });
</script>
