<?php

header('Content-Type: text/xml');

$title = "Home";
$res   = '<link rel="stylesheet" href="./css/display.css" />';

$content = <<<PAGECONTENT
{$res}
<section class="jumbotron" id="tagline">
  <div class="container">
    <h1 data-text="tagline">Pastries, baked goodies, <br />and all things cake!</h1>
  </div>
</section>

<div class="container">
  <div class="textContent col-md-8">
    <h2 data-text="welcome">Hello &amp; Welcome to Epi de Dieu Ltée</h2>
    <p data-text="intro">
    Epi de Dieu ltée creates amazing pastries and treats, delivering throughout Quatre-Bornes and the vicinity. Our cakes are made to order and can cater for your imagination.
    </p>
    <p data-text="events">
    Epi de Dieu can create cakes for:
    </p>
    <ul>
      <li data-text="wedding">Weddings</li>
      <li data-text="birthday">Birthdays</li>
      <li data-text="christening">Christenings</li>
      <li data-text="corporate">Corporate events</li>
      <li data-text="special">Special occasions</li>
    </ul>
    <p data-text="create">
    Whether you want a five tier wedding cake for your special day, a unique birthday cake for a one to one hundred year old, corporate cupcakes for a launch event, or you just fancy some cupcakes for the weekend. Epi de Dieu can create a special memorable cake just for you.
    </p>
    <p data-text="click">
    Click on one of the cake icons below and see which cake takes your fancy? There is something for everyone, and who doesn't like cake?
    </p>
  </div>

  <div class="row" id="placeholder_rw1">

  </div>
  <div class="row" id="placeholder_rw2">

  </div>

<div class="wrapper separator">
  <h3 data-text="visit">Visit us and try our delicious range</h3>
  <p data-text="time">Take time out of your busy day and treat yourself to some sweetness.</p>

  <section id="hours">

    <h4>Open&#8230;</h4>

    <ul>
      <li>
        <abbr title="Opening hours for Monday">Mon:</abbr> <time>6:00am</time> &#8211; <time>5:30pm</time>
      </li>
      <li>
        <abbr title="Opening hours for Tuesday" >Tue:</abbr> <time>6:00am</time> &#8211; <time>5:30pm</time>
      </li>
      <li>
        <abbr title="Opening hours for Wednesday" >Wed:</abbr> <time>6:00am</time> &#8211; <time>5:30pm</time>
      </li>
      <li>
        <abbr title="Opening hours for Thursday" >Thu:</abbr> <time >6:00am</time> &#8211; <time>5:30pm</time>
      </li>
      <li>
        <abbr title="Opening hours for Friday">Fri:</abbr> <time>6:00am</time> &#8211; <time>5:30pm</time>
      </li>
      <li>
        <abbr title="Opening hours for Saturday" >Sat:</abbr> <time>6:00am</time> &#8211; <time>3:00pm</time>
      </li>
    </ul>

    <p><a href="#" id="fb-footer" target="_blank" data-text="fb">Like us on Facebook</a></p>
  </section>
</div>
PAGECONTENT;

$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<page title="{$title}" xmlns="http://edd-bakery.com/pages">
  <content><![CDATA[{$content}]]></content>
</page>
XML;

echo $xml;
