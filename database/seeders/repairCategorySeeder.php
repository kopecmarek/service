<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class repairCategorySeeder extends Seeder
{
    /**
     * @var string
     */
    private $name_table = "repair_categories";
    /**
     * @var array
     */
    private $basic_categories = array(
        0 => 'Komputer',
        1 => 'Laptopy',
        2 => 'Zasilacze/Ładowarki',
        3 => 'Telewizory',
        4 => 'Konsole do gier',
        5 => 'Tablety',
        6 => 'Telefony/Smartfony',
        7 => "Nawigacje",
        8 => "Słuchawki",
        9 => "Urządzenia sieciowe",
        10 => "Drukarki",
        11 => 'Inne',
    );
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Schema::hasTable($this->name_table))
        {
            $this->createBasicCategory($this->basic_categories);
        }
    }

    /**
     * Create rows in table.
     *
     * @param array $categories
     * @return void
     */
    protected function createBasicCategory(array $categories)
    {
        foreach ($categories as $category){
            if(strlen($category) > DB::table($this->name_table)->max('name')) continue;
            DB::table($this->name_table)->updateOrInsert([
                'name' => $category
            ]);
        }
    }
}
