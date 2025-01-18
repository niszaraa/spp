<?php
$nisns = $_GET['nisns'];
$kekurangan = $_GET['kekurangan'];
include '../koneksi.php';
$sql = "SELECT*FROM pembayaran,siswa,spp,petugas,kelas WHERE pembayaran.id_siswa=siswa.id_siswa AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND siswa.id_kelas=kelas.id_kelas AND nisns='$nisns'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>
<h5>Halaman Pembyaran SPP</h5>
<a href="?url=pembayaran" class="btn btn-primary"> KEMBALI </a>
<hr>
<form method="post" action="?url=proses-tambah-pembayaran&nisns=<?= $nisns; ?>">
    <div class="form-group mb-2">
        <input name="id_spp" value="<?= $data['id_spp'] ?>" type="hidden" class="form-control" required>
        <label>Nama Petugas</label>
        <input value="<?= $_SESSION['nama_petugas'] ?>" disabled class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>NISN</label>
        <input readonly name="nisns" value="<?= $data['nisns'] ?>" type="number" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Siswa</label>
        <input disabled value="<?= $data['nama'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Tanggal Bayar</label>
        <input type="date" name="tgl_bayar" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label for="">Bulan Dibayar</label>
        <select name="bulan_bayar" class="form-control" required>
            <option value="">--Pilih Bulan Dibayar--</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Tahun Bayar</label>
        <select name="tahun_bayar" class="form-control" required>
            <option value="">--Pilih Tahun Dibayar--</option>
            <?php
            for ($i = 2020; $i <= date('Y'); $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Jumlah Bayar (Jumlah yang harus di bayar adalah <b><?= number_format($kekurangan, 2, ',', '.') ?></b>)</label><br>
        <input type="number" name="jumlah_bayar" class="form-control" max="<?= $kekurangan ?>" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success"> SIMPAN </button>
        <button type="reset" class="btn btn-warning"> RESET </button>
    </div>
</form>