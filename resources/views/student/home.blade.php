<x-student-layout>
  <x-breadcrumb>
    <li class="breadcrumb-item"><a href="{{ route('student.task') }}">Home</a></li>
  </x-breadcrumb>

  <div class="row justify-content-center py-2 mb-4">
    <div class="col-md-12 d-flex-center">
      <div class="alert alert-light" role="alert">
        <h2 class="alert-heading mb-3">Informasi</h2>
        <p>
          Silahakan pilih Tes yang diikuti dari daftar tes yang tersedia dibawah ini. Apabila tes tidak muncul, silahkan menghubungi Operator yang bertugas.
        </p>
      </div>
    </div>
  </div>

  <div class="card" style="padding: 20px;">
    <div class="table-responsive text-nowrap">
      <table id="table" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jumlah Soal</th>
            <th>Waktu</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($task as $idx => $item)
          <tr>
            <td>{{ $idx+1 }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->question_count }} Soal</td>
            <td>{{ $item->minutes }} Menit</td>
            <td>
              @if($item->is_answer)
              <button type="button" class="btn btn-secondary">
                <i class="fa-solid fa-pen-to-square"></i>
                Sudah Kerjakan
              </button>
              @else
              <a href="{{ url('student/task/'.$item->slug) }}">
                <button type="button" class="btn btn-primary">
                  <i class="fa-solid fa-pen-to-square"></i>
                  Kerjakan
                </button>
              </a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-student-layout>
<script>
  $(function() {
    $("#table").DataTable();
  });
</script>