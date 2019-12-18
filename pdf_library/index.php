<?php

require __DIR__ . '/vendor/autoload.php';

use Knp\Snappy\Pdf;

error_reporting(E_ALL);

$snappy = new Pdf('/usr/bin/xvfb-run /usr/bin/wkhtmltopdf --lowquality');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');
echo $snappy->getOutput('http://www.github.com');
