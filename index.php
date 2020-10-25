<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" />
  	<link rel="stylesheet" href="style.css">
	<title>Something Positive: Actual Goddamned Linear Time edition</title>
</head>	
<body>
	<div id="container">
		<div id="title"><h1>Something Theoretically Positive</h1></div>
		<div id="image" style="width: 100%;">
			<img id="comic" src="./comics/sp20011219.gif" width="100%" />
		</div>
		<div class="button-tray">
			<div id="first" class="buttons">first</div>
			<div id="back" class="buttons">back</div>
			<div id="next" class="buttons">next</div>
			<div id="current" class="buttons">current</div>
		</div>
	</div>
</body>
</html>


<script type="text/javascript">
	let first = document.getElementById('first');

	let back = document.getElementById('back');
	let next = document.getElementById('next');
	
	let current = document.getElementById('current');
	let resultDiv = document.getElementById('comic');

	resultDiv.src = getCookie("location");
 
	back.addEventListener('click', function() {

		getRequest('getPrevious.php',
  			function(response){
  				resultDiv.src = "./comics" + response;
  				setCookie("location",resultDiv.src,356);
  				scroll(0,0);
  			},
  			function(response){
  				logError(response,resultDiv);
  			},
  			"res="+resultDiv.src);
  		
	});

	next.addEventListener('click', function() {

		getRequest('getNext.php',
  			function(response){
  				resultDiv.src = "./comics" + response;
  				setCookie("location",resultDiv.src,356);
  				scroll(0,0);
  			},
  			function(response){
  				logError(response,resultDiv);
  			},
  			"res="+resultDiv.src);
  		
	});
	first.addEventListener('click', function() {

		getRequest('getFirst.php',
  			function(response){
  				resultDiv.src = "./comics"+response;
  				setCookie("location",resultDiv.src,356);
  				scroll(0,0);
  			},
  			function(response){
  				logError(response,resultDiv);
  			},
  			null);
  		
	});

	current.addEventListener('click', function() {

		getRequest('getCurrent.php',
  			function(response){
				//console.log(response);
				resultDiv.src = "./comics"+response;
				setCookie("location",resultDiv.src,356);
				scroll(0,0);
  			},
  			function(response){
  				logError(response,resultDiv);
  			},
  			null);
  		
	});

	function logError(response, targetDiv)
	{
		console.log('An error occurred during your request: ' +  response.status + ' ' + response.statusText);
	}

// helper function for cross-browser request object
	function getRequest(url, success, error, params) {
	    let req = false;
	    try{
	        // most browsers
	        req = new XMLHttpRequest();
	    } catch (e){
	        // IE
	        try{
	            req = new ActiveXObject("Msxml2.XMLHTTP");
	        } catch(e) {
	            // try an older version
	            try{
	                req = new ActiveXObject("Microsoft.XMLHTTP");
	            } catch(e) {
	                return false;
	            }
	        }
	    }
	    if (!req) return false;
	    if (typeof success != 'function') success = function () {};
	    if (typeof error!= 'function') error = function () {};



	    if(params != null){

	        req.open("GET", url+"?"+params, true);
	        req.setRequestHeader('Cache-Control', 'no-cache');

	    }else {
	        req.open("GET", url, true);
	    	req.setRequestHeader('Cache-Control', 'no-cache');
	    }


	    req.onreadystatechange = function(){
	        if(req.readyState == 4) {
	            return req.status === 200 ?
	                success(req.responseText) : error(req.status);
	        }
	    };


	    req.send(null);
	    return req;
	}

	function getCookie(name) {
	    var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
	    return v ? v[2] : null;
	}

	function setCookie(name, value, days) {
	    var d = new Date;
	    d.setTime(d.getTime() + 24*60*60*1000*days);
	    document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
	}

	function deleteCookie(name) { setCookie(name, '', -1); }
</script>