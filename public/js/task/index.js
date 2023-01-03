$(function () {
    $("#table").DataTable();
});

function deleteTask(id) {
    Swal.fire({
        title: "Anda yakin?",
        text: "Menghapus tes",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            axios
                .delete(urlDelete + "/" + id, null, {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                })
                .then((response) => {
                    const payload = response.data;
                    if (payload.status !== 200) {
                        Swal.fire({
                            icon: "error",
                            title: payload.message,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    } else {
                        $("#name").val("");
                        $("#start_at").val("");
                        $("#end_at").val("");

                        Swal.fire({
                            icon: "success",
                            title: payload.message,
                            timer: 1500,
                        }).then((res) => {
                            location.href = url;
                        });
                    }
                })
                .catch((err) => {
                    console.log(err);
                    Swal.fire(err);
                });
        }
    });
}
