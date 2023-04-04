<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Estate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class EstateSeeder extends Seeder
{
    protected array $estates = [];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (($open = fopen(storage_path() . "/app/upload/data.csv", "r")) !== FALSE) {
            if (($headers = fgetcsv($open, 1000, ",")) !== FALSE)
                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                    $this->estates[] = array_combine($headers, $data);
                }
            fclose($open);
        }

        try {
            foreach ($this->estates as $estate) {
                DB::table('estates')->insert(array_change_key_case($estate));
            }
        }catch (\Illuminate\Database\QueryException $e){
            Log::error($e->getMessage());
        }

    }
}
