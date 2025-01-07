<?php

namespace App\Exports;

use App\Models\User;
use App\Models\UserMediator;
use Domain\Report\ViewModels\ReportExcel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportExport
    implements FromCollection, ShouldAutoSize, WithHeadings, WithStyles
{

    use Exportable;

    public function __construct(public array $dates)
    {
    }



    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $reports = ReportExcel::make()->report_range_dates($this->dates);

        foreach ($reports as $k => $report) {

            $exp[$k]['date'] = rusdate_month($report->created_at);
            $exp[$k]['sem'] = ($report->sem)?:'-';
            $sem[$k] = ($report->sem)?:0;
            $exp[$k]['ugo'] = ($report->ugo)?:'-';
            $ugo[$k] = ($report->ugo)?:0;
            $exp[$k]['gra'] = ($report->gra)?:'-';
            $gra[$k] = ($report->gra)?:0;
            $exp[$k]['uve'] = ($report->uve)?:'-';
            $uve[$k] = ($report->uve)?:0;
            $exp[$k]['kor'] = ($report->kor)?:'-';
            $kor[$k] = ($report->kor)?:0;
            $exp[$k]['tru'] = ($report->tru)?:'-';
            $tru[$k] = ($report->tru)?:0;
            $exp[$k]['ban'] = ($report->ban)?:'-';
            $ban[$k] = ($report->ban)?:0;
        }

       // dd($sem);


        $k = $k+1;
        $exp[$k]['date'] = '';
        $exp[$k]['sem'] = collect($sem)->sum();
        $exp[$k]['ugo'] = collect($ugo)->sum();
        $exp[$k]['gra'] = collect($gra)->sum();
        $exp[$k]['uve'] = collect($uve)->sum();
        $exp[$k]['kor'] = collect($kor)->sum();
        $exp[$k]['tru'] = collect($tru)->sum();
        $exp[$k]['ban'] = collect($ban)->sum();

        $list = collect($exp);
        return $list;
    }

    public function headings(): array
    {
        return [
            'Дата',
            'Семейная',
            'Уголовная',
            'Гражданская',
            'Ювенальная',
            'Корпоративная',
            'Трудовые споры',
            'Банковские споры',

        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'color' => ['rgb' => 'EF533F']]],
        ];
    }


}
