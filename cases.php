<?php include("meta.php"); ?>
<?php $this_page = "cases"; ?>

<body>
   <div id='page'>
      <?php include("header.php"); ?>

      <div id="content" class='center'>
         <?php include("sidebar.php"); ?>

         <div id="main">
            <div class="main-content">
               <h2>Cases</h2>
               <p>I am quite fond of building and modding computer cases. Here are a few of the cases that I have done.</p>
               <h3>Built</h3>
               <a name="mineralOil"><h4>Mineral Oil</h4></a>
                  <p>Mineral oil is conductive thermally, but not electrically. In addition, it's a lubricant. How could you resist not submerging computer components in it? This case is 100%. I used 1/8 clear acrylic and low-viscosity mineral oil. All component except the optical and hard drive are submerged in the lower chamber. The oil is pumped through a copper radiator (also custom made) into a reservoir on the top. The oil then goes through the other half of the radiator back into the main chamber. There are 9 80mm fans along the radiator. All these fans use magnetic barometric blades (the blades are magnetically levitated), so they are silent. The oil quiets all the components making this case silent except for the gentle dribble of the oil entering the reservoir.
                  <p>Fun fact: Mineral oil and acrylic have very similar indexes of refraction. Meaning, if you put acrylic in mineral oil it is almost invisible.</p> 
                  <p>Pictures Coming Soon!</p>
               <a name="lego"><h4>LEGO</h4></a>
                  <p>This was a case that a friend and I did together. The case is built from the ground up put of LEGO&reg blocks (there are no MEGA Blocks!). There is a rack for up-to three hard drive and shelves for up-to three optical drives). This case conforms to the ATX and ATX-Micro form factor. We got all the necessary LEGO&reg blocks by asking all of our friends for their childhood stashes. The painting was done by another friend of mine.</p>
                  <a href="imgs/legoUnpainted.jpg"><img src="imgs/legoUnpainted.jpg" width=200px /></a>
                  <a href="imgs/legoPainted.jpg"><img src="imgs/legoPainted.jpg" height=200px /></a>
               <h3>Modded</h3>
               <a name="purpleNinja"><h4>Purple Ninja</h4></a>
                  <p>I started with an old aluminum case. I striped most of the inner case infrastructure and replaced the front side LEDs. The pattern on the window was done by drilling hundreds of holes and then cutting between them.</p>
                  <a href="imgs/purpleNinjaSide.jpg"><img src="imgs/purpleNinjaSide.jpg" width=200px /></a>
                  <a href="imgs/purpleNinjaTop.jpg"><img src="imgs/purpleNinjaTop.jpg" width=200px /></a>
            </div>
         </div>

         <div id="extras">
            <ul>
               <li><a href="#mineralOil">Mineral Oil</a>
               <li><a href="#lego">LEGO</a>
               <li><a href="#purpleNinja">Purple Ninja</a>
            </ul>
         </div>

      </div>

      <?php include("footer.php"); ?>
   </div>
</body>
</html>
