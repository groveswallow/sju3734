<?php 
/*
 * @Author: Tang
 * @Date: 2020-02-07 11:49:12
 * @LastEditors: Tang
 * @LastEditTime: 2020-03-31 12:08:46
 * @Description: 
 */
require_once('dbconfig.php');
$con = mysqli_connect($host, $usr, $password, $db);
$tf = $_GET['tf'];
$cancer = strtolower($_GET['cancer']);
$gene = strtolower($_GET['gene']);
$sql = "select * from $cancer where tf like '%$tf%' and gene like '%$gene%'";
$re = mysqli_query($con, $sql);
$res = mysqli_fetch_all($re);
$pmid = $res[0][0];
$characteristics = $res[0][2];
$gene = $res[0][3];
$regulation_type = $res[0][4];
$cancer_hallmark = $res[0][5];
$original_text = $res[0][6];
$title = $res[0][7];
$searchid = "";
$flag = 0;
$f = fopen('/home/tang/sju3734/project1/www/html/lib/newpy/TissgDB_basic_uniq.txt','r');
while($s = fgets($f)){
    $str = nl2br($s);
    $ay = explode("\t",$str);
    if($ay[0] == $gene){
        $searchid = $ay[1];
        $flag = 1;
    break;
    }
}
echo "<!DOCTYPE html>";
echo "<html lang='zh-CN'>";
echo "<head><meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='icon' href='./icon.ico'>
    <link href='./bs/css/bootstrap.min.css' rel='stylesheet'>
    <link href='./bs/css/bootstrap-select.css' rel='stylesheet'>
    <link href='./bs/css/bootstrap-table.min.css' rel='stylesheet'>
    <script src='./bs/js/jquery.min.js'></script>
    <script src='./bs/js/bootstrap.min.js'></script>
    <script src='./bs/js/bootstrap-select.js'></script>
    <script src='./bs/js/bootstrap-table.min.js'></script>
    <script src='./bs/js/bootstrap3-typeahead.min.js'></script>
    <script src='./bs/js/bootstrap-table-zh-CN.min.js'></script>
    <script src='./bs/js/tableExport.min.js'></script>
    <script src='./bs/js/bootstrap-table-export.min.js'></script>
    <title>TFcancer</title></head>
    <body background='' class='float'>
    <header style='background-color:whitesmoke;' id='header'>
    <script>
        $.ajaxSetup({
            cache: false //close AJAX cache
        });
        $(function () {
            $('#header').load('./header.html');
        })
    </script>
</header>";
    echo "<div style='width: 50%; height:200px;margin-top: 1%; text-align: center' class='center-block'>
    <h1>
        <b>Details</b>
    </h1>
    <hr style='width: 100%;border:none;border-top:10px;color: black;'>
    <table width='1000' class='table'>
        <tbody>
            <tr style='width:1000px;'>
                <td height='40' width='20%'><span><strong>&nbsp;&nbsp;&nbsp;TF</strong></span></td>
                <td height='40' width='80%'>".$tf."</td>
            </tr>

            <tr>
                <td height='40' width='20%'><span><strong>&nbsp;&nbsp;&nbsp;Characteristics</strong></span></td>
                <td height='40' width='80%'>".$characteristics."</td>
            </tr>

            <tr>
                <td height='40' width='20%'><span><strong>&nbsp;&nbsp;&nbsp;Gene</strong></span></td>
                <td height='40' width='80%'>".$gene." &nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td height='40' width='20%'><span><strong>&nbsp;&nbsp;&nbsp;Expression Level</strong></span></td>";
            if ($flag == 1){
                echo "<td><b><a href='https://bioinfo.uth.edu/TissGDB/gene_search_result.cgi?page=page&type=quick_search&quick_search=".$searchid."'
                target='_blank'>".$gene." in TissGDB</a></td>";
            }
            else{
                echo "<td><b>No Result in TissGDB</b></td>";
            }
            echo "</tr>
            <tr>
                <td height='40' width='20%'><span><strong>&nbsp;&nbsp;&nbsp;Regulation type</strong></span></td>
                <td height='40' width='80%'>".$regulation_type."
                </td>
            </tr>
            <tr>
                <td height='40' width='20%'><strong>&nbsp;&nbsp;&nbsp;Cancer hallmark</strong></td>
                <td height='40' width='80%'>".$cancer_hallmark."</td>
            </tr>

            <tr>
                <td height='40' width='20%'><span><strong>&nbsp;&nbsp;&nbsp;Pmid</strong></span></td>
                <td height='40' width='80%'>".$pmid." </td>
            </tr>

            <tr>
                <td height='40' width='20%'><span><strong>&nbsp;&nbsp;&nbsp;Title</strong></span></td>
                <td height='40' width='80%'>".$title."</td>
            </tr>

            <tr>
                <td height='40' width='20%'><span><strong>&nbsp;&nbsp;&nbsp;Original text</strong></span></td>
                <td height='40' width='80%'>".$original_text."</td>
            </tr>

            <tr>
                <td height='40'><span><strong>&nbsp;&nbsp;&nbsp;Cancer</strong></span></td>
                <td>".$cancer."</td>
            </tr>
            <tr>
                <td height='40'><span><strong>&nbsp;&nbsp;&nbsp;Links for&nbsp; <font color='#333333'>
                                ".$tf."</font></strong></span></td>
                <td> <b><a href='https://www.ncbi.nlm.nih.gov/nuccore/?term=AL359062'
                            target='_blank'>GenBank</a>
                        <a href='https://www.genenames.org/cgi-bin/search?search_type=all&amp;search=AL359062'
                            target='_blank'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HGNC</a>
                        <a href='http://www.lncrnadb.org/search/?q=AL359062%20Homo%20sapiens&amp;Species=Homo%20sapiens&amp;outputNo=10 '
                            target='_blank'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lncrnadb</a>
                        <a href='http://www.noncode.org/gene_trans_search.php?keyword=AL359062'
                            target='_blank'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Noncode</a></b></td>
            </tr>
            <tr>
                <td height='40' width='30%'><span><strong>&nbsp;&nbsp;&nbsp;Links for&nbsp; <font color='#333333'>
                                ".$cancer."</font></strong></span></td>
                <td><b><a
                            href='http://www.omim.org/search/?index=entry&amp;sort=score+desc%2C+prefix_sort+desc&amp;start=1&amp;limit=10&amp;search= nasopharyngeal cancer'
                            target='_blank'>Omim</a>
                        <a href='https://cancer.sanger.ac.uk/cosmic/search?q=nasopharyngeal cancer'
                            target='_blank'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cosmic</a></b>
                </td>
            </tr>
            <tr><td></td><td></td></tr>
        </tbody>
    </table>
</div>";
    echo "</body>";
    echo "</html>";
