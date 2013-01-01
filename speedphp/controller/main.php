<?php
class main extends spController
{
	function index(){
		$arr1 = array("name"=>"John", "age"=>28);
		$arr = array(1 => array("name" => "John", "age" => 28), array("name" => "Barbara", "age" => 67));
		$arr2["name"] = "John";
		$arr2["age"] = 28;
		if ($arr1 == $arr2){
			print '$arr1 == $arr2<br>';
			foreach($arr1 as $result){
				print " $result";
			}
		}
		foreach($arr as $key => $result){
			print "<br><$key>";
			foreach($result as $key => $tmp){
				print " $key: ($tmp)";
			}
		}
		$posturl = spUrl("main", "write");
		echo "<p align=center><h2>我的留言本</h2></p>";
		echo "<p>$MY_PHP_VERSION</p>";
		echo "<p>请写下您的留言：</p>
		<form action={$posturl} method=post>
			<p>您的名字：<input type=text name=name></p>
			<p>留言标题：<input type=text name=title></p>
			<p>留言内容：<textarea name=contents></textarea></p>
			<p><input type=submit value=提交></p>
		</form>";
		$guestbook = spClass("m_guestbook");
		if( $result = $guestbook->findAll()){
			foreach($result as $value){
				$contentsurl = spUrl("main", "show", array('id'=>$value['id']));
				echo "<p>第{$value['id']}条留言：<a href={$contentsurl} >{$value['title']}</a> {$value['name']}</p>";
			}
		}
	}

	function show(){
		$id = $this->spArgs("id");
		$guestbook = spClass("m_guestbook");
		$condition = array('id'=>$id);
		$result = $guestbook->find($condition);
		echo "<table border='1'>";
		echo "<tr><td>留言标题</td><td>{$result['title']}</td></tr>";
		echo "<tr><td>留言者</td><td>{$result['name']}</td></tr>";
		echo "<tr><td>留言内容</td><td>{$result['contents']}</td></tr>";
		echo "</table>";
		echo "<br><a href=/speedphp/index.php>返回</a>";
		echo "<h5>Enjoy, Speed of PHP!</h5>";
		echo "<a href='index.php?c=main&a=time'>当前时间</a>";
	}
	
	function write(){
		$guestbook = spClass("m_guestbook");

		$input = $this->spArgs();
		if ($input['name'] &&  $input['name'] && $input['contents']){
			echo "<br>name:{$input['name']}";
			echo "<br>title:{$input['title']}";
			echo "<br>contents:{$input['contents']}";
			$guestbook->create($input);
			echo "<br>留言成功。<a href=/speedphp/index.php>返回</a>";
		}else{
			echo "你输入的内容不完整！<a href=/speedphp/index.php>返回</a>";
		}
	}
	
	function time(){
		echo date("Y-m-d H:i:s");
	}
}