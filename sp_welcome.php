<?php
include('sp_session.php');
?>
<html lang="en">
	 
	 <head>
			<meta charset="utf-8" description="designing a Welcome page" >
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				<title>Welcome to Desi Books</title>
				<style>
					 body{
								 background-image: url("bg.jpg");
								}
					 #prof {
																		 width: 19%;
																		 background-color: blue;
																		 color: white;
																		 padding: 14px 	0px;

																		 margin: 8px 0;
																		 border: 3px solid;
																		 border-radius: 4px;
																		 cursor: pointer;
															 }
					 #prof1 {
																		 width: 19%;
																		 background-color: blue;
																		 color: white;
																		 padding: 14px 	0px;

																		 margin: 8px 0;
																		 border: 3px solid;
																		 border-radius: 4px;
																		 cursor: pointer;
															 }
						#prof2 {
																		 width: 19%;
																		 background-color: blue;
																		 color: white;
																		 padding: 14px 	0px;

																		 margin: 8px 0;
																		 border: 3px solid;
																		 border-radius: 4px;
																		 cursor: pointer;
															 }                     
						#bu {
										 padding-left: 180px;
										 padding-right: 50px;
												
								}      
						#lu {
									 
										 padding-right: 50px;
												
								}
								#po {
									padding-top: 20px;
									padding-right: 50px;
								}

				</style>

						 <script>
								 $(document).ready(function(){
								 
                 $('#prof').click(function(){
								$('#po').load('sp_profile.php');
																					 }
																					 );
               });
								 $(document).ready(function(){
                 $('#prof1').click(function(){
                                            
                                            window.location.href = 'sp_book.php';
                                           }
               );

								});
								 $(document).ready(function(){
                 $('#prof2').click(function(){
                                            window.location.href = 'mybooks.html';
                                           }
               );

								});	 
							</script>
	 </head>
	 
	 <body>
			<h2 style="text-align: right;";><a href = "sp_logout.php">Sign Out</a></h2>   	
			<h1 style="text-align: center; color: rgb(200,10,70); font-style: bold; font-size: 30px;">Welcome to your Desi Books Profile Page <?php echo $login_session; ?></h1>
			<span id="bu"> 
			<button id="prof">MY PROFILE</button>
			</span>
			<span id="lu">
			<button id="prof1">MY BOOKS</button>
			</span>
			<button id="prof2">SEARCH BOOKS</button>
				
						<div id="po">
	
						
						</div>   
		 
	 </body>

	 
</html>