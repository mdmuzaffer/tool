<?php

namespace App\Console\Commands;

use App\WJobCustomer;
use Illuminate\Console\Command;

class CustomerCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:client {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates client (WJobCustomer)';

    public $createdCount = 0;
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
        $console = $this;
        $count = (int) $this->argument('count');
        $count = $count > 0 ? $count : 1;
        $this->info("Creating {$count} Clients....");
        $factory = factory(WJobCustomer::class, $count);

        // $factory->afterCreating(WJobCustomer::class, function (WJobCustomer $customer, $faker) use ($console) {
        //     $this->warn("#{$console->createdCount} Client Created. Creating Basic Data Rows.");
        //     $customer->createBasicDataFromJsonBasicData();
        //     $this->info("#{$console->createdCount} Client's Basic Data Rows Created.");
        //     $this->info("");
        // });
        try {
            $last = WJobCustomer::orderBy('id', 'desc')->first();
            $lastId = is_null($last) ? 0 : $last->id;
            $factory->create();
            $all = WJobCustomer::where('id', '>', $lastId)->get();
            // $first = WJobCustomer::where('id', '>', $lastId)->first();
            foreach ($all as  $customer) {
                $customer->createBasicDataFromJsonBasicData();
            }

            // $this->info(" {$this->createdCount} Clients Created");
        } catch (\Throwable $th) {
            $this->error($th);
            // $this->error("Something wrong happend!!! {$this->createdCount} Clients Created");
        }
        $this->info(" ~~GOOD BYE~~ ");
        // $factory->create();
    }

    public function advanceCreationCount()
    {
        $this->createdCount++;
    }
    public function getCreationCount()
    {
        return $this->createdCount;
    }
}
