<?php
session_start();



    class Genetika
    {
 

        public $RowsKelas = '';
        public $RowsHari = '';
        public $RowsJam = '';
        public $RowsRuangan = '';

        public $data1 = '';
        public $data2 = '';
        public $data3 = '';
        public $data4 = '';

        public $fitness = '';

        public $data_individu = array(array(array()));
        // public $data1 = array();
        // public $data2 = array();
        // public $data3 = array();
        // public $data4 = array();
    
            public function Data(){

    include '../vendors/koneksi.php';

    // data polot kelas
    $sql_kelas =  "SELECT a.kode_up, a.penelitian, a.dosen, b.jml_sks FROM plot_up as a, penelitian as b where a.penelitian = b.kode_penelitian ;";
    $ex = $db_con->query($sql_kelas) or die (mysql_error());
    $no = 0;
    while($data=$ex->fetch(PDO::FETCH_OBJ)){
    $this->kode_up[$no] = $data->kode_up;
    $this->kode_penelitian[$no] = $data->penelitian;
    $this->kode_dosen[$no] = $data->dosen;
    $this->sks[$no] = $data->jml_sks;
    $no++;
    }
    // data hari
    $sql_hari =  "SELECT * FROM hari";
    $ex = $db_con->query($sql_hari) or die (mysql_error());
    $no = 0;
    while($data=$ex->fetch(PDO::FETCH_OBJ)){
    $this->kode_hari[$no] = $data->kode_hari;
        // echo   $this->kode_hari[$no]."<br>";
    $no++;

    }
    // data jam
    $sql_jam =  "SELECT * FROM jam";
    $ex = $db_con->query($sql_jam) or die (mysql_error());
    $no = 0;
    while($data=$ex->fetch(PDO::FETCH_OBJ)){
    $this->kode_jam[$no] = $data->kode_jam;

     // echo   $this->kode_jam[$no]."<br>";
         $no++;
    }
    // data ruang
    $sql_ruangan =  "SELECT * FROM ruang_belajar";
    $ex = $db_con->query($sql_ruangan) or die (mysql_error());
    $no = 0;
    while($data=$ex->fetch(PDO::FETCH_OBJ)){
    $this->kode_ruangan[$no] = $data->nama_ruangan;
    $no++;
    }

        $this->RowsKelas = count($this->kode_up);
        $this->RowsHari =  count($this->kode_hari);
        $this->RowsJam =  count($this->kode_jam);
        $this->RowsRuangan =  count($this->kode_ruangan);

        $this->b = implode(" ", $this->kode_ruangan);
        // $c = count($this->kode_up);
        // return $this->b;
        // return $this->RowsKelas;
    
            // for ($i=0; $i < 10 ; $i++) { 
        $sql = $db_con->query("TRUNCATE TABLE data_acak_up");
                for ($j=0; $j < $this->RowsKelas  ; $j++) { 
                
                $this->data_individu[$j][0] = $this->kode_up[$j];
                $this->data2 = mt_rand(0,$this->RowsHari);
                $this->data3 = mt_rand(0,$this->RowsJam);
                $this->data4 = mt_rand(0,$this->RowsRuangan);

                if ($this->data2 == 0) {
                    $this->data_individu[$j][1] = $this->data2 + 1;
                } else {
                    $this->data_individu[$j][1] = $this->data2;
                }

                if ($this->data3 == 0) {
                    $this->data_individu[$j][2] = $this->data3 + 1;
                } else{
                    $this->data_individu[$j][2] = $this->data3;
                }

                if ($this->data4 == 0) {
                    $this->data_individu[$j][3] = $this->data4 + 1;
                } else {
                    $this->data_individu[$j][3] = $this->data4;
                }
                
                $a = $this->data_individu[$j][0];
          
                $b = $this->data_individu[$j][1];
                $ccc = $this->data_individu[$j][2];

                if ($ccc >= 9) {
                   $c = 8 ; 
                }
                 else {
                    $c = $this->data_individu[$j][2];
                }
                
                $d = $this->data_individu[$j][3];

           
                // if ($sjam = 'W') {
                //     if ($c == 1) {
                //         $tim = 6;
                //     } elseif ( $c == 2 ) {
                //         $tim = 7;
                //     }
                // }
       


        $sql = $db_con->query("INSERT INTO data_acak_up VALUES ($a,$b,$c,$d)");


            $penalty_jam = 0;
            $penalty_hari = 0;
            $penalty_ruang = 0;

            for ($k=0; $k < $j ; $k++) { 
                $jam_a = $this->data_individu[$j][2];
                $hari_a = $this->data_individu[$j][1];
                $ruang_a = $this->data_individu[$j][3];
            
                    for ($l=0; $l < $j ; $l++) { 
                        $jam_b = $this->data_individu[$j][2];
                        $hari_b = $this->data_individu[$j][1];
                        $ruang_b = $this->data_individu[$j][3];

                        if ($jam_a == $jam_b){
                            $penalty_jam += 1;
                        }
                            if ($hari_a == $hari_b){
                                $penalty_hari +=1;
                            }
                            
                            if ($ruang_a == $ruang_b)
                             { $penalty_ruang += 1 ; }

                // end loop k
                    }
                // end loop l
                }

                $this->fitness = (1/(1+$penalty_jam+$penalty_hari+$penalty_ruang));
       

        // end loop j
            }
        // end loop i
         // }
                for ($i=0; $i < $this->RowsKelas ; $i++) { 

                    $cek = implode("", $this->data_individu[$i]);
                    // echo $cek."<br>";
                    


                }
                
                // echo "<br>".$fitness;





    } 
    // end function Data()



// end class
    }

     $t = new Genetika;
    
    $t->Data();

              include '../vendors/koneksi.php';
                                        $sql = "SELECT * FROM data_acak_up";
                                        $exf = $db_con->query($sql);
                                        $penalty_jam = 0;
                                        $penalty_hari = 0;
                                        $penalty_ruang = 0;

                                        while ($q = $exf->fetch(PDO::FETCH_NUM)) {
                                            $jam_a = $q[2];
                                            $hari_a = $q[1];
                                            $ruang_a = $q[3];
                                            while ($qq = $exf->fetch(PDO::FETCH_NUM)) {
                                                $jam_b = $qq[2];
                                                $hari_b = $qq[1];
                                                $ruang_b = $qq[3];

                                                if ($jam_a == $jam_b){
                                                $penalty_jam += 1;
                                                }
                                                if ($hari_a == $hari_b){
                                                    $penalty_hari +=1;
                                                }
                                                
                                                if ($ruang_a == $ruang_b)
                                                 { $penalty_ruang += 1 ; }

                
                                            }


                                        }

            $fitness = floatval(1/(1+$penalty_jam+$penalty_hari+$penalty_ruang));
      
 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=81&&fit='.$fitness.'">';

?>