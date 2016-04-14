<?php

header('Content-Type: text/xml');

$title = "About Us";
$res   = '<link rel="stylesheet" href="css/aboutus.css" />';

$content = <<<PAGECONTENT
{$res}
<div class="a_sidebar">
  <h3>Need a cake?</h3>
  <p>Call today</p>
</div>

<div class="left">

  <div class="article">
    <h1><strong><u>Welcome to Epi De Dieu</strong></u></h1>

    <h3 class="">Our Story</h3>

    <p><font size="3">Epi de Dieu is a noteworthy bakery and pastry shop in Quatres-Bornes.
    It has been set up in 2002 with the intent of providing the vicinity with baked goods and all things cake. At start, the two owners, Mr and Mrs Thomas could run
    the business smoothly by themselves. After one year, the number of client climbed up significantly and the owners hired three qualified workers from
    Bangladesh to bake the cakes and breads. Actually, there are eight workers  in total working at Epi de Dieu, the owners inclusive.

    As part of its provided services, the bakery produces a certain daily supply of bread and cakes intended for individual consumption as well as for supplying local shops.
    The shop also provides catering services for special occasions such as parties, weddings or anniversaries.
    We take proud in what we do and it shows. Only flavor exceeds the beauty of Epi De Dieu's exquisite  breads,cakes, wedding cakes and pastries. Our main objective is to
    deliver value and an excellent customer service.
    </font></p>
    </br>
    </br>
    <img  />
    <img src="res/edd1.jpg" class="image" />
    <img src="res/edd2.jpg" class="image" />
    <img src="res/edd3.jpg" class="image" />
    <br/>
    <br/>
  </div>
</div>


<div class="">
  <strong>Company Information</strong>
  <br />
  Email:<a href="epi@gmail.com">epi@gmail.com</a></br>
  Contact Number: 4272565 | 57985211 </br>
  Address: 5,Avenue Murphy,Quatres-Bornes</br>
  </div>
</div>
</br></br></br>
PAGECONTENT;

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<page title="{$title}" xmlns="http://edd-bakery.com/pages">
  <content><![CDATA[{$content}]]></content>
</page>
XML;

echo $xml;
