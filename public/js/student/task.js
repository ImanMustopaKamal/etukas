let isStart = false;

function convertTZ(date, tzString) {
  return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));   
}

$(function () {
  moment.locale('id');
  var startDate = moment(start_at, "DD/MM/YYYY HH:ii:ss");
  var endDate = moment(end_at, "DD/MM/YYYY HH:ii:ss");
  var date = moment().format("YYYY-MM-DD HH:mm:ss");
  var range = moment().isSameOrBefore(startDate);
  // range.contains(date)
  // date.isBetween(startDate, endDate, 'days', true);
  // console.log(startDate)
  // const date = convertTZ(new Date(), "Asia/Jakarta")
  // var thisDate = moment(date, "DD/MM/YYYY HH:ii:ss");
  console.log(range)
  
  // axios
  // if(!isStart) {
  //   Swal.fire({
  //     title: "Siap mengerjakan soal ?",
  //     text: "Mohon untuk tidak meninggalkan halaman ini sebelum menyelesaikan semua soal",
  //     icon: "warning",
  //     showCancelButton: true,
  //     confirmButtonColor: "#3085d6",
  //     cancelButtonColor: "#d33",
  //     confirmButtonText: "Mulai",
  //     cancelButtonText: "Batal",
  //   }).then((result) => {
  //     if (result.isConfirmed) {
  //       readQuestion(1);
  //     }else{
  //       this.location.href = "/student/task"
  //     }
  //   });
  // }
});

function readQuestion(no) {
	$(".question").removeClass("btn-dark");
	$(".question").addClass("btn-outline-dark");
	$("#question_" + no).removeClass("btn-outline-dark");
	$("#question_" + no).addClass("btn-dark");
	// $("#nomor").val(no);
	// $("#question").val("");
	// $("#answer-text1").val("");
	// $("#answer-text2").val("");
	// $("#answer-text3").val("");
	// $("#answer-text4").val("");
	// $("input[name=answer]").prop("checked", false);

	// axios
	// 	.post(
	// 		urlQuestion,
	// 		{
	// 			task_id: $("#task_id").val(),
	// 			nomor: no,
	// 		},
	// 		{
	// 			headers: {
	// 				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
	// 					"content"
	// 				),
	// 			},
	// 		}
	// 	)
	// 	.then((response) => {
	// 		const payload = response.data;
	// 		if (payload.status === 200) {
	// 			if (payload.data !== null) {
	// 				$("#question").val(payload.data.questions);
	// 				$("#nomor").val(payload.data.nomor);
	// 				$.each(payload.data.answers, function (i, el) {
	// 					$("#answer-text" + (i + 1)).val(el.answer);
	// 					if (el.is_true) {
	// 						$(
	// 							"input[name=answer][value='" +
	// 								el.alphabet +
	// 								"']"
	// 						).prop("checked", true);
	// 					}
	// 				});
	// 			}
	// 		}
	// 	})
	// 	.catch((err) => {
	// 		console.log(err);
	// 	});
}
