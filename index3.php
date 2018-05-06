<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>AngularJS</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/angular.min.js"></script>
	<script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div class="container" ng-app="myApp" ng-controller="blog">
		<h1>NEWS</h1>
		
		    <input type="text" class="form-control" ng-model="sch" ng-keyup="getnews()" placeholder="뉴스검색..." ng-keyup="search($event.target.value)" ng-keydown="if(event.keyCode == 13) return false;">
	
		<table class="table">
			<tr class="active">
				<td>구분</td>
				<td>제목</td>
				<td>언론사</td>
				<td>날짜</td>
			</tr>
			<tr ng-repeat="post in posts">
				<td>{{post.category[0]}}</td>
				<td><a href="{{ post.link[0] }}" target="_blank">{{post.title[0]}}</a></td>
				<td>{{post.author[0]}}</td>
				<td>{{post.pubDate[0]}}</td>
			</tr>
		</table>
	</div>
	<script>
		var app = angular.module('myApp',[]);
		app.controller("blog",function($scope,$http){
            $scope.search = function(key){
                $http.get("naver.php?sch=" + $scope.sch ).then(function(json){
					$scope.posts = json.data;
            })
            }
                                                               
            $scope.getnews = function(){
                $http.get("naver.php?sch=" + $scope.sch ).then(function(json){
					$scope.posts = json.data;
				});
            }
            
		});
	</script>
</body>
</html>