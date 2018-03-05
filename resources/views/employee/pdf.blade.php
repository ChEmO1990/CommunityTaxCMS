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
    .headertop{ text-align: top; }
    .content > div > span{
      display:inline-block;
      width:20%; /* or choose some other value */
  }
  table {
      table-layout: fixed;
      width: 100%;
      border-collapse: collapse;
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

	<table class="tg">
		<tbody>
			<tr>
				<td rowspan="3" width="70%" valign="top">
                    <b margin: 25px 50px;><u>USERNAMES AND PASSWORDS</u></b><br/>
                    <b>(THIS INFORMATION IS CONFIDENTIAL)</b><br/><br/>
                    <b><u>Network Account</u><b/><br/>
                        <b>Username: {{ $employee->network_account }} <b/><br/>
                        <b>Password: {{ $employee->accounts->where('employee_id', $employee->id)->where('type_account', 'Personal Account')->get('password') }} <b/><br/>
                </td>
                <td>Domain: CTR</td>
            </tr>
            <tr>
               <td>Upon First Login use:</td>
           </tr>
           <tr>
               <td>Username: anhernandez <br/> Password: Ctaxit17!</td>
           </tr>
       </tbody>
   </table>
</body>
</html>