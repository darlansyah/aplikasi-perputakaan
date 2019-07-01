<?php

// koneksi data base
$link = mysqli_connect("localhost","root","", "perpustakaan");


// modul function------------------------------------------------------------------------------------------------------------
// tampil
function tampil($query){
global $link;
$result = mysqli_query($link,$query);
while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
}
return $rows;
}
// akhir tampil-----------------------------------------------------------------------------------------------------

// buku------------------------------------------------------------------------------------------------------------
function tambahBuku ($data){
    global $link;
    
    $kode = $data['kode'];
    $judul = $data['judul'];
    $pengarang = $data['pengarang'];
    $penerbit = $data['penerbit'];
    $tahun = $data['tahun'];
    $jumlah = $data['jumlah'];
    
    
    // cek apakah kode register telah digunakan?
    $result = mysqli_query($link,"SELECT kode_register FROM buku WHERE kode_register = '$kode'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>"
        . "alert ('kode_register telah digunakan')"
                . "</script>";
        return FALSE;
    }
   
    $tambah = mysqli_query($link,"INSERT INTO buku VALUES ('$kode','$judul','$pengarang','$penerbit',$tahun,$jumlah)");
   
    return mysqli_affected_rows($link);
}
function hapusBuku($kode){ // hapus buku
    global $link;
    
    
    mysqli_query($link,"DELETE FROM buku WHERE kode_register = '$kode'");
    
    return mysqli_affected_rows($link);
}
function editBuku ($datal,$data){
    // $data1 ialah kode register lama
    
    global $link;
    
    $kode = $data['kode'];
    $judul = $data['judul'];
    $pengarang = $data['pengarang'];
    $penerbit = $data['penerbit'];
    $tahun = $data['tahun'];
    $jumlah = $data['jumlah'];
    
    
    $query = "UPDATE buku SET
            kode_register = '$kode',
            judul = '$judul',
            pengarang = '$pengarang',
            penerbit = '$penerbit',
            thn_terbit = $tahun,
            jumlah = $jumlah
            WHERE kode_register = '$datal'";
    
    mysqli_query($link, $query);
    
    return mysqli_affected_rows($link);
    
}
// akhir buku------------------------------------------------------------------------------------------------------------

