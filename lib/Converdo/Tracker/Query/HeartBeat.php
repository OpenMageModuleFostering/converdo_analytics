<?php

class Converdo_Tracker_Query_HeartBeat extends Converdo_Tracker_Query_AbstractQuery
{
    public function getView()
    {
        return 'enableHeartBeatTimer';
    }
}