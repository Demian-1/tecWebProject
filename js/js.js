const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-nxt");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");
const hasPartner = document.getElementById("der_cony_no");

let formStepsNum = 0;

nextBtns.forEach(btn =>{
	btn.addEventListener("click", () => {
		if(!checkVal()){
			if(formStepsNum == 2 && hasPartner.checked == true){
				formStepsNum+=2;
			}else{
				formStepsNum++;
			}
			console.log("estamos en: " + formStepsNum);
			updateFormsSteps();
			updateProgressBar();
		}
	});
});

prevBtns.forEach(btn =>{
	btn.addEventListener("click", () => {
		if(formStepsNum == 4 && hasPartner.checked == true){
			formStepsNum-=2;
		}else{
			formStepsNum--;
		}
		updateFormsSteps();
		updateProgressBar();
	});
});

function checkVal(){
	let errors = 0;
	let campos = document.querySelectorAll(".form-step-active .needs-validation");
	const regExTxt = /^[a-zA-Z\s]*$/;
	const regExFol = /(?:P[PE]|\d\d)\d\d\d\d\d\d\d\d/i;
	const regExCURP = /[A-Z][A-Z][A-Z][A-Z]\d\d\d\d\d\d[A-Z][A-Z][A-Z][zA-Z][A-Z][A-Z][A-Z0-9][A-Z0-9]/gi;
	for( i = 0; i < campos.length ; i++){
		campos[i].classList.contains("is-invalid") && campos[i].classList.remove("is-invalid");
		if(campos[i].id.endsWith("pat") || campos[i].id.endsWith("mat") || campos[i].id.endsWith("nombres") || campos[i].id.endsWith("calle") || campos[i].id.endsWith("plaza")){
			if(!regExTxt.test(campos[i].value)){
				campos[i].classList.add("is-invalid");
				errors++;
			}
		}
		else if(campos[i].id == "folio"){
			if(campos[i].value.length < 10 || !regExFol.test(campos[i].value)){
				campos[i].classList.add("is-invalid");
				errors++;
			}
		}
		else if(campos[i].id.endsWith("CURP")){
			if(campos[i].value.length < 18 || !regExCURP.test(campos[i].value)){
				campos[i].classList.add("is-invalid");
				errors++;
			}
		}
		else if(campos[i].id == "kid_age"){
			if(campos[i].value > 6 || campos[i].value < 0){
				campos[i].classList.add("is-invalid");
				document.getElementById("invalid-age").style.display = "block";
				errors++;
			}
			else{
				document.getElementById("invalid-age").style.display = "none";
			}
		}
		if(!campos[i].checkValidity()){
			campos[i].classList.add("is-invalid");
			errors++;
		}
	}
	return errors;
}

function updateFormsSteps(){
	const revision = document.getElementById("revision");
	const btnsgroup = document.querySelectorAll(".btns-group.remove-on-check");
	const inputs = document.querySelectorAll(".form-control:not(#kid_age,#kid_age_months,[id$='entidad'],[id$='alcaldia'],[id$='colonia']),.form-select");
	const btns_revision = document.getElementById("btns-revision");
	const hide_on_revision = document.querySelectorAll(".hide-on-revision");

	formSteps.forEach(formStep =>{
		formStep.classList.contains("form-step-active") &&
		formStep.classList.remove("form-step-active");
	});
	// Parte de la revision de información
	if(formStepsNum == 4){
		revision.classList.remove("d-none");
		btns_revision.classList.remove("d-none");
		formSteps.forEach(formStep =>{
			formStep.classList.add("form-step-active");
		});
		if(hasPartner.checked == true){
			document.getElementById("conyuge").classList.remove("form-step-active");
		}
		hide_on_revision.forEach(hide_on_revision =>{
			hide_on_revision.classList.add("d-none");
		});
		btnsgroup.forEach(btnsgroup =>{
			btnsgroup.classList.add("d-none");
		});
		inputs.forEach(inputs =>{
			inputs.setAttribute('disabled','');
		});
	}
	// Avance del formulario normalmente
	else{
		revision.classList.add("d-none");
		btns_revision.classList.add("d-none");
		hide_on_revision.forEach(hide_on_revision =>{
			hide_on_revision.classList.remove("d-none");
		});
		btnsgroup.forEach(btnsgroup =>{
			btnsgroup.classList.remove("d-none");
		});
		inputs.forEach(inputs =>{
			inputs.removeAttribute('disabled');
		});
		formSteps[formStepsNum].classList.add("form-step-active");
	}
}

function updateProgressBar(){
	progressSteps.forEach((progressSteps,idx)=>{
		if(idx <= formStepsNum){
			progressSteps.classList.add("progress-step-active");
		}
		else{
			progressSteps.classList.remove("progress-step-active");
		}
	});
	
	const progressActive = document.querySelectorAll(".progress-step-active");
	progress.style.width = ((progressActive.length - 1)/(progressSteps.length - 1)*100 + "%");
}

document.getElementsByTagName("form")[0].onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;     
    if (key == 13) {
      e.preventDefault();
    }
  }

/* Funciones de cálculo automático */

function calcularEdad() {
  	const date = new Date(document.getElementById('kid_birthday').value).getTime();
  	const now = new Date().getTime();
  	var age = Math.floor((now - date ) / (1000 * 60 * 60 * 24 * 365));
    (document.getElementById('kid_age')).value = age;  
}

/* Image related JS */

const inpFile = document.querySelectorAll(".inpFile");
const previewContainer = document.querySelectorAll(".image-preview");

inpFile.forEach(inpFile=>{
	inpFile.addEventListener("change", function(){
	   const file = this.files[0];
	   const clsImg = this.nextElementSibling.firstElementChild;
	   const clsTxt = this.nextElementSibling.firstElementChild.nextElementSibling;
		if(file){
			const reader = new FileReader();
			clsTxt.style.display="none";
			clsImg.style.display = "block";

			reader.addEventListener("load",function(){
				clsImg.setAttribute("src",this.result);
			});
			reader.readAsDataURL(file);
	}else{
			clsTxt.style.display=null;
			clsImg.style.display = null;
			clsImg.setAttribute("src","")
		}
	});
});