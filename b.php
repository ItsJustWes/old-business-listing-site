

<?php

$MATCHES_OVERRIDE = 5;    //set to -1 to disable override








function ReturnMatches($telephone, $geo, $s, $matches, $first)
{
          $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'State Name';
	      $DATABASE_USER   = 'root';
	$DATABASE_PASSWORD = 'BAYLEY44505';


    global $MATCHES_OVERRIDE;

    if ($telephone) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 5;
        }

if ($MATCHES_OVERRIDE > 0) {
            $matches = $MATCHES_OVERRIDE;
        }


$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);

        $query =  "SELECT List.* ";
        $query .= ",MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE)  ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE) ";
		$query .= "ORDER BY `Name` ASC ";
        $query .= "LIMIT " . 0 . "," . 10;

            $result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);

mysql_close($db);




require_once 'map.php';


$map = new Map();
$map->setAPIKey("GET YOU GOOGLE MAP API KEY - ");





echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo "  	<html>	\n";
echo "  	<head>	\n";
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
printf("<title>%s  - %s - %s %s</title> \n", $row["Name"], $row["Keywords1"], $row["City"], $row["State"]);
echo "<meta name=\"keywords\" content=\"$keywords\">\n";

printf("<meta name=\"description\" content=\"%s  - %s - %s %s\">  \n",  $row["Name"], $row["Keywords1"], $row["City"], $row["State"]);








echo "<center>\n";

echo "<script type=\"text/javascript\"><!--\n";
echo "google_ad_client = \"  \";\n";
echo "google_ad_width = 468;\n";
echo "google_ad_height = 60;\n";
echo "google_ad_format = \"468x60_as\";\n";
echo "google_color_bg = \"ffffff\";\n";
echo "google_color_border = \"ffffff\";\n";
echo "google_color_link = \"5A7353\";\n";
echo "google_color_url = \"5A7353\";\n";
echo "google_color_text = \"000000\";\n";
echo "google_ad_type = \"text_image\";\n";
echo "google_ad_channel =\"\";\n";
echo "//--></script>\n";
echo "<script type=\"text/javascript\"\n";
echo "  src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\n";
echo "</script></center>\n";


echo "<div align=\"center\">\n";
echo "    <br><table width=\"770\" background=\"background.gif\" cellspacing=\"0\" style=\"border-right:1px ridge #C0C0C0; border-bottom:1px ridge #C0C0C0;\">\n";
echo "      <tr>\n";
echo "        <td width=\"100%\">\n";




echo "</td>\n";
echo "      </tr>\n";
echo "    </table>\n";

echo "    <table width=\"770\" cellspacing=\"0\">\n";

echo "        <tr><td width=\"100%\"><font color=\"#0D4E00\" face=\"Verdana\" Size=\"1\"><center><b>&nbsp;Support \n";

printf("%s %s \n", $row["City"], $row["State"]);

echo "Businesses</b></center></font></td></tr></table></div>\n";






echo "<table border=\"0\" width=\"700\" align=\"center\" cellspacing=\"0\" cellpadding=\"5\"><tr><td width=\"100%\">\n";
echo "<img border=\"0\" src=\"image.jpg\" width=\"250\" height=\"150\" align=\"right\">\n";
printf("<b><font face='verdana' size='3'>%s</b><br>  \n", $row["Name"]);
printf("<font face='verdana' size='2'>%s<br>  \n", $row["Address"]);
printf("<font face='verdana' size='2'>%s, %s %s<br> \n", $row["City"], $row["State"], $row["Zip"]);
printf("<font face='verdana' size='2'>Telephone: %s   <br>Fax: %s <br>\n", $row["Telephone"], $row["Fax"]);
printf("<font face='verdana' size='2'>Website: <a target=\"_blank\" href=\"http://%s\">%s</a><br>\n", $row["Web"], $row["Web"]);
printf("<font face='verdana' size='2'>eMail: <a href=\"mailto:%s\">%s</a><br>\n", $row["Email"], $row["Email"]);
printf("<font face='verdana' size='2'>Contact: %s  <br>Listing Id: %s<br><br>  \n", $row["Contact"], $row["Id"]);


