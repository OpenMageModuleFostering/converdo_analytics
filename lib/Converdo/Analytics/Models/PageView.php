<?php

class Converdo_Analytics_Models_PageView
{
    use Converdo_Analytics_Support_Arrayable;
    
    /**
     * Returns the data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            "_paq.push(['setCustomVariable', 1, 'configuration', '" . Converdo_Analytics_Support_Crypt::encrypt(json_encode(Converdo_Analytics_Tracker::attributes(), true)) . "', 'page']);",
        ];
    }
}