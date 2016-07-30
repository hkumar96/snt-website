<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	include 'scrape.php';
	include 'dbconn.php';
	$sql = "SELECT * FROM article ORDER BY pub_date DESC";
	$retval = mysql_query($sql,$conn);
	$result = "";
	while($row = mysql_fetch_assoc($retval)){
		$post_id = $row['id'];
		$user_id = $row['user_id'];
		$query = "SELECT name FROM users WHERE id={$user_id}";
		//echo "$query";
		$user = mysql_fetch_assoc(mysql_query($query,$conn));
		$username = $user['name'];
		$timestamp = strtotime($row['pub_date']);
		//echo $timestamp;
		$title = $row['title'];
		$content = $row['content'];
		$date = getdate($timestamp);
		//echo $mydate;
		//var_dump($date);
		$result .= "<div class='clearfix single_content'>\n";
		$result .= "<div class='clearfix post_date floatleft'>\n";
		$result .= "<div class='date'>\n";
		$result .= "<h3>{$date['mday']}</h3>\n";
		$result .= "<p>{$date['month']}</p>\n";
		$result .= "</div>\n</div>";
		$result .= "<div class='clearfix post_detail'>\n";
		$result .= "<h2><a href=''>{$title} </a></h2>\n";
		$result .= "<div class='clearfix post-meta'>\n";
		$result .= "<p><span><i class='fa fa-user'></i>{$username}<span><span><i class='fa fa-clock-o'></i>{$date['mday']} {$date['month']} {$date['year']}</span></p>";
		$result .= "</div>";
		$result .= "<div class='clearfix post_excerpt'>\n<img src='images/thumb.png' alt=''/>";
		$result .= "<p>{$content}</p>";
		$result .= "</div>";
		$result .= "<a href='single.php?id={$post_id}'>Continue Reading</a>\n</div>\n</div>";
		// <div class="clearfix single_content">
		// 	<div class="clearfix post_date floatleft">
		// 		<div class="date">
		// 			<h3>27</h3>
		// 			<p>January</p>
		// 		</div>
		// 	</div>
		// 	<div class="clearfix post_detail">
		// 		<h2><a href="">Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. </a></h2>
		// 		<div class="clearfix post-meta">
		// 			<p><span><i class="fa fa-user"></i> Admin</span> <span><i class="fa fa-clock-o"></i> 20 Jan 2014</span> <span><i class="fa fa-comment"></i> 4 comments</span> <span><i class="fa fa-folder"></i> Category</span></p>
		// 		</div>
		// 		<div class="clearfix post_excerpt">
		// 			<img src="images/thumb.png" alt=""/>
		// 			<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
		// 			ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class
		// 			aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos </p>
		// 		</div>
		// 		<a href="">Continue Reading</a>
		// 	</div>
		// </div>

		//echo $username;
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<!--
---- Clean html template by http://WpFreeware.com
---- This is the main file (index.html).
---- You are allowed to change anything you like. Find out more Awesome Templates @ wpfreeware.com
---- Read License-readme.txt file to learn more.
-->

	<head>
		<title>Science and Technology Council IIT Kanpur</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--Oswald Font -->
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="css/tooltipster.css" />
		<!-- home slider-->
		<link href="css/pgwslider.css" rel="stylesheet">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link href="style.css" rel="stylesheet" media="screen">
		<link href="responsive.css" rel="stylesheet" media="screen">
	</head>

	<body>

		<section id="header_area">
			<div class="wrapper header">
				<div class="clearfix header_top">
					<div class  = "logo clearfix floatleft">
						<img src="http://students.iitk.ac.in/gymkhana/img/logo_snt.jpg">
					</div>
					<div class="clearfix logo floatleft">
						<a href="index.php"><h1><span>Science and Technology Council</span><br> IIT Kanpur</h1></a>
					</div>
					<div class="clearfix search floatright">
						<form>
							<input type="text" placeholder="Search"/>
							<input type="submit" />
						</form>
					</div>
				</div>
				<div class="header_bottom">

					<nav>
						<ul id="nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About us</a></li>
							<li id = "dropdown">
								<a href="">Clubs and Hobby groups</a>
								<ul>
									<li><a href="http://students.iitk.ac.in/aeromodelling" target="_blank"><span>Aeromodelling Club</span></a></li>
									<li><a href="http://students.iitk.ac.in/astronomy" target="_blank"><span>Astronomy Club</span></a></li>
									<li><a href="http://students.iitk.ac.in/brain" target="_blank"><span>BRaIN</span></a></li>
									<li><a href="http://students.iitk.ac.in/snt/bclub" target="_blank"><span>Business Club</span></a></li>
									<li><a href="http://students.iitk.ac.in/eclub" target="_blank"><span>Electronics Club</span></a></li>
									<li><a href="http://students.iitk.ac.in/glidingclub/"><span>Gliding Club</span></a></li>
									<!-- <li><a href="http://students.iitk.ac.in/hamclub" target="_blank"><span>HAM Club</span></a></li> -->
									<li><a href="http://pclub.in/"><span>Programming Club</span></a></li>
									<li><a href="http://students.iitk.ac.in/roboclub"><span>Robotics Club</span></a></li>
									<li><a href="http://students.iitk.ac.in/rubikscube/"><span>Rubik's Cube Hobby Group</span></a></li>

								</ul>
							</li>
							<li id = "dropdown">
								<a href = "">Teams</a>
								<ul>
									<li><a href="http://students.iitk.ac.in/roboclub/auv/" target="_blank"><span>AUV</span></a></li>
									<li><a href="http://students.iitk.ac.in/robocon/"><span>Robocon, IITK</span></a></li>
									<li><a href="http://www.iitk.ac.in/ame/sae/" target="_blank"><span>SAE,IIT Kanpur</span></a></li>
								</ul>
							</li>
							<li id = "dropdown">
								<a href = "">Centres and facilities</a>
								<ul>
									<li><a href="http://www.iitk.ac.in/cw/" target="_blank"><span>Tinkering Lab-Central workshop</span></a></li>
									<li><a href="http://www.iitk.ac.in/4ilab/"><span>4-i lab</span></a></li>

								</ul>
							</li>
							<!-- <li><a href="blog.php">Blog</a></li> -->
							<li><a href="http://wiki.junta.iitk.ac.in/">Wiki</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li><a href="feedback.php">Feedback</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</section>

		<section id="content_area">
			<div class="clearfix wrapper main_content_area">

				<div class="clearfix main_content floatleft">

					<div class="clearfix content">
						<div class="content_title"><h2>About the council</h2></div>
						<p>
							Science and Technology Council is a part of Student's Gymkhana and provides opportunity and a platform for students to pursue their hobbies in field of science and technology.The Council currently comprises of 8 clubs and a Rubik's cube hobby group.
						</p>
						<p>
							<h3>What is the council about?</h3>
						</p>
						<p>
							An opportunity for you to explore for yourself the amazing world of technology, to innovate, to learn, to create, to try out new things and at the same time have loads and loads of fun. A place for you to realize your dream and develop the next killer technology! So what’s stopping you??...come and join us in our activities!
						</p>
						<p>
							With the thought, “Imagination is more important than knowledge”, We, the Science and Technology Council compel each and everyone to think beyond the conventional boundaries, provide support, opportunity to help one unleash his imagination and an ideal platform to showcase one’s talent. We make things fly, we carve out mighty business plans, we build electronic gadgets, our own communication devices, we dare to stare deep into the sky not only to admire the cosmic wonder, but a lot more; we write our own codes, and yes we do make our own robots! Well, if by remote chance none of this is your cup of tea, then why not indulge in a game of fox hunt or simply enjoy a joyride on one of the gliders. There is surely something for everyone!
						</p>
					</div>
				</div>
				<div class="clearfix sidebar_container floatright">

					<div class="clearfix newsletter">
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsntiitk%2F&tabs&width=280&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1600505566929296" width="280" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
					<div class="clearfix sidebar">
						<div class="clearfix single_sidebar">
							<div class="popular_post">
								<div class="sidebar_title"><h2>Latest News</h2></div>
								<ul>
									<?php echo get_news($access_token,5);?>
								</ul>
							</div>
							</div>
						<div class="clearfix single_sidebar category_items">
							<h2>Calendar</h2>
							<iframe id="blockrandom" name="iframe" src="http://www.google.com/calendar/embed?src=sntsecy.iitk%40gmail.com&amp;ctz=Asia/Calcutta" height="400" width = "280" scrolling="auto" align="top" frameborder="0">
	This option will not work correctly. Unfortunately, your browser does not support inline frames.</iframe>
							</div>
					</div>
				</div>
			</div>
		</section>

		<section id="footer_top_area">
			<div class="clearfix wrapper footer_top">
				<div class="clearfix footer_top_container">
					<div class="clearfix single_footer_top floatleft">
						<h2>Club's Facebook pages</h2>
						<ul>
							<li><a href="https://www.facebook.com/groups/aeroclubiitk/" target="_blank"><span>Aeromodelling Club</span></a></li>
							<li><a href="https://www.facebook.com/groups/astroclubiitk/" target="_blank"><span>Astronomy Club</span></a></li>
							<li><a><span>BRaIN</span></a></li>
							<li><a href="https://www.facebook.com/BusinessClubIITKanpur" target="_blank"><span>Business Club</span></a></li>
							<li><a href="https://www.facebook.com/groups/eclub.iitk/" target="_blank"><span>Electronics Club</span></a></li>
							<li><a><span>Gliding Club</span></a></li>
							<li><a href="https://www.facebook.com/groups/147086472046003/" target="_blank"><span>HAM Club</span></a></li>
							<li><a href="https://www.facebook.com/groups/pclubiitk/" target="_blank"><span>Programming Club</span></a></li>
							<li><a href="https://www.facebook.com/groups/188591054520256/" target="_blank"><span>Robocon, IITK</span></a></li>
							<li><a href="https://www.facebook.com/groups/roboclub.iitk/" target="_blank"><span>Robotics Club</span></a></li>
							<li><a href="https://www.facebook.com/groups/rchg.iitk/" target="_blank"><span>Rubik's Cube Hobby Group</span></a></li>
							<li><a href="https://www.facebook.com/groups/iitkSAE/" target="_blank"><span>SAE, IITK</span></a></li>
						</ul>
					</div>
					<div class="clearfix single_footer_top floatleft">
						<h2>Quick Links</h2>
						<ul>
							<li><a href="">Youtube channel</a></li>
							<li><a href="">Techkriti</a></li>
							<li><a href="">Students' Gymkhana</a></li>
							<li><a href="">Students' Senate</a></li>
						</ul>
					</div>

				</div>
			</div>
		</section>

		<section id="footer_bottom_area">
			<div class="clearfix wrapper footer_bottom">
				<div class="clearfix copyright floatleft">
					<p> Copyright &copy; All rights reserved by <span>Wpfreeware.com</span></p>
				</div>
				<div class="clearfix social floatright">
					<ul>
						<li><a class="tooltip" title="Facebook" href=""><i class="fa fa-facebook-square"></i></a></li>
						<li><a class="tooltip" title="Twitter" href=""><i class="fa fa-twitter-square"></i></a></li>
						<li><a class="tooltip" title="Google+" href=""><i class="fa fa-google-plus-square"></i></a></li>
						<li><a class="tooltip" title="LinkedIn" href=""><i class="fa fa-linkedin-square"></i></a></li>
						<li><a class="tooltip" title="tumblr" href=""><i class="fa fa-tumblr-square"></i></a></li>
						<li><a class="tooltip" title="Pinterest" href=""><i class="fa fa-pinterest-square"></i></a></li>
						<li><a class="tooltip" title="RSS Feed" href=""><i class="fa fa-rss-square"></i></a></li>
						<li><a class="tooltip" title="Sitemap" href=""><i class="fa fa-sitemap"></i> </a></li>
					</ul>
				</div>
			</div>
		</section>

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.tooltipster.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.tooltip').tooltipster();
			});
		</script>
		 <script type="text/javascript" src="js/selectnav.min.js"></script>
		<script type="text/javascript">
			selectnav('nav', {
			  label: '-Navigation-',
			  nested: true,
			  indent: '-'
			});
		</script>
		<script src="js/pgwslider.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.pgwSlider').pgwSlider({

					intervalDuration: 5000

				});
			});
		</script>
		<script type="text/javascript" src="js/placeholder_support_IE.js"></script>

<!--
---- Clean html template by http://WpFreeware.com
---- This is the main file (index.html).
---- You are allowed to change anything you like. Find out more Awesome Templates @ wpfreeware.com
---- Read License-readme.txt file to learn more.
-->

	</body>
</html>
