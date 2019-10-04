<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Geomap;

class GeomapController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'geomaps:cadastrar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Essa comando manda uma lista de endereços para api do google maps e atualiza os campos latitude e longitude';

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
    public function handle(Geomap $geomap)
    {
        $geomap->getResults()->toArray();

        $this->info('sucesso.');
    }
}
