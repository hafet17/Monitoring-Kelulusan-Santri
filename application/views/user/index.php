<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-sm font-weight-bold text-success text-uppercase mb-1">Data Santri</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSantri; ?></div>
              <br><a href="<?= base_url('user/data_santri') ?>">Selengkapnya <i class="fas fa-chevron-right"></i> </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-friends fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-sm font-weight-bold text-info text-uppercase mb-1">Santri Lulus</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $santriLulus; ?>%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $santriLulus; ?>%" aria-valuenow="<?= $santriLulus; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <br><a href="<?= base_url('santri/lulus') ?>">Selengkapnya <i class="fas fa-chevron-right"></i> </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-address-card fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">Santri Tidak Lulus</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $santriNLulus; ?>%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $santriNLulus; ?>%" aria-valuenow="<?= $santriNLulus; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <br><a href="<?= base_url('santri/tidak_lulus') ?>">Selengkapnya <i class="fas fa-chevron-right"></i> </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-credit-card fa-2x text-gray-300"></i> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>