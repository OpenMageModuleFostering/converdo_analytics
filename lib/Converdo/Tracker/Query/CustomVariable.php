<?php

class Converdo_Tracker_Query_CustomVariable extends Converdo_Tracker_Query_AbstractQuery
{
    /**
     * Get the view.
     *
     * @return mixed
     */
    public function getView()
    {
        return 'setCustomVariable';
    }

    /**
     * Get the data.
     *
     * @return array
     */
    public function getData()
    {
        return [
            0   => 1,
            1   => 'configuration',
        ];
    }
}