$(document).ready(function(){
  var message = $('#message');
  if(message.data('type')){
    Swal.fire({
      'type': message.data('type'),
      'text': message.data('text')
    });
   }
  
  var baseUrl = $('#base-url').data('url');
  var tablePengguna = $('#tbl-admin-pengguna');
  var tableSantri = $('#table-admin-santri');
  var tableNilai = $('#tbl-admin-nilai');
  var tableMateri = $('#tbl-admin-materi');
  var tableHasilNilai = $('#tbl-hasil-nilai');
  
  tableHasilNilai.DataTable();
  
  tablePengguna.DataTable({
    'processing': true,
    'serverSide': true,
    'ordering': true,
    'order': [[0, 'asc']],
    'ajax': {
      'url': tablePengguna.data('url'),
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
      {'data': 'nama'},
      {'data': 'lembaga'},
      {'data': 'fakultas'},
      {'data': 'jurusan'},
      {'data': 'semester'},
      {'data': 'daerah'},
      {'data': 'kamar'},
      {'data': 'username'},
      {'render': function(data, type, row){
        var html = '<img src="' + baseUrl + 'assets/images/users/' + row.gambar + '" width="100%">';
        return html;
      }},
      {'render': function(data, type, row){
        var html = "";
        if(row.is_active == 1){
          html += '<div class="badge badge-success font-weight-bold p-1">aktif</div>';
         }else{
          html += '<div class="badge badge-danger font-weight-bold p-1">nonaktif</div>';
        }
        return html;
      }},
      {'data': 'role_id'},
      {'render': function(data, type, row){
        var html = '<a data-toggle="modal" data-target="#editData" href="#" class="btn btn-success text-white btn-xs float-left mr-2 btn-edit-data" data-id="' + row.id + '"><i class="fas fa-edit fa-xs"></i></a>';
        html += '<a href="' + baseUrl + 'admin/delusr/' + row.id + '" class="btn btn-danger text-white btn-xs float-left btn-del-data" data-id="' + row.id + '"><i class="fas fa-trash-alt fa-xs"></i></a>';
        return html;
      }}
    ]
	});

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
      {'data': 'desa'},
      {'data': 'tgl_input'},
      {'data': 'tgl_update'},
      {'render': function(data, type, row){
        var html = '<a href="' + baseUrl +'admin/editsantri/' + row.id + '" class="btn btn-success text-white btn-xs float-left mr-2 btn-edit-data" data-id="' + row.id + '"><i class="fas fa-edit fa-xs"></i></a>';
        html += '<a href="' + baseUrl + 'admin/delsantri/' + row.id + '" class="btn btn-danger text-white btn-xs float-left btn-del-data" data-id="' + row.id + '"><i class="fas fa-trash-alt fa-xs"></i></a>';
        return html;
      }}
      
    ]
	});
	
  tableNilai.DataTable({
    'processing': true,
    'serverSide': true,
    'ordering': true,
    'order': [[0, 'asc']],
    'ajax': {
      'url': tableNilai.data('url'),
      'type': 'post'
    },
    'aoColumnDefs': [
      {
        'orderable': false,
        'targets': [-1, -2, -3]
      }
    ],
    'deferRender': true,
    'aLengthMenu': [[5, 10, 50], [5, 10, 50]],
    'columns': [
      {'render': function(data, type, row, meta){
        return meta.row + meta.settings._iDisplayStart + 1;
      }},
      {'data': 'nama_lengkap'},
      {'data': 'kamar'},
      {'data': 'lembaga'},
      {'render': function(data, type, row){
        var html = '<a href="' + baseUrl +'admin/tambah_nilai/' + row.id + '" class="btn btn-success text-white btn-md rounded-circle mr-2 btn-add-data" data-id="' + row.id + '"><i class="fas fa-plus fa-lg"></i></a>';
        return html;
      }},
      {'render': function(data, type, row){
        var html = '<a href="' + baseUrl +'admin/edit_nilai/' + row.id + '" class="btn btn-primary text-white btn-md rounded-circle mr-2 btn-edit-data" data-id="' + row.id + '"><i class="fas fa-edit fa-lg"></i></a>';
        return html;
      }},
      {'render': function(data, type, row){
        var html = '<a href="' + baseUrl +'admin/delnilai/' + row.id + '" class="btn btn-danger text-white btn-md rounded-circle mr-2 btn-del-data" data-id="' + row.id + '"><i class="fas fa-trash-alt fa-lg"></i></a>';
        return html;
      }}
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
        'targets': -4
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
        html += '<a href="' + baseUrl + 'admin/edit_materi/' + row.id + '" class="btn btn-success text-white btn-xs float-left mr-2 btn-edit-data" data-id="' + row.id + '"><i class="fas fa-edit fa-xs"></i></a>';
        html += '<a href="' + baseUrl + 'admin/delmateri/' + row.id + '" class="btn btn-danger text-white btn-xs float-left btn-del-data" data-id="' + row.id + '"><i class="fas fa-trash-alt fa-xs"></i></a>';
        return html;
      }}
    ]
	});
    
	$('.dataTable').on('click', '.btn-del-data', function(e){
		e.preventDefault();
		var href = $(this).attr('href');
		Swal.fire({
			'title': 'Yakin?',
			'text': "Data akan dihapus permanen!",
			'type': 'warning',
			'showCancelButton': true,
			'confirmButtonColor': '#3085d6',
			'cancelButtonColor': '#d33',
			'confirmButtonText': 'Hapus',
			'cancelButtonText': 'Batal'
		}).then(function(result){
			if(result.value){
				document.location.href = href;
			}
		});
	});
	
	$('.input-fakultas').change(function(){
		var id = $(this).children('option:selected').data('id');
		$.ajax({
			'type': 'post',
			'url': baseUrl + 'json/jurusan',
			'dataType': 'json',
			'data': 'fakultas_id=' + id,
			'success': function(res){
				var html = '';
				$.each(res, function(i, item){
					html += '<option value="' +item.nama+ '">' +item.nama+ '</option>';
				});
				$('.input-jurusan-mhs').html(html);
			},
			'error': function(request, status, error){
				alert(request.responseText);
			}
		});
	});
	
	$('.input-daerah').change(function(){
		var id = $(this).children('option:selected').data('id');
		$.ajax({
			'type': 'post',
			'url': baseUrl + 'json/kamar',
			'dataType': 'json',
			'data': 'daerah_id=' + id,
			'success': function(res){
				var html = '';
				$.each(res, function(i, item){
					html += '<option value="' +item.nama+ '">' +item.nama+ '</option>';
				});
				$('.input-kamar').html(html);
			},
			'error': function(request, status, error){
				alert(request.responseText);
			}
		});
	});

    $('.input-lembaga').change(function(){
		var id = $(this).children('option:selected').data('id');
		$.ajax({
			'type': 'post',
			'url': baseUrl + 'json/jurusantri',
			'dataType': 'json',
			'data': 'lembaga_id=' + id,
			'success': function(res){
				var html = '';
				$.each(res, function(i, item){
					html += '<option value="' +item.nama+ '">' +item.nama+ '</option>';
				});
				$('.input-jurusan').html(html);
			},
			'error': function(request, status, error){
				alert(request.responseText);
			}
		});
	});
	
	tablePengguna.on('click', '.btn-edit-data', function(){
		$.ajax({
			'url': baseUrl + 'json/editusr',
			'type': 'post',
			'dataType': 'json',
			'data': 'id=' + $(this).data('id'),
			'success': function(res){
				$('#editid').val(res.id);
				$('#editnama').val(res.nama);
				$('#editlembaga').val(res.lembaga);
				var mfkt = '';
				$.each(res.mfakultas, function(i, item){
					if(item.nama == res.fakultas){
						mfkt += '<option data-id="'+ item.id +'" value="'+ item.nama +'" selected>'+ item.nama +'</option>';
					}else{
						mfkt += '<option data-id="'+ item.id +'" value="'+ item.nama +'">' + item.nama +'</option>';
					}
				});
				$('#editfk').html(mfkt);
				$('#editmd').html('<option value="' + res.jurusan + '" selected>' + res.jurusan + '</option>');
				var smt = '';
				for(var y = 1; y <= 8; y++){
					if(y == '0' + res.semester){
						smt += '<option value="0' + y +'" selected>0' + y +'</option>';
					}else{
						smt += '<option value="0' + y +'">0' + y +'</option>';
					}
				}
				$('#editsms').html(smt);
				var mdr = '';
				$.each(res.mdaerah, function(i, item){
					if(item.nama == res.daerah){
						mdr += '<option data-id="' + item.id + 'value="'+ item.nama +'" selected>'+ item.nama +'</option>';
					}else{
						mdr += '<option data-id="'+ item.id +'" value="'+ item.nama +'">' + item.nama +'</option>';
					}
				});
				$('#editdr').html(mdr);
				$('#editkr').html('<option value="' + res.kamar + '" selected>' + res.kamar + '</option>');
				$('#editusername').val(res.username);
				var status = '';
				for(var i = 0; i <= 1; i++){
					vl = (i == 0) ? 'Nonaktif' : 'Aktif';
					if(i == res.is_active){
						status += '<option value="' + i + '" selected>' + vl + '</option>';
					}else{
						status += '<option value="' + i + '">' + vl + '</option>';
					}
				}
				$('#imgedit').attr('src', baseUrl + 'assets/images/users/' + res.gambar);
				$('#editstatus').html(status);
				var mrl = '';
				$.each(res.mrole, function(i, item){
					if(res.role_id == item.id){
						mrl += '<option value="' + item.id +'" selected>' + item.nama + '</selected>';
					}else{
						mrl += '<option value="' + item.id +'">' + item.nama + '</selected>';
					}
				});
				$('#editrl').html(mrl);
			},
			'error': function(request, status, error){
				alert(request.responseText);
			}
		});
	});
	
	$('#editprov').on('change', function(){
		$('.input-kabupaten').html('');
		$('.input-kecamatan').html('');
		$('.input-desa').html('');
	});
	
	$('.input-provinsi').change(function(){
		var id = $(this).children('option:selected').data('id');
		$.ajax({
			'type': 'post',
			'url': baseUrl + 'json/kabupaten',
			'dataType': 'json',
			'data': 'prov_id=' + id,
			'success': function(res){
				var html = '<option value="">Pilih Kabupaten</option>';
				$.each(res.kabupatens, function(i, item){
					html += '<option data-id ="' + item.id + '" value="' +item.nama+ '">' +item.nama+ '</option>';
				});
				$('.input-kabupaten').html(html);
			},
			'error': function(request, status, error){
				alert(request.responseText);
			}
		});
	});
	
	$('.input-kabupaten').change(function(){
		var id = $(this).children('option:selected').data('id');
		$.ajax({
			'type': 'post',
			'url': baseUrl + 'json/kecamatan',
			'dataType': 'json',
			'data': 'kab_id=' + id,
			'success': function(res){
				var html = '<option value="">Pilih Kecamatan</option>';
				$.each(res.kecamatans, function(i, item){
					html += '<option data-id ="' + item.id + '" value="' +item.nama+ '">' +item.nama+ '</option>';
				});
				$('.input-kecamatan').html(html);
			},
			'error': function(request, status, error){
				alert(request.responseText);
			}
		});
	});
	
	$('.input-kecamatan').change(function(){
		var id = $(this).children('option:selected').data('id');
		$.ajax({
			'type': 'post',
			'url': baseUrl + 'json/desa',
			'dataType': 'json',
			'data': 'kec_id=' + id,
			'success': function(res){
				var html = '<option value="">Pilih Desa</option>';
				$.each(res.desas, function(i, item){
					html += '<option data-id ="' + item.id + '" value="' +item.nama+ '">' +item.nama+ '</option>';
				});
				$('.input-desa').html(html);
			},
			'error': function(request, status, error){
				alert(request.responseText);
			}
		});
	});
});