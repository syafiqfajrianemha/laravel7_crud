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

$('.custom-file-input').on('change', function () {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
