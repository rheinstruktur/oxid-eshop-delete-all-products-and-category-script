<?php

require_once dirname(__FILE__) . "/bootstrap.php";

$oDb = oxdb::getDb();

//DELETE ALL ARTICLES
$sql = "SELECT oxid FROM oxarticles WHERE oxparentid = ''";
$rs = $oDb->select($sql);
if ($rs != false && $rs->recordCount() > 0) {
    while (!$rs->EOF) {
        $oArticle = oxNew("oxArticle");
        echo "Article " . $rs->fields[0]." deleted<br />";
        $oArticle->setId($rs->fields[0]);
        $oArticle->delete();

        $rs->moveNext();
    }
}

//DELETE ALL CATEGORIES
$sql = "SELECT oxid FROM oxcategories";
$rs = $oDb->select($sql);
if ($rs != false && $rs->recordCount() > 0) {
    while (!$rs->EOF) {
        $oCat = oxNew("oxCategory");
        echo "Category " . $rs->fields[0]." deleted<br />";
        $oCat->load($rs->fields[0]);
        $oCat->delete();

        $rs->moveNext();
    }
}


//DELETE ALL ATTRIBUTES
$sql = "SELECT oxid FROM oxattribute";
$rs = $oDb->select($sql);
if ($rs != false && $rs->recordCount() > 0) {
    while (!$rs->EOF) {
        $oAttr = oxNew("oxAttribute");
        echo "Attribute " . $rs->fields[0]." deleted<br />";
        $oAttr->load($rs->fields[0]);
        $oAttr->delete();

        $rs->moveNext();
    }
}

