<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $this->assertTrue(true);
        //Given i have two records in the database that are post,
        //and erach is posted a month apart

        //one post created this month
        $first = factory(Post::class)->create();

        //onother post created last month
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        //When I fetch the archives
        $posts = Post::archives();

        //Then the respones should be in the proper format
        //$this->assertCount(2,$posts);
        $this->assertEquals([
        [
            "theyear" => $first->created_at->format('Y'),
            "month" => $first->created_at->format('F'),
            "published" => 2
        ],
            [
                "theyear" => $second->created_at->format('Y'),
                "month" => $second->created_at->format('F'),
                "published" => 1

            ],
    ],  $posts);
    }
}
