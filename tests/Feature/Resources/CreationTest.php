<?php

namespace Tests\Feature\Resources;

use App\Enums\RessourceRelation;
use Tests\TestCase;
use App\Models\User;
use App\Enums\RessourceType;
use App\Models\Categorie;
use App\Models\Ressource;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Http\UploadedFile;

class CreationTest extends TestCase
{
    public function test_citizen_can_acces_resource_creation() {

        $user = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->get(route('resources.create'));
        $response->assertStatus(302);

        $user->delete();
    }

    public function test_citizen_can_create_activite() {

        $faker = Faker::create();

        $user       = User::factory()->verifiedCitizen()->create();
        $category   = Categorie::create(['name' => $faker->word()]);

        $response = $this->actingAs($user)->post(route('resources.store'), [
            'title'                  => 'Test Atelier',
            'relation'               => RessourceRelation::Pro->value,
            'categorie_id'           => $category->id,
            'ressourceable_type'     => RessourceType::Activite->value,
            'activite_description'   => $faker->sentence(30),
            'activite_starting_date' => Carbon::now()->addDays(3),
            'activite_duration'      => rand(30, 120),
        ]);
        $response->assertStatus(302);

        $resource = Ressource::where('title', 'Test Atelier')
                                ->where('categorie_id', $category->id)
                                ->first();

        $resource->forceDelete();
        $category->delete();
        $user->delete();
    }

    public function test_citizen_can_create_article() {

        $faker = Faker::create();

        $user       = User::factory()->verifiedCitizen()->create();
        $category   = Categorie::create(['name' => $faker->word()]);

        $response = $this->actingAs($user)->post(route('resources.store'), [
            'title'                 => 'Test Article',
            'relation'              => RessourceRelation::Pro->value,
            'categorie_id'          => $category->id,
            'ressourceable_type'    => RessourceType::Article->value,
            'article_source_url'    => 'https://www.articles.com/articles/123456',
        ]);
        $response->assertStatus(302);

        $resource = Ressource::where('title', 'Test Article')
                                ->where('categorie_id', $category->id)
                                ->first();

        $resource->forceDelete();
        $category->delete();
        $user->delete();
    }

    public function test_citizen_can_create_atelier() {

        $faker = Faker::create();

        $user       = User::factory()->verifiedCitizen()->create();
        $category   = Categorie::create(['name' => $faker->word()]);

        $response = $this->actingAs($user)->post(route('resources.store'), [
            'title'                 => 'Test Atelier',
            'relation'              => RessourceRelation::Pro->value,
            'categorie_id'          => $category->id,
            'ressourceable_type'    => RessourceType::Atelier->value,
            'atelier_description'   => $faker->sentence(50),
        ]);
        $response->assertStatus(302);

        $resource = Ressource::where('title', 'Test Atelier')
                                ->where('categorie_id', $category->id)
                                ->first();

        $resource->forceDelete();
        $category->delete();
        $user->delete();
    }

    public function test_citizen_can_create_course() {

        $faker = Faker::create();

        $user       = User::factory()->verifiedCitizen()->create();
        $category   = Categorie::create(['name' => $faker->word()]);

        $response = $this->actingAs($user)->post(route('resources.store'), [
            'title'                 => 'Test Course',
            'relation'              => RessourceRelation::Pro->value,
            'categorie_id'          => $category->id,
            'ressourceable_type'    => RessourceType::Course->value,
            'course_file'           => UploadedFile::fake()->create('test.pdf'),
        ]);
        $response->assertStatus(302);

        $resource = Ressource::where('title', 'Test Course')
                                ->where('categorie_id', $category->id)
                                ->first();

        $resource->forceDelete();
        $category->delete();
        $user->delete();
    }

