<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

$result = Builder::create()
    ->writer(new PngWriter())
    ->writerOptions([])
    ->data('Custom QR code contents')
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
    ->validateResult(false)
    ->build();

  header('Content-Type: ' . $result->getMimeType());
echo $result->getString();

$base64Data = base64_encode($result->getString());

// // Output the base64 string
// echo $base64Data;
// // Save it to a file
// $result->saveToFile(__DIR__ . '/qrcode.png');

// // Generate a data URI to include image data inline (i.e. inside an <img> tag)
// $dataUri = $result->getDataUri();
?>