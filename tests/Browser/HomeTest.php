<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomeTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testHomePage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit("/")->assertSee("Laravel");
        });
    }
}
