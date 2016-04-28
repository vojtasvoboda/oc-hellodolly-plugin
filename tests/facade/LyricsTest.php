<?php namespace VojtaSvoboda\HelloDolly\Tests\Facades;

use App;
use Event;
use File;
use PluginTestCase;

class LyricsTest extends PluginTestCase
{
    /** @var \VojtaSvoboda\HelloDolly\Facades\Lyrics */
    private $model;

    public function setUp()
    {
        parent::setUp();
        $this->model = $this->getModel();
    }

    private function getModel()
    {
        return App::make('VojtaSvoboda\HelloDolly\Facades\Lyrics');
    }

    public function testGetNonExistsLyrics()
    {
        $interpret = 'NonexistingInterpret';
        $song = 'NonexistingSong';

        $lyrics = $this->model->getLyrics($interpret, $song);
        $this->assertNull($lyrics);
    }

    public function testGetExistingLyrics()
    {
        $interpret = 'LouisArmstrong';
        $song = 'HelloDolly';

        $realSong = File::get(__DIR__ . '/../../library/LouisArmstrong/HelloDolly.txt');

        $lyrics = $this->model->getLyrics($interpret, $song);
        $this->assertEquals($lyrics, $realSong);
    }

    public function testGetNonExistingLyric()
    {
        $interpret = 'NonexistingInterpret';
        $song = 'NonexistingSong';

        $lyrics = $this->model->getLyric($interpret, $song);
        $this->assertNull($lyrics);
    }

    public function testGetExistingLyric()
    {
        $interpret = 'LouisArmstrong';
        $song = 'HelloDolly';

        $realSong = File::get(__DIR__ . '/../../library/LouisArmstrong/HelloDolly.txt');

        $lyric = $this->model->getLyric($interpret, $song);
        $this->assertContains($lyric, $realSong);
    }
}
