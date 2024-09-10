<?php

function vardump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


$text = <<<TXT
<p class="big">
    Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
    <img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
    <span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
    <i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;
function clearTextFromTags($text): string
{
    $splitText = [];
    preg_match_all('/<[^>]+>/i', $text, $allTags, PREG_OFFSET_CAPTURE);

    foreach ($allTags[0] as $i => $tag)
    {
        if($i + 1 != count($allTags[0]))
        {
            $textBetweenTags = substr($text,strlen($tag[0]) + $tag[1], $allTags[0][$i+1][1] - $tag[1] - strlen($tag[0]));
            $splitText[] = trim($textBetweenTags);
        }
    }
    $textWithoutTags= implode(" ", $splitText);
    $indexOfWrongPunctuation = strpos($textWithoutTags, ' . ');

    while ($indexOfWrongPunctuation)
    {
        $textWithoutTags = substr($textWithoutTags, 0 , $indexOfWrongPunctuation) . substr($textWithoutTags, $indexOfWrongPunctuation+1, -1);
        $indexOfWrongPunctuation = strpos($textWithoutTags, ' . ');
    }
    return $textWithoutTags;
}

$result = [];
$clearedText = clearTextFromTags($text);
$splitText = preg_split('/\s+/i', $clearedText);
preg_match_all('/<[^>]+>/i', $text, $allTags, PREG_OFFSET_CAPTURE);


$cntWords = 0;
foreach ($allTags[0] as $i => $tag){
    if($i + 1 != count($allTags[0])){
        $result[] = htmlspecialchars($tag[0]);
        $lengthBetweenTags = $allTags[0][$i+1][1] - $tag[1] - strlen($tag[0]);

        foreach ($splitText as $word){
            if($lengthBetweenTags - strlen($word) < 0 || $cntWords == 29){
                break;
            }
            $result[] = $word;
            if (!preg_match('/^[[:punct:]]$/', $word)){
                $cntWords++;
            }
            array_shift($splitText);
            $lengthBetweenTags = $lengthBetweenTags - strlen($word);
        }
    } else {
        $result[] = $tag[0];
    }
}

$result = implode(" ", $result);
echo html_entity_decode($result);
