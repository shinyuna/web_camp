<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>AngularJS</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> var jq = $.noConflict(); </script>
    <script src="./js/angular.min.js"></script>
    <style>
        .showh{display: none; position:absolute; top: 40%; left: 0; width: 100%; background-color: rgba(0,0,0,0.5);color: #fff; padding: 100px;}
    </style>
</head>
<body>
	<div class="container" ng-app="myApp" ng-controller="korea">
	    <h1>Korea</h1>
	    <form action="">
	        <input type="text" class="form-control" ng-model="sch" placeholder="영어도시명 검색...">
	    </form>
	    <table class="table" id="citylist">
	        <tr class="active">
	            <td>도시명</td>
	            <td>영문명</td>
	            <td>면적</td>
	            <td>인구</td>
	            <td>설명</td>
	        </tr>
	        <tr ng-repeat="city in cities" ng-if="city.name_en.toLowerCase().match(sch.toLowerCase())">
	            <td class="name">{{city.name_ko}}</td>
	            <td>{{city.name_en}}</td>
	            <td>{{city.area}}</td>
	            <td>{{city.population}}</td>
	            <td>
	            <div class="showh">{{city.info}}</div>
	            <button>보기</button>
	            </td>
	        </tr>
	    </table>
	</div>
	<script>
        jq("#citylist").on("click","button",function(){
           jq(this).siblings().fadeIn(); 
        });
        jq("#citylist").on("click",".showh",function(){
           jq(this).fadeOut(); 
        });
        var app = angular.module("myApp",[]);
        app.controller("korea",function($scope,$http){
            $http.get("korea.json").then(function(json){
                var allcity = json.data;
                $scope.cities = allcity.korea.city;   
            });
        });
       
    </script>
</body>
</html>