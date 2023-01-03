$(function () {
    var dateNow = new Date();
    $("#start_at").on("click", function () {
        $(this).datetimepicker({
            defaultDate: dateNow,
            inline: true,
            sideBySide: true,
            locale: "id",
            format: "DD/MM/YYYY HH:mm",
        });
    });
    $("#end_at").on("click", function () {
        $(this).datetimepicker({
            defaultDate: dateNow,
            inline: true,
            sideBySide: true,
            locale: "id",
            format: "DD/MM/YYYY HH:mm",
        });
    });
    $("#datetimepicker12").datetimepicker({
        inline: true,
        sideBySide: true,
        locale: "id",
        format: "DD/MM/YYYY HH:mm",
    });
});

$("#store").on("click", function (e) {
    e.preventDefault();
    const name = $("#name").val();
    const start_at = $("#start_at").val();
    const end_at = $("#end_at").val();
    const question_count = $("#question_count").val();

    if (name === "") {
        Swal.fire("Nama tidak boleh kosong");
    } else if (start_at === "") {
        Swal.fire("Tanggal mulai tidak boleh kosong");
    } else if (end_at === "") {
        Swal.fire("Tanggal berakhir tidak boleh kosong");
    } else if (question_count === "") {
        Swal.fire("Jumlah Soal tidak boleh kosong");
    }

    axios
        .post(
            urlStore,
            {
                name: name,
                start_at: start_at,
                end_at: end_at,
                question_count: question_count,
            },
            {
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            }
        )
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
                $("#question_count").val("0");

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
});
