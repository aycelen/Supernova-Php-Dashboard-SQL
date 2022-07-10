<?php
$sayfa="Ana Sayfa";
include ("inc/finalpvt.php");
include ("inc/head.php");
$sorgu=$baglanti->prepare("select * from anasayfa");
$sorgu->execute();
$sonuc=$sorgu->fetch();

?>
    <section class="page-section clearfix">
        <div class="container">
            <div class="intro">
                <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/<?php echo $sonuc["foto"] ?>" alt="..." />
                <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper"><?php echo $sonuc["ybir"] ?> </span>
                        <span class="section-heading-lower"><?php echo $sonuc["yiki"] ?></span>
                    </h2>
                    <p class="mb-3"><?php echo $sonuc["yuc"] ?></p>
                    <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="store"><?php echo $sonuc["ydort"] ?></a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section cta">
        <div class="container" >
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner bg-faded text-center rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper"><?php echo $sonuc["ybes"] ?></span>
                            <span class="section-heading-lower"><?php echo $sonuc["yalti"] ?></span>
                        </h2>
                        <p class="mb-0"><?php echo $sonuc["yyedi"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include ("inc/footer.php")
?>