<?php
$sayfa="Ürünlerimiz";
include ("inc/head.php");
include ("inc/finalpvt.php");
$sorgu=$baglanti->prepare("select * from urunler WHERE aktif=1");
$sorgu->execute();
while($sonuc=$sorgu->fetch())
{
?>
        <section class="page-section">
            <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 d-flex ms-auto rounded">
                            <h2 class="section-heading mb-0">
                                <span class="section-heading-upper"><?php echo $sonuc["ybaslik"]?></span>
                                <span class="section-heading-lower"><?php echo $sonuc["yaltbaslik"]?></span>
                            </h2>
                        </div>
                    </div>
                    <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="assets/img/<?php echo $sonuc["ufoto"]?>" alt="..." />
                    <div class="product-item-description d-flex me-auto">
                        <div class="bg-faded p-5 rounded"><p class="mb-0"><?php echo $sonuc["yparag"]?>
                </div>
            </div>
        </section>

<?php  }?>
<?php
include ("inc/footer.php")
?>