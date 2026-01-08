/* -------------------------------------------------------------------------- */
/*                                  TAB LOGIC                                 */
/* -------------------------------------------------------------------------- */

const tabs = ["personal", "address", "id", "creator"];
let currentTab = 0;

const tabButtons = document.querySelectorAll(".tab-btn");
const panels = document.querySelectorAll(".tab-panel");
const form = document.getElementById("podcastCreatorForm");

function showTab(index) {
  panels.forEach((p) => p.classList.remove("active"));
  tabButtons.forEach((b) => b.classList.remove("active"));

  panels[index].classList.add("active");
  tabButtons[index].classList.add("active");

  currentTab = index;
  updateNavButtons();
}

function updateNavButtons() {
  document.querySelectorAll(".prev-btn").forEach((btn) => {
    btn.classList.toggle("hidden", currentTab === 0);
  });
}

tabButtons.forEach((btn, index) => {
  btn.addEventListener("click", () => showTab(index));
});

/* -------------------------------------------------------------------------- */
/*                           NEXT / PREVIOUS HANDLER                           */
/* -------------------------------------------------------------------------- */

document.addEventListener("click", (e) => {
  const nextBtn = e.target.closest(".next-btn");
  const prevBtn = e.target.closest(".prev-btn");

  if (nextBtn) {
    if (!validateCurrentTab()) return;
    if (currentTab < tabs.length - 1) showTab(currentTab + 1);
  }

  if (prevBtn) {
    if (currentTab > 0) showTab(currentTab - 1);
  }
});

showTab(0);

/* -------------------------------------------------------------------------- */
/*                            PROFILE IMAGE PREVIEW                            */
/* -------------------------------------------------------------------------- */

const profileInput = document.getElementById("profileInput");
const profilePreview = document.getElementById("profilePreview");

profileInput?.addEventListener("change", () => {
  const file = profileInput.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = () => {
    profilePreview.src = reader.result;
    profilePreview.classList.remove("hidden");
  };
  reader.readAsDataURL(file);
});

/* -------------------------------------------------------------------------- */
/*                               ID FILE PREVIEW                               */
/* -------------------------------------------------------------------------- */

const idInput = document.getElementById("idInput");
const idPreview = document.getElementById("idPreview");

idInput?.addEventListener("change", () => {
  const file = idInput.files[0];
  if (!file) return;

  idPreview.classList.remove("hidden");

  if (file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.onload = () => {
      idPreview.innerHTML = `
        <img src="${reader.result}" class="w-full h-full object-cover rounded-xl" />
      `;
    };
    reader.readAsDataURL(file);
  } else {
    idPreview.innerHTML = `
      <div class="flex flex-col items-center text-red-500">
        <i class="fas fa-file-pdf text-3xl mb-2"></i>
        <span class="text-xs text-center px-2">${file.name}</span>
      </div>
    `;
  }
});

/* -------------------------------------------------------------------------- */
/*                           COUNTRY / STATE / CITY                            */
/* -------------------------------------------------------------------------- */

let countryData = [];

const countrySelect = document.getElementById("country");
const stateSelect = document.getElementById("state");
const citySelect = document.getElementById("city");

stateSelect.disabled = true;
citySelect.disabled = true;

fetch("assets/json/countries.json")
  .then((res) => res.json())
  .then((data) => {
    countryData = data;
    populateCountries();
  });

function populateCountries() {
  countrySelect.innerHTML = `<option value="">Select Country</option>`;
  countryData.forEach((country) => {
    const option = document.createElement("option");
    option.value = country.name;
    option.textContent = country.name;
    countrySelect.appendChild(option);
  });
}

countrySelect.addEventListener("change", () => {
  const selectedCountry = countryData.find(
    (c) => c.name === countrySelect.value
  );

  stateSelect.innerHTML = `<option value="">Select State</option>`;
  citySelect.innerHTML = `<option value="">Select City</option>`;
  citySelect.disabled = true;

  if (!selectedCountry) {
    stateSelect.disabled = true;
    return;
  }

  stateSelect.disabled = false;

  selectedCountry.states.forEach((state) => {
    const option = document.createElement("option");
    option.value = state.name;
    option.textContent = state.name;
    stateSelect.appendChild(option);
  });
});

stateSelect.addEventListener("change", () => {
  const selectedCountry = countryData.find(
    (c) => c.name === countrySelect.value
  );
  const selectedState = selectedCountry?.states.find(
    (s) => s.name === stateSelect.value
  );

  citySelect.innerHTML = `<option value="">Select City</option>`;

  if (!selectedState) {
    citySelect.disabled = true;
    return;
  }

  citySelect.disabled = false;

  selectedState.cities.forEach((city) => {
    const option = document.createElement("option");
    option.value = city;
    option.textContent = city;
    citySelect.appendChild(option);
  });
});

