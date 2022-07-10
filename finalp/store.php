<?php
include ("inc/head.php");
include ("inc/finalpvt.php");
$sorgu=$baglanti->prepare("select * from magaza WHERE aktif=1");
$sorgu->execute();
$sayfa="Mağaza";
while($sonuc=$sorgu->fetch())
{
?>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">
                                <span class="section-heading-upper"><?php echo $sonuc["mbaslikbir"]?></span>
                                <span class="section-heading-lower"><?php echo $sonuc["mbaslikiki"]?></span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section about-heading">
            <div class="container">
                <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/<?php echo $sonuc["mfotbir"]?>" alt="..." />
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <p><?php echo $sonuc["mybir"]?></p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }?>

<?php
include ("inc/footer.php")
?>