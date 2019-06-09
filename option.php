<?php
	session_start();
	if (@$_SESSION['signupBrige']) {
		echo "注册成功！ ";
	}
	if (@$_SESSION['login']) {
		echo "登录成功！";
	}
	if (@$_SESSION['logout']) {
		setcookie('userid','',time()-3600);
		setcookie('userpword','',time()-3600);
		setcookie('name','',time()-3600);
		session_destroy();
		echo "成功注销！";
	}

	$brige = " 
			<p>将在<span id='times'>3</span>秒后<a href='".$_SESSION['url']."'>跳转</a></p>
			<script type='text/javascript'>
				document.title='跳转中……';
				var int = setInterval(count,1000);
				var i = 2;
				function count() {
					document.getElementById('times').innerHTML = i;
					i--;
					if(i==0){
						clearInterval(int);
						setTimeout(function(){location.href='".$_SESSION['url']."';},1000);
				
					}
				}
			</script>";
	echo $brige;
	session_unset();
?>