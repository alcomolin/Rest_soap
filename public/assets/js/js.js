function deleteProduct(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/delete",
                type: "DELETE",
                data: {
                    product_id: id,
                },
                processData: true,
                headers: {
                    "X-CSRF-Token": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your zone has been deleted.",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 950,
                    });
                    setTimeout(function () {
                        location.reload(true);
                    }, 1000);
                },
                error: function (error) {},
            });
        }
    });
}
