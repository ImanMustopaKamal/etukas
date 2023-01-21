<?php
    namespace App\Exports;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;

    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\FromQuery;
    use Maatwebsite\Excel\Concerns\WithHeadings;
    use Maatwebsite\Excel\Concerns\Exportable;
    use Maatwebsite\Excel\Concerns\WithMapping;

    use App\Models\UserAnswer;
    use App\Models\User;
 
    class ExportResult implements FromCollection, WithMapping, WithHeadings
    {
        use Exportable;

        public $data;

        public function __construct($data)
        {
            $this->data = $data;
        }

        public function collection()
        {
            $answer = User::select('nim', 'name', DB::raw('SUM(is_true) as benar'))
                ->leftJoin('user_answers', 'users.id', 'user_answers.user_id')
                ->leftJoin('answers', 'user_answers.answer_id', 'answers.id')
                ->where('task_id', $this->data->id)
                ->groupBy('nim', 'name')
                ->orderBy('benar', 'desc')
                ->get();
                
            return $answer;
        }

        public function map($answer): array
        {
            return [
                $answer->nim,
                $answer->name,
                $this->data->soal,
                $answer->benar,
                $this->data->soal-$answer->benar
            ];
        }

        public function headings(): array
        {
            return [
                'nim',
                'nama',
                'jumlah',
                'benar',
                'salah',
            ];
        }
        
    }
?>