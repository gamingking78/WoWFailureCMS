<?php
require_once("configs.php");
$page_cat = "forums";
?>
<head>
<title><?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="<?php echo $website['root'];?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="#" title="WoW Search" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/local-common/css/common.css?v15" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/local-common/css/common-ie.css?v15" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/local-common/css/common-ie6.css?v15" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/local-common/css/common-ie7.css?v15" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/css/wow.css?v4" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/local-common/css/cms/forums.css?v15" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/local-common/css/cms/cms-common.css?v15" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/css/cms.css?v4" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/css/cms-ie6.css?v4" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/css/wow-ie.css?v4" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/css/wow-ie6.css?v4" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="<?php echo $website['root'];?>wow/static/css/wow-ie7.css?v4" /><![endif]-->
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/core.js?v15"></script>
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/tooltip.js?v15"></script>
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/cms.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '<?php echo $website['root'];?>wow/static';
Core.baseUrl = '<?php echo $website['root'];?>';
Core.project = 'wow';
Core.locale = 'en-us';
Core.buildRegion = 'eu';
Core.loggedIn = true;
Flash.videoPlayer = 'http://eu.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/wow/player/rating-pegi.jpg';
//]]>
</script>
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/menu.js?v15"></script>
<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/js/wow.js?v4"></script>
<script type="text/javascript"> 
friendData = [];
$(function(){
Menu.initialize('data/menu.json');
Search.init('ta/lookup');
});
</script>
<style type="text/css">
.loader {
  width:24px;
  height:24px;
  background: url("<?php echo $website['root'];?>wow/static/images/loaders/canvas-loader.gif") no-repeat;
 }
 
.errors {
  width:400px;
  background:#FFA3A3;
  border:1px solid #FF0000;
  opacity: 0.40;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: #000 0 0 10px;
  -webkit-box-shadow: #000 0 0 10px;
  box-shadow: #000 0 0 10px;
  text-shadow:0px 1px 1px #000;
}

