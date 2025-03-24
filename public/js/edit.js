$(document).on('click', '.edit-member', function () {
    var memberId = $(this).data('id');

    $.ajax({
        url: '/edit/' + memberId,
        method: 'GET',
        success: function (response) {
            $('#editForm input[name="name"]').val(response.name);
            $('#editForm input[name="surname"]').val(response.surname);
            $('#editForm input[name="phone_number"]').val(response.phone_number);
            $('#editForm input[name="address"]').val(response.address);
            $('#editForm input[name="email"]').val(response.email);
            $('#editForm textarea[name="description"]').val(response.description);
            $('#editForm input[name="website"]').val(response.website);
            $('#editForm').data('id', memberId);
            $('#editModal').modal('show');
        }
    });
});

$('#editForm').on('submit', function (e) {
    e.preventDefault();

    var memberId = $(this).data('id');

    $.ajax({
        url: '/update/' + memberId,
        method: 'PUT',
        data: $(this).serialize(),
        success: function (response) {
            alert(response.message);
            location.reload();
        },
        error: function (response) {
            alert('Something went wrong! ' + response.responseJSON.message);
        }
    });
});

$(document).on('click', '.delete-btn', function () {
    var memberId = $(this).data('id');

    if (confirm("Are you sure you want to delete this member?")) {
        $.ajax({
            url: '/delete/' + memberId,
            method: 'DELETE',
            data: {
                id: memberId
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert("Member successfully deleted!");
                    window.location.href = "/index";
                } else {
                    alert("Error deleting: " + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Something went wrong while trying to delete the member.");
            }
        });
    }
});

$(document).ready(function () {
    // Upload slike
    $('#upload-image-form').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        let memberId = $(this).data('member-id');

        if (!memberId) {
            $('#message').html('<p style="color: red;">Error.</p>');
            return;
        }

        $.ajax({
            url: `/member/${memberId}/upload-image`,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log("Uspeh:", response);
                $('#message').html('<p style="color: green;">' + response.success + '</p>');
                if (response.filepath) {
                    let fileName = response.filepath;
                    let deleteButton = window.currentUserRole === 'admin' ?
                        `<button class="btn btn-danger btn-sm delete-image" data-image-id="${response.image_id}" style="position: absolute; top: 0; right: 0;">X</button>` : '';

                    $('#images-container').append(`
                        <div class="image-wrapper d-inline-block position-relative m-2">
                            <img src="/storage/images/${fileName}" alt="Slika člana" width="100" data-image-id="${response.image_id}">
                            ${deleteButton}
                        </div>
                    `);
                    if ($('#images-container p').length) {
                        $('#images-container p').remove();
                    }
                }
                setTimeout(() => {
                    $('#message').html('');
                }, 3000);
            },
            error: function (xhr) {
                console.log("Greška:", xhr.responseText);
                $('#message').html('<p style="color: red;">Error: ' + xhr.responseText + '</p>');
            }
        });
    });

    $(document).on('click', '.delete-image', function () {
        var imageId = $(this).data('image-id');
        var $imageWrapper = $(this).closest('.image-wrapper');

        if (confirm("Are you sure you want to delete this image?")) {
            $.ajax({
                url: `/image/${imageId}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#message').html('<p style="color: green;">' + response.success + '</p>');
                    $imageWrapper.remove();
                    if ($('#images-container').children().length === 0) {
                        $('#images-container').html('<p>Image not found.</p>');
                    }
                    setTimeout(() => {
                        $('#message').html('');
                    }, 3000);
                },
                error: function (xhr) {
                    $('#message').html('<p style="color: red;">Error: ' + xhr.responseText + '</p>');
                }
            });
        }
    });
});
