<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
</head>
<body>
<div class="text-left mt-5">
    <h2>Form Input Data </h2>
</div>

<form action="../process/simpan-data.php" method="POST">
    <div class="mb-3">
        <label for="id_barang" class="form-label">Id Barang</label>
        <input type="text" name="id_barang"  class="form-control"id="id_barang" required>
    </div>

    <div class="mb-3">
        <label for="nm_barang" class="form-label">Nama Barang</label>
        <input type="text" name="nm_barang"  class="form-control"id="nm_barang" required>
    </div>
  
    <div class="mb-3">
        <label for="hrg_barang" class="form-label">Harga</label>
        <input type="number" name="hrg_barang" class="form-control" id="hrg_barang" required>
    </div>
    
    <div class="mb-3">
        <label for="stok_barang" class="form-label">Stok</label>
        <input type="number" name="stok_barang" class="form-control" id="stok_barang" required>
    </div>
   
    <div class="mb-3">
        <label for="tgl_prod" class="form-label">Tanggal Produksi</label>
        <input type="date" name="tgl_prod" class="form-control" id="tgl_prod" required>
    </div>
    
    <div class="mb-3">
        <label for="tgl_expired" class="form-label">Tanggal Expired</label>
        <input type="date" name="tgl_expired" class="form-control" id="tgl_expired" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btnadd" name="simpan">Simpan</button>
    </div>

    
</form>

</body>
</html>