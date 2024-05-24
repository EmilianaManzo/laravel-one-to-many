<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Functions\Helper as Helpy;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run(Faker $faker): void
    {
        for ($i=0; $i < 60 ; $i++) {
            $new_project = new Project();
            $new_project->title = $faker->word(9, true);
            $new_project->slug = Helpy::createSlug($new_project->title, Project::class);
            $new_project->href =$faker->url();
            $new_project->type =$faker->word(9, true);
            $new_project->description =$faker->paragraph(8, true);
            $new_project->save();
        }
    }

}
