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
            
            // Langkah login
            $browser->visit('/login')
                ->assertSee('Email')  // Memastikan ada field Email
                ->assertSee('Password')  // Memastikan ada field Password
                ->type('email', 'admin@gmail.com')  // Mengisi field email dengan 'admin@gmail.com'
                ->type('password', 'password')  // Mengisi field password dengan 'password'
                ->press('LOG IN')  // Menekan tombol 'LOG IN'
                ->assertPathIs('/dashboard')  // Memastikan setelah login, pengguna diarahkan ke halaman dashboard

                // Mengakses halaman Notes dan Create Note
                ->clickLink('Notes')  // Klik link 'Notes'
                ->clickLink('Create Note')  // Klik link 'Create Note'

                // Memastikan berada di halaman create note
                ->assertPathIs('/create-note')  
                ->type('title', 'Catatan Pertama')  // Mengisi field Title dengan 'Catatan Pertama'
                ->type('description', 'Ini adalah deskripsi untuk catatan pertama.')  // Mengisi field Description
                ->press('CREATE')  // Menekan tombol 'CREATE'
                
                // Memastikan setelah pembuatan catatan, pengguna diarahkan ke halaman Notes
                ->assertPathIs('/notes')  
                
                // Memastikan catatan yang baru dibuat muncul di halaman Notes
                ->assertSee('Catatan Pertama')  
                ->assertSee('Ini adalah deskripsi untuk catatan pertama.');  // Memastikan deskripsi catatan yang ditulis muncul
        });
    }
}