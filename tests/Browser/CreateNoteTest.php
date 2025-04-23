<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateNoteTest extends DuskTestCase
{
    // use DatabaseMigrations;

    public function testCreateNote(): void
    {
        $this->browse(function (Browser $browser): void {
            
            $browser->visit('/login')
                ->assertSee('Email')  // Memastikan ada field Email
                ->assertSee('Password')  // Memastikan ada field Password
                ->type('email', 'admin@gmail.com')  // Mengisi field email dengan 'admin@gmail.com'
                ->type('password', 'password')  // Mengisi field password dengan 'password'
                ->press('LOG IN')  // Menekan tombol 'LOG IN'
                ->assertPathIs('/dashboard')  // Memastikan setelah login, pengguna diarahkan ke halaman dashboard
                ->clickLink('Notes')
                ->clickLink('Create Note')

                ->assertPathIs('/create-note')
                ->type('title', 'Catatan Pertama')  // Mengisi field Title dengan 'Catatan Pertama'
                ->type('description', 'Ini adalah deskripsi untuk catatan pertama.')  // Mengisi field Description
                ->press('CREATE')  // Menekan tombol 'CREATE'
                ->assertPathIs('/notes')  // Memastikan setelah pembuatan catatan, pengguna diarahkan ke halaman Notes
                ->assertSee('Catatan Pertama');  // Memastikan catatan yang dibuat tampil di halaman Notes
        });
    }
}