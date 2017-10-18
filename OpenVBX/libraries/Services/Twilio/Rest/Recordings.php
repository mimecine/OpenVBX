<?php

class Services_Twilio_Rest_Recordings
    extends Services_Twilio_ListResource
{
    function recent() {
        return $this->client->retrieveData($this->uri,
            array(
                "DateCreated>" => "2017-10-01"
            ))->recordings;
    }
}
