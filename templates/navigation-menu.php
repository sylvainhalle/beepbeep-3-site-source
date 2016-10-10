<nav id="nav">
	<ul>
		<li <?php echo output_menu_item("home", $page); ?>><a href="/index.html">Home</a></li>
		<li <?php echo output_menu_item("learn", $page); ?>><a href="/quickintro.html">In 5 minutes</a></li>
		<li <?php echo output_menu_item("features", $page); ?>><a href="/features.html">Features</a>
			<ul>
			  <li <?php echo output_menu_item("features", $page); ?>><a href="/use-cases.html">Examples of uses</a></li>
				<li <?php echo output_menu_item("features", $page); ?>><a href="/palettes.html">Available extensions</a></li>
			</ul>
		</li>
		<li <?php echo output_menu_item("get", $page); ?>><a href="/get.html">Get BeepBeep</a></li>
		<li <?php echo output_menu_item("doc", $page); ?>><a href="/documentation.html">Documentation</a>
		  <ul>
		    <li <?php echo output_menu_item("doc", $page); ?>><a href="/guide/index.html">User Guide</a></li>
		    <li <?php echo output_menu_item("doc", $page); ?>><a href="/javadoc/index.html">API Reference</a></li>
		  </ul>
		</li>
	</ul>
</nav>
<!-- :indentSize=2:tabSize=2: -->
