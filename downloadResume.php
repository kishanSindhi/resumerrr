<?php 
    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf; 
    use Dompdf\Options;
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $dompdf = new Dompdf($options);;
    $html = file_get_contents("resume.php"); 
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    // var_dump($html);
    ini_set('display_errors', 1); 
    $dompdf->render();
    $dompdf->stream("resume.pdf");
?>