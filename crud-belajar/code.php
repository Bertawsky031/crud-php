<?php
session_start();
require 'connect.php';

if(isset($_POST['hapus_mahasiswa']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['hapus_mahasiswa']);

    $query = "DELETE FROM mahasiswa WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Data Mahasiswa Berhasil di Hapus";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Data Tidak Terhapus!!!";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $studi = mysqli_real_escape_string($con, $_POST['studi']);

    $query = "UPDATE mahasiswa SET nama='$nama', email='$email', phone='$phone', studi='$studi' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Update Data Mahasiswa Berhasil";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Update Data Gagal!!!";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $studi = mysqli_real_escape_string($con, $_POST['studi']);

    $query = "INSERT INTO mahasiswa (nama,email,phone,studi) VALUES ('$nama','$email','$phone','$studi')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Data Mahasiswa Berhasil di Tambah";
        header("Location: mahasiswa-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Data Gagal di Tambahkan!!!";
        header("Location: mahasiswa-create.php");
        exit(0);
    }
}

?>