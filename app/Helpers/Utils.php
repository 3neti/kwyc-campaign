<?php

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

if (!function_exists('images_path')) {
    function images_path(string $path = null): string {
        $images_path = base_path('resources/images');

        return $images_path . ($path ? '/' . $path : '');
    }
}

if (!function_exists('generateQRCodeURI')) {
    function generateQRCodeURI (string $data, Logo|string $logo = null, Label|string $label = null):? string
    {
        $writer = new PngWriter();

        // Create QR code
        $qrCode = new QrCode(
            data: $data,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        // Create generic logo
        if (null !== $logo)
            if (!($logo instanceof Logo)) {
                $logo = new Logo(
                    path: $logo,
                    resizeToWidth: 100,//50,
                    punchoutBackground: true
                );
            }


        // Create generic label
        if (null !== $label)
            if (!($label instanceof Label)) {
                $label = new Label(
                    text: $label,
                    textColor: new Color(0, 146, 194)
                );
            }

        $result = $writer->write($qrCode, $logo, $label);

        return $result->getDataUri();
    }
}