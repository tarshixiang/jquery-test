$(function(){
				
	$('button').click(function(){
		
		var user = $("input[name=user]").val();
		var pass = $("input[name=pass]").val();
		var nick = $("input[name=nick]").val();	
		
		$.post('../php/register.php',{
			name : user,
			pwd : pass,
			nickname : nick

			},function(data){

				if(data && data.code==0 && user!=""){
					alert("注册成功");
					$("input[name=user]").val("");
					$("input[name=pass]").val("");
					$("input[name=nick]").val("");	

				}else{
					alert("注册失败");
				}
				
		},'json');
	
	});
	
	$('input[name=user]').blur(function(){
		var user = $("input[name='user']").val();
		$.get("../php/checkName.php",{name: user},function(data){
			if(data && data.code==0 && user!=""){							
				console.log(data.msg);
				
			}else{
				alert("用户名不能为空或者一样");
				$("input[name=user]").val("");
				
			}	
		
		},"json");
	});
});