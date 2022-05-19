function calcularEdad() 
{
  	const date = new Date(document.getElementById('kid_birthday').value).getTime();
  	alert(date);
  	const now = new Date().getTime();
  	alert(now);
  	var age = Math.floor((now - date ) / (1000 * 60 * 60 * 24 * 365));
  	alert(age);
    (document.getElementById('kid_age')).value = age;  
}
