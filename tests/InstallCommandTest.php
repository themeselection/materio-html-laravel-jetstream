<?php

namespace Themeselection\Jetstrap\Tests;

use Themeselection\Jetstrap\JetstrapFacade;

class InstallCommandTest extends TestCase
{
  /** @test */
  public function livewire_swapped()
  {
    // Run the make command
    $this->artisan('jetstream_materio:swap livewire')
      ->expectsOutput('Bootstrap scaffolding swapped for livewire successfully.')
      ->expectsOutput('Please execute the "npm install && npm run build" command to build your assets.')
      ->assertExitCode(0);

    $this->basicTests();
    $this->basicLivewireTests();
  }

  /** @test */
  public function livewire_swapped_with_teams()
  {
    // Run the make command
    $this->artisan('jetstream_materio:swap livewire --teams')
      ->expectsOutput('Bootstrap scaffolding swapped for livewire successfully.')
      ->expectsOutput('Please execute the "npm install && npm run build" command to build your assets.')
      ->assertExitCode(0);

    $this->basicTests();
    $this->basicLivewireTests();
    $this->livewireTeamTests();
  }
}
