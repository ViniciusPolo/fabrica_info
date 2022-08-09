<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alunos;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alunos::factory(50)->create();
    }
}
