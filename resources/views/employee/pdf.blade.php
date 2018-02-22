<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
.resp-image { max-width: 100%; height: auto; } 
.noborder{ border:none; }
.headertekst{ text-align: center; }

table {
	table-layout: fixed;
	width: 100%;
	border-collapse: collapse;
	cellspacing: 0; 
	cellpadding: 0;
	border: 1px;
}

tr.noBorder td {
  border: 0;
}

thead th:nth-child(1) {
	width: 30%;
}

thead th:nth-child(2) {
	width: 20%;
}

thead th:nth-child(3) {
	width: 15%;
}

thead th:nth-child(4) {
	width: 35%;
}

th, td {
	padding: 2px;
}
</style>

</head>
<body>
	<h3><u>WELCOME TO COMMUNITY TAX!</u></h3>
	<table>
		<tr>
			<th><b>Full Name: {{ $employee->name }} </b></th>
			<th rowspan="4"> <img src="img/logo.png" class="resp-image"></th>
		</tr>

		<tr><th><b>Assignment: {{ $employee->location }} </b></th>
		</tr>

		<tr>
			<th><b>You Start On: {{ $employee->start_date }} </b></th>
		</tr>

		<tr>
			<th><b>Your new email: {{ $employee->email }} </b></th>
		</tr>
	</table>
	<table class="tg">
		<tr>
			@if($employee->did == '')
			<th colspan="2"><b>Your Direct Line is: N/A Your Extension is: {{ $employee->ext }} </b></th>
			@else
			<th colspan="2"><b>Your Direct Line is: {{ $employee->did }} Your Extension is: {{ $employee->ext }} </b></th> 
			@endif
		</tr>
	</table>

	<table border="1" width: 100% rules="cols">
		<tr>
			<th><h3><u>USERNAMES AND PASSWORDS</u></h3><b>(THIS INFORMATION IS CONFIDENTIAL)</b></th>
			<th><h2 class="headertekst">Domain: CTR</h2></th>
		</tr>

		<tr>
			<th><b><u>Network Account</u></b></th>
			<th><h2 class="headertekst"><u>Upon First Login use:</u></h2></th>
		</tr>

		<tr>
			<th><b>Username: anhernandez </b></th>
			<th><b>User: anhernandez</b></th>
		</tr>

		<tr>
			<th><b>Password: Ctaxit17! (Please note the upper case "C") </b></th>
			<th><b>Password: Ctaxit17!</b></th>
		</tr>
	</table>

	<table border="1" width: 100%>
		<tr>
			<th>khhkhkhkjhk</th>
			<th></th>
		</tr>

		<tr>
			<th><b><u>Network Account</u></b></th>
			<th>dsfgdfgdfgfdgfdgsfdgsdfgsdgsfgsdfgsdfgfdg</th>
		</tr>

		<tr>
			<th><b>Username: anhernandez </b></th>
			<th></th>
		</tr>

		<tr>
			<th><b>Password: Ctaxit17! (Please note the upper case "C") </b></th>
			<th></th>
		</tr>
	</table>
</body>
</html>