<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use Assert\Assert;
use Assert\Assertion;
use Symfony\Component\DomCrawler\Crawler;

echo 'run';

$validBotUrl = 'https://t.me/deezer_bot';
$invalidBotUrl = 'https://t.me/deezer_qwerty_bot';

$validChannelUrl = '';
$invalidChannelUrl = '';

$notTelegramUrl = '';

$urls = [];
$urls[] = $validBotUrl;
$urls[] = $invalidBotUrl;
//$urls[] = $validChannelUrl;
//$urls[] = $invalidChannelUrl;
//$urls[] = $notTelegramUrl;

// validate strategies
$validateLink = [];
$validateAlias = [];

// map validators
$getValidators = [];
$getValidators['alias'] = $validateAlias;
$getValidators['link'] = $validateLink;

//


// check is url
foreach ($urls as $url) {
    Assertion::url($url);
}

// check is telegram url
foreach ($urls as $url) {
    Assert::that($url)->string()->contains('t.me/');
}

// check is exists
foreach ($urls as $url) {
    $crawler = new Crawler(file_get_contents($url));

    /** @var Crawler $item */
    foreach ($crawler->filter('body > div.tgme_page_wrap > div.tgme_page > div.tgme_page_title') as $item) {
        var_dump($item);
    }
//    var_dump($crawler->filter('body > div.tgme_page_wrap > div.tgme_page > div.tgme_page_title'));
}
