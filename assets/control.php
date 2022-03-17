<?php
session_start();
// error_reporting(0);
include("../vendors/koneksi.php");


$kc = $_GET['kc'];



// katdos
if ($kc == "katdos1" ){

	$sesi = $_POST['kategori'];

	// echo "$sesi";
	$jml = count($sesi);
 	// echo $jml;

		for($x=0;$x<$jml;$x++){

	$sql = $db_con->query("INSERT INTO kategori_dos VALUES (0,'$_POST[id_dos]','$_POST[nama_dos]','$sesi[$x]');");

			}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=11">';
exit;	
} elseif ($kc == "katdos2"){
	$kode = $_GET['kode'];
	$sql = $db_con->query("DELETE FROM kategori_dos where kode_kategori_dos = '$kode'");
	// echo "$sql";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=11">';
exit;	
} 
// end katdos


// KMDOS
if ($kc == "kmdos1" ){

	$sesi = $_POST['jam'];

	// echo "$sesi";
	$jml = count($sesi);
 	// echo $jml;

		for($x=0;$x<$jml;$x++){

	$sql = $db_con->query("INSERT INTO ketersediaan VALUES (0,'$_POST[id_dos]','$_POST[nama_dos]','$_POST[hari]','$sesi[$x]');");

			}
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=1">';
exit;	
} elseif ($kc == "kmdos2"){
	$kode = $_GET['kode'];
	$sql = $db_con->query("DELETE FROM ketersediaan where kode_ketersediaan = '$kode'");
	// echo "$sql";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=1">';
exit;	
} 
// end KMDOS

