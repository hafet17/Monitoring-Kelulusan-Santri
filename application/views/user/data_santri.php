<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="bg-success text-center p-2 text-light font-weight-bold my-3"><i class="fas fa-database"></i> Data Santri</h3>

    <button class="mt-1 btn btn-success" type="button" data-toggle="dropdown" id="dropdownMenu" aria-haspopup="true" aria-expanded="false"><i class="fa fa-upload"></i> Export Data </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
      <a class="dropdown-item" href="<?= base_url('export/santri_pdf'); ?>">PDF</a>
      <a class="dropdown-item" href="<?= base_url('export/santri_all_excel'); ?>">Excel</a>
    </div>
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Santri</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered dataTable" id="table-user-santri" width="100%" cellspacing="0" data-url="<?= base_url('json/santri'); ?>">
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Lembaga</th>
                                    <th>Jurusan</th>
                                    <th>Daerah</th>
                                    <th>Kamar</th>
                                    <th>Nama Ayah</th>
                                    <th>Pekerjaan Ayah</th>
                                    <th>Nama Ibu</th>
                                    <th>Pekerjaan Ibu</th>
                                    <th>No Telp</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
    </div>

</div>
</div>
