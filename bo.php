<?php
//Google book search api - https://code.google.com/apis/books/docs/v1/getting_started.html
//http://code.google.com/apis/books/docs/v1/using.html#query-params
//base URL - https://www.googleapis.com/books/v1/volumes?
//check for empty...
//if (strlen($item->mpaa_rating) < 2) { $rating = 'No rating available.'; } else { $rating = $item->mpaa_rating; }

//assign value for title of page
$pageTitle = 'Search Books: Google Books Search API';
$subTitle = 'MSU Libraries';
//declare filename for additional stylesheet variable - default is "none"
$customCSS = 'master.css';
//create an array with filepaths for multiple page scripts - default is meta/scripts/global.js
$customScript[0] = './meta/scripts/global.js';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><?php echo($pageTitle); ?> : Montana State University Libraries</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="alternate" type="application/rss+xml" title="MSU Libraries: Tools" href="http://feeds.feedburner.com/msulibrarySpotlightTools" />
<style type="text/css" media="screen, projection, handheld">
<!--
<?php if ($customCSS != 'none') {
	echo '@import url("'.dirname($_SERVER['PHP_SELF']).'/meta/styles/'.$customCSS.'");'."\n";
}
?>
-->
</style>
<?php
if ($customScript) {
  $counted = count($customScript);
  for ($i = 0; $i < $counted; $i++) {
   echo '<script type="text/javascript" src="'.$customScript[$i].'"></script>'."\n";
  }
}
?>
</head>
<body class="<?php if(!isset($_GET['view'])) { echo 'default'; } else { echo $_GET['view']; } ?>">
<h1><?php echo $pageTitle; ?><span>: <?php echo $subTitle; ?></span><small>(Querying Google Books)</small></h1>
<div class="container">
    <ul id="tabs">
        <li id="tab1"><a href="./index.php">Demo App</a></li>
        <li id="tab2"><a href="./what.php">What is this?</a></li>
        <li id="tab3"><a href="./code.php">View Code</a></li>
    </ul><!-- end tabs unordered list -->
	<div class="main">
	<?php
    //turn on full error reports for development purposes - should be turned off for production environment
    error_reporting(E_ALL);
    
    //set API version for Google Book Search API
    $v = isset($_GET['v']) ? $_GET['v'] : '1';
    //set user API key for Google Book Search API
    $key = isset($_GET['key']) ? $_GET['key'] : 'ADD-YOUR-GOOGLE-BOOKS-API-KEY-HERE';
    //set user IP for Google Book Search API
    $ip = isset($_GET['ip']) ? $_GET['ip'] : $_SERVER['REMOTE_ADDR'];
    //set default value for query to Google Book Search API
    $query = isset($_GET['q']) ? $_GET['q'] : '0307387941';
    //set default value for search type to Google Book Search API
    $type = isset($_GET['type']) ? $_GET['type'] : 'all';
    //check and assign page of search results - are we on the first page?
	$start = isset($_GET['start']) ? $_GET['start'] : 1;
    //set default value for number of results
    $limit = isset($_GET['limit']) ? $_GET['limit'] : '10';
 
    switch ($type) {
        
        case 'all':
			$params = 'q='.urlencode($query).'&startIndex='.$start.'&maxResults='.$limit;
        break;
        
        case 'isbn':
			$params = 'q=isbn:'.urlencode($query).'';
        break;
        
        case 'lccn':
			$params ='q=lccn:'.urlencode($query).'';
        break;
        
        case 'oclc':
			$params = 'q=oclc:'.urlencode($query).'';
        break;
        
        default:
            echo '<p>You must specify a search type such as "all" or "book". Check the url to make sure "type=" has a value.</p>';
            exit;
    }
    
	
	if(isset($_GET['q'])): 
    //if Google Books Search API has been queried using the form
    
    echo '<p class="control"><a class="refresh" href="'.basename(__FILE__).'">Try another search?</a></p>'."\n";
    
    //set URL for the Google Book Search API
    $url = 'https://www.googleapis.com/books/v'.$v.'/volumes?key='.$key.'&userIp='.$ip.'&'.$params.''; 
	
    //build request and send to Google Ajax Search API
    $request = file_get_contents($url);
    
    //decode json object(s) out of response from Google Ajax Search API
    $data = json_decode($request,true);
	
	$totalItems = $data['totalItems']; 

	//make sure some results were returned, show results as html with result numbering and pagination
	if ($totalItems > 0) {
		?>
		<h2 class="mainHeading">Results of your Google Books &quot;<?php echo $type; ?>&quot; search for &quot;<?php echo @$_GET['q']; ?>&quot; (About <?php echo $totalItems; ?> matches)</h2>	
		<ul>
		<?php foreach ($data['items'] as $item) { ?>
			<li>
				<p><a href="<?php echo rawurldecode($item['volumeInfo']['canonicalVolumeLink']); ?>"><?php echo $item['volumeInfo']['title']; ?></a></p>
				<p>
					<img src="<?php echo rawurldecode($item['volumeInfo']['imageLinks']['smallThumbnail']); ?>" /><br />
					<?php //echo $item['volumeInfo']['description']; ?>
					author: <?php echo $item['volumeInfo']['authors'][0]; ?><br />
					published: <?php echo $item['volumeInfo']['publishedDate']; ?><br />
					page(s): <?php echo $item['volumeInfo']['pageCount']; ?><br />
					publisher: <?php echo $item['volumeInfo']['publisher']; ?><br />
					type: <?php echo strtolower($item['volumeInfo']['printType']).', '.strtolower($item['volumeInfo']['categories'][0]); ?><br />
					id: <?php echo $item['volumeInfo']['industryIdentifiers'][0]['identifier']; ?><br />
					<a class="expand" href="<?php echo rawurldecode($item['accessInfo']['webReaderLink']); ?>">preview</a><br />
				</p>
			</li>
		<?php } ?>
		</ul>
		<?php if ($start == 1) { 
		$next = $start + 10;
		?>
		<ul class="pages">
			<li>
			<a href="<?php echo basename(__FILE__); ?>?q=<?php echo urlencode($_GET['q']); ?>&amp;type=<?php echo $type; ?>&amp;start=<?php echo $next; ?>">next</a>
			</li>
		</ul>
		<?php } elseif ($start > 1) { 
		$next = $start + 10;
		$previous = $start - 10;
		?>
		<ul class="pages">
			<li>
			<a href="<?php echo basename(__FILE__); ?>?q=<?php echo urlencode($_GET['q']); ?>&amp;type=<?php echo $type; ?>&amp;start=<?php echo $previous; ?>">previous</a>
			<a href="<?php echo basename(__FILE__); ?>?q=<?php echo urlencode($_GET['q']); ?>&amp;type=<?php echo $type; ?>&amp;start=<?php echo $next; ?>">next</a>
			</li>
		</ul>
		<?php } elseif ($start >= $totalItems) { 
		$previous = $start - 10;
		?>
		<ul class="pages">
			<li>
			<a href="<?php echo basename(__FILE__); ?>?q=<?php echo urlencode($_GET['q']); ?>&amp;type=<?php echo $type; ?>&amp;start=<?php echo $previous; ?>">previous</a>
			</li>
		</ul>
		<?php } else { ?>
		no more results
		<?php }
	}
	else {
		?>
			<p><strong>Sorry, there were no results</strong></p>
		<?php
	}
	
    //for testing purposes show actual request to API - REMOVE when finished
    //$apiRequest = $url;
    //echo '<p>API request: '.$apiRequest.'</p>';
    ?>
    
    <?php
    else: //show form and allow the user to check for Google Book search results
    ?>
    
    <form id="searchForm" name="searchForm" action="<?php echo basename(__FILE__); ?>" method="get">
        <fieldset id="searchBox">
            <label>Find:</label>
            <input class="text" id="q" name="q" type="text" value="keyword or id" onfocus="this.value=''; this.onfocus=null;" />
            <select id="type" name="type" size="1">
                <option selected value="all">All Books</option>
                <option value="isbn">Books by ISBN</option>
                <option value="lccn">Books by LCCN #</option>
                <option value="oclc">Books by OCLC #</option>                
            </select>
            <input class="submit" id="submit" name="submit" type="submit" value="find"  />
        </fieldset>
    </form>
    
    <?php
    //end submit isset if statement on line 73
    endif;
    ?>
	</div><!-- end div main -->
</div><!-- end container div -->
</body>
</html>