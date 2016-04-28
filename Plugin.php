<?php namespace VojtaSvoboda\HelloDolly;

use Backend;
use System\Classes\PluginBase;

/**
 * HelloDolly Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Hello Dolly',
            'description' => 'Randomly show a lyric from Hello, Dolly in the upper right of your admin screen on every page.',
            'author'      => 'Vojta Svoboda',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Returns registered report widgets
     *
     * @return array
     */
    public function registerReportWidgets()
    {
        return [
            'VojtaSvoboda\HelloDolly\ReportWidgets\Lyric' => [
                'label' => 'Lyric',
                'context' => 'dashboard'
            ],
            'VojtaSvoboda\HelloDolly\ReportWidgets\Lyrics' => [
                'label' => 'Lyrics',
                'context' => 'dashboard'
            ],
        ];
    }
}