// ruangan
if ($kc == "ruang1" ){

	$ssq=  "SELECT MAX(kode_ruangan) as aa FROM ruang_belajar";
                        				//echo $sp;
        $exe = $db_con->query($ssq) or die (mysql_error());
		while($data=$exe->fetch(PDO::FETCH_ASSOC)){
			if ($data['aa'] == 0) {
				$r = 1;
			} else{
			$r = $data['aa']+1;
		}
	}
	
	$sql = $db_con->query("INSERT INTO ruang_belajar VALUES ($r,'$_POST[nama_ruang]','$_POST[kapasitas]');");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=6">';
exit;	
} elseif ($kc == "ruang2"){
	$sql = $db_con->query("DELETE FROM ruang_belajar where kode_ruangan = '$_GET[kdr]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=6">';
exit;	
}
// end ruangan

// ruangan
if ($kc == "profile" ){

	$iddos = $_POST['iddos'];
	
	$sql = $db_con->query("UPDATE dosen SET nama_dosen='$_POST[namados]',notlp='$_POST[notlp]',email='$_POST[email]' WHERE id_dosen = '$iddos'");
	$sql = $db_con->query("UPDATE user SET username='$_POST[username]',password='$_POST[repass]' WHERE id_dosen = '$iddos'");

	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=101">';
exit;	
} 
// end ruangan

// penelitian
if ($kc == "mk1" ){
	$sql = $db_con->query("INSERT INTO penelitian VALUES ('$_POST[kodemk]','$_POST[nim]','$_POST[namamhs]','$_POST[namamk]','$_POST[jurusan]','$_POST[sks]');
							");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=3">';
exit;	
} elseif ($kc == "mk2"){
	$sql = $db_con->query("DELETE FROM penelitian where kode_penelitian = '$_GET[kdmk]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=3">';
exit;	
} elseif ($kc == "mk3"){
	$sql = $db_con->query("DELETE FROM penelitian where kode_penelitian = '$_POST[kodemk]'");
// 	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=3">';
// exit;	
} 
// end penelitian

// user
if ($kc == "user1" ){

	
	$sql = $db_con->query("INSERT INTO dosen VALUES ('$_POST[id_dosen]','$_POST[nama_dosen]','$_POST[username]','','','$_POST[email]','$_POST[jurusan]',$_POST[status_dos]);");
	$sql = $db_con->query("INSERT INTO user VALUES ('$_POST[id_dosen]','$_POST[username]','123','1');");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=9">';
exit;	
} elseif ($kc == "ruang2"){
	$sql = $db_con->query("DELETE FROM user where kode_ruangan = '$_GET[kdr]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=9">';
exit;	
} 
// end user


// plot up
if ($kc == "plot_up1" ){


	$sql = $db_con->query("INSERT INTO plot_up VALUES (0,'$_POST[penelitian]','$_POST[dosen]','$_POST[dosen2]','$_POST[jurusan]','$_POST[keterangan]');");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=5">';
exit;	
} elseif ($kc == "plot_up2"){
	$sql = $db_con->query("DELETE FROM plot_up where kode_up = '$_GET[kdkls]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=5">';
exit;	
} elseif ($kc == "plot_up3"){
	$sql = $db_con->query("UPDATE plot_up SET keterangan='lulus' WHERE kode_up = '$_GET[kdkls]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=2&&ss=UP">';
exit;
}
// end plot up

// plot up
if ($kc == "plot_semhas1" ){


	$sql = $db_con->query("INSERT INTO plot_semhas VALUES (0,'$_POST[penelitian]','$_POST[dosen]','$_POST[dosen2]','$_POST[jurusan]','$_POST[keterangan]');");
	
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=51">';
exit;
} elseif ($kc == "plot_semhas2"){
	$sql = $db_con->query("DELETE FROM plot_semhas where kode_semhas = '$_GET[kdkls]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=51">';
exit;	
} elseif ($kc == "plot_semhas3"){
	$sql = $db_con->query("UPDATE plot_semhas SET keterangan='lulus' WHERE kode_semhas = '$_GET[kdkls]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=21&&ss=SH">';
exit;	
} 
// end plot up

// plot_akhir
if ($kc == "plot_akhir1" ){


	$sql = $db_con->query("INSERT INTO plot_akhir VALUES (0,'$_POST[penelitian]','$_POST[dosen]','$_POST[dosen2]','$_POST[kategori]','$_POST[dosen3]','$_POST[dosen4]','$_POST[jurusan]','$_POST[keterangan]');");
	
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=52">';
exit;	
} elseif ($kc == "plot_akhir2"){
	$sql = $db_con->query("DELETE FROM plot_akhir where kode_akhir = '$_GET[kdkls]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=52">';
exit;	
} elseif ($kc == "plot_akhir3"){
	$sql = $db_con->query("UPDATE plot_akhir SET keterangan='lulus' WHERE kode_akhir = '$_GET[kdkls]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=22&&ss=SA">';
exit;
}

// end plot_akhir





// ploting dosen
if ($kc == "plot_dos1" ){

	$sesi = $_POST['sesi'];
	
	$sql = $db_con->query("INSERT INTO plot_dosen VALUES (0,'$_POST[jurusan]','$_POST[penelitian]','$_POST[dosen]','$sesi','$_SESSION[id_dosen]');");

		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=41">';


exit;	
} elseif ($kc == "plot_dos2"){
	$sql = $db_con->query("DELETE FROM plot_dosen where kode_plot = '$_GET[kdplot]'");

		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=41">';

	exit;	
} 
// end user

// jadwal kuliah
if ($kc == "jadwal1up" ){

	$sql = $db_con->query("INSERT INTO jadwal_up SELECT '$_POST[kode_jadwal]' as d,kode_up,hari,jam,ruangan,'$_POST[thn_ajaran]' as thn FROM data_acak_up");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=81">';
exit;	
} elseif ($kc == "jadwal2up"){
	$sql = $db_con->query("DELETE FROM jadwal_up where kode_jadwal = '$_GET[kdj]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=81">';
exit;	
}


if ($kc == "jadwal1sh" ){

	$sql = $db_con->query("INSERT INTO jadwal_semhas SELECT '$_POST[kode_jadwal]' as d,kode_semhas,hari,jam,ruangan,'$_POST[thn_ajaran]' as thn FROM data_acak_semhas");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=82">';
exit;	
} elseif ($kc == "jadwal2sh"){
	$sql = $db_con->query("DELETE FROM jadwal_semhas where kode_jadwal = '$_GET[kdj]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=82">';
exit;	
} 


if ($kc == "jadwal1ta" ){

	$sql = $db_con->query("INSERT INTO jadwal_akhir SELECT '$_POST[kode_jadwal]' as d,kode_akhir,hari,jam,ruangan,'$_POST[thn_ajaran]' as thn FROM data_acak_akhir");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=83">';
exit;	
} elseif ($kc == "jadwal2ta"){
	$sql = $db_con->query("DELETE FROM jadwal_akhir where kode_jadwal = '$_GET[kdj]'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=83">';
exit;	
} 
// end jadwal kuliah

// acc
if ($kc == "ACC1RP" ){
	$kdjad = $_GET['kode_jadwal'];
	$sql = $db_con->query("TRUNCATE TABLE jadwal_up_fix;");
	$sql = $db_con->query("INSERT INTO jadwal_up_fix SELECT * FROM jadwal_up WHERE kode_jadwal = '$kdjad' ");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=99&&ss=RP">';
exit;	
}

if ($kc == "ACC1RM" ){
	$kdjad = $_GET['kode_jadwal'];
	$sql = $db_con->query("TRUNCATE TABLE jadwal_up_fix_rm;");
	$sql = $db_con->query("INSERT INTO jadwal_up_fix_rm SELECT * FROM jadwal_up_rm WHERE kode_jadwal = '$kdjad' ");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=99&&ss=RM">';
exit;	
}

if ($kc == "ACC1W" ){
	$kdjad = $_GET['kode_jadwal'];
	$sql = $db_con->query("TRUNCATE TABLE jadwal_up_fix_w;");
	$sql = $db_con->query("INSERT INTO jadwal_up_fix_w SELECT * FROM jadwal_up_w WHERE kode_jadwal = '$kdjad' ");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=99&&ss=W">';
exit;	
}
// end acc


















	?>
