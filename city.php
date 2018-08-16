
<?php
$MATCHES_OVERRIDE = -1;    //set to -1 to disable override
function ReturnMatches($q, $c, $name, $matches, $first, $ads)
{

          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'State Name';
	      $DATABASE_USER   = 'root';
	$DATABASE_PASSWORD = 'BAYLEY44505';

    global $MATCHES_OVERRIDE;
    if ($c) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 20;
        if (!$ads) {
            $ads = 0;
        }
        }
if ($MATCHES_OVERRIDE > 0) {
            $matches = $MATCHES_OVERRIDE;
        }

$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);
        $query =  "SELECT List.* ";
        $query .= ",MATCH(Keywords2, Keywords1) AGAINST (' . $q . ' IN BOOLEAN MODE) AS Relevance  ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(City) AGAINST (' . $c . ' IN BOOLEAN MODE) HAVING Relevance > 0.95  ";
  $query .= "ORDER BY Relevance DESC ";
  $query .= "LIMIT " . $first . "," . $matches;
$result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");
        $row = mysql_fetch_array($result);
mysql_close($db);
echo " 	<html>	\n";
echo " 	<head>	\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">	\n";
echo "<title>$c, $DATABASE_NAME Yellow Pages</title>\n";
?>
<style fprolloverstyle>A:hover {color: #FF0000}
</style>
</head>
<body link="#990000" vlink="#990000" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" text="#30305A" bgcolor="#FFFFFF">


<?PHP
echo " <table width=\"100%\" bgcolor=\"#FFFFD2\" cellspacing=\"0\" style=\"border-top:1px groove #C0C0C0; border-bottom-style:groove\">\n";
echo "     <tr>\n";
echo "       <td width=\"100%\"><b><font face=\"Verdana\" size=\"5\">&nbsp;$c, $DATABASE_NAME Yellow Pages \n";



echo "        </font></b></td></tr></table>\n";
?>

<table border="0" width="100%">
  <tr>

    <td>
    <p align="center">

  <?php
echo "       <b><font face=\"Verdana\" color=\"#7A7999\" size=\"1\">Search $c, $DATABASE_NAME Yellow Pages</font> </b><br>\n";

echo " <center>     <form style=\"margin: 0px\" action=\"cq.php\" method=get> \n";
echo "              <input name=c type=hidden value=\"$c\">\n";
echo "              <input size=35 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search $c YP\"></center></form>\n";

?>



    </td>
  </tr>
  </table>
<?PHP

echo "  <table width=\"100%\" cellspacing=\"0\" border=\"0\"><tr><td width=\"50%\" valign=\"top\">\n";



echo "         </font></b></td><td valign=\"top\" width=\"50%\">\n";




echo "       </td></tr></table><br>\n";

echo "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\" style=\"border-top:1px groove #C0C0C0; border-bottom-style:groove\">\n";
echo "  <tr>\n";
echo "<td width=\"100%\" valign=\"top\" bordercolor=\"#58582C\" colspan=\"5\" bgcolor=\"#FFFFD2\">\n";
echo "<b><font face=\"Verdana\" size=\"2\">&nbsp; $c, $DATABASE_NAME Quick Category \n";
echo "  Listings:&nbsp;&nbsp; </font>\n";
echo "  <font face=\"Verdana\" color=\"#ffffff\" size=\"2\">\n";
echo "  <a href=\"citycategories.php?c=$c\" style=\"text-decoration: none\">\n";
echo "  <font color=\"#000080\">All Categories</font></a></font></b></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; style=; border-width:0; \"border-left-style: double; border-bottom-style: double\" >\n";
echo "<font face=\"Verdana\" size=\"2\">\n";
echo "<a style=\"text-decoration: none;\" href=\"cq.php?c=$c&q=Accountants\">\n";
echo "<font color=\"#000053\"><strong style=\"font-weight: 400\">Accountants </strong> </font> \n";
echo "</a><strong style=\"font-weight: 400\"><font color=\"#000053\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Advertising\">  \n";
echo "<font color=\"#000053\">Advertising </font> \n";
echo "</a></font><font color=\"#000053\"><br></font></strong><font color=\"black\"> \n";
echo "<strong style=\"font-weight: 400\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Antiques\">  \n";
echo "<font color=\"#000053\">Antiques </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Apartment\"> \n";
echo "<font color=\"#000053\">Apartments </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Arts and Crafts\"> \n";
echo "<font color=\"#000053\">Arts &amp; Crafts </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Attorneys\">\n";
echo "<font color=\"#000053\">Attorneys </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Autos\">\n";
echo "<font color=\"#000053\">Auto Dealers </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Auto Repair\">\n";
echo "<font color=\"#000053\">Auto Repair </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Banks\">\n";
echo "<font color=\"#000053\">Bank &amp; Financial </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Beauty Salons \">\n";
echo "<font color=\"#000053\">Beauty Salons </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Bed and Breakfasts\">\n";
echo "<font color=\"#000053\">Bed &amp; Breakfasts </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Bookstores\">\n";
echo "<font color=\"#000053\">Bookstores </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Cabins Cottages and Chalet Rentals\">\n";
echo "<font color=\"#000053\">Cabin Rentals\n";
echo "</font>\n";
echo "</a><font color=\"#000053\"><br></font></strong><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Campgrounds\"> \n";
echo "<font color=\"#000053\"><strong style=\"font-weight: 400\">Campgrounds </strong> </font>\n";
echo "</a></font></font>\n";
echo "</font>\n";
echo "</td>\n";
echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; border-width:0; \" >\n";
echo "<font face=\"Verdana\" size=\"2\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Carpet and Rug Cleaners\">\n";
echo "<font color=\"#000053\"><strong style=\"font-weight: 400\">Carpet and Rug </strong> </font>\n";
echo "</a><strong style=\"font-weight: 400\"><font color=\"#000053\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Child Care\">\n";
echo "<font color=\"#000053\">Child Care </font>  \n";
echo "</a></font><font color=\"#000053\"><br></font></strong><font color=\"black\"> \n";
echo "<strong style=\"font-weight: 400\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Chiropractors\">  \n";
echo "<font color=\"#000053\">Chiropractors </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Churches\"> \n";
echo "<font color=\"#000053\">Churches </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Clothing\"> \n";
echo "<font color=\"#000053\">Clothing Stores </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Cleaners\"> \n";
echo "<font color=\"#000053\">Cleaners </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Coffee and Tea\"> \n";
echo "<font color=\"#000053\">Coffee &amp; Tea </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Computer\"> \n";
echo "<font color=\"#000053\">Computers </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Construction\"> \n";
echo "<font color=\"#000053\">Construction </font>  \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Contractors\"> \n";
echo "<font color=\"#000053\">Contractors </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Dentists\"> \n";
echo "<font color=\"#000053\">Dentists </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Physicians\">\n";
echo "<font color=\"#000053\">Doctors </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Dry Cleaners\">\n";
echo "<font color=\"#000053\">Dry Cleaners\n";
echo "</font>\n";
echo "</a><font color=\"#000053\"><br></font></strong><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Electric\">\n";
echo "<font color=\"#000053\"><strong style=\"font-weight: 400\">Electrical Supply </strong> </font></a></font></font>\n";
echo "</td>\n";
 echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; border-width:0; \" >\n";
echo "<font face=\"Verdana\" size=\"2\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Equipment Rental\">\n";
echo "<font color=\"#000053\"><strong style=\"font-weight: 400\">Equipment Rentals </strong> </font> \n";
echo "</a><strong style=\"font-weight: 400\"><font color=\"#000053\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Farm\">\n";
echo "<font color=\"#000053\">Farm &amp; Equipment </font> \n";
echo "</a></font><font color=\"#000053\"><br></font></strong><font color=\"black\">\n";
echo "<strong style=\"font-weight: 400\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Flowers\">\n";
echo "<font color=\"#000053\">Florists </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Furniture\">\n";
echo "<font color=\"#000053\">Furniture Stores </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Garden\">\n";
echo "<font color=\"#000053\">Garden and Supply </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Gifts\">\n";
echo "<font color=\"#000053\">Gifts &amp; Collectibles </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Grocery\">\n";
echo "<font color=\"#000053\">Grocery Stores </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Organizations\">\n";
echo "<font color=\"#000053\">Groups &amp; Organizations </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Hardware\">\n";
echo "<font color=\"#000053\">Hardware Stores </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Heating and Air Conditioning\">\n";
echo "<font color=\"#000053\">Heating and Air </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Hospitals\">\n";
echo "<font color=\"#000053\">Hospitals </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Hotels and Motels\">\n";
echo "<font color=\"#000053\">Hotels &amp; Motels </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Insurance\">\n";
echo "<font color=\"#000053\">Insurance Agents </font>\n";
echo "</a><font color=\"#000053\"><br></font></strong><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Internet \">\n";
echo "<font color=\"#000053\"><strong style=\"font-weight: 400\">Internet Businesses </strong> </font>\n";
echo "</a></font></font>\n";
echo "</td>\n";
echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; border-width:0; \" >\n";
echo "<font face=\"Verdana\" size=\"2\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Jewelers\">\n";
echo "<font color=\"#000053\"><strong style=\"font-weight: 400\">Jewelers </strong> </font> \n";
echo "</a><strong style=\"font-weight: 400\"><font color=\"#000053\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Locksmiths\">\n";
echo "<font color=\"#000053\">Locksmiths </font>  \n";
echo "</a></font><font color=\"#000053\"><br></font></strong><font color=\"black\">  \n";
echo "<strong style=\"font-weight: 400\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Moving\">  \n";
echo "<font color=\"#000053\">Movers &amp; Haulers </font>  \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Theatres\">  \n";
echo "<font color=\"#000053\">Movie Theaters </font>  \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Music\">  \n";
echo "<font color=\"#000053\">Music </font>  \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Newspapers\">  \n";
echo "<font color=\"#000053\">Newspapers </font>  \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Optometrists\">  \n";
echo "<font color=\"#000053\">Optometrists </font>  \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Parks and Recreation\">  \n";
echo "<font color=\"#000053\">Parks &amp; Recreation </font>  \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Pediatricians\">  \n";
echo "<font color=\"#000053\">Pediatricians </font>  \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Pet Supplies\">  \n";
echo "<font color=\"#000053\">Pets &amp; Supplies </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Photography\">\n";
echo "<font color=\"#000053\">Photography </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Pizza\">\n";
echo "<font color=\"#000053\">Pizza Shops </font> \n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Plumbing\">\n";
echo "<font color=\"#000053\">Plumbers\n";
echo "</font>\n";
echo "</a></strong><font color=\"#000053\"><strong style=\"font-weight: 400\"><br>&nbsp;</strong></font></font></font></td>\n";
echo "<td width=\"20%\" valign=\"top\" style=\"border-style:ridge; border-width:0; \" >\n";
echo "<font color=\"black\" face=\"Verdana\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Printing\">\n";
echo "<font color=\"#000053\"><strong style=\"font-weight: 400\">\n";
echo "<font size=\"2\">Printers </font> </strong></font>\n";
echo "</a></font><font size=\"2\"><strong style=\"font-weight: 400\">\n";
echo "<font color=\"#000053\" face=\"Verdana\"><br>\n";
echo "</font></strong></font><font face=\"Verdana\"><font size=\"2\">\n";
echo "<strong style=\"font-weight: 400\"><font color=\"black\">\n";
echo "<a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Quilting\">\n";
echo "<font color=\"#000053\">Quilting &amp; Sewing</font></a></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Quilting\"><font color=\"#000053\">\n";
echo "</font>\n";
echo "</a><font color=\"#000053\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Radio Stations\">\n";
echo "<font color=\"#000053\">Radio Stations </font>\n";
echo "</a></font><font color=\"#000053\"><br></font><font color=\"black\"><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Real Estate\">\n";
echo "<font color=\"#000053\">Real Estate </font>\n";
echo "</a><font color=\"#000053\"><br></font>\n";
echo "<a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Restaurants\">\n";
echo "<font color=\"#000053\">Restaurants </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Schools\">\n";
echo "<font color=\"#000053\">Schools </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Sporting Goods\">\n";
echo "<font color=\"#000053\">Sporting Goods </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Storage\">\n";
echo "<font color=\"#000053\">Storage </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Tanning\">\n";
echo "<font color=\"#000053\">Tanning </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Travel Agencies\">\n";
echo "<font color=\"#000053\">Travel Agencies </font>\n";
echo "</a><font color=\"#000053\"><br></font>\n";
echo "<a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Veterinarians\">\n";
echo "<font color=\"#000053\">Veterinarians </font>\n";
echo "</a><font color=\"#000053\"><br></font><a style=\"text-decoration: none;\"  href=\"cq.php?c=$c&q=Video and DVD\">\n";
echo "<font color=\"#000053\">Video Stores</font></a></font></strong></font><font color=\"#000053\"><strong style=\"font-weight: 400\"><font size=\"2\">\n";
echo "<br>&nbsp;</font></strong></font></font></td></tr></table> \n";


    if ($first == 0) {
            echo "";
        } else {
            echo "";
        }
        if ($no_results == 1) {
echo "No More Results";
        } else {
    }
  $no_results = 0;
        if ($row) {
            do {
     } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "\n";
            if ($first == 0) {
            } else {
                echo "No more results found.<br>\n";

            }
        }
}
}
    ReturnMatches($q, $c, $name, $matches, $first, $ads);
     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }
        if ($no_results == 1) {

echo "No More Results";
        } else {
    }

?>
<p align="center">
<font face="Verdana" size="2">Copyright </font>
<font face="Times New Roman" size="2">(c)</font> <font face="Verdana" size="2">1995-2006 All Rights Reserved - <a href="http://wvyellowpages.net">West Virginia Yellow Pages</a></font><br>

</body></html>