    public function test_citizen_can_create_defi() {

        $faker = Faker::create();

        $user       = User::factory()->verifiedCitizen()->create();
        $category   = Categorie::create(['name' => $faker->word()]);

        $response = $this->actingAs($user)->post(route('resources.store'), [
            'title'                 => 'Test Defi',
            'relation'              => RessourceRelation::Pro->value,
            'categorie_id'          => $category->id,
            'ressourceable_type'    => RessourceType::Defi->value,
            'defi_description'      => $faker->sentence(50),
            'defi_bonus'            => null,
        ]);
        $response->assertStatus(302);

        $resource = Ressource::where('title', 'Test Defi')
                                ->where('categorie_id', $category->id)
                                ->first();

        $resource->forceDelete();
        $category->delete();
        $user->delete();
    }

    public function test_citizen_can_create_jeu() {

        $faker = Faker::create();

        $user       = User::factory()->verifiedCitizen()->create();
        $category   = Categorie::create(['name' => $faker->word()]);

        $response = $this->actingAs($user)->post(route('resources.store'), [
            'title'                 => 'Test Jeu',
            'relation'              => RessourceRelation::Pro->value,
            'categorie_id'          => $category->id,
            'ressourceable_type'    => RessourceType::Jeu->value,
            'jeu_description'       => $faker->sentence(50),
            'jeu_starting_date'     => Carbon::now()->addDays(3),
            'jeu_link'              => $faker->url(),
        ]);
        $response->assertStatus(302);

        $resource = Ressource::where('title', 'Test Jeu')
                                ->where('categorie_id', $category->id)
                                ->first();

        $resource->forceDelete();
        $category->delete();
        $user->delete();
    }

    public function test_citizen_can_create_lecture() {

        $faker = Faker::create();

        $user       = User::factory()->verifiedCitizen()->create();
        $category   = Categorie::create(['name' => $faker->word()]);

        $response = $this->actingAs($user)->post(route('resources.store'), [
            'title'                 => 'Test Lecture',
            'relation'              => RessourceRelation::Pro->value,
            'categorie_id'          => $category->id,
            'ressourceable_type'    => RessourceType::Lecture->value,
            'lecture_title'         => $faker->sentence(),
            'lecture_author'        => $faker->sentence(2),
            'lecture_year'          => $faker->year(),
            'lecture_summary'       => $faker->sentence(50),
            'lecture_analysis'      => $faker->sentence(50),
            'lecture_review'        => $faker->sentence(50),
        ]);
        $response->assertStatus(302);

        $resource = Ressource::where('title', 'Test Lecture')
                                ->where('categorie_id', $category->id)
                                ->first();

        $resource->forceDelete();
        $category->delete();
        $user->delete();
    }

    public function test_citizen_can_create_photo() {

        $faker = Faker::create();

        $user       = User::factory()->verifiedCitizen()->create();
        $category   = Categorie::create(['name' => $faker->word()]);

        $response = $this->actingAs($user)->post(route('resources.store'), [
            'title'                 => 'Test Photo',
            'relation'              => RessourceRelation::Pro->value,
            'categorie_id'          => $category->id,
            'ressourceable_type'    => RessourceType::Photo->value,
            'photo_file'            => UploadedFile::fake()->create('test.jpg'),
            'photo_author'          => null,
            'photo_legend'          => null,
        ]);
        $response->assertStatus(302);

        $resource = Ressource::where('title', 'Test Photo')
                                ->where('categorie_id', $category->id)
                                ->first();

        $resource->forceDelete();
        $category->delete();
        $user->delete();
    }

    public function test_citizen_can_create_video() {

        $faker = Faker::create();

        $user       = User::factory()->verifiedCitizen()->create();
        $category   = Categorie::create(['name' => $faker->word()]);

        $response = $this->actingAs($user)->post(route('resources.store'), [
            'title'                 => 'Test Video',
            'relation'              => RessourceRelation::Pro->value,
            'categorie_id'          => $category->id,
            'ressourceable_type'    => RessourceType::Video->value,
            'video_file'            => UploadedFile::fake()->create('test.mp4'),
            'video_link'            => null,
            'video_legend'          => null,
        ]);
        $response->assertStatus(302);

        $resource = Ressource::where('title', 'Test Video')
                                ->where('categorie_id', $category->id)
                                ->first();

        $resource->forceDelete();
        $category->delete();
        $user->delete();
    }
}
