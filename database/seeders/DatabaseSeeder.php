<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            AvoidedIngredientSeeder::class,
            CategorySeeder::class,
            CompanySeeder::class,
            RecipeSeeder::class,
            ReviewSeeder::class,
            BookmarkSeeder::class,
            StepHeaderSeeder::class,
            StepSeeder::class,
            IngredientHeaderSeeder::class,
            IngredientSeeder::class,
            IngredientIngredientHeaderSeeder::class,
            ToolSeeder::class,
            RecipeToolSeeder::class,
            NutritionSeeder::class,
            NutritionRecipeSeeder::class,
            TagSeeder::class,
            RecipeTagSeeder::class,
            ReviewReactionSeeder::class,
            StepProgressSeeder::class,
            UserIngredientProgressSeeder::class,
            UserToolProgressSeeder::class,
            FollowsSeeder::class,
            CookingHistorySeeder::class,
            CommentSeeder::class,
            ReplySeeder::class
        ]);
    }
}
