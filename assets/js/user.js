$(document).ready(function(){
  var baseUrl = $('#base-url').data('url');
  var tableSantri = $('#table-user-santri');
  var tableMateri = $('#tbl-user-materi');

    tableSantri.DataTable({
    'processing': true,
    'serverSide': true,
    'ordering': true,
    'order': [[0, 'asc']],
    'ajax': {
      'url': tableSantri.data('url'),
      'type': 'post'
    },
    'aoColumnDefs': [
      {
        'orderable': false,
        'targets': -4
      }
    ],
    'deferRender': true,
    'aLengthMenu': [[5, 10, 50], [5, 10, 50]],
    'columns': [
      {'render': function(data, type, row, meta){
        return meta.row + meta.settings._iDisplayStart + 1;
      }},
      {'data': 'nama_lengkap'},
      {'data': 'tempat_lahir'},
      {'data': 'tanggal_lahir'},
      {'data': 'lembaga'},
      {'data': 'jurusan'},
      {'data': 'daerah'},
      {'data': 'kamar'},
      {'data': 'nama_ayah'},
      {'data': 'pekerjaan_ayah'},
      {'data': 'nama_ibu'},
      {'data': 'pekerjaan_ibu'},
      {'data': 'telp'},
      {'data': 'provinsi'},
      {'data': 'kabupaten'},
      {'data': 'kecamatan'},
      {'data': 'desa'}
    ]
	});

  tableMateri.DataTable({
    'processing': true,
    'serverSide': true,
    'ordering': true,
    'order': [[0, 'asc']],
    'ajax': {
      'url': tableMateri.data('url'),
      'type': 'post'
    },
    'aoColumnDefs': [
      {
        'orderable': false,
        'targets': -1
      }
    ],
    'deferRender': true,
    'aLengthMenu': [[5, 10, 50], [5, 10, 50]],
    'columns': [
      {'render': function(data, type, row, meta){
        return meta.row + meta.settings._iDisplayStart + 1;
      }},
      {'data': 'materi'},
      {'data': 'triwulan'},
      {'data': 'file'},
      {'render': function(data, type, row){
        var html = '<a href="' + baseUrl + 'assets/materi/' + row.file + '" class="btn btn-primary text-white btn-xs float-left mr-2 btn-edit-data" data-id="' + row.id + '"><i class="fas fa-download fa-xs"></i></a>';
        return html;
      }}
    ]
	});
});