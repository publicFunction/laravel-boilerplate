<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomepageTest extends TestCase
{
    /**
     * Test that the homepage shows what we expect.
     *
     * @return void
     */
    public function testHomepageShowsSlogan()
    {
        $this->visit('/')
             ->see('Build something cool.');
    }
}
