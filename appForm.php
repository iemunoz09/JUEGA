<!DOCTYPE html>
<html lang="en">
	<head>
		<title>¡JUEGA! - Roster</title>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<link rel="stylesheet" type="text/css" href="appBG.css">
		<link rel="stylesheet" type="text/css" href="normalize.css">

		<!-- DataTables CSS -->
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
		
		<script type="text/javascript" charset="utf8" src="magic.js"></script>
		 	
	</head>

	<body>	
		<header>
			<h1>¡JUEGA!</h1>
			<h2>GameTime</h2>
			<h3>Roster</h3>
		</header>

		<button id="addPlayerButton" class="btn btn-outline-info btn-sm"><b>Add Player</b></button>

		<div id="newPlayerBox" class="newPlayerMenu">
			<span class="helper"></span>
			<div id="formContainer" class="align-content-center formStyle">

				<form class="form-playerInfo" id="pForm" name="pForm" method="post" action=" ">
					
					<h2>New Player</h2>
					
					<div id="requiredFormInput" class="reqDiv tab">
						
						<div class="form-label-group">
							<div style="margin: auto;">
								<label for="firstName">First Name</label>
								<input type="name" name="firstName" class="form-control" placeholder="First Name" required autofocus>
							</div>
							<div style="margin: auto;">
								<label for="lastName">Last Name</label>
								<input type="name" name="lastName" class="form-control" placeholder="Last Name" required >
							</div>
						</div>

						<div class="form-label-group">
							<label for="dob">DOB</label>
							<input type="date" class="form-control"  width="80%" id="dob" name="dob" required>
						</div>
						
						<div class="form-label-group">
							<label for="phoneNumber">Ph. #</label>
							<input type="tel" id="phNum" name="phoneNumber" class="form-control" placeholder="Phone Number" required >
						</div>

						<div class="form-label-group">
							<label for="playerID">Player ID</label>
							<input type="number" name="playerID" class="form-control" placeholder="Player ID">
						</div>

						<div class="form-label-group">
							<label for="prefComm">Preferred Communication</label>
							<select class="form-control" id="prefComm" name="prefComm" required>
								<option value="" selected disabled>Select Preference</option>
								<option value="call">Call</option>
								<option value="text">Text</option>
								<option value="email">Email</option>
							</select>
						</div>
						
						<div class="form-label-group">
							<label for="inputEmail">Email address</label>
							<input type="email" name="inputEmail" class="form-control" placeholder="Email Address" required >
						</div>
							
						<div class="form-label-group">
							<label for="prefLang">Preferred Language</label>
							<select class="form-control" id="prefLang" name="prefLang">
								<option value="" selected disabled>Preferred Language</option>
								<option value="eng">English</option>
								<option value="spa">Spanish</option>
							</select>
						</div>
					</div>

					<div id="optionalFormInput" class="my-3 tab">				
						<div class="" id="optDiv">
							<div class="form-label-group mt-4">
								<label for="nickName">Nickname</label>
								<input type="name" name="nickName" class="form-control" placeholder="Nickname">
							</div>

							<div class="form-label-group">
								<label for="altPhNum">Alt Ph. #</label>
								<input type="tel" id="altPhoneNum" name="altPhNum" class="form-control" placeholder="Alternate Phone Number">
							</div>	
					  
							<div class="form-label-group">
								<div>
									<label for="jerseyNumber">Jersey Number</label>
									<input type="number" name="jerseyNumber" class="form-control form-sm" placeholder="##" maxlength="2">
								</div>
								<div>
									<label for="uniformSize">Uniform Size</label>
									<input type="text" name="uniformSize" class="form-control form-sm" placeholder="Size" maxlength="3" >
								</div>
							</div>
						  
							<div class="form-group">
								<label for="position1">Select Your Primary Position(s)</label>
								<select class="form-control" id="primaryPosition" name="position1">
									<option value="">U - Unsure</option>
									<option value="G">G - Goalie</option>
									<option value="D">D - Defense(Any)</option>
									<option value="M">M - Midfield(Any)</option>
									<option value="F">F - Forward(Any)</option>
									<option value="LB">LB - Left Back</option>
									<option value="CB">CB - Center Back</option>
									<option value="RB">RB - Right Back</option>
									<option value="LM">LM - Left Middle</option>
									<option value="CM">CM - Center Middle</option>
									<option value="RM">RM - Right Middle</option>
									<option value="LF">LF - Left Forward</option>
									<option value="CF">CF - Center Forward</option>
									<option value="RF">RF - Right Forward</option>
								</select>
							</div>

							<div class="form-group" >
								<label for="position2">Select Your Secondary Position(s)</label>
								<select class="form-control" id="secondaryPosition" name="position2" disabled>
									<option value="" selected>U - Unsure</option>
									<option value="G">G - Goalie</option>
									<option value="D">D - Defense(Any)</option>
									<option value="M">M - Midfield(Any)</option>
									<option value="F">F - Forward(Any)</option>
									<option value="LB">LB - Left Back</option>
									<option value="CB">CB - Center Back</option>
									<option value="RB">RB - Right Back</option>
									<option value="LM">LM - Left Middle</option>
									<option value="CM">CM - Center Middle</option>
									<option value="RM">RM - Right Middle</option>
									<option value="LF">LF - Left Forward</option>
									<option value="CF">CF - Center Forward</option>
									<option value="RF">RF - Right Forward</option>
								</select>
							</div>
							
							<div class="form-group">
								<label for="commentsBox">Comments</label>
								<textarea class="form-control" id="commentsBox" name="commentsBox" rows="2"></textarea>
							</div>
						</div>
					</div>
					
					  <div style="overflow:auto;">
						<div>
						  <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
						  <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
						</div>
					  </div>
					  <!-- Circles which indicates the steps of the form: -->
					  <div style="text-align:center;margin-top:40px;">
						<span class="step"></span>
						<span class="step"></span>
					  </div>
									
					<div class="">
						<button class="btn btn-lg btn-primary" type="submit">Save</button>
						<button class="btn btn-lg btn-danger" type="reset">Clear</button>
					</div>
					
				</form>
			
		</div>
		</div>
		</div>
		
		<div id="tableContainer" class="align-content-center">
			<div class="loadPlayersDiv" label="Roster">	
				<table id="loadPlayers" class="display nowrap">
					<thead>
						<tr>
							<th>#</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>DOB</th>
							<th>Phone<br>Number</th>
							<th>PlayerID</th>
							<th>Preferred<br>Communication</th>
							<th>Email</th>
							<th>Preferred<br>Language</th>
							<th>Nickname</th>
							<th>Alternate<br>Phone Number</th>
							<th>Uniform<br>Size</th>
							<th>Primary<br>Position</th>
							<th>Secondary<br>Position</th>
							<th>Comments</th>
						</tr>
					</thead>
					<tfoot>
					
					</tfoot>
				</table>
									
			</div>					
		</div>

		
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<!-- DataTables -->
		<script type="text/javascript" charset="utf8" src="jquery.dataTables.min.js"></script>
		<script src="dataTables.fixedHeader.min.js"></script>
		<script src="fixedColumns.bootstrap4.js"></script>
		
		<script src="datetime-moment.js"></script>	
		<script src="moment.min.js"></script>
		<script src="jquery.inputmask.min.js"></script>

	
		<footer>
		<p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>
		</footer>

	</body>
</html>