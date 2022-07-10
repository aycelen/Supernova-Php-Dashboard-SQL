<?php
$sayfa="Hakkımızda";
include ("inc/head.php");
include ("inc/finalpvt.php");
$sorgu=$baglanti->prepare("select * from hakkimizda");
$sorgu->execute();
$sonuc=$sorgu->fetch(); ?>
        <section class="page-section about-heading">
            <div class="container">
                <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/<?php echo $sonuc["hfoto"]?>" alt="..." />
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper"><?php echo $sonuc["hybir"]?></span>
                                    <span class="section-heading-lower"><?php echo $sonuc["hyiki"]?></span>
                                </h2>
                                <p><?php echo $sonuc["hyuc"]?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
include ("inc/footer.php")
?>