<x-teacher-layout>
    <x-breadcrumb>
      <li class="breadcrumb-item"><a href="{{ route('teacher.task') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Result</li>
    </x-breadcrumb>

    <div class="card" style="padding: 20px;">
    <div class="table-responsive text-nowrap">
      <div class="row justify-content-between py-2 mb-4">
        <div class="col-md-8">
          <h2>Hasil Ujian</h2>
        </div>
        
      </div>

      <table id="table" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jumlah Soal</th>
            <th>Jumlah Mengikuti</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($task as $idx => $item)
          <tr>
            <td>{{ $idx+1 }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->question_count }} Soal</td>
            <td>{{ $item->user_tasks_count }} Mahasiswa/i</td>
            <td>
              <a href="{{ url('teacher/task/excel/'.$item->slug) }}">
                <button class="btn btn-success">
                  Export&nbsp;
                  <i class="fa-solid fa-file-excel"></i>
                </button>
              </a>
              <!-- <a href="{{ url('teacher/task/pdf/'.$item->slug) }}">
                <button class="btn btn-danger">
                  Export&nbsp;
                  <i class="fa-solid fa-file-pdf"></i>
                </button>
              </a> -->
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-teacher-layout>
<script>
  $(function () {
    $("#table").DataTable();
  });
</script>