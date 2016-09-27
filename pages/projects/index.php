<?php
   require_once('../../init.php');

   init();

   preContent();

   $projectDir = "sampleProjects";
?>

<div id="main">
   <div class="main-content">
      <h2 class='page-title'>Projects</h2>
      <p>Edit: I always fall horribly behind updating this page. If you want a good idea of some things that I am working, check out <a href="https://github.com/eriq-augustine">my github</a>.</p>
      <p>Here is a list of some of the computer science projects that I have done or am currently working on.</p>

      <h3>Ongoing</h3>
      <a name="jocr"><h4>JOCR</h4></a>
         <p>JOCR (Japanese Optical Character Recognition (some people call it "Joker")) is an effort to automatically translate manga (Japanese comics) into English.</p>
         <p>I am doing pretty well at most steps. Unfortunately, it falls apart on the last phase when I pass the data off to Google Translate for machine translation.</p>
         <p>This is my most ambitious project and I will probably be continuing this through my PhD.</p>
         <p>Check it out on github: <a href='https://github.com/eriq-augustine/jocr'>https://github.com/eriq-augustine/jocr</a>

      <a name="mediaserver"><h4>Media Server</h4></a>
         <p>A media server with a full browser client.</p>
         <p>I was unhappy with the setup and feature set required for current media servers, so I made my own.</p>
         <p>The client is pure HTML5, so you can view all your media from your desktop, tablet, phone, etc.</p>
         <p>Check it out on github: <a href='https://github.com/eriq-augustine/media-server'>https://github.com/eriq-augustine/media-server</a>

      <a name="sgb"><h4>Super Gem Battle</h4></a>
         <p>A browser based gem fighting game inspired by Super Puzzle Fighter II Turbo.</p>
         <p>I try to keep a server up so you can always play: <a href='http://supergembattle.com/'>http://supergembattle.com</a>.</p>
         <p>Just click quick play, follow the instructions and wait for someone else to also search for a game.</p>
         <p>Use left/right arrow to move the gem, up arrow to rotate, down to drop faster, and space bar to drop all the way.</p>
         <p>Check it out on github: <a href='https://github.com/eriq-augustine/sgb'>https://github.com/eriq-augustine/sgb</a>

      <h3>Complete</h3>
      <a name="thesis"><h4>Master's Thesis: SPOONS</h4></a>
         <p>The goal of the SPOONS (Swift Perceptions of Online Negative Situations) system is to use Twitter posts to determine when Netflix users are reporting a problem with any of the Netflix services.</p>
         <p>I worked on this January 2011 through May 2013.</p>
         <p>See the papers section for more details.</p>
      <a name="cplop"><h4>CPLOP</h4></a>
         <p>CPLOP (Cal Poly Library Of Pop) is a project that I am working on in conjunction with the Cal Poly Biology department. We are attempting to build a database of e.coli specimens. Doing so may help us figure out the source of contamination in various areas. This is the first database of its kind and hopefully will be made available to researchers worldwide.</p>
      <a name="pizza"><h4>Pizza Compiler</h4></a>
         <p>Pizza is a fully-featured object oriented programming language. Or at least it will be when my team an I finishes. The Pizza compiler is not for any class, just a side project.</p>
         <p>The goal of the Pizza language is to make a compiled language that feels like scripting language. We are also working on an intuitive import/include system that makes testing easy and gives a lot of control over what gets included. Pizza will target the x86 and x64 architectures as well as the Sun JVM.</Sun p>
      <a name="300paper"><h4>CSC-300 Paper</h4></a>
         <p>I wrote a 7000ish word paper for a Computer Science Professional Responsibilities course (CSC-300). My topic was whether or not Microsoft was ethical in their decisions to ban modified Xbox 360s in November 2009. This paper invokes many sections of the Software Engineering Code of Ethics and other ethical systems. By the way, this paper was written entirely in LaTeX using VIM.</p>
         <p>You can read my <a href="docs/300Paper.pdf">current draft</a> and tell me what you think.</p>
      <a name="dataMining"><h4>Data Mining</h4></a>
         <p>This is a project where my group and I invoked many data mining techniques. We came up with four different datasets and then ran analysis on them. Our datasets include market basket data from a local donut shop, match data from a popular online game, and survey data from Cal Poly's Computer Science students. Some of the data mining algorithms that we employed were Pagerank, clustering, and Apriori.</p>
         <p>You can download our <a href="docs/dataMining.pdf">entire report.</a></p>
      <a name="toleco"><h4>Toleco</h4></a>
         <p>Toleco is a two player turn based strategy with a pre-historic theme.</p>
         <p>This is a project that my group (Team Ocelot) did for a software engineering series. What is interesting about this project was that it was all about the process. We took this software all the way from the customer's requirements to maintenance. We did full design document including an System Requirements Specification, System Test Plan, and Project Plan. For this project, I took on the roles of Project Manager and Integration Manager.</p>
         <p>You can download it <a href="docs/Toleco.zip">here.</a> To run it just unzip the folder and run with "java -jar Toleco.jar". You can try and launch it just by double clicking the jar, but the images may be messed up.</p>
      <a name="evil"><h4>EVIL Compiler</h4></a>
         <p>EVIL (Extraordinarily Vexing Insipid Language) is a simple C derivative. For my compiler's class, my partner and I wrote a compiler for the EVIL language. Our compiler included some optimizations including constant folding, useless code removal, and copy propagation. Our compiler targets the SPARC architecture.</p>
      <a name="mush"><h4>MUSH</h4></a>
         <p>MUSH (Minimally Useful SHell) was a project for a System's Programming class. My shell had the base functionality one would expect from a shell. The features included input/output redirection, piping, and batch mode.</p>
   </div>
</div>

<div id="extras">
   <h2>Projects</h2>
   <ul>
      <li><a href="#jocr">JOCR</a>
      <li><a href="#mediaserver">Media Server</a>
      <li><a href="#sgb">Super Gem Battle</a>

      <li><a href="#thesis">Master's Thesis</a>
      <li><a href="#cplop">CPLOP</a>
      <li><a href="#pizza">Pizza Compiler</a>
      <li><a href="#300paper">CSC-300 Paper</a>
      <li><a href="#dataMining">Data Mining</a>
      <li><a href="#toleco">Toleco</a>
      <li><a href="#evil">EVIL Compiler</a>
      <li><a href="#mush">MUSH</a>
   </ul>
</div>
