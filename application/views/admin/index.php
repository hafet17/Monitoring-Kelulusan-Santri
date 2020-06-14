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
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Data Pengguna</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalUser; ?></div>
            <br><a href="<?= base_url('admin/pengguna') ?>">Selengkapnya <i class="fas fa-chevron-right"></i> </a>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">Data Santri</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSantri; ?></div>
            <br><a href="<?= base_url('admin/data_santri') ?>">Selengkapnya <i class="fas fa-chevron-right"></i> </a>
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
            <br><a href="<?= base_url('santri/admin_lulus') ?>">Selengkapnya <i class="fas fa-chevron-right"></i> </a>
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
            <br><a href="<?= base_url('santri/admin_tidak_lulus') ?>">Selengkapanya <i class="fas fa-chevron-right"></i> </a>
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

<!-- Content Row -->
    <!-- <div class="card shadow mt-4 ml-3 mr-3 mb-4" style="width: 100%;">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Grafik Santri</h6>
      </div>
      <div class="card-body">
        <?php foreach($santri as $str): ?>
        <h5 style="color: black !important;" class="text-center pt-4 border-top"><?= $str['nama_lengkap'] .' ('. $str['keterangan'] .')'; ?></h5>
        <canvas id="chart-<?= $str['id']; ?>"></canvas>
        <script>
          var crt = document.getElementById('chart-<?= $str['id']; ?>');
          var chart = new Chart(crt, {
            'type': 'bar',
            'data' : {
              'labels': ['Triwulan 1', 'Triwulan 2', 'Triwulan 3', 'Triwulan 4', 'Rata Rata'],
              'datasets': [{
                'label': '<?= $str['nama_lengkap']; ?>',
                'data': [<?= $str['jumlah1'] .','. $str['jumlah2'] .','. $str['jumlah3'] .','. $str['jumlah4'] .','. $str['rata_rata']; ?>],
                'backgroundColor': [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)'
                ],
                'borderColor': [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)'
                ],
                'borderWidth': 1
              }]
            },
            'options': {
              'scales': {
                'yAxes': [{
                  'ticks': {
                    'beginAtZero': true
                  }
                }]
              }
            }
          });
        </script>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
</div> -->

<!-- Content Row -->