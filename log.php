<?php
session_start();
error_reporting();
//ini_set('display_errors', 'on');
// error_reporting(0);
if (isset($_POST['username']) && ($_POST['password'])) {
$username = $_POST['username'];
$password = $_POST['password'];

include "vendors/koneksi.php";
/*$sql = mysql_query("select * from user where username = '$username' AND password = '$password' "); 
    $result = mysql_num_rows($sql);
    $dat = mysql_fetch_array($sql);*/
$sql = "SELECT * from user where username = '$username' AND password = '$password'";
$result = $db_con->query($sql);
$dat = $result->fetch(PDO::FETCH_ASSOC);

if ($result->rowCount() == 1) {
       

        if ($dat['status_log'] == 1) {
            $dds = $dat['id_dosen'];
            $sql1 = "SELECT * from dosen where id_dosen = '$dds'";
            $result1 = $db_con->query($sql1);
            $dat1 = $result1->fetch(PDO::FETCH_ASSOC);
           

            if ($result1->rowCount() == 1) {

                $_SESSION['id_dosen'] = $dat1['id_dosen'];
                $_SESSION['jurusan'] = $dat1['jurusan'];
                $_SESSION['email'] = $dat1['email'];
                $_SESSION['nama_dosen'] = $dat1['nama_dosen'];
                $_SESSION['status_dos'] = $dat1['status_dos'];
                $_SESSION['no_tlp'] = $dat1['no_tlp'];
                $_SESSION['status_log'] = $dat['status_log'];
                $_SESSION['password'] = $dat['password'];
                $_SESSION['username'] = $dat['username'];


                header("location:assets/index.php?page=0");
                    }
       




        } else {
            $_SESSION['error'] = "akun bermasalah";
            echo"<script>alert('akun anda dalam pengawasan, silahkan kontak akademik');history.go(-1);</script>";
            }

        } else {
            $_SESSION['error'] = "username / password salah";
            echo"<script>alert('Username atau password anda salah');history.go(-1);</script>";
            }

        } else {
                echo"no data";
            }
?>
