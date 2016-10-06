<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 06/04/2016
 * Time: 00:11
 */
require('../config.phpp');

    $client = new Google_Client();
    $client->setDeveloperKey($_DEV_KEY);

    $youtube = new Google_Service_YouTube($client);
