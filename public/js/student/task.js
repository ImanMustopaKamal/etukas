let isStart = false;
let arrayQuestion = [];

function refresh() {
  $('.grid-container').empty();
  const task_id = $("#task_id").val()
  axios.get(urlData+`/${task_id}`)
  .then(async (response) => {
    const payload = response.data;
			if (payload.status === 200) {
        if (payload.data !== null) {
          var item = "";
          $.each(payload.data, function (i, el) {
            let cssClass = ""
            if(el.is_answer === true) {
              if(el.not_sure) {
                cssClass = "btn-warning";
              }else{
                cssClass = "btn-success";
              }
            }else{
              cssClass = "btn-secondary";
            }
            item += '<div class="grid-item"><button type="button" class="btn '+ cssClass +' question" id="question_'+(i+1)+'" onclick="readQuestion('+ (i+1) +')">'+(i+1)+'</button></div>'
          })
          $(".grid-container").append(item);

          var number = parseInt($("#number").html());
          await readQuestion(number);
          await startTask();
        }else{
          alert("a system error occurred !")
          this.location.href = "/student/task"
        }
      }else{
        alert("a system error occurred !")
        this.location.href = "/student/task"
      }
  })
  .catch(err => {
    alert(err)
  })
}

$(async function () {
  if(userTask === "") {
	  Swal.fire({
      title: "Siap mengerjakan soal ?",
      text: "Mohon untuk tidak meninggalkan halaman ini sebelum menyelesaikan semua soal",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Mulai",
      cancelButtonText: "Batal",
    }).then((result) => {
      if (result.isConfirmed) {
        axios
          .post(
            urlStart,
            {
              task_id: $("#task_id").val(),
            },
            {
              headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                  "content"
                ),
              },
            }
          )
          .then(async (response) => {
            await refresh()
          })
          .catch(err => {
            console.log(err)
          })
      }else{
        this.location.href = "/student/task"
      }
    });
  }else{
    await refresh()
  }
});

function startTask() {
  var countDownDate = new Date($("#end_at").val()).getTime();
  var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // document.getElementById("counter").innerHTML = days + "d " + hours + "h "
    // + minutes + "m " + seconds + "s ";
    document.getElementById("counter").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
      
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("counter").innerHTML = "EXPIRED";
    }
  }, 1000);
}

async function readQuestion(no) {
  if(parseInt(no) > parseInt(questionLength)) {
    $("#number").html(parseInt(no)-1)
    // Swal.fire({
    //   icon: "error",
    //   title: payload.message,
    //   showConfirmButton: false,
    //   timer: 1500,
    // });
    return true
  }
  $("input[name=answer]").prop("checked", false);
  // let answer = $("input[name=answer]:checked").val();
  // console.log(answer)
  // if(answer !== undefined) {
  //   submitAnswer();
  // }

	// $(".question").removeClass("btn-dark");
	// $(".question").addClass("btn-outline-dark");
	// $("#question_" + no).removeClass("btn-outline-dark");
	// $("#question_" + no).addClass("btn-dark");
	$("#number").html(no);

	await axios
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
		.then((response) => {
			const payload = response.data;
			if (payload.status === 200) {
        if (payload.data !== null) {
          $("#question").html(payload.data.questions);
          $("#question_id").val(payload.data.id);
          $.each(payload.data.answers, function (i, el) {
            $("#textanswer" + (i + 1)).html(el.answer);
            $("#answer" + (i + 1)).val(el.id)
            if (el.is_answer) {
              $("input[name=answer][value='" + el.id + "']").prop("checked", true);
            }
          })
        }
      }
		})
		.catch((err) => {
			console.log(err);
		});
}

async function submitAnswer() {
  let answer = $("input[name=answer]:checked").val();
  if(answer !== undefined) {
    await axios
      .post(
        urlAnswer,
        {
          question_id: $("#question_id").val(),
          task_id: $("#task_id").val(),
          nomor: $("#number").html(),
          answer: answer,
        },
        {
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
              "content"
            ),
          },
        }
      )
      .then(async(response) => {
        var number = parseInt($("#number").html());
        $("#number").html(number+1);
        await refresh();
      })
      .catch(err => {
        console.log(err)
      })
  }
}

async function notSure() {
  let answer = $("input[name=answer]:checked").val();
  if(answer !== undefined) {
    await axios
      .post(
        urlAnswer,
        {
          question_id: $("#question_id").val(),
          task_id: $("#task_id").val(),
          nomor: $("#number").html(),
          not_sure: true,
          answer: answer,
        },
        {
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
              "content"
            ),
          },
        }
      )
      .then(async(response) => {
        var number = parseInt($("#number").html());
        $("#number").html(number+1);
        await refresh();
      })
      .catch(err => {
        console.log(err)
      })
  }
}

function stop()
{
  Swal.fire({
    title: "Ingin menghentikan ujuan ?",
    text: "",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hentikan",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      this.location.href = "/student/task"
    }
  })
}
