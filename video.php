<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 06/04/2016
 * Time: 00:11
 */
require('vendor/autoload.php');
require_once('config.php');

    $htmlBody = '';
    $client = new Google_Client();
    $client->setDeveloperKey($DEV_KEY);
    $youtube = new Google_Service_YouTube($client);

try {

    $searchResponse = $youtube->search->listSearch('id,snippet',
        array('q' => 'ev2vie', 'maxResults' => '3' ,'type' =>'video'));

    $videos = '';

    } catch (Google_Service_Exception $e) {
        $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
        $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    }

?>

<!doctype html>
<html>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/mdb.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />

    <title>YouTube Search</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?php foreach($searchResponse['items'] as $video): ?>
        <div class="col-md-3" >
            <div class="card">
                <label class="card-header card-success text-white text-xs-center"><?= htmlentities($video['snippet']['title']) ?></label>
                <div class="card-block">
                    <img src="<?= $video['snippet']['thumbnails']['high']['url'] ?>" width="100%">
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>

</body>
    <script src="js/jquery-2.2.3.min.js" type="text/javascript"/>
    <script src="js/bootstrap.min.js" type="text/javascript"/>
    <script src="js/mdb.min.js" type="text/javascript"/>
</html>