$map->printGoogleJS();
    $map->zoomLevel = 2;             //zoom in as far as we can
    $map->setWidth(700);            //pixels
    $map->setHeight(450);           //pixels
    $map->controlType = 'large';    //show large controls on the side
    $map->showType = true;         //hide the map | sat | hybrid buttons



$address = ("$geo");



$string = ("$address");





$map->addAddress($string);

echo "<div align=\"center\"><table border=\"1\" width=\"10%\" cellspacing=\"0\" style=\"border: 3px inset #FFFF00\"><tr>   <td>\n";
$map->showMap();
echo "</td>  </tr></table></div>\n";



printf("</center></td> </tr></table><br><br>\n",  $row["address"],  $row["city"],  $row["state"],  $row["zip"]);

printf("<center><font face='verdana' size='2'><b>Internet Search for:</b> %s<br>\n", $row["Name"]);

printf("<b><a href=\"http://www.google.com/search?sourceid=navclient&ie=UTF-8&rls=GGLJ,GGLJ:2006-11,GGLJ:en&q=%s %s %s\">Google</a> |\n", $row["Name"], $row["City"], $row["State"]);
printf("<a href=\"http://search.yahoo.com/search?&ei=UTF-8&p=%s %s %s\">Yahoo!</a> |\n", $row["Name"], $row["City"], $row["State"]);
printf("<a href=\"http://www.live.com/?FORM=IE7&q=%s %s %s\">MSN Live</a><br></b>\n", $row["Name"], $row["City"], $row["State"]);

printf("<font face='verdana' size='2'>%s<br><font size=\"1\">If you are \"%s\" and would like to update your listing - email us at update@youremail.</font>\n", $row["Description"], $row["Name"]);




echo "</font></center></td></tr></table></blockquote></blockquote>\n";




echo "    <table border=\"0\" width=\"600\"  align=\"center\">\n";
echo "      <tr>\n";
echo "        <td>\n";
printf("<font face='verdana' size='2'><b>Categories For \"%s\":</b></font><blockquote><font face='verdana' size='1'> \n",  $row["Name"]);





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




printf("%s / %s<br>  \n", $row["Keywords1"], $row["Keywords2"], $row["Name"], $row["Keywords2"], $row["Keywords2"]);









            } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "\n";
            if ($first == 0) {
                echo "\n";



            } else {
                echo "No more results found.<br>\n";
            }
        }



}
}

    ReturnMatches($telephone, $geo, $s, $matches, $first);



















     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }


        if ($no_results == 1) {



echo "No More Results";



        } else {








    }
echo "<center><form name=\"form2\" action=\"javascript:window.print();\" method=\"post\">\n";
echo "<input type=\"submit\" name=\"Submit\" value=\"Print This Page\">\n";
echo "</form>  \n";
echo "</td>\n";
echo "      </tr>\n";
echo "    </table></center>\n";


echo "    <br>\n";


echo "<center>\n";

echo "<script type=\"text/javascript\"><!--\n";
echo "google_ad_client = \"pub-\";\n";
echo "google_ad_width = 468;\n";
echo "google_ad_height = 60;\n";
echo "google_ad_format = \"468x60_as\";\n";
echo "google_color_bg = \"ffffff\";\n";
echo "google_color_border = \"ffffff\";\n";
echo "google_color_link = \"5A7353\";\n";
echo "google_color_url = \"5A7353\";\n";
echo "google_color_text = \"000000\";\n";
echo "google_ad_type = \"text_image\";\n";
echo "google_ad_channel =\"\";\n";
echo "//--></script>\n";
echo "<script type=\"text/javascript\"\n";
echo "  src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">\n";
echo "</script></center>\n";








?>

<p align="center">
<font face="Verdana" size="2">Copyright </font>
<font face="Times New Roman" size="2">(c)</font> <font face="Verdana" size="2">1995-2006 All Rights Reserved - Yellow Pages</a></font><br>

</body></html>
