$(document).ready(function () {
    console.log("JavaScript učitan!");

    $(document).on("click", ".edit-btn", function () {
        let memberId = $(this).data("id");

        $.ajax({
            url: `/edit/${memberId}`,
            type: "GET",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    let data = response.data;
                    $("#edit-id").val(data.id);
                    $("#edit-name").val(data.name);
                    $("#edit-surname").val(data.surname);
                    $("#edit-phone").val(data.phone_number);
                    $("#edit-address").val(data.address);
                    $("#edit-email").val(data.email);
                    $("#edit-description").val(data.description);
                    $("#edit-website").val(data.website);

                    $("#editModal").fadeIn();
                } else {
                    alert("Greška pri učitavanju podataka!");
                }
            },
            error: function (xhr) {
                console.error("Greška u AJAX GET zahtevu:", xhr.responseText);
            }
        });
    });

    $(".modal-close").click(function () {
        $("#editModal").fadeOut();
    });

    $("#saveEdit").click(function () {
        let memberId = $("#edit-id").val();
        let formData = $("#editForm").serialize();

        $.ajax({
            url: `/edit/${memberId}`,
            type: "PUT",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    alert("Podaci uspešno ažurirani!");
                    location.reload();
                } else {
                    alert("Greška pri ažuriranju: " + response.message);
                }
            },
            error: function (xhr) {
                console.error("Greška u AJAX PUT zahtevu:", xhr.responseText);
            }
        });
    });

    $(document).on("click", ".delete-btn", function () {
        let memberId = $(this).data("id");

        let csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: `/delete/${memberId}`,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": csrfToken
            },
            success: function (response) {
                console.log("Član obrisan:", response);
                location.reload();
            },
            error: function (xhr) {
                console.error("Greška u DELETE zahtevu:", xhr.responseText);
            }
        });

    });
});
