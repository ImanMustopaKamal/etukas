$(function () {
    var dateNow = new Date();
    $("#table").DataTable();
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

    readQuestion(1);
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
        .then((respose) => {
            const payload = respose.data;
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

$("#update").on("click", function (e) {
    e.preventDefault();
    const id = $("#id").val();
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
    }

    axios
        .post(
            urlUpdate,
            {
                id: id,
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
        .then((respose) => {
            const payload = respose.data;
            if (payload.status !== 200) {
                Swal.fire({
                    icon: "error",
                    title: payload.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
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

$("#store_question").on("click", function () {
    const question = $("#question").val();
    const answertext1 = $("#answer-text1").val();
    const answertext2 = $("#answer-text2").val();
    const answertext3 = $("#answer-text3").val();
    const answertext4 = $("#answer-text4").val();
    const isTrue = $('input[name="answer"]:checked').val();

    if (question === "") {
        Swal.fire("Pertanyaan tidak boleh kosong");
    } else if (answertext1 === "") {
        Swal.fire("Pilihan A tidak boleh kosong");
    } else if (answertext2 === "") {
        Swal.fire("Pilihan B tidak boleh kosong");
    } else if (answertext3 === "") {
        Swal.fire("Pilihan C tidak boleh kosong");
    } else if (answertext4 === "") {
        Swal.fire("Pilihan D tidak boleh kosong");
    } else if (isTrue === undefined) {
        Swal.fire("Pilih salah satu jabawan benar");
    }

    axios
        .post(
            urlQuestionStore,
            {
                task_id: $("#task_id").val(),
                question: question,
                answertext1: answertext1,
                answertext2: answertext2,
                answertext3: answertext3,
                answertext4: answertext4,
                isTrue: isTrue,
                nomor: $("#nomor").val(),
            },
            {
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            }
        )
        .then((respose) => {
            const payload = respose.data;
            if (payload.status === 200) {
                Swal.fire({
                    icon: "success",
                    title: payload.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: payload.message,
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        })
        .catch((err) => {
            console.log(err)
        });
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
                .then((respose) => {
                    const payload = respose.data;
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

function readQuestion(no) {
    $(".question").removeClass("btn-success");
    $(".question").addClass("btn-outline-success");
    $("#question_" + no).removeClass("btn-outline-success");
    $("#question_" + no).addClass("btn-success");
    $("#nomor").val(no);
    $("#question").val("");
    $("#answer-text1").val("");
    $("#answer-text2").val("");
    $("#answer-text3").val("");
    $("#answer-text4").val("");
    $("input[name=answer]").prop("checked", false);

    axios
        .post(
            urlQuestion,
            {
                task_id: $("#task_id").val(),
                nomor: no,
            },
            {
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            }
        )
        .then((respose) => {
            const payload = respose.data;
            if (payload.status === 200) {
                if (payload.data !== null) {
                    $("#question").val(payload.data.questions);
                    $("#nomor").val(payload.data.nomor);
                    $.each(payload.data.answers, function (i, el) {
                        $("#answer-text" + (i + 1)).val(el.answer);
                        if (el.is_true) {
                            $(
                                "input[name=answer][value='" +
                                    el.alphabet +
                                    "']"
                            ).prop("checked", true);
                        }
                    });
                }
            }
        })
        .catch((err) => {
            console.log(err);
        });
}
