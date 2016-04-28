<?php namespace VojtaSvoboda\HelloDolly\ReportWidgets;

use App;
use ApplicationException;
use Backend\Classes\ReportWidgetBase;

/**
 * Registrations overview widget.
 *
 * @package namespace VojtaSvoboda\HelloDolly\ReportWidgets
 */
class Lyric extends ReportWidgetBase
{
    public function render()
    {
        $this->vars['lyric'] = $lyric = $this->loadLyric();
        $this->vars['error'] = $lyric ? false : 'Wrong interpret or song name!';

        return $this->makePartial('widget');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title' => 'Widget title',
                'default' => 'Hello Dolly',
                'type' => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'Please insert the title',
            ],
            'interpret' => [
                'title' => 'Interpret',
                'default' => 'LouisArmstrong',
                'type' => 'string',
            ],
            'song' => [
                'title' => 'Song',
                'default' => 'HelloDolly',
                'type' => 'string',
            ],
        ];
    }

    protected function loadLyric()
    {
        $facade = App::make('VojtaSvoboda\HelloDolly\Facades\Lyrics');
        $interpret = preg_replace('/\s+/', '', $this->property('interpret', 'LouisArmstrong'));
        $song = preg_replace('/\s+/', '', $this->property('song', 'HelloDolly'));

        return $facade->getLyric($interpret, $song);
    }
}
