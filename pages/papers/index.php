<?php
   require_once('../../init.php');

   init();

   preContent();
?>

<div id="main">
   <div class="main-content">
      <h2 class='page-title'>Papers</h2>

      <a name="2012-spoons" href="docs/Outage Detection via Real-Time Social Stream Analysis: Leveraging the Power of Online Complaints - 2012.pdf"><h4>2012 Outage Detection via Real-Time Social Stream Analysis: Leveraging the Power of Online Complaints</h4></a> (<a href="docs/Outage Detection via Real-Time Social Stream Analysis: Leveraging the Power of Online Complaints - 2012.bib">bibtex</a>)
         <p>
            Over the past couple of years, Netflix has significantly expanded its online streaming offerings, which now encompass multiple delivery platforms and thousands of titles available for instant view.
            This paper documents the design and development of an outage detection system for the online services provided by Netflix.
            Unlike other internal quality-control measures used at Netflix, this system uses only publicly available information: the tweets, or Twitter posts, that mention the word "Netflix," and has been developed and deployed externally, on servers independent of the Netflix infrastructure.
            This paper discussed the system and provides assessment of the accuracy of its real-time detection and alert mechanisms.
         </p>

      <a name="2013-spoons-thesis" href="docs/SPOONS: Netflix Outage Detection Using Microtext Classification - 2013.pdf"><h4>SPOONS: Netflix Outage Detection Using Microtext Classification</h4></a> (<a href="docs/SPOONS: Netflix Outage Detection Using Microtext Classification - 2013.bib">bibtex</a>)
         <p>
            Every week there are over a billion new posts to Twitter services and many of those messages contain feedback to companies about their services.
            One company that recognizes this unused source of information is Netflix.
            That is why Netflix initiated the development of a system that lets them respond to the millions of Twitter and Netflix users that are acting as sensors and reporting all types of user visible outages.
            This system enhances the feedback loop between Netflix and its customers by increasing the amount of customer feedback that Netflix receives and reducing the time it takes for Netflix to receive the reports and respond to them.
         <p>

         </p>
            The goal of the SPOONS (Swift Perceptions of Online Negative Situations) system is to use Twitter posts to determine when Netflix users are reporting a problem with any of the Netflix services.
            This work covers the architecture of the SPOONS system and framework as well as outage detection using tweet classification.
         </p>
   </div>
</div>
