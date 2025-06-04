let currentStep = 1;
const totalSteps = 3;

function showStep(step) {
    
    document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
   
    document.querySelector(`.step[data-step="${step}"]`).classList.add('active');

    document.querySelectorAll('.number').forEach(el => el.classList.remove('active'));

    for (let i = 1; i <= step; i++) {
        const stepNum = document.querySelector(`.number[data-step-num="${i}"]`);
        if (stepNum) stepNum.classList.add('active');
    }
}

function nextStep() {
    if (currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep);
    }
}

function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
    }
}
