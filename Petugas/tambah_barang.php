<?php 
    $br = new lsp();
    if ($_SESSION['level'] != "Petugas") {
    header("location:index.php");
    }
    $table = "barang_db";    
    $getUnit = $br->select("unit");
    $getKond = $br->select("kondisi");
    $autokode = $br->autokode("barang_db","kode_barang","UIN");
    $waktu    = date("Y-m-d");
    if (isset($_POST['getSimpan'])) {
        $kode_barang  = $br->validateHtml($_POST['kode_barang']);
        $nama_barang  = $br->validateHtml($_POST['nama_barang']);
        $lokasi_unit  = $br->validateHtml($_POST['unit']);
        $kondisi      = $br->validateHtml($_POST['kondisi']);
        $nilai        = $br->validateHtml($_POST['nilai']);
        $pemakai      = $br->validateHtml($_POST['pemakai']);
        $lokasi       = $br->validateHtml($_POST['lokasi']);
        $catatan      = $_POST['catatan'];
        $value        = "'$kode_barang','$nama_barang','$lokasi_unit','$kondisi','$waktu','$nilai','$pemakai','$lokasi','$catatan'";
        $response     = $br->insert($table,$value,"?page=barang");
                
    } 
 ?>
<div class="main-content" style="margin-top: 20px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data">
                        <div class="card">
                        <div class="au-card-title" style="background-image:url('images/bg-title-01.jpg');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                            <i class="zmdi zmdi-account-calendar"></i>Data Barang</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                    <label for="">Kode barang</label>
                                    <input type="text" style="font-weight: bold; color: red;" class="form-control" name="kode_barang" value="<?php echo $autokode; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama barang</label>
                                    <input type="text" placeholder="Nama Barang" class="form-control" name="nama_barang" value="<?php echo @$_POST['nama_barang'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Unit / Fakultas</label>
                                    <select name="lokasi_unit" class="form-control">
                                        <option value=" ">Pilih Unit / Fakultas</option>
                                        <?php foreach($getUnit as $mr) { ?>
                                        <option value="<?= $mr['kode_unit'] ?>"><?= $mr['unit_fakultas'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kondisi</label>
                                    <select name="kondisi" class="form-control">
                                        <option value=" ">Pilih Kondisi</option>
                                        <?php foreach($getKond as $dr) { ?>
                                        <option value="<?= $dr['kode_kondisi'] ?>"><?= $dr['kondisi_barang'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                    <label for="">Nilai Perolehan</label>
                                    <input type="number" class="form-control" name="nilai">
                                </div>
                                <div class="form-group">
                                    <label for="">Pemakai</label>
                                    <input type="text" class="form-control" name="pemakai">
                                </div>
                                <div class="form-group">
                                    <label for="">Lokasi</label>
                                    <input type="text" class="form-control" name="lokasi">
                                </div>
                                <div class="form-group">
                                    <label for="">catatan</label>
                                    <input type="text" class="form-control" name="catatan">
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button name="getSimpan" class="btn btn-primary"><i class="fa fa-download"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-eraser"></i> Reset</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
