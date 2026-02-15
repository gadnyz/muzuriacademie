document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registration-form');
    const submitBtn = document.getElementById('submit-btn');
    const errorContainer = document.getElementById('error-container');

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // Clear previous errors
        errorContainer.innerHTML = '';
        errorContainer.style.display = 'none';

        // Disable button
        const originalBtnText = submitBtn.innerText;
        submitBtn.innerText = 'Traitement en cours...';
        submitBtn.disabled = true;

        const formData = new FormData(form);

        fetch(form.getAttribute('action'), {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success' || data.messages?.success) { // Handle different CI response structures
                    window.location.href = data.redirect_url || data.messages?.redirect_url;
                } else if (data.messages && data.status !== 404) {
                    // Validation errors or Fail response
                    let errorsHtml = '<ul>';
                    if (typeof data.messages === 'object') {
                        for (const field in data.messages) {
                            errorsHtml += `<li>${data.messages[field]}</li>`;
                        }
                    } else {
                        errorsHtml += `<li>${data.messages}</li>`;
                    }
                    errorsHtml += '</ul>';

                    errorContainer.innerHTML = errorsHtml;
                    errorContainer.style.display = 'block';
                } else {
                    throw new Error(data.message || 'Une erreur inconnue est survenue.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorContainer.innerHTML = 'Une erreur est survenue. Veuillez réessayer.';
                errorContainer.style.display = 'block';
            })
            .finally(() => {
                submitBtn.innerText = originalBtnText;
                submitBtn.disabled = false;
            });
    });
});
