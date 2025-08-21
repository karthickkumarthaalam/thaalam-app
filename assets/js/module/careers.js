document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('country');
    const stateGroup = document.getElementById('stateGroup');
    const stateSelect = document.getElementById('state');
    const cityGroup = document.getElementById('cityGroup');
    const citySelect = document.getElementById('city');

    let countryData = [];

    fetch("assets/json/countries.json")
        .then(response => response.json())
        .then(data => {
            countryData = data;

            countrySelect.innerHTML = `<option value="">Select Country</option>`;

            countryData.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name;
                option.textContent = country.name;
                countrySelect.appendChild(option);
            });
        });

    countrySelect.addEventListener("change", function () {
        const selectedCountryName = this.value;
        const selectedCountry = countryData.find(c => c.name === selectedCountryName);

        const stateSelect = document.getElementById("state");
        const citySelect = document.getElementById("city");

        stateSelect.innerHTML = '<option value="">Select State</option>';
        citySelect.innerHTML = '<option value="">Select City</option>';

        stateSelect.disabled = !selectedCountry;
        citySelect.disabled = true;

        if (selectedCountry && selectedCountry.states) {
            stateSelect.disabled = false;
            selectedCountry.states.forEach(state => {
                const option = document.createElement("option");
                option.value = state.name;
                option.textContent = state.name;
                stateSelect.appendChild(option);
            });
        }
    });

    // State change handler
    document.getElementById("state").addEventListener("change", function () {
        const selectedCountryName = document.getElementById("country").value;
        const selectedStateName = this.value;

        const selectedCountry = countryData.find(c => c.name === selectedCountryName);
        const citySelect = document.getElementById("city");

        citySelect.innerHTML = '<option value="">Select City</option>';
        citySelect.disabled = !selectedStateName;

        if (selectedCountry && selectedCountry.states) {
            const selectedState = selectedCountry.states.find(s => s.name === selectedStateName);
            if (selectedState && selectedState.cities) {
                citySelect.disabled = false;
                selectedState.cities.forEach(city => {
                    const option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                });
            }
        }
    });

    // File upload preview
    const resumeInput = document.getElementById('resume');
    const filePreview = document.querySelector('.file-preview');

    resumeInput.addEventListener('change', function () {
        if (this.files && this.files[0]) {
            if (this.files[0].size > 5 * 1024 * 1024) {
                showToast("Pdf Files size exceeds the limits", "info");
                this.value = '';
                filePreview.textContent = '';
                return;
            }

            if (this.files[0].type !== 'application/pdf') {
                showToast('Only PDF files are allowed', "info");
                this.value = '';
                filePreview.textContent = '';
                return;
            }

            filePreview.textContent = `Selected: ${this.files[0].name} (${(this.files[0].size / 1024 / 1024).toFixed(2)} MB)`;
        }
    });

    const formBtn = document.getElementById("submit-btn");

    // Form submission
    document.getElementById('careerForm').addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        formBtn.disabled = true;
        formBtn.innerHTML = `
        <i class="fas fa-spinner fa-spin"></i> Submitting...
    `;

        try {
            const response = await fetch(`${window.API_BASE_URL}/careers`, {
                method: "POST",
                body: formData
            });

            const result = await response.json();

            if (result.status === "success") {
                showToast(result.message, "success");
                filePreview.textContent = '';
                form.reset();
            } else {
                showToast(result.message || "Something went wrong", "error");
            }

        } catch (error) {
            showToast(error.message, "error");
        } finally {
            formBtn.disabled = false;
            formBtn.innerHTML = `
        <i class="fas fa-paper-plane"></i> Submit Application
    `;
        }
    });
});