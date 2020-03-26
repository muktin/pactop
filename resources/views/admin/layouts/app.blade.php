<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.layouts.head')
</head>
<body>
	 <!-- <div class="loader"></div> -->
		<div id="app">
			<div class="main-wrapper main-wrapper-1">
			@include('admin.layouts.header')
			@include('admin.layouts.sidebar')
   			 <div class="main-content">
				@section('main-content')

				@show
			 </div>
			@include('admin.layouts.footer')
</body>
</html>