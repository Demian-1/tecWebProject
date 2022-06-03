const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-nxt");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");
const hasPartner = document.getElementById("der_cony_no");

const folio = document.getElementById("folio");

let formStepsNum = 0;

nextBtns.forEach(btn =>{
	btn.addEventListener("click", () => {
		if(checkVal()){
			console.log("hay algun error");
		}
		else{
			if(formStepsNum == 2 && hasPartner.checked == true){
				formStepsNum+=2;
			}else{
				formStepsNum++;
			}
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
	for( i = 0; i < campos.length ; i++){
		if(!campos[i].checkValidity()){
			campos[i].classList.add("is-invalid");
			errors++;
		}
		else{
			campos[i].classList.contains("is-invalid") && campos[i].classList.remove("is-invalid");
		}
	}
	return errors;
}

function updateFormsSteps(){
	formSteps.forEach(formStep =>{
		formStep.classList.contains("form-step-active") &&
		formStep.classList.remove("form-step-active");
	});
	formSteps[formStepsNum].classList.add("form-step-active");
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

function calcularEdad() {
  	const date = new Date(document.getElementById('kid_birthday').value).getTime();
  	const now = new Date().getTime();
  	var age = Math.floor((now - date ) / (1000 * 60 * 60 * 24 * 365));
    (document.getElementById('kid_age')).value = age;  
}