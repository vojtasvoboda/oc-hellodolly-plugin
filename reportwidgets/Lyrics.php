<?php namespace VojtaSvoboda\HelloDolly\ReportWidgets;

use App;
use ApplicationException;
use Backend\Classes\ReportWidgetBase;

/**
 * Registrations overview widget.
 *
 * @package namespace VojtaSvoboda\HelloDolly\ReportWidgets
 */
class Lyrics extends ReportWidgetBase
{
    public function render()
    {
        $lyrics = $this->loadLyrics();
        $this->vars['error'] = $lyrics ? false : 'Wrong interpret or song name!';
        $this->vars['lyrics'] = str_replace("\n", '<br>', $lyrics);

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

    protected function loadLyrics()
    {
        $facade = App::make('VojtaSvoboda\HelloDolly\Facades\Lyrics');
        $interpret = preg_replace('/\s+/', '', $this->property('interpret', 'LouisArmstrong'));
        $song = preg_replace('/\s+/', '', $this->property('song', 'HelloDolly'));

        return $facade->getLyrics($interpret, $song);
    }
}
