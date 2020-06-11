const flashData = $("#flash-data").data('flashdata');

if (flashData) {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: flashData,
        showConfirmButton: false,
        timer: 3000
    });
}
