<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => Str::random(10),
                'body' => Str::random(10).'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid nulla dolores, aperiam quod asperiores commodi minima illo numquam, nesciunt quidem itaque amet ex provident. Sunt dolor assumenda est perferendis alias minima, eligendi molestiae omnis commodi quibusdam illo cumque aliquid repellendus dolorum eum vero fugit a impedit laborum. Alias quae, fugiat repudiandae corrupti neque dolorem dolor veritatis non suscipit. Debitis repellendus et fuga cum quia facilis ut suscipit voluptatem aliquam, consectetur recusandae eum cumque possimus itaque saepe quisquam qui asperiores vel neque? Consectetur aut fugiat ab molestias quia aspernatur doloribus hic quam cumque fuga tenetur facere tempore qui corporis beatae quo repudiandae reiciendis, repellendus facilis. Unde autem sed enim quod ea at omnis accusamus libero, minus odit molestiae perspiciatis natus tenetur ullam voluptatem! Ut, voluptatum. Ipsam unde omnis labore corrupti recusandae quae illo inventore, reiciendis distinctio nihil velit voluptates dolor tempora dolores modi assumenda dicta alias eligendi libero. Dicta laborum officia, nisi quisquam nemo tempora harum dolores molestias hic consectetur est laudantium debitis aliquam cumque repellendus soluta. Perspiciatis autem omnis laboriosam accusantium officia eaque est, quisquam, blanditiis doloribus saepe quasi voluptatibus excepturi itaque voluptatem aliquid nostrum obcaecati quia nam mollitia, ex aspernatur numquam dolores! Labore quam unde ea, est incidunt alias',
                'post_image' => Str::random(5),
                'category_id' => rand(0, 12),
                'author_id' => rand(0, 12),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
