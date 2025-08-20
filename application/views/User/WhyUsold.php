<?php
function translateText($text, $targetLang = 'mr', $sourceLang = 'en') {
    $encodedText = urlencode($text);
    $url = "https://api.mymemory.translated.net/get?q={$encodedText}&langpair={$sourceLang}|{$targetLang}";
    $response = file_get_contents($url);
    $result = json_decode($response, true);
    return $result['responseData']['translatedText'] ?? $text;
}


print_r($puja_data);
// Original English text
$englishText = $puja_data[0]["name"];

// Choose target language: 'mr' for Marathi, 'hi' for Hindi
$selectedLang = 'mr'; // change to 'hi' for Hindi

$translatedText = translateText($englishText, $selectedLang);
?>
<!DOCTYPE html>
<html lang="<?php echo $selectedLang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Translation Example</title>
</head>
<body>


    
<p><?php echo $translatedText; ?></p>

</body>
</html>
