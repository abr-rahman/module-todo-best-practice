<?php

namespace Modules\Blog\Database\Seeders;

use Faker\Provider\ar_EG\Text;
use Illuminate\Database\Seeder;
use Modules\Blog\Entities\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
