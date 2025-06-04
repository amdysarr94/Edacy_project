let currentStep = 1;

function showStep(step) {
    document.querySelectorAll('.step').forEach((el, index) => {
        el.classList.toggle('active', index + 1 === step);
    });

    document.querySelectorAll('.dot').forEach((dot, index) => {
        dot.classList.toggle('active', index + 1 === step);
    });

    document.querySelectorAll('.number').forEach((number, index) => {
        number.classList.toggle('active', index + 1 === step);
    });

    currentStep = step;
}

function nextStep() {
    if (currentStep < 3) showStep(currentStep + 1);
}

function prevStep() {
    if (currentStep > 1) showStep(currentStep - 1);
}

function goToStep(step) {
    showStep(step);
}
