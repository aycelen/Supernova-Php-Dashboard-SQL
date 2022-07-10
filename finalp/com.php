<?php
$sayfa="İletişim";
include ("inc/finalpvt.php");
$sorgu=$baglanti->prepare("select * from iletisim");
$sorgu->execute();
$sonuc=$sorgu->fetch();
include ("inc/head.php");
session_start();
?>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-5">
                                <span class="section-heading-lower"><?php echo $sonuc["ibaslik"]?></span>
                            </h2>
                            <ul class="list-unstyled list-hours mb-5 text-left mx-auto">

                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Hafta içi
                                    <span class="ms-auto"><?php echo $sonuc["ihaftaici"]?></span>
                                </li>
                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Cumartesi
                                    <span class="ms-auto"><?php echo $sonuc["icumart"]?></span>
                                </li>
                                <li class="list-unstyled-item list-hours-item d-flex">
                                    Pazar
                                    <span class="ms-auto"><?php echo $sonuc["ipazar"]?></span>
                                </li>
                            </ul>
                            <p class="address mb-5">
                                <em>
                                    <strong><?php echo $sonuc["iadresbir"]?></strong>
                                    <br />
                                    <?php echo $sonuc["iadresiki"]?>
                                </em>
                            </p>
                            <p class="mb-0">
                                <small><em><?php echo $sonuc["ibaslikiki"]?></em></small>
                                <br />
                                <?php echo $sonuc["itelefon"]?>
                                <br />
                                İletişim Mail
                                <br />
                                <?php echo $sonuc["imail"]?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
$sorgu2=$baglanti->prepare("select * from iletisimiki");
$sorgu2->execute();
$sonuc2=$sorgu2->fetch();?>

    <section class="page-section cta">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="cta-inner bg-faded text-center rounded">
                <h2 class="section-heading text-uppercase mt-3">Her Zaman Haberedarız!</h2></div>
        <form id="contactForm" name="sentMessage" method="post" action="com">
            <div class="row align-items-stretch mb-5 cta-inner bg-faded text-center rounded">
                <div class="col-md-6 ">
                    <div class="form-group ">
                        <br>
                        <input class="form-control" id="name" name="txtAd" type="text" placeholder="Adınız Soyadınız" required="required" data-validation-required-message="Lütfen adınızı yazın." />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="email" name="txtEmail" type="email" placeholder="Mail Adresiniz" required="required" data-validation-required-message="Lütfen mail adresinizi yazın." />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group mb-md-0">
                        <img src="inc/captcha.php" alt="">
                        <br> <br>
                        <input type="text" class="form-control" placeholder="Güvenlik Kodunu Girin" name="captcha" required="required">
                    </div>
                </div>
                <div class="col-md-6">
                    <br>
                    <div class="form-group form-group-textarea mb-md-0 form">
                        <textarea class="form-control" id="message" name="txtMesaj" placeholder="İletmek İstediğiniz Mesaj" required="required" data-validation-required-message="Lütfen bir mesaj girin."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div id="success"></div>
                <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Gönder</button>
            </div>
        </form>
                <script type="text/javascript" src="js/sweetalert2.all.min.js"></script>
    </div>
        </div>
    </div>
    </section>

            <?php
            if($_POST) {

                if ($_SESSION['captcha'] == $_POST['captcha']) {


                    $sorgu2 = $baglanti->prepare("insert into iletisimiki SET ad=:ad,email=:email,mesaj=:mesaj");
                    $ekle = $sorgu2->execute(
                        [
                            'ad' => htmlspecialchars($_POST["txtAd"]),
                            'email' => htmlspecialchars($_POST["txtEmail"]),
                            'mesaj' => htmlspecialchars($_POST["txtMesaj"]),
                        ]
                    );

                    if ($ekle) {
                            echo "<script> Swal.fire ({title:'Başarılı!',text:'Mesajınız İletildi', icon:'success', confirmButtonText: 'Kapat'})</script>";

                        } else {
                            echo "<script> Swal.fire ('Hatalı!','Mesaj İletilmedi','error')</script>";
                        }
                    }
                }

                ?>

<?php
include ("inc/footer.php")
?>