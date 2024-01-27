<?php

namespace App\Console\Commands;

use App\Models\FoodCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ScrapCategories extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scrap-categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        $data = Http::get('https://api.under500-iq.com/items?type=normal');

        $json = $data->json('data');

        foreach ($json as $e){
            if (count($e['items'])){
                FoodCategory::create([
                    'name' => $e['name'],
                    'slug' => str()->slug($e['name']),
                    'menu_id' => 1
                ]);
            }
        }
    }
}
