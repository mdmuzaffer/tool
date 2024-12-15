<?php

namespace App\Console\Commands;

use App\InternetPackage;
use Carbon\Carbon;
use Illuminate\Console\Command;
// use Faker\Generator as Faker;
// use Faker\Factory as Faker;

class EndDateCheckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:enddate {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks random dates for package end date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $count = (int) $this->argument('count');
        $headers = [
            'sl',
            // 'startDate',
            // 'endDate',
            'diff',
            'sd',
            'ed',
            // 'endOfStartMonth',
            'EoSM'
        ];
        $vals = $this->getRandomDates($count)
            // ->pluck($headers)
            ->toArray();
        $vals = array_map(function ($d) {
            return array_values($d);
        }, $vals);
        $this->table($headers, $vals);
    }

    public function getEndDateAndMore(Carbon $startDate)
    {
        $endDate = InternetPackage::GetEndDateByStartDate($startDate);
        $diff = $startDate->diff($endDate);
        $sd = $startDate->format('d/m/Y');
        $ed = $endDate->format('d/m/Y');
        $endOfStartMonth = $startDate->clone()->endOfMonth();
        $EoSM = $endOfStartMonth->format('d/m/Y');
        return [
            'sl' => 1,
            // 'startDate' => (string) $startDate,
            // 'endDate' => (string) $endDate,
            'diff' => (string) $diff->days,
            'sd' => (string) $sd,
            'ed' => (string) $ed,
            // 'endOfStartMonth' => (string) $endOfStartMonth,
            'EoSM' => (string) $EoSM
        ];
    }
    public function getRandomDates(int $cnt = 30)
    {
        // $faker = new Faker();
        $faker = \Faker\Factory::create();
        $arr = collect([]);
        foreach (range(1, $cnt) as $index) {
            $startDate = $faker->dateTimeBetween('-25 years', '-20 years');
            $startDate  = \Carbon\Carbon::instance($startDate);
            $a = $this->getEndDateAndMore($startDate);
            $a['sl'] = $index;
            $arr->add($a);
        }
        return $arr;
    }
}
