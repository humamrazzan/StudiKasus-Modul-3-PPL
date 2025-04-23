<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    // use DatabaseMigrations;

    public function testLogin(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/login')
                ->assertSee('Email')  // Memastikan ada field Email
                ->assertSee('Password')  // Memastikan ada field Password
                ->type('email', 'admin@gmail.com')  // Mengisi field email dengan 'admin@gmail.com'
                ->type('password', 'password')  // Mengisi field password dengan 'password'
                ->press('LOG IN')  // Menekan tombol 'LOG IN'
                ->assertPathIs('/dashboard');  // Memastikan setelah login, pengguna diarahkan ke halaman dashboard
        });
    }
}