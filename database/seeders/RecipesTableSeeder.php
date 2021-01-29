<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert(
            [
                ['name' => 'kajgana', 'description' => 'Napravljena od 5 jaja, sa dodatkom sitno iseckanog povrca, praske sunke, kao i premaza od crnog luka.', 'time' => 10, 'url' => 'https://www.stvarukusa.rs/wp-content/uploads/2015/03/9_trikova_za_savrsenu_kajganu_cl-1.jpg', 'category_id' => 1, 'author' => 'Mihajlo' ],
                ['name' => 'pohovana piletina', 'description' => 'Divna, ukusna, pohovana piletina. Pohovana koriscnjem putera i maslinovog ulja. Sjajno ide uz bil koju vrstu salate.', 'time' => 60, 'url' => 'https://stil.kurir.rs/data/images/2019/09/04/12/198233_shutterstock-1045713400_ls.jpg', 'category_id' => 2, 'author' => 'Mihajlo' ]
            ]
        );
    }
}
