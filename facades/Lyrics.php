<?php namespace VojtaSvoboda\HelloDolly\Facades;

use File;

class Lyrics
{
    /**
     * Get one random lyric from song
     *
     * @param string $interpret
     * @param string $song
     *
     * @return string|null
     */
    public function getLyric($interpret = 'LouisArmstrong', $song = 'HelloDolly')
    {
        $song = $this->getLyrics($interpret, $song);

        if (!$song) {
            return null;
        }

        $lyrics = explode("\n", $song);

        return $lyrics[mt_rand(0, count($lyrics) - 1)];
    }

    /**
     * Get song lyrics of given interpret and song name
     *
     * @param string $interpret
     * @param string $song
     *
     * @return string|null
     */
    public function getLyrics($interpret = 'LouisArmstrong', $song = 'HelloDolly')
    {
        $path = __DIR__ . '/../library/' . $interpret . '/' . $song . '.txt';

        if (!File::exists($path)) {
            return null;
        }

        return File::get($path);
    }
}
