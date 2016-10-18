Home
====


<!-- Banner -->
<div id="banner-wrapper">
	<div id="banner" class="box container">
		<div class="row">
			<div class="7u 12u(medium)">
				<h2 style="font-size: 300%">Event processing made easy.</h2>
				<p style="font-size:150%">Search, pipe and crunch event streams of all kinds with an event stream engine anyone can use.</p>
			</div>
			<div class="5u 12u(medium)">
				<ul>
					<li><a href="get.html" class="button big icon fa-arrow-circle-right">Download it</a></li>
					
				</ul>
			</div>
		</div>
	</div>
</div>


<!-- Features -->
<!--
<div id="features-wrapper">
	<div class="container">
		<div class="row">
			<div class="4u 12u(medium)">

					<section class="box feature">
						<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
						<div class="inner">
							<header>
								<h2>Easy to extend</h2>
								<p>The processor with a can-do attitude</p>
							</header>
							<p>Know how to program in Java? Use BeepBeep as a library and pipe its event processors by yourself. Or, create your own processors in a few lines of code, and even extend ESQL to use them in your queries.</p>
						</div>
					</section>

			</div>
			<div class="4u 12u(medium)">

					<section class="box feature">
						<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
						<div class="inner">
							<header>
								<h2>JDBC compatible</h2>
								<p>Want to do some stream processing in your Java program?</p>
							</header>
							<p>You can use BeepBeep as a drop-in replacement anywhere you access a database with JDBC.</p>
						</div>
					</section>

			</div>
			<div class="4u 12u(medium)">

					<section class="box feature">
						<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
						<div class="inner">
							<header>
								<h2>Performant and versatile</h2>
								<p>A small engine that can play with the big boys</p>
							</header>
							<p>BeepBeep compares favorably with larger event stream engines on various kinds of queries. It also has a small footprint (less than 300 kb) and does not rely on any library, meaning it can sneak in where other engines can't go.</p>
						</div>
					</section>

			</div>
		</div>
	</div>
</div>
-->

<!-- Main -->
<div id="main-wrapper">
	<div class="container">
		<div class="row 200%">
			<div class="4u 12u(medium)">

				<!-- Sidebar -->
					<div id="sidebar">
						<section>
						<div class="image fit">
							<img src="/images/Pipes-800px.png" alt="Pipes" />
						</div>
						</section>
					</div>

			</div>
			<div class="8u 12u(medium) important(medium)">

				<!-- Content -->
					<div id="content">
						<section class="last">
							<h2>What is BeepBeep?</h2>
							
							<p>BeepBeep 3 is an <em>event stream engine</em>: it receives a stream of events produced by some application or process, and produces in realtime a new stream of events. Internally, BeepBeep analyzes and transforms the event stream by passing it through a chain of basic event processors, with the output of one (or more) processor being piped to the input of the next one. The exact configuration of these processors is completely left to the user and can be specified through various means, including ESQL, a query language based on SQL, or programmatically using Java.</p>
							
							
							<a href="/quickintro.html" class="button icon fa-arrow-circle-right">Learn more</a>
						</section>
					</div>

			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row 200%">
			<div class="4u 12u(medium)">

				<!-- Sidebar -->
					<div id="sidebar">
						<section>
						<div class="image fit">
							<img src="/log.png" alt="Log" />
						</div>
						</section>
					</div>

			</div>
			<div class="8u 12u(medium) important(medium)">

				<!-- Content -->
					<div id="content">
						<section class="last">
							<h2>What can I do with it?</h2>
							
							<p>You can use BeepBeep on anything that produces
							a sequence of events: analyze a web server log, 
							find patterns in a stream of network packets, look for 
							policy violations in the execution of a system, etc.
							BeepBeep can read data from a pre-recorded file (<em>offline</em>
							analysis), or even be connected directly to the event
							source and compute its result as the input events
							come in (<em>online</em> analysis).</p>
							
							
							<a href="/use-cases.html" class="button icon fa-arrow-circle-right">Look at some use cases</a>
						</section>
					</div>

			</div>
		</div>
	</div>
</div>

<!-- :mode=markdown:wrap=none: -->
---
slug: home
lang: en
template: index.php
...
