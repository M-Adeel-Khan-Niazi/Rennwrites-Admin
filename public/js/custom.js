$(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".select2").select2();

    var Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        timer: 3000,
    });

    $(".SingleDelete").on("click", function (e) {
        e.preventDefault();

        Toast.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((willDelete) => {
            const self = $(this);
            const url = $("#delete-form").attr("action");
            if (willDelete.isConfirmed) {
                Toast.fire({
                    title: "Deleted!",
                    text: "Record has been deleted.",
                    icon: "success",
                });
                $.ajax({
                    url: url,
                    type: "delete",
                })
                    .done((res) => {
                        if (res.deleted === true) {
                            self.closest("tr").fadeOut("slow");
                            self.remove();
                        }
                    })
                    .fail(() => {
                        alert("Oppss! Somrthing Went Wrong");
                    });
            } else {
                Toast.fire("Your file is safe!");
            }
        });
    });
});
