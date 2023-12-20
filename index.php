<?php
$xmlData = simplexml_load_file("pytest_reports/pytest_report.xml") or die("Unable to load the xml.");

echo '<html>';
echo '<head>';
echo '<style>';
echo 'table { border-collapse: collapse; width: 100%; }';
echo 'th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }';
echo 'th { background-color: #f2f2f2; }';
echo '</style>';
echo '</head>';
echo '<body>';
echo '<table>';

$xmlArray = json_decode(json_encode($xmlData), true);

if (isset($xmlArray['testsuite'])) {
    $testsuite = $xmlArray['testsuite'];

    // Display attributes
    echo '<tr>';
    foreach ($testsuite['@attributes'] as $key => $value) {
        echo '<th>' . $key . '</th>';
    }
    echo '</tr>';
    
    echo '<tr>';
    foreach ($testsuite['@attributes'] as $key => $value) {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';

   
    if (isset($testsuite['testcase'])) {
        foreach ($testsuite['testcase'] as $testcase) {
            echo '<tr>';
            foreach ($testcase['@attributes'] as $key => $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }
    }
}

echo '</table>';
echo '</body>';
echo '</html>';
?>