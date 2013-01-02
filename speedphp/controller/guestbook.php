<?php
class guestbook extends spController
{
	function index() {
		$gb = spClass('m_guestbook');
		$result = $gb->find(array('id'=>2));
		dump($result);
		echo "<p>here is in class(guestbook)->function(index).</p>";
		echo spUrl("main", "index");
		$url_tmp = spUrl("main", "index");
		echo "<p><a href=$url_tmp>$url_tmp</a></p>";
	}
}