/* -------------------------------------------------------------------------- */
/*                             SOCIAL LINKS HANDLER                            */
/* -------------------------------------------------------------------------- */

const socialType = document.getElementById("socialType");
const socialLink = document.getElementById("socialLink");
const addSocial = document.getElementById("addSocial");
const socialChips = document.getElementById("socialChips");
const socialLinksInput = document.getElementById("socialLinksInput");

let socialLinks = {};

const icons = {
  instagram: "fa-instagram",
  youtube: "fa-youtube",
  spotify: "fa-spotify",
  facebook: "fa-facebook",
  twitter: "fa-twitter",
  website: "fa-globe",
};

addSocial.addEventListener("click", () => {
  const type = socialType.value;
  const link = socialLink.value.trim();
  if (!type || !link) return;

  socialLinks[type] = link;
  updateSocialUI();
  socialType.value = "";
  socialLink.value = "";
});

function updateSocialUI() {
  socialChips.innerHTML = "";
  socialLinksInput.value = JSON.stringify(socialLinks);

  Object.entries(socialLinks).forEach(([key]) => {
    const chip = document.createElement("div");
    chip.className =
      "flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-sm";

    chip.innerHTML = `
      <i class="fab ${icons[key] || "fa-link"}"></i>
      <span class="capitalize">${key}</span>
      <button type="button" class="ml-1 text-red-500 font-bold">×</button>
    `;

    chip.querySelector("button").onclick = () => {
      delete socialLinks[key];
      updateSocialUI();
    };

    socialChips.appendChild(chip);
  });
}

/* -------------------------------------------------------------------------- */
/*                           TAB VALIDATION (NEXT)                             */
/* -------------------------------------------------------------------------- */

function formatFieldName(field) {
  return field
    .replace(/_/g, " ")
    .replace(/\b\w/g, (char) => char.toUpperCase());
}

function validateCurrentTab() {
  const requiredByTab = {
    0: ["name", "email", "phone", "gender", "date_of_birth"],
    1: ["address1", "country", "state", "city"],
    2: ["id_proof_name", "id_proof"],
    3: [],
  };

  const fields = requiredByTab[currentTab];
  const activePanel = panels[currentTab];

  for (const field of fields) {
    const input = activePanel.querySelector(`[name="${field}"]`);
    if (!input || !input.value || !input.value.trim()) {
      const label = formatFieldName(field);
      showToast(`${label} is required`, "error");
      setTimeout(() => input?.focus?.(), 50);
      return false;
    }
  }

  return true;
}

/* -------------------------------------------------------------------------- */
/*                           FINAL SUBMIT VALIDATION                           */
/* -------------------------------------------------------------------------- */

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  if (!validateAllTabs()) return;

  const formData = new FormData(form);

  try {
    toggleSubmitState(true);
    const res = await fetch(`${window.API_BASE_URL}/creator`, {
      method: "POST",
      body: formData,
    });

    const data = await res.json();
    if (!res.ok) throw new Error(data.message);

    showToast("Application submitted!", "success");
    form.reset();
    resetUIAfterSubmit();
  } catch (err) {
    showToast(err.message || "Submission failed", "error");
  } finally {
    toggleSubmitState(false);
  }
});

function validateAllTabs() {
  const allRequired = [
    "name",
    "email",
    "phone",
    "gender",
    "date_of_birth",
    "address1",
    "country",
    "state",
    "city",
    "id_proof_name",
    "id_proof",
  ];

  for (const field of allRequired) {
    const input = form.querySelector(`[name="${field}"]`);
    if (!input || !input.value || !input.value.trim()) {
      const label = formatFieldName(field);
      showToast(`${label} is required`, "error");
      showTabForField(field);
      setTimeout(() => input?.focus?.(), 50);
      return false;
    }
  }

  return true;
}

function showTabForField(field) {
  const map = {
    name: 0,
    email: 0,
    phone: 0,
    gender: 0,
    date_of_birth: 0,
    address1: 1,
    country: 1,
    state: 1,
    city: 1,
    id_proof_name: 2,
    id_proof: 2,
  };

  if (map[field] !== undefined) showTab(map[field]);
}

/* -------------------------------------------------------------------------- */
/*                              SUBMIT STATE UI                                */
/* -------------------------------------------------------------------------- */

function toggleSubmitState(isLoading) {
  const btn = form.querySelector('button[type="submit"]');
  btn.disabled = isLoading;
  btn.innerHTML = isLoading
    ? `<span class="animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full"></span> Submitting...`
    : `<span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-white/20">
         <i class="fas fa-paper-plane text-xs"></i>
       </span> Submit Application`;
}

function resetUIAfterSubmit() {
  showTab(0);
  profilePreview.classList.add("hidden");
  idPreview.classList.add("hidden");
  socialLinks = {};
  updateSocialUI();
  stateSelect.disabled = true;
  citySelect.disabled = true;
}
