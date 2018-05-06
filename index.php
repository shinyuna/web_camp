<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>AngularJS</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
	<script src="./js/jquery-3.2.1.min.js"></script>
	<script src="./js/angular.min.js"></script>
	<style>
        #write-blog{display: none;}
        #view-write{margin-top: 10px;}
    </style>
</head>
<body>
	<div class="container" ng-app="myApp" ng-controller="blog" ng-init="addlist()">
		<h1>Blog</h1>
		<form>
			<input type="text" class="form-control" ng-model="sch" placeholder="제목 검색...">
		</form>
		<p><a href="#!" class="glyphicon glyphicon-pencil" id="view-write"></a></p>
        <div id="write-blog">
		    <form id="write-form">
		            <h1 id="form-title">글쓰기</h1>
		        <div class="form-group">
		              <input type="hidden" name="id" id="id" value="">
		              <input type="hidden" name="act" id="act" value="">
		              <input type="text" name="title" id="title" class="form-control" placeholder="제목입력">
		        </div>
		        <div class="form-group">
		            <input type="text" name="writer" id="writer" class="form-control" placeholder="이름입력">
		        </div>
		        <div class="form-group">
		                    <textarea name ="content" id="content" class="form-control" placeholder="내용입력"  rows="5"></textarea>
		        </div>
		        <button type="submit" class="btn-submit btn btn-success"><span class="glyphicon glyphicon-pencil"></span>글등록</button>
		        <p>&nbsp;</p>
		    </form>
		</div>
		<table class="table" id="bloglist">
			<tr class="active">
				<td>ID</td>
				<td>TITLE</td>
				<td>WRITER</td>
				<td>DATE</td>
				<td>수정</td>
				<td></td>
			</tr>
			<tr ng-repeat="post in posts" ng-if="post.title.toLowerCase().match(sch.toLowerCase())">
				<td>{{ post.id }}</td>
				<td>{{ post.title }}</td>
				<td>{{ post.content }}</td>
				<td>{{ post.writer }}</td>
				<td>{{ post.wdate }}</td>
				<td nowrap>
				    <a href="{{post.id}}" class="edit-blog btn btn-warning btn-xs">EDIT</a>
				    <a href="{{post.id}}" class="del-blog btn btn-danger btn-xs">DELETE</a>
				</td>
			</tr>
		</table>
		<button ng-click="addlist()" id="more_btn" class="btn-more btn btn-primary btn-lg col-md-12" ng-click="clicked()">더보기</button>
	</div>
	<script>
        /*angularJS*/
		var page = 1;
		var app = angular.module("myApp",[]);
		app.controller("blog",function($scope,$http){
			$scope.posts = [];
			$scope.addlist = function(){
				$http.get("list.php?page=" + page).then(function(json){
					//$scope.posts = json.data;
                     if(! json.data.length){
                        alert("여기가 끝");
                        return;
                    }
					for( var i=0; i<json.data.length; i++){
						$scope.posts.push(json.data[i]);
					}
					page++;
                     
				});
            }
			
		});
        
        /*Infinity scroll*/
        $(function(){
            window.onscroll = function(){
                if(($(window).scrollTop() + $(window).height()) >= $(document).height()){
                    $('#more_btn').click();
                }
            }
        });
        
        /*db*/
        
        $("#view-write").on("click",function(){
            $("#title").val("");
            $("writer").val("");
            $("#content").val("");
            $("#act").val("add");
            $("#id").val("");
            $("#form-title").text("새 글 쓰기");
            $(".btn-submit").text("글 등록");
            $("#write-blog").slideDown();
        });

    $("#write-form").on("submit",function(e){
			e.preventDefault();
			var data = {};
			data.act = $("#act").val();
			data.id = $("#id").val();
			data.title = $("#title").val();
			data.writer = $("#writer").val();
			data.content = $("#content").val();
			if( ! data.title || ! data.writer || ! data.content ) return;
			if( data.act === "update" && ! data.id ) return;
			$.post("write.php", data, function(res){
				location.reload();
				console.log(res);
			});
		});

		$("table").on("click",".edit-blog",function(e){
			e.preventDefault();
			var id = $(this).attr("href");
			if( ! id ) return;
			$("#write-blog").hide();
			$.getJSON("read.php?id=" + id, function(data){
				if(data){
					$("#title").val(data.title);
					$("#writer").val(data.writer);
					$("#content").val(data.content);
					$("#act").val("update");
					$("#id").val(id);
					$("#form-title").text("글수정하기");
					$(".btn-submit").text("글수정");
					$("#write-blog").slideDown();
					location.href="#write-blog";
				}
			});
		});

		$("table").on("click",".del-blog",function(e){
			e.preventDefault();
			var id = $(this).attr("href");
			if( ! id ) return;
			$("#write-blog").hide();
			var del = confirm("정말 삭제할까요?");
			if( ! del ) return;
			var data = {};
			data.id = id;
			data.act = "delete";
			$.post("write.php", data, function(res){
				console.log(res);
				location.reload();
			});

		});
	</script>
</body>
</html>