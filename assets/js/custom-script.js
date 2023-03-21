$('.btn-hapus').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	
	Swal.fire({
	  title: 'Yakin Hapus Data?',
	  text: "Data yang dihapus tidak bisa kembali",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya, Hapus!'
	}).then((result) => {
	  if (result.value) {
		document.location.href = href;
	  }
	})
})

$('.custom-file-input').on('change', function() {
	let filename = $(this).val().split('\\').pop();
	$(this).next('.custom-file-label').addClass('selected').html(filename);
})