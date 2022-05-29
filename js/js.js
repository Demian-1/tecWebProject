const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-nxt");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

const folio = document.getElementById("folio");

let formStepsNum = 0;
let messages = [];

nextBtns.forEach(btn =>{
	btn.addEventListener("click", () => {
		if(folio.value.length > 0){
			messages.push("El folio debe tener 10 digitos pudiendo empezar por PE o PP");
		}
		else{		
			formStepsNum++;
			updateFormsSteps();
			updateProgressBar();
		}
	});
});

prevBtns.forEach(btn =>{
	btn.addEventListener("click", () => {
		formStepsNum--;
		updateFormsSteps();
		updateProgressBar();
	});
});

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