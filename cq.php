
<?php
$MATCHES_OVERRIDE = -1;    //set to -1 to disable override
function ReturnMatches($q, $c, $name, $matches, $first, $ads)
{
          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'State Name';
	      $DATABASE_USER   = 'root';
	$DATABASE_PASSWORD = 'BAYLEY44505';

    global $MATCHES_OVERRIDE;
    if ($q) {
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
echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "<html>	\n";
echo "<head>	\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "<title>SITE NAME</title>	\n";
echo "<meta name=\"keywords\" content=\"KEYWORDS \">\n";
printf("<meta name=\"description\" content=\"%s\">  \n",  $row["Name"]);
?>

<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>

<style fprolloverstyle>A:hover {color: #0033cc}
</style>


</head>
<body link="#000000" vlink="#808080" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" text="#30305A" bgcolor="#FFFFFF">

<table border="0" width="100%">
  <tr>
    <td>
    <p align="left">
<?PHP
echo "      <font face=\"verdana\" size=\"4\"><b>$c, $DATABASE_NAME Yellow Pages</b></font></td>\n";
?>
  </tr>
  </table>



	<table width="100%" cellspacing="0" cellpadding="10">
      <tr>
        <td bgcolor="#FFFFFF">

 <form style="margin: 0px" action="cq.php" method=get>
  <div align="center">
  <table border="0" width="422" cellspacing="0" cellpadding="7" bgcolor="#FFFFD2" style="border-style: outset; border-width: 1px"><tr>

<td>

  <?php
echo "       <center><b><font face=\"Verdana\" color=\"#7A7999\" size=\"2\">Search $c, $DATABASE_NAME Yellow Pages</font> </b></center>\n";

echo " <center>     <form style=\"margin: 0px\" action=\"cq.php\" method=get> \n";
echo "              <input name=c type=hidden value=\"$c\">\n";
echo "              <input size=35 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search\"></center></form>\n";

?>


<table border="0" width="100%" cellspacing="0">
  <tr>
    <td>
  <SCRIPT LANGUAGE="JavaScript">function selecturl(s)
{
  var gourl = s.options[s.selectedIndex].value;
  if ((gourl != null) && (gourl != "") )
  {
    window.top.location.href = gourl;
  }
}
</SCRIPT>
<center><form style="margin: 0px">
<SELECT NAME="Destination" SIZE="1" ONCHANGE="selecturl(Destination)">
<OPTION>Directory
<OPTION VALUE="citycategories.php">All Categories
<?PHP
echo "<OPTION VALUE=\"cq.php?c=$c&q=Accountants\">Accountants\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Advertising\">Advertising\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Antiques\">Antiques\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Apartment\">Apartments\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Arts and Crafts\">Arts &amp; Crafts\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Attorneys\">Attorneys\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Autos\">Auto Dealers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Auto Repair\">Auto Repair\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Banks\">Banks\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Beauty Salons\">Beauty Salons \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Bed and Breakfasts\">Bed &amp; Breakfasts\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Bookstores\">Bookstores\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Cabin Cottage and Chalet Rental\">Cabins\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Campgrounds\">Campgrounds\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Carpet and Rug Cleaners\">Carpet Cleaners\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Child Care\">Child Care\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Chiropractors\">Chiropractors\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Churches\">Churches\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Clothing\">Clothing Stores\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Cleaners\">Cleaners\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Coffee and Tea\">Coffee &amp; Tea\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Computer\">Computers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Building and Home Construction\">Construction\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Contractors\">Contractors\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Dentists\">Dentists\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Physicians\">Doctors\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Dry Cleaners\">Dry Cleaners\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Electric\">Electrical Supply\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Equipment Rental\">Equipment Rentals \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Farm\">Farm &amp; Equipment \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Flowers\">Florists\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Furniture\">Furniture Stores\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Lawn and Garden\">Garden and Supply\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Gifts and Collectibles\">Gifts &amp; Collectibles\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Grocery\">Grocery\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Organizations\">Groups &amp; Organizations\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Hardware\">Hardware Stores\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Heating and Air Conditioning\">Heating and Air\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Hospitals\">Hospitals\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Hotels and Motels\">Hotels &amp; Motels\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Insurance\">Insurance\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Internet \">Internet \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Jewelers\">Jewelers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Locksmiths\">Locksmiths\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Moving\">Movers and Haulers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Theatres\">Movie Theaters\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Music\">Music\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Newspapers\">Newspapers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Optometrists\">Optometrists\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Parks and Recreation\">Parks and Recreation\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Pediatricians\">Pediatrician\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Pet Supplies\">Pets and Supplies\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Photography\">Photography\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Pizza\">Pizza \n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Plumbing\">Plumbers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Printing\">Printers\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Quilting\">Quilting and Sewing\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Radio Stations\">Radio Stations\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Real Estate\">Real Estate\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Relocation\">Relocation\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Restaurants\">Restaurants\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Schools\">Schools\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Sporting Goods\">Sporting Goods\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Storage\">Storage\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Tanning\">Tanning\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Travel Agencies\">Travel Agencies\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Vacation\">Vacation Destinations\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Veterinarians\">Veterinarians\n";
echo "<OPTION VALUE=\"cq.php?c=$c&q=Video and DVD\">Video Stores\n";
?>
</SELECT>
           </FORM></center>
</td>
    <td>
<font face="Verdana" size="2" color="#000080">
<?PHP
echo "<a href=\"citycategories.php?c=$c\">All Business Categories</a></font>\n";
?>
</td>
  </tr></table>
</td></tr> </div> </form>
    </tr>
    </table>





    </div>





    </td>
  </tr>
</table>
</div>
<?php
echo " 	<table width='100%'>	\n";
echo " 	  <tr>	\n";

echo " 	  <td valign=\"top\"  width='100%'>	\n";
echo "  <table  width=\"100%\">	\n";
echo "    <tr >	\n";
echo "      <td  width=\"100%\">	\n";
echo "    	\n";
echo "<table width=\"100%\" bgcolor=\"#FFFFD2\" cellspacing=\"0\" style=\"border-top:1px groove #C0C0C0; border-bottom-style:groove\"><tr><td width=\"70%\">\n";
	echo " <font face='Verdana' color='#000040' size='2'> &nbsp;&nbsp;<b>$q</b> \n";
echo "</td><td width=\"30%\"><p align=\"right\">\n";
	echo "<b>\n";
	if ($first == 0) {
		echo "";
	} else {
		echo "<a style=\"text-decoration: none\" href=\"?q=" . $q . "&matches=" . $matches ."&c=" . $c . "&first=" . ($first-$matches) . "&ads=" . ($ads-3) . "\" ><font face=\"Verdana\" size=\"2\" color='#000040'>Prev</a>  | ";
	}
	echo "   ";
	if ($no_results == 1) {
		echo "Next";
	} else {
	echo "<a style=\"text-decoration: none\" href=\"?q=" . $q . "&matches=" . $matches . "&c=" . $c ."&first=" . ($first+$matches) .  "&ads=" . ($ads+3) . "\" ><font face=\"Verdana\" size=\"2\" color='#000040'>Next</a></font>&nbsp;&nbsp;\n";
	}
echo "</td></tr></table>\n";

echo "<blockquote>\n";



echo "<br><br>\n";
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
echo "<table border=\"0\" width=\"90%\" cellspacing=\"0\" cellpadding=\"7\" bgcolor=\"#F9FAE4\" style=\"border-style: outset; border-width: 1px\"><tr><td>\n";
echo "<font face='verdana' size='2'>\n";
printf("<img src=\"clip.gif\"> <a href=\"b.php?telephone=%s&geo=%s %s %s %s\" ><b>%s</b></a></font><br>  \n", $row["Telephone"], $row["Address"], $row["City"], $row["State"], $row["Zip"], $row["Name"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["Address"]);
printf("  %s, %s %s</font><br>\n", $row["City"], $row["State"], $row["Zip"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["Telephone"], $row["Fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<b>Cat:</b> %s | %s<br>\n", $row["Keywords1"], $row["Keywords2"]);
printf(" <a href=\"n.php?q=%s&city=%s\">View Businesses On This Street</a></font></center>\n", $row["Address"], $row["City"]);



echo " </tr></td></table><br>\n";
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
echo "</blockquote>\n";
echo "    <br><br>\n";
echo "      </td>	\n";
echo "    </tr>	\n";
echo "  </table>	\n";
echo " 	  </td>	\n";

echo " 	</tr>	\n";
echo " 	</table> 	\n";


?>



<p align="center">
<font face="Verdana" size="2">Copyright </font>
<font face="Times New Roman" size="2">(c)</font> <font face="Verdana" size="2">2007 All Rights Reserved Yellow Pages</font><br>

</body></html>