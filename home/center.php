<div class="medium-7 columns">
<fieldset>
	<h5><a href="#">Updates</a></h5><hr>
<? include "updates.php";?>
	</fieldset>
	</div>
	
<div class="medium-5 columns callout">
  <fieldset>
      <h5><a href="#">Post new update</a></h5><hr>
     <textarea id="post" rows="10" placeholder="Your Updates"></textarea><br>
  <center id="button"> <button class="button tiny" onclick="post_update()"><b>Post</b></button></center>
  <div id="status"></div>
  </fieldset>

	</div>
