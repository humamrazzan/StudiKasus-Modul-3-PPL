<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegistrasiTest extends DuskTestCase
{
    // use DatabaseMigrations;

    public function testRegister(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/')
                ->assertSee('Enterprise Application Development')  // Memastikan ada teks 'Enterprise Application Development'
                ->clickLink('Register')  // Mengklik link 'Register'
                ->assertPathIs('/register')  // Memastikan url setelah mengklik link Register
                ->type('name', 'admin')  // Mengisi field 'name' dengan 'admin'
                ->type('email', 'userd@gmail.com')  // Mengisi field 'email' dengan 'admin@gmail.com'
                ->type('password', 'password')  // Mengisi field 'password' dengan 'password'
                ->type('password_confirmation', 'password')  // Mengisi field 'password_confirmation' dengan 'password'
                ->press('REGISTER')  // Menekan tombol 'REGISTER'
                ->assertPathIs('/dashboard');  // Memastikan setelah registrasi, pengguna diarahkan ke dashboard
        });
    }
}