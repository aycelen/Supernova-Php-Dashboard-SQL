<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <?php
                                        session_start();
                                        include ("../inc/finalpvt.php");

                                        if(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"]=="17")
                                        {
                                            header("location:index.php");
                                        }
                                        elseif(isset($_COOKIE["cerez"])) {

                                            $sorgu=$baglanti->prepare("select kadi,yetki from adminpage where aktif=1");
                                            $sorgu->execute();
                                            while($sonuc=$sorgu->fetch()){
                                                if($_COOKIE["cerez"]==md5("aa".$sonuc["kadi"]."bb")){

                                                    $_SESSION["Oturum"]="17";
                                                    $_SESSION["kadi"]=$sonuc["kadi"];
                                                    $_SESSION["yetki"]=$sonuc["yetki"];
                                                    header("location:index.php");


                                                }
                                            }


                                        }

                                        //$kadi=""; iki yoldan biri hata bastıamk için
                                        if($_POST) {

                                            $kadi = $_POST["txtKadi"];
                                            $parola = $_POST["txtParola"];
                                        }
                                        ?>


                                        <form method="post" action="login.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail"  value="<?=@$kadi ?>" name="txtKadi" type="text" placeholder="Kullanıcı Adını Giriniz" />
                                                <label for="inputEmail">Kullanıcı Adı</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="txtParola" type="password" placeholder="Şifrenizi Giriniz" />
                                                <label for="inputPassword">Parola</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <img src="../inc/captcha.php" alt="">
                                                <br><br>
                                                <input class="form-control" id="inputPassword" name="captcha" type="text" placeholder="Resimdeki sayıları girin" />
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="cbHatirla" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Beni Hatırla</label>
                                            </div>
                                                <a class="small" href="password.html">Forgot Password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                                <input type="submit" class="btn btn-primary" value="Giriş"/>
                                            </div>
                                        </form>

                                    <script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>


                                    <?php
                                    if($_POST) {
                                        if ($_SESSION["captcha"] == $_POST["captcha"]) {
                                            $sorgu = $baglanti->prepare("select parola,yetki from adminpage where kadi=:kadi and aktif=1");
                                            $sorgu->execute(['kadi' => htmlspecialchars($kadi)]);
                                            $sonuc = $sorgu->fetch();

                                            if (md5("56" . $parola . "23") == $sonuc["parola"]) {

                                                $_SESSION["Oturum"] = "17";
                                                $_SESSION["kadi"] = $kadi;
                                                $_SESSION["yetki"] = $sonuc["yetki"];

                                                if (isset($_POST["cbHatirla"])) {

                                                    setcookie("cerez", md5("aa" . $kadi . "bb"), time() + (60 * 60 * 24 * 7));
                                                }


                                                header("location:index.php");
                                            } else {
                                                echo "<script> Swal.fire ('Hatalı!','Kullanıcı adı veya parola hatalı !','error')</script>";
                                            }

                                        } else {
                                            echo "<script> Swal.fire ('Hatalı!','Resimdeki sayıları yalnış girdiniz!','error')</script>";
                                        }
                                    }
                                    ?>

                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"  ><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
