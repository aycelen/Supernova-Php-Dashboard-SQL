<?php

$sayfa="";
include ('inc/ahead.php');

if($_SESSION["yetki"]!="1"){

    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    echo "<script> Swal.fire ({title:'Hatalı!',text:'Yetkisiz Kullanıcı !', icon:'error', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='index.php'}})</script>";
    exit;
}

if($_GET){
    $tablo=$_GET["tablo"];
    $id=(int)$_GET["id"];

    $sorgu=$baglanti->prepare("DELETE FROM $tablo WHERE id=:id");
    $sonuc=$sorgu->execute(["id"=>$id]);
    if($sonuc){
        echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        echo "<script> Swal.fire ({title:'Başarılı!',text:'Silme Başarılı !', icon:'succes', confirmButtonText: 'Kapat'}).then((value)=>{
    if(value.isConfirmed){window.location.href='$tablo.php'}})</script>";
    }

}

include('inc/afooter.php');
