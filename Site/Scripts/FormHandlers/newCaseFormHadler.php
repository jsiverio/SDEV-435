<?php
//Case Details
$dr = $_POST['dr'];
$authority = $_POST['authority'];
$swNumber = $_POST['swNumber'];
$offense = $_POST['offense'];

//Narrative
$narrative = $_POST['narrative'];

//Evidence
$evidenceNumber = $_POST['evidenceNumber'];
$deviceType = $_POST['deviceType'];
$evidenceSize = $_POST['evidenceSize'];
$evidenceNotes = $_POST['evidenceNotes'];
$numberOfEvidenceItems = sizeof($evidenceNumber);

//Puting together the evidence records
for ($i = 0; $i < $numberOfEvidenceItems; $i++) {
    $evidenceRecords[] = array(
        'evidenceNumber' => $evidenceNumber[$i],
        'deviceType' => $deviceType[$i],
        'evidenceSize' => $evidenceSize[$i],
        'evidenceNotes' => $evidenceNotes[$i]
    );
}
echo("Records: <br>");
echo("Dr = $dr <br>");
echo("Authority = $authority <br>");
echo("SW Number = $swNumber <br>");
echo("Offense = $offense <br><br>");
echo("Narrative = $narrative <br><br>");
echo("Evidence Records: <br>");
foreach ($evidenceRecords as $record) {
    echo("Evidence Number = " . $record['evidenceNumber'] . "<br>");
    echo("Device Type = " . $record['deviceType'] . "<br>");
    echo("Evidence Size = " . $record['evidenceSize'] . "<br>");
    echo("Evidence Notes = " . $record['evidenceNotes'] . "<br><br>");
}





