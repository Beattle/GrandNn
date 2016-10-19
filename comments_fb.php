<?$fid = $_GET['fid'];?>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div class="fb-comments" data-href="<?=$_SERVER['HTTP_HOST']?>/db/molochnyiy_blog/<?=$fid?>" data-num-posts="3" data-width="570"></div>