// anggota------------------------------------------------------------------------------------------------------------
function tambahAnggota ($data){ // tambah anggota
    global $link;
    $no = $data['no']; // no register
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $jl = $data['jl'];
    
    
    mysqli_query($link, "INSERT INTO anggota VALUES ('$no','$nama','$alamat','$no_hp','$jl')");
    
    return mysqli_affected_rows($link);
}
function hapusAnggota($no){
    global $link;
    
    $cek_anggota = count(tampil("SELECT no_anggota FROM peminjam WHERE no_anggota = $no"));
    
    if ($cek_anggota > 0) {
        ECHO "DATA MASIH ADA";
        die;
    }
    
    mysqli_query($link,"DELETE FROM anggota WHERE no_anggota = '$no'");
    
    return mysqli_affected_rows($link);
}
function editAnggota($datal,$data){
    global $link;
    
    // $datal n_anggota lama
    $no = $data['no'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $jl = $data['jl'];
    
    $query = "UPDATE anggota SET
                no_anggota = '$no',
                nama = '$nama',
                alamat = '$alamat',
                no_hp = '$no_hp',
                jl = '$jl'
                WHERE no_anggota = '$datal'";
    
    mysqli_query($link,$query);

    return mysqli_affected_rows($link);
}
// akhir anggota------------------------------------------------------------------------------------------------------------

// petugas------------------------------------------------------------------------------------------------------------
function tambahPetugas($data){
    global $link;
    
    $kode = $data['kode'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $jl = $data['jl'];
    $no_hp = $data['no_hp'];
    $user = $data['user'];
    $pass = $data['pass'];
    
    // cak username sudah atau belum ?
    $result = mysqli_query($link, "SELECT * FROM petugas WHERE user= '$user'");
    if( mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('username udah digunakan');
            </script>

             ";
        return false;
    }
    // akhir cak username sudah atau belum ?
    
    // enkripsi password
    $pass = password_hash($pass,PASSWORD_DEFAULT);
    // akhir enkripsi password
    
    
    $query = "INSERT INTO petugas VALUES ('$kode','$nama','$alamat','$jl','$no_hp','$user','$pass')";
    
    mysqli_query($link, $query);
   
    return mysqli_affected_rows($link);
}
function hapusPetugas ($kode){
    global $link;
    mysqli_query($link,"DELETE FROM petugas WHERE kode_petugas = '$kode'");
    
    return mysqli_affected_rows($link);
}
function editPetugas($datal,$data){
    global $link;
    
    $kode = $data['kode'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $no_hp = $data['no_hp'];
    $jl = $data['jl'];
    
    $query = "UPDATE petugas SET "
            . "kode_petugas = '$kode',"
            . "nama = '$nama',"
            . "alamat = '$alamat',"
            . "jl = '$jl',"
            . "no_hp = '$no_hp'"
            . "WHERE kode_petugas = '$datal'";
    mysqli_query($link, $query);
    
    return mysqli_affected_rows($link);
}
// akhir petugas------------------------------------------------------------------------------------------------------------

// pengunjung ------------------------------------------------------------------------------------------------
function tambahPengunjung($data){
    global $link;
    //var_dump($data); die;
    
    $nama = $data['nama'];
    $jl = $data['jl'];
    $no_hp = $data['no_hp'];
    $alamat = $data['alamat'];
    $tgl = $data['tgl'];
    $status = $data['status'];
    
    $query = "INSERT INTO pengunjung VALUES ('','$nama','$jl','$no_hp','$alamat','$tgl',$status)";
    
    mysqli_query($link, $query);
    
    return mysqli_affected_rows($link);
}
function hapusPengunjung($id){
    global $link;
    
    mysqli_query($link,"DELETE FROM pengunjung WHERE id_pengunjung = '$id'");
    
    return mysqli_affected_rows($link);
}
function editPengunjung($data){
   
    global $link;
    $id = $data['id'];
    $nama = $data['nama'];
    $jl = $data['jl'];
    $no_hp = $data['no_hp'];
    $alamat = $data['alamat'];
    $tgl = $data['tgl'];
    $status = $data['status'];
    //var_dump($status); die;
    $query = "UPDATE pengunjung SET nama = '$nama',"
            . "jk = '$jl',"
            . "noHP = '$no_hp',"
            . "alamat = '$alamat',"
            . "tgl = '$tgl',"
            . "id_status = '$status'"
            . "WHERE id_pengunjung = $id";
    
    (mysqli_query($link, $query));
    
    return mysqli_affected_rows($link);
}
// akhir pengunjung-----------------------------------------------------------------------------------------------

// Status----------------------------------------------------------------------------------------------------------
function tambahStatus($data){
    global  $link;

    $status = $data['status'];
    
    $query = "INSERT INTO status VALUES ('','$status')";
    
    mysqli_query($link, $query);
    
    return mysqli_affected_rows($link);
    
}
function hapusStatus($kode){
    global $link;
    
    mysqli_query($link,"DELETE FROM status WHERE id_status = '$kode'");
    
    return mysqli_affected_rows($link);
}  
function editStatus($data){
    global  $link;
    $id = $data['id'];
    $status = $data['status'];
    
    $query = "UPDATE status SET "
            . "status = '$status' "
            . "WHERE id_status = $id";
    
   mysqli_query($link, $query);
    
    return mysqli_affected_rows($link);
}
// Akhir Status----------------------------------------------------------------------------------------------------------

//peminjam ---------------------------------------------------------------------------------------------------------
function tambahPeminjam($data){
    global $link;
    $kp = $data['kode']; // kode_peminjam
    $anggota = $data['anggota']; // no_anggota
    $buku = $data['buku'];// kode_register
    $petugas = $data['petugas'];
    $tgl_pin = $data['tgl_pinjam'];
    $tgl_kem = $data['tgl_kembali'];
    

    if (!pinjam_buku($buku) > 0 ) {
        return false;
    }
    $peminjam = "INSERT INTO peminjam VALUES ('$kp','$anggota','$petugas','$buku','$tgl_pin','$tgl_kem')";

    mysqli_query($link, $peminjam);
    return mysqli_affected_rows($link);
    
}

function hapusPeminjaman($kode){
    global $link;
    mysqli_query($link,"DELETE FROM peminjam WHERE kode_pinjam = '$kode'");
    
    return mysqli_affected_rows($link);
}
function editPeminjam ($datal,$data){
    global $link;
    $kp = $data['kode']; // kode_peminjam
    $anggota = $data['anggota']; // no_anggota
    $buku = $data['buku'];// kode_register
    $petugas = $data['petugas']; // kode_petugas
    $tgl_pin = $data['tgl_pinjam'];
    $tgl_kem = $data['tgl_kembali'];
    
    $query = "UPDATE peminjam SET
                kode_pinjam = '$kp',
                no_anggota = '$anggota',
                kode_petugas = '$petugas',
                kode_register = '$buku',
                tgl_pinjam = '$tgl_pin',
                tgl_kembali = '$tgl_kem'
                WHERE kode_pinjam = '$datal'";
    
    mysqli_query($link, $query);
    
    return mysqli_affected_rows($link);
}
// akhir peminjam ----------------------------------------------------------------------------------------------


// proses peninjam buku------------------------------------------------------------------------------------------------------------
function cek_buku($buku){ // cek jemlah buku
    $jumlah = tampil("SELECT jumlah FROM buku WHERE kode_register = '$buku'")[0];
    if (($jumlah['jumlah'] <= 0)) {
        return false;
    }
    return true;
}

function pinjam_buku($buku){// prose pinjam buku
    global $link;
    $query = "UPDATE buku SET jumlah = jumlah - 1 WHERE kode_register = '$buku'";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

function edit_penjam_buku($bukul,$bukub){ // edit kode_register buku
    // $bukul = kode buku lama
    // $bukub = kode buka baru
  
    global  $link;
    
    if ($bukub != $bukul) :
       if (!cek_buku($bukub)) : 
        return FALSE;
            endif;
    endif;
    
    $queryl = "UPDATE buku SET jumlah = jumlah + 1 WHERE kode_register = '$bukul'";
    mysqli_query($link, $queryl);
     if (!(pinjam_buku($bukub)>0)) {
        return false;
    };  
    
    return mysqli_affected_rows($link);
}

function kembali_buku($data){
    global $link;
    $buku = $data['kode_register'];
    $hapusID = $data['kode_pinjam'];
 
    
   $tampil = tampil("SELECT  peminjam.kode_pinjam,anggota.nama as anggota ,petugas.nama as petugas, buku.judul, peminjam.tgl_pinjam, peminjam.tgl_kembali FROM `peminjam` 
   INNER JOIN  anggota ON peminjam.no_anggota = anggota.no_anggota
   INNER JOIN petugas ON peminjam.kode_petugas = petugas.kode_petugas
   INNER JOIN buku ON peminjam.kode_register = buku.kode_register WHERE peminjam.kode_register = '$buku'")[0];
  
   //$denda = $data['denda'];
   
   $denda = array(
       'denda' => $data['denda']
   );
   
   $tampil = array_merge($tampil,$denda);
   
   
   
   if (!(hist_pengembalian($tampil) > 0)) {
       return false;
   }
    
    if (!(tambahpengembalian($data) > 0)) {
        return false;
    }
   
    if (!(hapusPeminjaman($hapusID)>0)) {
        return false;
    }
   
    $queryl = "UPDATE buku SET jumlah = jumlah + 1 WHERE kode_register = '$buku'";
     mysqli_query($link, $queryl);
     
    return mysqli_affected_rows($link);
    
}

function tambahpengembalian($data){
    global $link;
    //var_dump($data); die;
    $anggota = $data['no_anggota']; // no_anggota
    $buku = $data['kode_register'];// kode_register
    $petugas = $data['kode_petugas'];
    $tgl_pin = $data['tgl_pinjam'];
    $tgl_kem = $data['tgl_kembali'];
    $denda = $data['denda'];
    
    $peminjam = "INSERT INTO pengembalian VALUES ('','$anggota','$petugas','$buku','$tgl_pin','$tgl_kem',$denda)";
   
    return mysqli_query($link, $peminjam);
       
}
 // akhir proses peninjam buku------------------------------------------------------------------------------------------------------------

// denda------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function hitungDenda($tglKembali){
    $awal = strtotime($tglKembali); // tanggal kembali
    $now = time(); // tanggal sekarang
    $diff = $now - $awal; // hitung selisi hari

    $hasil =  floor($diff / (60*60*24)); // hasil selisi hari

    if ($hasil <=0) {
        $hasil = 0;
    }
    $hasil = hargaDenda($hasil);
    
return $hasil;
}
function hargaDenda($selisi,$harga = 1000){
    $bayar = $harga * $selisi;
    return $bayar;
}
// akhir denda------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// histori pengembalian-----------------------------------------------------------------------------------------------------------
function hist_pengembalian($data){
    global  $link;
    $anggota = $data['anggota'];
    $petugas = $data['petugas'];
    $judul = $data['judul'];
    $tgl_pinjam = $data['tgl_pinjam'];
    $tgl_kembali = $data['tgl_kembali'];
    $denda = $data['denda'];
   // var_dump($data); die;
    $histori_pengembalian = "INSERT INTO hist_pengembalian VALUES ('','$anggota','$judul','$petugas','$tgl_kembali','$tgl_pinjam',$denda)";
    
    $hasil = mysqli_query($link,$histori_pengembalian);
    
    return mysqli_affected_rows($link);
}

// akhir histori pengembalian-----------------------------------------------------------------------------------------------------------

// Grafik 1----------------------------------------------------------------------------------------------------------------------
// jumlah pengunjung------------------------------------------------------------------------------------------------------------------
function bulan(){
    $namaBulan = ['Januari','Febuari','Maret','April','Mei','Juni','Juli','Agusrus','September','Oktober','Novembar','Desember'];
    
    for($i=0;$i<12;$i++){
        $bulan[] =  $namaBulan[$i];
    }
    return $bulan;
}

function jumlahPengunjung($tahun,$jk){
    global $link;

    for($i = 1; $i <=12; $i++){
    $query = "SELECT * FROM pengunjung WHERE  YEAR(tgl) = $tahun AND MONTH(tgl) = $i AND jk = '$jk'";
    
    $result = mysqli_query($link,$query);

    $jumlah_baris[] = mysqli_num_rows($result); 
    }
    //var_dump($jumlah_baris); die;
    return $jumlah_baris;
}
// Akhir Jumlah pengunjung-----------------------------------------------------------------------------------------------------------------

function bulanx(){
    $bulan = "['".bulan()[0]."'";
    for ($i=1;$i<12;$i++){
        $bulan .= ",'".bulan()[$i]."'";
    }
    $bulan .= "]";
    return $bulan;
}

function grafik1y ($tahun,$jl){
    $p = jumlahPengunjung($tahun,$jl);
    $pl = count(jumlahPengunjung($tahun,$jl));
    //var_dump($p,$pl); die;
    
    $data = "[$p[0]";
    for ($i=1;$i<$pl;$i++){
        $data .= ",$p[$i]";
    }
    $data .= "]";

    return $data;   
}
// Akhir Grafik 1--------------------------------------------------------------------------------------------------------------------

// mencari tahun min dan max-----------------------------------------------------------------------------------------------------
function minTahun(){
    $tahun = tampil("SELECT tgl FROM `pengunjung` WHERE YEAR(tgl) GROUP BY YEAR(tgl)");
    $jtahun = count(tampil("SELECT tgl FROM `pengunjung` WHERE YEAR(tgl) GROUP BY YEAR(tgl)"));
    $min =9999;
    for ($i=0;$i<$jtahun;$i++){ // mencari tahun yang paling terkecil
        $tahun1 = intval(substr($tahun[$i]['tgl'],0,4));
        if ($min > $tahun1 ) {
            $min = $tahun1;
        }
    } 
    return $min;
}
function maxTahun(){
    return $tahunSekarang = intval(date('Y'));
}
//Akhir mencari tahun min dan max-----------------------------------------------------------------------------------------------------
// akhir gfarik 1

//// Grafik2 ->Menampilkan Pengunjung L/P setip Tahun
//function jumlahPengunjung1($tahun1,$tahun2,$jk){ // menampilkan total l/p berdasarkan tahun
//    global $link;
//
//   
//    for($i = $tahun1; $i <=$tahun2; $i++){
//    $query = "SELECT * FROM pengunjung WHERE  YEAR(tgl) = $i  AND jk = '$jk'";
//    
//    $result = mysqli_query($link,$query);
//
//    $jumlah_baris[] = mysqli_num_rows($result); 
//    }
//    //var_dump($jumlah_baris); die;
//    return $jumlah_baris;
//}
//function jumlahPengunjung1LP1Y($jl){ // jumlah isi bertahuan Y
//    //$tahun = tampil("SELECT tgl FROM `pengunjung` WHERE YEAR(tgl) GROUP BY YEAR(tgl)");
//    $l = (jumlahPengunjung1(minTahun(),maxTahun(), $jl));
//    $jl = count((jumlahPengunjung1(minTahun(),maxTahun(),$jl)));
//    
//   // $tam1 = $l[$jl-1];
//    
//    $data = "[$l[0]";    // jumlah isi pertahun
//        for ($i=1;$i < $jl; $i++){
//            $data .= ",$l[$i]";
//        }
//          $data .= "]";
//
//         return $data;
//        }
//function jumlahPengunjung1LP2X($jl){ // tampilan tahun X
//    $tahun = tampil("SELECT tgl FROM `pengunjung` WHERE YEAR(tgl) GROUP BY YEAR(tgl)");
//    $l = (jumlahPengunjung1(minTahun(),maxTahun(), $jl));
//    $jl = count((jumlahPengunjung1(minTahun(),maxTahun(),$jl)));
//    var_dump($tahun); die;
//    $tgltt = "['".substr($tahun[0]['tgl'],0,4)."'";
//        for ($i=1;$i<$jl;$i++){ // pertahun
//            $tgltt .= ",'".substr($tahun[$i]['tgl'],0,4)."'";
//        }
//         $tgltt .= "]";
//         return $tgltt;
//}
//// Akhir2 Grafik

// Grafik 3 --------------------------------------------------------------------------------------------------------------------
function jumlahPengunjungSta($tahun,$jk,$status){
    global $link;

    for($i = 1; $i <=12; $i++){
    $query = "SELECT * FROM pengunjung WHERE  YEAR(tgl) = $tahun AND MONTH(tgl) = $i AND jk = '$jk' AND id_status = $status";
    
    $result = mysqli_query($link,$query);

    $jumlah_baris[] = mysqli_num_rows($result); 
    }
    //var_dump($jumlah_baris); die;
    return $jumlah_baris;
}  

function grafikStatusY ($tahun,$jl,$status){
    $string = jumlahPengunjungSta($tahun,$jl,$status);
    $jumString = count(jumlahPengunjungSta($tahun,$jl,$status));
   
    $data = "[$string[0]";
    for ($i=1;$i<$jumString;$i++){
        $data .= ",$string[$i]";
    }
    $data .= "]";

    return $data;   
}
// Akhir Grafik 3 --------------------------------------------------------------------------------------------------------------------


// akhir grafik 4 --------------------------------------------------------------------------------------------------------------------
    function jumlahgrafik4($tahun1,$tahun2,$jk,$status){ // menampilkan total l/p berdasarkan tahun
      

        for($i = $tahun1; $i <=$tahun2; $i++){
        $query = "SELECT * FROM `pengunjung` WHERE YEAR(tgl)= $i AND jk = '$jk' AND id_status = $status";
        $result = mysqli_query($link,$query);
        $jumlah_baris[] = mysqli_num_rows($result); 
        }
        //var_dump($jumlah_baris); die;
        return $jumlah_baris;
    }

    function grafik4y($jl,$status){ // jumlah isi bertahuan Y
        //$tahun = tampil("SELECT tgl FROM `pengunjung` WHERE YEAR(tgl) GROUP BY YEAR(tgl)");
        $l = (jumlahgrafik4(minTahun(),maxTahun(),$jl,$status));
        $jl = count((jumlahgrafik4(minTahun(),maxTahun(),$jl,$status)));

        $data = "[$l[0]";    // jumlah isi pertahun
            for ($i=1;$i < $jl; $i++){
                $data .= ",$l[$i]";
            }
              $data .= "]";

             return $data;
            }
// akhir grafik 4 manampilan bulan+tahun+status --------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------

 // grafik 2 baru ----------------------------------------------------------------------------------------------        
    function tahuns(){
    $tahun = tampil("SELECT tgl FROM `pengunjung` WHERE YEAR(tgl) GROUP BY YEAR(tgl)");
    //var_dump(substr($tahun[0]['tgl'],0,4)); die;
    $jtahun = count(tampil("SELECT tgl FROM `pengunjung` WHERE YEAR(tgl) GROUP BY YEAR(tgl)"));
    $tahuns = [];
    for ($i=0; $i<$jtahun; $i++){
        $tahuns[] = substr($tahun[$i]['tgl'],0,4);
    }
    return $tahuns;
}
function dataTahun($jk){
    global  $link;

    $tahuns= tahuns();
   $jTahun = count($tahuns);
  
    for($i =0; $i <$jTahun; $i++){
    $query = "SELECT * FROM pengunjung WHERE  YEAR(tgl) = $tahuns[$i]  AND jk = '$jk'";
    
    $result = mysqli_query($link,$query);

    $jumlah_baris[] = mysqli_num_rows($result); 
    }
    //var_dump($jumlah_baris); die;
    return $jumlah_baris; 
}
function grafik1x(){
    $jTahun = count(tahuns());
    $tahun = tahuns();
    
    $tahuns = "['".$tahun[0]."'";
    for ($i=1; $i<$jTahun; $i++){
        $tahuns .= ",'".$tahun[$i]."'";
    }
    $tahuns .= "]";
    
    return $tahuns;
}
function  grafik1yy($jk){
   $jDataTahun = count(dataTahun($jk));
   $dataTahun = dataTahun($jk);
   //var_dump($dataTahun[6]); die;
   
   
   $dataTahuns = "[".$dataTahun[0];
   for ($i=1; $i<$jDataTahun; $i++){
       $dataTahuns .= ",".$dataTahun[$i];
   }
   $dataTahuns .= "]";
   
   return $dataTahuns;
}
// akhir grafik 2 baru ---------------------------------------------------------------------------------------------- 

// grafik 4 baru  -------------------------------------------------------------------------------------------------------
function dataStatus($jk,$status){
   global  $link;
   
   $tahuns= tahuns();
   $jTahun = count($tahuns);
   
    for($i = 0; $i < $jTahun; $i++){
        $query = "SELECT * FROM `pengunjung` WHERE YEAR(tgl)= $tahuns[$i] AND jk = '$jk' AND id_status = $status";
        $result = mysqli_query($link,$query);
        $jumlah_baris[] = mysqli_num_rows($result); 
        }
        //var_dump($jumlah_baris); die;
        return $jumlah_baris;
}
function grafik4yy($jk,$status){
    $jDataStatus = count(dataStatus($jk,$status));
    $dataStatus = dataStatus($jk,$status);
    
    $dataStatuss = "[".$dataStatus[0];
    for($i=1; $i<$jDataStatus;$i++){
        $dataStatuss .= ",".$dataStatus[$i];
    }
    $dataStatuss .="]";
    return $dataStatuss;
}
// akhir grafik 4 baru -------------------------------------------------------------------------------------------------------
?>
