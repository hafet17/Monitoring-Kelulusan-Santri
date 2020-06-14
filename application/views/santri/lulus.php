<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Santri Lulus</h1>

    </div>

    <div class="row">
        <div class="col-md-4">
            <?= form_open('santri/lulus'); ?>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Nama ..." name="keyword" value="<?= $keyword; ?>" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
            </form>
        </div>
    </div>
    </div>
    <div class="col-md-4 text-center">
    </div>
        <div class="col-md-4">
      <div class="dropdown float-right">
        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Export <i class="fas fa-upload ml-2"></i> </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="<?= base_url('export/santri_lulus_pdf'); ?>">PDF</a>
          <a class="dropdown-item" href="<?= base_url('export/santri_lulus_excel'); ?>">Excel</a>
        </div>
      </div>
        </div>
    </div>


<div class=" mt-4">
  <table class="table table-bordered table-striped table-hover">
  <thead>
    <tr class="bg-gradient-primary text-light">
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Lembaga</th>
      <th scope="col">Kamar</th>
      <th scope="col">Triwulan 1</th>
      <th scope="col">Triwulan 2</th>
      <th scope="col">Triwulan 3</th>
      <th scope="col">Triwulan 4</th>
      <th scope="col">Total Nilai</th>
      <th scope="col">Rata - Rata</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
  <?php if(empty($santrilulus)): ?>
  <tr>
    <th colspan="7" class="text-center">Tidak ada data untuk ditampilkan</th>
  </tr>
  <?php endif; ?>
  <?php foreach($santrilulus as $santri): ?>
    <tr>
    <th scope="col"><?= ++$start; ?></th>
      <th scope="col"><?= $santri['nama_lengkap']; ?></th>
      <th scope="col"><?= $santri['lembaga']; ?></th>
      <th scope="col"><?= $santri['kamar']; ?></th>
      <th><?= $santri['rata_rata1']; ?> </th>
      <th><?= $santri['rata_rata2']; ?> </th>
      <th><?= $santri['rata_rata3']; ?> </th>
      <th><?= $santri['rata_rata4']; ?></th>
      <th><?= $santri['rata_rata1'] + $santri['rata_rata2'] + $santri['rata_rata3'] + $santri['rata_rata4']; ?></th>
      <th><?= $santri['rata_rata']; ?></th>
      <th><?= $santri['keterangan']; ?></th>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?= $this->pagination->create_links(); ?>
</div>