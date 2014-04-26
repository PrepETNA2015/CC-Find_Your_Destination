function showResult(str,type)
{
	var div =  document.getElementById(type+"_search");
	div.className = "visible";
	if (str.length == 0)
	  { 
		document.getElementById(type+"_search").innerHTML="";
		return;
	  }
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById(type+"_search").innerHTML=xmlhttp.responseText;
			}
		};
	xmlhttp.open("GET","search.php?q="+str+"&type="+type,true);
	xmlhttp.send();
}
var spe;
function fill_input(idd,valeur)
{
	var input = document.getElementById(idd+"_input");
	var div =  document.getElementById(idd+"_search");
	var et = document.getElementById("et").value;
	var response;
	input.value = valeur;
	div.className = "invisible";
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				var test = xmlhttp.responseText;
				 spe = test.split('+');
				 var item = spe.length;
				 var i = 0;
				 var add;
				 run();
				while (i < item)
				 {
					run();
				 
					add = spe[i].split("=");
					sleep(10);
				  codeAddress(add[0]+' '+add[1]+' '+add[2]+' fr',add[3]);
				  i++;
				 }
				stop();
			}
		};
		var valeur =encodeURIComponent(valeur);

		if (idd == "hotel_nom")
		{
			var res = valeur.replace(/%C2%A0/g," ");
			xmlhttp.open("GET","filter.php?val="+encodeURIComponent(res)+"&type="+encodeURIComponent(idd),true);
			xmlhttp.send();
		}
		else if (idd == "dep")
		{
			var tmp = valeur.split("%C2%A0");
			xmlhttp.open("GET","filter.php?val="+encodeURIComponent(tmp[0])+"&type="+encodeURIComponent(idd)+"&etoile="+et,true);
			xmlhttp.send();
		}
		else
		{
			console.log(valeur);
			var res = valeur.replace(/%C2%A0/g," ");
			xmlhttp.open("GET","filter.php?val="+res+"&type="+encodeURIComponent(idd)+"&etoile="+et,true);
			xmlhttp.send();
		}
}

function tourisme(typo)
{
	var input_dep = document.getElementById("dep"+"_input").value;
	var input_ville = document.getElementById("ville"+"_input").value;

	var response;
	
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				var test = xmlhttp.responseText;
				 spe = test.split('+');
				 var item = spe.length;
				 var i = 0;
				 var add;
				 run();
				 detail_interet(typo);
				while (i < item)
				 {
					run();
					add = spe[i].split("=");
					sleep(10);
					if (typo == "cine")
				  codeAddress_cinema(add[0]+' '+add[1]+' '+add[2]+' fr');
				  if (typo == "musee")
				  codeAddress_musee(add[0]+' '+add[1]+' '+add[2]+' fr');
				  if (typo == "vilage_vac")
				  codeAddress_village(add[0]+' '+add[1]+' '+add[2]+' fr');
				  i++;
				 }
				 stop();
			}
		};
		var valeur =encodeURIComponent(valeur);
		var tmp = valeur.split("%C2%A0");
		if (input_ville.length != 0)
		{
		input_ville=encodeURIComponent(input_ville);
		var tmp = input_ville.split("%C2%A0");
		xmlhttp.open("GET",typo+".php?val="+encodeURIComponent(tmp[0])+"&type=0",true);
	xmlhttp.send();
	}
	else if (input_dep.length != 0)
	{
	input_dep=encodeURIComponent(input_dep);
	var tmp = input_dep.split("%C2%A0");
	xmlhttp.open("GET",typo+".php?val="+encodeURIComponent(tmp[0])+"&type=1",true);
	xmlhttp.send();
	}
}

function sleep(milli)
{
var start = new Date().getTime();
while((new Date().getTime() - start) < milli)
{}
}
function run(){
		var load = document.getElementById('floatingBarsG');
		 load.style.display = 'block';
}
function stop(){
		var load = document.getElementById('floatingBarsG');
		 load.style.display = 'none';
		}

function detail_interet(type){
$(document).ready(function(){

	var input_dep = encodeURIComponent(document.getElementById("dep"+"_input").value);
	var input_ville = encodeURIComponent(document.getElementById("ville"+"_input").value);

	if (input_dep.length != 0)
	{
	var tmp = input_dep.split("%C2%A0");
	 $('#details2').load('detail_'+type+'.php?value='+tmp[0]+"&type=1");
	}
	else
	{
	var res = input_ville.replace(/%C2%A0/g," ");
	 $('#details2').load('detail_'+type+'.php?value='+res+"&type=0");
	}
    
    });

}