<div class="page-title-right">
	<ol class="breadcrumb m-0">

		<?php

		$replace_routes = array(
				"routinfo" => "Route Info",
				"changelocation" => "Change Location"
		);

		$crumbs = explode("/", $_SERVER["REQUEST_URI"]);
		$last_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "#";

		if(sizeof($crumbs) == 3){
			$crumbs[1] = "MR Consultations";
		}

		foreach ($crumbs as $key => $crumb) {

			$crumb = explode("?", $crumb);
			$crumb = $crumb[0];
			if (isset($replace_routes[$crumb])) {
				$crumb = $replace_routes[$crumb];
			}

			if ($key == 0) {

			} elseif ($key == sizeof($crumbs)-2) {
				echo '<li class="breadcrumb-item"><a href="' . $last_url . '">' . ucfirst(str_replace(array(".php", "_"), array("", " "), $crumb) . ' ') . '</a></li>';
			} else {
				echo '<li class="breadcrumb-item active">' . ucfirst(str_replace(array(".php", "_"), array("", " "), $crumb) . ' ') . '</li>';
			}
		}

		?>
	</ol>
</div>

