<?php

use App\Models\Sms\SmsNumber;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'Home\HomeController@index');
Route::resource('dashboard', 'Dashboard\DashboardController');
Route::resource('sms', 'Sms\SmsNumberController');
Route::resource('employees', 'Employee\EmployeeController');
Route::get('employees/download/{id}', 'Download\DownloadController@downloadPDF')->middleware('auth');
Route::get('employees/termination/{id}', 'Employee\EmployeeController@termination')->middleware('auth');


Route::get('/seed/db', function () {
	$json = '[
  {
    "SMSNumber": "3122198093",
    "Name": "Stevie Bestecki",
    "Column1": ""
  },
  {
    "SMSNumber": "3122198534",
    "Name": "Open",
    "Column1": ""
  },
  {
    "SMSNumber": "3122199240",
    "Name": "Sol Rosa",
    "Column1": ""
  },
  {
    "SMSNumber": "3122199269",
    "Name": "Diana Chavez",
    "Column1": ""
  },
  {
    "SMSNumber": "3122199279",
    "Name": "Rosario Toscano",
    "Column1": ""
  },
  {
    "SMSNumber": "3122199427",
    "Name": "Cesar Del Moral",
    "Column1": ""
  },
  {
    "SMSNumber": "3122199445",
    "Name": "Konni Onugha",
    "Column1": ""
  },
  {
    "SMSNumber": "3122199456",
    "Name": "Norm Brumfield",
    "Column1": ""
  },
  {
    "SMSNumber": "3122290705",
    "Name": "Giselle Manzanero",
    "Column1": ""
  },
  {
    "SMSNumber": "3122340362",
    "Name": "Victor Gomez",
    "Column1": ""
  },
  {
    "SMSNumber": "3122573574",
    "Name": "Christian Perez",
    "Column1": ""
  },
  {
    "SMSNumber": "3122573589",
    "Name": "Marlene Tun",
    "Column1": ""
  },
  {
    "SMSNumber": "3122573924",
    "Name": "Ryan Zawadski",
    "Column1": ""
  },
  {
    "SMSNumber": "3122573942",
    "Name": "Shelsee Hernandez",
    "Column1": ""
  },
  {
    "SMSNumber": "3122573954",
    "Name": "Jose Alvarez",
    "Column1": ""
  },
  {
    "SMSNumber": "3122783837",
    "Name": "Oscar Hernandez",
    "Column1": ""
  },
  {
    "SMSNumber": "3122843248",
    "Name": "Raul Cardiel",
    "Column1": ""
  },
  {
    "SMSNumber": "3122290822",
    "Name": "Ashley",
    "Column1": ""
  },
  {
    "SMSNumber": "3123006589",
    "Name": "Matthew Chavez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123006895",
    "Name": "Jared Rogers",
    "Column1": ""
  },
  {
    "SMSNumber": "3123007265",
    "Name": "William Anderson",
    "Column1": ""
  },
  {
    "SMSNumber": "3123007453",
    "Name": "Arely Antunez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123130027",
    "Name": "Nathan Mcgoldrick",
    "Column1": ""
  },
  {
    "SMSNumber": "3123130238",
    "Name": "Joaquin Florez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131062",
    "Name": "Nathan Datema",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131443",
    "Name": "Evan Landman",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131519",
    "Name": "Lisette Guel",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131570",
    "Name": "Amna Abid",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131614",
    "Name": "Brian Baum",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131619",
    "Name": "Josue Lopez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131623",
    "Name": "Larry Corridon",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131625",
    "Name": "Shanna Marcus",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131626",
    "Name": "Brian Meadows",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131631",
    "Name": "Jason darst",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131633",
    "Name": "Erick Oloya",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131635",
    "Name": "Edward Wagner",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131639",
    "Name": "Eloisa Sabido",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131642",
    "Name": "Darwin Lopez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131645",
    "Name": "Alan Eley",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131646",
    "Name": "Alfredo Florez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131649",
    "Name": "Greg Gary",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131650",
    "Name": "Michael Gaylord",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131652",
    "Name": "Oswaldo Escalante",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131654",
    "Name": "Anthony Padilla",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131656",
    "Name": "Adriana Arroyo",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131658",
    "Name": "Sally Guzman",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131659",
    "Name": "Ryan Stegenga",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131661",
    "Name": "Nicholas Carrera",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131663",
    "Name": "Erik Sirk",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131665",
    "Name": "Diana Aguilera",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131667",
    "Name": "Josh Cuellar",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131669",
    "Name": "Daniel Sosa",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131670",
    "Name": "Miguel Ramirez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131673",
    "Name": "Michael Hoefke",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131675",
    "Name": "Gerardo Barron",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131676",
    "Name": "Derek Knorr",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131677",
    "Name": "Ruben Leiva",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131678",
    "Name": "Christopher Leludis",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131683",
    "Name": "Lauren Noel",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131684",
    "Name": "Laura Fernandez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131685",
    "Name": "Lourdes Miramontes",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131687",
    "Name": "John Albarran",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131688",
    "Name": "Ninnette Morales",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131689",
    "Name": "Jessie Seaman",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131690",
    "Name": "Theresa Daniel",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131691",
    "Name": "Ralph Maguigad",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131692",
    "Name": "Megan Parr",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131693",
    "Name": "Robert Craig",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131695",
    "Name": "Nicolo-Alessio Lentini",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131696",
    "Name": "Pps2",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131698",
    "Name": "Tyler Butt",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131699",
    "Name": "James Feliksik",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131700",
    "Name": "Michael Romero",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131702",
    "Name": "Tim Klepek",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131703",
    "Name": "Paul Rosario",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131705",
    "Name": "Maria Juarez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131706",
    "Name": "IGNACIO ORTEGA",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131707",
    "Name": "Bruce Silleg",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131709",
    "Name": "Maria Soto",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131710",
    "Name": "Jordan Snow",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131711",
    "Name": "Open",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131713",
    "Name": "Jorge Caballero",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131714",
    "Name": "Christine Gandia",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131715",
    "Name": "Stephanie Padilla",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131716",
    "Name": "Barsi Luna",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131717",
    "Name": "Meghan Whilock",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131718",
    "Name": "Caleb Rubio",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131719",
    "Name": "Ricardo Flores",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131721",
    "Name": "Denise Young",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131724",
    "Name": "Lisette Garciduenas",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131726",
    "Name": "Saul Lugo",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131727",
    "Name": "Rene Munoz",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131729",
    "Name": "Elisabel Medina",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131730",
    "Name": "Brad Blankley",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131731",
    "Name": "Zyanya Alejandra",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131732",
    "Name": "Jose Bailon",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131733",
    "Name": "David Mora",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131734",
    "Name": "Jiovanni Rivera",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131735",
    "Name": "Monika Hudak",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131736",
    "Name": "Robert Jakovich",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131740",
    "Name": "Dennis McKinney",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131741",
    "Name": "Bill Matney",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131742",
    "Name": "Stephany Cruz",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131744",
    "Name": "Jason Nofzinger",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131745",
    "Name": "Lee",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131746",
    "Name": "Paul",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131747",
    "Name": "Daniela Lopez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131749",
    "Name": "Angelica Berber",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131750",
    "Name": "Esther Shenberg",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131751",
    "Name": "Brenda Vargas",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131754",
    "Name": "Paul Gluck",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131755",
    "Name": "Edwin",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131758",
    "Name": "Lilly Kovacevic",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131759",
    "Name": "Nate",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131761",
    "Name": "Lesly Soberano",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131762",
    "Name": "Judith Redington",
    "Column1": ""
  },
  {
    "SMSNumber": "",
    "Name": "Josh",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131766",
    "Name": "Abraham Cab",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131768",
    "Name": "Angie Contreras",
    "Column1": ""
  },
  {
    "SMSNumber": "",
    "Name": "Joe",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131773",
    "Name": "Gabriela Melgoza",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131775",
    "Name": "Ernesto Mena",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131777",
    "Name": "Maggie Fuentes",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131778",
    "Name": "Daniela Mendoza",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131779",
    "Name": "Cesar Estrada",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131782",
    "Name": "Salvador Ortega",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131783",
    "Name": "Erika Lazcano",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131784",
    "Name": "Yolanda Murphy",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131787",
    "Name": "Michael Duhn",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131791",
    "Name": "Manuel Espinosa",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131793",
    "Name": "Miriam Gonzalez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131794",
    "Name": "Katherine Baxter",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131799",
    "Name": "Edwin Carde",
    "Column1": ""
  },
  {
    "SMSNumber": "3123132022",
    "Name": "Charlie Hernandez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123132074",
    "Name": "Pps3",
    "Column1": ""
  },
  {
    "SMSNumber": "3123132863",
    "Name": "GEOVANNY DE DIOS",
    "Column1": ""
  },
  {
    "SMSNumber": "3123132901",
    "Name": "Kristan Venlos",
    "Column1": ""
  },
  {
    "SMSNumber": "3123135839",
    "Name": "Jennifer Brugh",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136048",
    "Name": "Jose Fuentes",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136166",
    "Name": "Maria Luna",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136370",
    "Name": "Nicolas Bachman",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136574",
    "Name": "HECTOR Giona",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136651",
    "Name": "Rex Hood",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136672",
    "Name": "Martin Cabrera",
    "Column1": ""
  },
  {
    "SMSNumber": "3123138558",
    "Name": "Maria Bado",
    "Column1": ""
  },
  {
    "SMSNumber": "3123218240",
    "Name": "Chris Hastings",
    "Column1": ""
  },
  {
    "SMSNumber": "3123218243",
    "Name": "Ermir Ali",
    "Column1": ""
  },
  {
    "SMSNumber": "3123455136",
    "Name": "Open",
    "Column1": ""
  },
  {
    "SMSNumber": "3123610612",
    "Name": "Natalie Garcia",
    "Column1": ""
  },
  {
    "SMSNumber": "3123611875",
    "Name": "Paul Blahnik",
    "Column1": ""
  },
  {
    "SMSNumber": "3124706978",
    "Name": "David Valle",
    "Column1": ""
  },
  {
    "SMSNumber": "3124872433",
    "Name": "Accounts Receivable",
    "Column1": ""
  },
  {
    "SMSNumber": "3124706982",
    "Name": "Rachel Kwan",
    "Column1": ""
  },
  {
    "SMSNumber": "3124872589",
    "Name": "James Clair",
    "Column1": ""
  },
  {
    "SMSNumber": "3124872614",
    "Name": "Benjamin Bauers",
    "Column1": ""
  },
  {
    "SMSNumber": "3124872705",
    "Name": "Michael Hanses",
    "Column1": ""
  },
  {
    "SMSNumber": "3124872788",
    "Name": "Patricia Freeley",
    "Column1": ""
  },
  {
    "SMSNumber": "3124872793",
    "Name": "Greg Mills",
    "Column1": ""
  },
  {
    "SMSNumber": "3124872794",
    "Name": "Santiago Zaragoza",
    "Column1": ""
  },
  {
    "SMSNumber": "3124872832",
    "Name": "Sarah Deierlein Nieschalk",
    "Column1": ""
  },
  {
    "SMSNumber": "3124872840",
    "Name": "Erick Polanco",
    "Column1": ""
  },
  {
    "SMSNumber": "3124874846",
    "Name": "Barry Rubin",
    "Column1": ""
  },
  {
    "SMSNumber": "3124895655",
    "Name": "Silvia Nava",
    "Column1": ""
  },
  {
    "SMSNumber": "3125466216",
    "Name": "Open",
    "Column1": ""
  },
  {
    "SMSNumber": "3125480029",
    "Name": "Alejandro Rangel",
    "Column1": ""
  },
  {
    "SMSNumber": "3125481552",
    "Name": "Jose Sanchez",
    "Column1": ""
  },
  {
    "SMSNumber": "3125483572",
    "Name": "Jose Martinez",
    "Column1": ""
  },
  {
    "SMSNumber": "3125483980",
    "Name": "Open",
    "Column1": ""
  },
  {
    "SMSNumber": "3125486218",
    "Name": "Maria Ruiz",
    "Column1": ""
  },
  {
    "SMSNumber": "3125486422",
    "Name": "Daniel Urban",
    "Column1": ""
  },
  {
    "SMSNumber": "3125487646",
    "Name": "Brian McDonald",
    "Column1": ""
  },
  {
    "SMSNumber": "3125487917",
    "Name": "Lopez",
    "Column1": ""
  },
  {
    "SMSNumber": "3125488705",
    "Name": "Sandra Rodriguez",
    "Column1": ""
  },
  {
    "SMSNumber": "3125489402",
    "Name": "Fernando Aviles",
    "Column1": ""
  },
  {
    "SMSNumber": "3125613679",
    "Name": "Frank",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136651",
    "Name": "Jonathan Quintero",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131631",
    "Name": "Jason Darst",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136574",
    "Name": "Richard Holmgren",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131016",
    "Name": "Juan Falconi",
    "Column1": ""
  },
  {
    "SMSNumber": "3125486125",
    "Name": "Open",
    "Column1": ""
  },
  {
    "SMSNumber": "3123132183",
    "Name": "Carlos Mederos",
    "Column1": ""
  },
  {
    "SMSNumber": "3123132301",
    "Name": "Armando Hernandez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123130784",
    "Name": "Aldo Martinez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123135359",
    "Name": "Marco Jacome",
    "Column1": ""
  },
  {
    "SMSNumber": "3123139347",
    "Name": "Hector Gomez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123139435",
    "Name": "",
    "Column1": ""
  },
  {
    "SMSNumber": "3129718976",
    "Name": "Renee Curtis",
    "Column1": ""
  },
  {
    "SMSNumber": "3129718981",
    "Name": "Support @logics.com",
    "Column1": ""
  },
  {
    "SMSNumber": "3129718989",
    "Name": "Peter Kang",
    "Column1": ""
  },
  {
    "SMSNumber": "3129719072",
    "Name": "Jake Dayan",
    "Column1": ""
  },
  {
    "SMSNumber": "3122489702",
    "Name": "Andres Garcia",
    "Column1": ""
  },
  {
    "SMSNumber": "3123132412",
    "Name": "Adela Herrera",
    "Column1": ""
  },
  {
    "SMSNumber": "3123134307",
    "Name": "James Trayne",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131089",
    "Name": "Berenice Ponce",
    "Column1": ""
  },
  {
    "SMSNumber": "3123133978",
    "Name": "Liliana Reyes",
    "Column1": ""
  },
  {
    "SMSNumber": "3122351618",
    "Name": "Fredrick Usher",
    "Column1": "MAY NOT BE A VALID NUMBER"
  },
  {
    "SMSNumber": "3122351619",
    "Name": "Dave Gonzalez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131436",
    "Name": "Frances Labadie",
    "Column1": ""
  },
  {
    "SMSNumber": "3123131937",
    "Name": "Juan Mendez",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136829",
    "Name": "Rebeca Rivera",
    "Column1": ""
  },
  {
    "SMSNumber": "3123134381",
    "Name": "Arianna Aguilar",
    "Column1": ""
  },
  {
    "SMSNumber": "3122486443",
    "Name": "Rex Hood",
    "Column1": ""
  },
  {
    "SMSNumber": "3123136688",
    "Name": "Cynthia Seaman",
    "Column1": ""
  },
  {
    "SMSNumber": "3123139848",
    "Name": "Open",
    "Column1": ""
  },
  {
    "SMSNumber": "3124677287",
    "Name": "Open",
    "Column1": ""
  }
]';

$items = json_decode($json, true);

foreach($items as $item) {
	$sms = new SmsNumber();
	$sms->sms_number = $item['SMSNumber'];
	$sms->assign_to = $item['Name'];
	$sms->comment = $item['Column1'];

  if(strtolower($sms->assign_to) == strtolower('open') || empty($sms->assign_to) ) {
    $sms->status = true;
  } else {
    $sms->status = false;
  }
	$sms->save();
  var_dump($sms);
}
});
