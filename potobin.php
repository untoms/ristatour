<html>
<body>
<div id="featured_form">
<?php
$idpesan=$_POST['idpesan'];
//data gambar
$ext	= array('png', 'jpeg', 'jpg');
$file_name		= $_FILES['file']['name'];
$file_ext		= strtolower(end(explode('.', $file_name)));
$file_tmp		= $_FILES['file']['tmp_name'];

if (empty($_FILES['file']['name'])){
    echo "<script>alert('Upload resi gagal!, File Upload anda Kosong');
    window.location=('index.php?halaman=cart');</script>";
}else{
    if(in_array($file_ext, $ext) === true){
    $alamatfile = 'images/resi/'.$_POST['idpesan'].'.'.$file_ext;
    //kode untuk upload ke folder gambar
    move_uploaded_file($file_tmp, $alamatfile);

 $image_data=file_get_contents($file_tmp);

    $encoded_image=base64_encode($image_data);

    echo $encoded_image;
    }else{
            echo "<script>alert('Upload Resi gagal!, Ekstensi file upload tidak diperbolehkan')</script>";
    }
}
?>
</body>
</html>