.success {
  width:400px;
  background:#59FF6C;
  border:1px solid #00FF21;
  opacity: 0.40;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: #000 0 0 10px;
  -webkit-box-shadow: #000 0 0 10px;
  box-shadow: #000 0 0 10px;
  text-shadow:0px 1px 1px #000;
  color:#007F0E;
}
</style>
</head>
<body class="en-gb logged-in">
<div id="wrapper">
<?php include("../header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<?php
if(!isset($_SESSION['username']) || $_SESSION['username'] == ""){ $error=1; }
if(isset($_GET['f'])){
$forumid = intval($_GET['f']);
$forum = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_forums WHERE id = '".$forumid."'"))or $error=1;
$category = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE id = '".$forum['categ']."'"))or $error=1;
$userInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$account_information['id']."'"));
echo '
<ol class="ui-breadcrumb">
<li><a href="'.$website['root'].'index.php" rel="np">'.$website['title'].'</a></li>
<li><a href="index.php" rel="np">'.$Forum['Forum7'].'</a></li>
<li><a href="index.php" rel="np">'.$category['name'].'</a></li>
<li><a href="forum.php?f='.$forum['id'].'" rel="np">'.$forum['name'].'</a></li>
<li class="last"><a href="createthread.php?f='.$forumid.'" rel="np">'.$Forum['Forum8'].'</a></li>
</ol>
';
$error=0;
}else{ $error=1; }
if($error == 1){
echo '
<ol class="ui-breadcrumb">
<li><a href="../index.php" rel="np">'.$Forum['Forum9'].'</a></li>
<li class="last"><a href="index.php" rel="np">'.$Forum['Forum10'].'</a></li>
</ol>
';
echo '<meta http-equiv="refresh" content="2;url=index.php"/>';
}
?>
</div>
<div class="content-bot">    
	
	<script type="text/javascript">
	//<![CDATA[
		$(function() {
			Cms.Topic.topicInit();
		});
	//]]>
	</script>
    <?php if(isset($_POST['create'])){
	//Done for $error == 1 | if(!isset($_GET['f'])){ $errorx = "No ForumId request"; }
	if(empty($_POST['subject'])){ $errorx[] = $Forum[Forum11]; }
	if(empty($_POST['detail'])){ $errorx[] = $Forum[Forum12]; }
	if($error == 1){ $errorx[] = $Forum[Forum13]; }
	echo '<center>
	<h3>'.$Forum['Forum14'].'</h3><br />
	<div class="loader"></div><br />';
	if(isset($errorx) && count($errorx) > 0){
		echo '<div class="errors">';
		foreach($errorx as $errors){ echo "<font color='red'>*".$errors."</font><br />"; }
		echo '</div>';
		echo '<meta http-equiv="refresh" content="2"';
	}else{
	$subject = mysql_real_escape_string(addslashes($_POST['subject']));
	$content = stripslashes($_POST['detail']);
	$content = strip_tags($content);
	$content = addslashes($content);
	$content = nl2br($content);
	$content = mysql_real_escape_string($content);
	$author = $account_information['id'];
	$today = getdate();
	$date = $today['year']."-".$today['mon']."-".$today['mday'];
	$insert = mysql_query("INSERT INTO forum_threads (forumid,name,author,views,date,content) VALUES ('".$forumid."','".$subject."','".$author."','0','".$date."','".$content."')")or print("'.Forum['Forum15'].'");
	echo '<div class="success">';
	echo ''.$Forum['Forum16'].'';
	echo '</div>';
	echo '<meta http-equiv="refresh" content="2;url=forum.php?f='.$forumid.'"';
	}
	echo '<div id="forum-content"></div>';
	}else{
	?>
    <div id="forum-content">
		<div class="talkback new-post"><a id="new-post"></a>
			<form method="POST">
				<div>
					<input type="hidden" name="xstoken" value="9612931e-14b4-4b21-96c6-90225616b34e" />
					<div class="post general">
						<?php
						if($error != 1){
						?>
						<div class="post-user-details ">
							<h4><?php echo $Forum['Forum17'];?></h4>
							<div class="post-user ajax-update">
								
								<div class="avatar">
									<div class="avatar-interior">
											<a href="#">
												<img height="84" src="<?php echo $website['root'];?>images/avatars/2d/<?php echo $userInfo['avatar']; ?>" alt="" />
											</a>
									</div>
								</div>

								<div class="character-info">
									<div class="user-name">
										<span class="char-name-code" style="display: none"><?php echo $_SESSION['username']; ?></span>
										<div id="context-2" class="ui-context character-select">
											<div class="context">
												<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
												<div class="context-user">
													<strong><?php echo $_SESSION['username']; ?></strong>
														<br />
														<span><?php echo $Forum['Forum18'];?></span>
												</div>
												<div class="context-links">
														<a href="#" title="Profile" rel="np" class="icon-profile link-first"><?php echo $Forum['Forum19'];?></a>
														<a href="#" title="View my posts" rel="np" class="icon-posts"> </a>
														<a href="#" title="View auctions" rel="np" class="icon-auctions"> </a>
														<a href="#" title="View events" rel="np" class="icon-events link-last"> </a>
												</div>
											</div>
										</div>
										<a href="#" class="context-link" rel="np"><?php echo $_SESSION['username']; ?></a>
									</div>
									
									<div class="userCharacter">
										<div class="character-desc"><span class="color-c1"><?php echo $Forum['Forum20'];?></span></div>
										<div class="achievements">0</div>
									</div>
								</div>
								
							</div>
						</div>

						<div class="post-edit">
							<div id="post-errors"></div>
							<div class="talkback-controls">
								<a href="javascript:;" onclick="Cms.Topic.previewToggle(this, 'preview')" class="preview-btn"><span class="arr"></span><span class="r"></span><span class="c"><?php echo $Forum['Forum21'];?></span></a>
								<a href="javascript:;" onclick="Cms.Topic.previewToggle(this, 'edit')" class="edit-btn selected"><span class="arr"></span><span class="r"></span><span class="c"><?php echo $Forum['Forum22'];?></span></a>
							</div>
							<br><br>
							<div class="editor1" id="post-edit"><div class="bml-toolbar"></div>
								<a id="editorMax" rel="5000"></a>
								<input type="text" id="subject" name="subject" value="" class="post-subject" maxlength="55" />
								<textarea id="postCommand.detail" name="detail" class="post-editor" cols="78" rows="13"></textarea>
								<script type="text/javascript" src="<?php echo $website['root'];?>wow/static/local-common/js/bml.js"></script>
								<script type="text/javascript">
								//<![CDATA[
								$(function() {
									Wow.addBmlCommands();
									BML.initialize('#post-edit', false);
								});
								//]]>
								</script>
							</div>
							<div class="post-detail" id="post-preview"></div>



							<div class="talkback-btm">
								<table class="dynamic-center"><tr><td>
									<div id="submitBtn">
									<button class="ui-button button1 " type="submit" name="create">
										<span>
											<span><?php echo $Forum['Forum23'];?></span>
										</span>
									</button>
									</div>
								</td></tr></table>
							</div>
						</div>
						<span class="clear"><!-- --></span>
						<?php
						}else{
						if(!isset($_SESSION['username'])){ echo '<div class="post-user-details "><center><h4>Not Logged In</h4></center><br /></div>'; }else{
						echo '<div class="post-user-details "><center><h4>Error...</h4></center><br /></div>'; }
						}
						?>
					</div>
				</div>
			</form>
			<span class="clear"><!-- --></span>
			<div class="talkback-code">
				<div class="talkback-code-interior">
					<div class="talkback-icon">
						<h4 class="code-header"><?php echo $Forum['Forum24'];?></h4>
						<p><?php echo $Forum['Forum25'];?><strong><?php echo $Forum['Forum26'];?></strong></p>
						<p><?php echo $Forum['Forum27'];?><strong><?php echo $Forum['Forum28'];?></strong></p>
						<p><?php echo $Forum['Forum29'];?><strong><?php echo $Forum['Forum30'];?></strong></p>
						<p><?php echo $Forum['Forum31'];?><a href="http://battle.net/community/conduct"><?php echo $Forum['Forum32'];?></a><?php echo $Forum['Forum33'];?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</div>
<?php } ?>
</div>

<?php include("../footer.php"); ?>
</body>
</html>