<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Genero 100 post utilizzando il faker
        for ($i=0; $i < 100; $i++) {
            $title = $faker->words(rand(1, 10), true);
            Post::create([
                'title'     => $title,
                // Per l'immagine imposto che può essere null oppure un link a Lorem Picsum con id dell'immagine generato casualmente
                'image'     => $faker->randomElement([null , 'https://picsum.photos/id/' . $faker->numberBetween(0, 999) . '/400/300']),
                'content'   => $faker->text(rand(100, 2000)),
                'slug'      => Post::generateSlug($title)
            ]);
        }
    }
}
