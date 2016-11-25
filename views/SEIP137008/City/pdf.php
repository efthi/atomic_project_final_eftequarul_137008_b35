<?php
include_once ('../../../vendor/autoload.php');
use App\BookTitle\BookTitle;
$obj= new BookTitle();
$recordSet=$obj->index();
//var_dump($allData);
$trs="";
$sl=0;




foreach($recordSet as $row) {
    $id =  $row["id"];
    $book_title = $row['book_title'];
    $author_name = $row['author_name'];

    $sl++;
    $trs .= "<tr>";
    $trs .= "<td width='150'> $sl</td>";
    $trs .= "<td width='150'> $id </td>";
    $trs .= "<td width='300'> $book_title </td>";
    $trs .= "<td width='300'> $author_name </td>";


    $trs .= "</tr>";
}

$html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Book Title</th>
                    <th align='left' >Author Name</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>




BITM;


// Require composer autoload
require_once ('../../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('list.pdf', 'D');