<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
	.tg  {border-collapse:collapse;border-spacing:0;}
	.tg td{font-family:Arial, sans-serif;font-size:10px;padding-left: 2px; border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
	.tg th{font-family:Arial, sans-serif;font-size:10px;font-weight:normal;padding-left: 2px; border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
	.tg .tg-yw4l{vertical-align:top}
	.resp-image { position: absolute; right: 0px; width: 300px; padding: 1px; } 
  .noborder{ border:none; }
  .headerCenter{ text-align: center; font-family:Arial, sans-serif;font-size:10px; font-weight: bold; }
  .headertop{ text-align: center; }
  .content > div > span{
    display:inline-block;
    width:20%; /* or choose some other value */
  }

  table {
    table-layout: fixed;
    width: 100%;
    border-collapse: collapse;
    border: 1px;
    font-family:Arial, sans-serif;font-size:10px;
  }

</style>

</head>
<body>
	<h3><u>WELCOME TO COMMUNITY TAX!</u></h3>
	<table cellpadding="5">
		<tr>
			<th><b>Full Name: {{ $employee->name }} </b></th>
			<th rowspan="2"> <img src="img/logo.png" class="resp-image"></th>
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
          <b><u>USERNAMES AND PASSWORDS</u></b><br/>
          <b>(THIS INFORMATION IS CONFIDENTIAL)</b><br/><br/>
          <b><u>Network Account</u><b/><br/>
            <b>Username: {{ $employee->network_account }} <b/><br/>
              <b>Password: {{ $employee->accounts->where('employee_id', $employee->id)->where('type_account', 'Personal Account')->first()->password }} <b/><br/>
              </td>
              <td class="headerCenter">Domain: CTR</b></td>
            </tr>
            <tr>
             <td class="headerCenter"><b><u>Upon First Login use:</u></b></td>
           </tr>
           <tr style="border-bottom: 5px solid #FCFCBC;">
             <td> <b> Username: {{ $employee->network_account }} <br/> 
              Password: {{ $employee->accounts->where('employee_id', $employee->id)->where('type_account', 'Personal Account')->first()->password }}  </b> </td>
            </tr>
          </tbody>
        </table>

        <br/>

        <table cellpadding="-2" style="border:1px black solid; border-top: none; border-left: none; font-family:Arial, sans-serif;font-size:10px;">
          <tbody style="border-top:none; border-left: none;">
            <tr>
              <td style="width: 20%; padding-left: 5px;"><b>IRS Logics (CRM)</b></td>
              <td style="width: 50%; padding-left: 5px;"><a href="#">http://ctrtaxtool.com</a></td>
              <td style="border:1px black solid; width: 30%; padding-left: 5px;" rowspan="3" ><p class="headertop">Logics is our Customer Relationship Manager(CRM) software</p></td>
            </tr>
            <tr>
              <td style="width: 20%; padding-left: 5px;"><b>Username:</b></td>
              <td style="width: 30%; padding-left: 5px;"><b>{{ $employee->email }}</b></td>
            </tr>
            <tr>
              <td style="width: 20%; padding-left: 5px;"><b>Password:</b></td>
              <td style="width: 30%; padding-left: 5px;"><b>This password is same as network password</b></td>
            </tr>
          </tbody>
        </table>

        <br/>

        <table cellpadding="-2" style="border:1px black solid; border-top: none; border-left: none; font-family:Arial, sans-serif;font-size:10px;">
          <tbody style="border-top:none; border-left: none;">
            <tr>
              <td style="width: 20%; padding-left: 5px;" colspan="2">Outlook (EMAIL)</td>
              <td style="border:1px black solid; width: 30%; padding-left: 5px;" rowspan="4"><p class="headertop">Access WebMail using web page on the left</p></td>
            </tr>
            <tr>
              <td style="width: 12.3107%; height: 21px; padding-left: 5px;">Log into WebMail:</td>
              <td style="width: 50%; height: 21px; padding-left: 5px;">https:mail.ctrasasaa.com</td>
            </tr>
            <tr>
              <td style="width: 20%; height: 23px; padding-left: 5px;">Login:</td>
              <td style="width: 30%; height: 23px; padding-left: 5px;">anhernandez</td>
            </tr>
            <tr>
              <td style="width: 20%; height: 23px; padding-left: 5px;">Password:</td>
              <td style="width: 30%; height: 23px; padding-left: 5px;">Ctaxit17!</td>
            </tr>
          </tbody>
        </table>

        <br/>

        <table cellpadding="-2" style="border:1px black solid; border-top: none; border-left: none; font-family:Arial, sans-serif;font-size:10px;">
          <tbody style="border-top:none; border-left: none;">
            <tr>
              <td style="width: 20%; padding-left: 5px;" colspan="2">Spark (CHAT) Configuration</td>
              <td style="border:1px black solid; width: 30%; padding-left: 5px;" rowspan="4"><p class="headertop">Note: Spark is our chat program. Please edit your profile in Spark to reflect your info.</p></td>
            </tr>
            <tr>
              <td style="width: 12.3107%; height: 21px; padding-left: 5px;">Username:</td>
              <td style="width: 50%; height: 21px; padding-left: 5px;">xxxx</td>
            </tr>
            <tr>
              <td style="width: 20%; height: 23px; padding-left: 5px;">Password::</td>
              <td style="width: 30%; height: 23px; padding-left: 5px;">Ctaxit17!</td>
            </tr>
            <tr>
              <td style="width: 20%; height: 23px; padding-left: 5px;">Server:</td>
              <td style="width: 30%; height: 23px; padding-left: 5px;">192.168.2.43</td>
            </tr>
          </tbody>
        </table>

        <br/>

        <table cellpadding="-2" style="border:1px black solid; border-top: none; border-left: none; font-family:Arial, sans-serif;font-size:10px;">
          <tbody style="border-top:none; border-left: none;">
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;">Hylafax Pro (FAX)</td>
              <td style="width: 50%; padding-left: 5px; height: 23px;">http://faxes.ctaxrelief.com</td>
              <td style="border:1px black solid; width: 30%; padding-left: 5px;" rowspan="3"><p class="headertop">Hylafax Pro is our inbound/outbound fax software</p></td>
            </tr>
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;">Username:</td>
              <td style="width: 30%; padding-left: 5px; height: 23px;">anhernandez</td>
            </tr>
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;">Password:</td>
              <td style="width: 30%; padding-left: 5px; height: 23px;">Ctaxit17!</td>
            </tr>
          </tbody>
        </table>

        <br/>

        <table cellpadding="-2" style="border:1px black solid; border-top: none; border-left: none; font-family:Arial, sans-serif;font-size:10px;">
          <tbody style="border-top:none; border-left: none;">
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;">Hylafax Pro (FAX)</td>
              <td style="width: 50%; padding-left: 5px; height: 23px;">http://faxes.ctaxrelief.com</td>
              <td style="border:1px black solid; width: 30%; padding-left: 5px;" rowspan="3"><p class="headertop">Zendesk is our help desk website</p></td>
            </tr>
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;">Username:</td>
              <td style="width: 30%; padding-left: 5px; height: 23px;">anhernandez</td>
            </tr>
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;"></td>
              <td style="width: 30%; padding-left: 5px; height: 23px;">Ctaxit17!</td>
            </tr>
          </tbody>
        </table>

        <br/>

        <table cellpadding="-2" style="border:1px black solid; border-top: none; border-left: none; font-family:Arial, sans-serif;font-size:10px;">
          <tbody style="border-top:none; border-left: none;">
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;">Hylafax Pro (FAX)</td>
              <td style="width: 50%; padding-left: 5px; height: 23px;">http://faxes.ctaxrelief.com</td>
              <td style="border:1px black solid; width: 30%; padding-left: 5px;" rowspan="3"><p class="headertop">Phone System logon is only needed if joining a queue</p></td>
            </tr>
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;">Username:</td>
              <td style="width: 30%; padding-left: 5px; height: 23px;">anhernandez</td>
            </tr>
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;">Password:</td>
              <td style="width: 30%; padding-left: 5px; height: 23px;">Ctaxit17!</td>
            </tr>
          </tbody>
        </table>

        <br/>

        <table cellpadding="-2" style="border:1px black solid; border-top: none; border-left: none; font-family:Arial, sans-serif;font-size:10px;">
          <tbody style="border-top:none; border-left: none;">
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;">Hylafax Pro (FAX)</td>
              <td style="width: 50%; padding-left: 5px; height: 23px;">http://faxes.ctaxrelief.com</td>
              <td style="border:1px black solid; width: 30%; padding-left: 5px;" rowspan="2"><p class="headertop">This is our time-clock website</p></td>
            </tr>
            <tr>
              <td style="width: 20%; padding-left: 5px; height: 23px;"></td>
              <td style="width: 30%; padding-left: 5px; height: 23px;">wwwwsdsdsdsdsdsdsdwwww</td>
            </tr>
          </tbody>
        </table>
      </body>
      </html>