<?php

namespace App\Console\Commands;

use App\Models\FoodCategory;
use App\Models\FoodItem;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ScrapProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scrap-products';

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

        $data = Http::get('https://api.under500-iq.com/items?type=normal');

        $json = $data->json('data');

        foreach ($json as $e){

            $category = FoodCategory::query()->where('slug',str()->slug($e['name']))->first();

            if ($category?->exists){
                foreach ($e['items'] as $item){
                    FoodItem::create([
                        'name' => $item['name'],
                        'desc' => $item['description'],
                        'thumbnail' => $item['image'],
                        'price' => $item['price']['price'],
                        'food_category_id' => $category->id
                    ]);
                }
            }

        }

    }
}
