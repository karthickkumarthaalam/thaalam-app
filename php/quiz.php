<section class="live-interaction">
    <div class="container">
        <!-- Section Heading -->
        <div class="live-interaction__header" id="liveInteractionHeader">
            <h2 class="live-interaction__title">
                Live Program Interaction
            </h2>
            <p class="live-interaction__subtitle">
                Vote & participate in the current show
            </p>
        </div>
        <div id="quizList" class="quiz-list"></div>
    </div>
</section>

<style>
    /* ================= CLEAN MODERN POLL ================= */
    .live-interaction {
        background: transparent;
        /* min-height: 100vh; */
    }

    .container {
        max-width: 1200px;
        /* padding: 2.8rem 1.2rem; */
        margin: 0 auto;
    }

    .live-interaction__header {
        text-align: center;
        margin-top: 48px;
        margin-bottom: 48px;
        display: none;
    }

    .live-interaction__header::after {
        content: "";
        display: block;
        width: 80px;
        height: 4px;
        margin: 20px auto 0;
        background: linear-gradient(90deg, #f90000, #f9f9f9);
        border-radius: 4px;
    }

    .live-interaction__title {
        font-size: 1.6rem;
        font-weight: 600;
        color: #1e293b;
        letter-spacing: -0.5px;
        margin-bottom: 12px;
    }

    .live-interaction__subtitle {
        font-size: 1rem;
        color: #64748b;
        font-weight: 500;
        max-width: 500px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ================= GRID ================= */
    .quiz-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 0.4fr));
        gap: 32px;
        justify-content: center;
    }

    @media (max-width: 480px) {
        .quiz-list {
            grid-template-columns: w-full;
        }
    }

    /* ================= CARD ================= */
    .quiz-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 32px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 5px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .quiz-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    /* ================= QUESTION ================= */
    .quiz-question {
        font-size: 18px;
        font-weight: 600;
        color: #1e293b;
        line-height: 1.6;
        margin: 0 0 28px 0;
        padding-right: 0;
    }

    /* ================= OPTIONS ================= */
    .quiz-options {
        list-style: none;
        padding: 0;
        margin: 0 0 28px 0;
    }

    .quiz-options li {
        margin-bottom: 16px;
    }

    .quiz-options label {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 18px 20px;
        border-radius: 12px;
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        cursor: pointer;
        font-size: 15px;
        font-weight: 500;
        color: #475569;
        position: relative;
        overflow: hidden;
        transition: all 0.2s ease;
    }

    .quiz-options label:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
        transform: translateX(4px);
    }

    .quiz-options label.selected {
        background: #edf8ff;
        border-color: #2aafec;
        color: #0369a1;
    }

    .quiz-options input {
        accent-color: #3b82f6;
        transform: scale(1.2);
        cursor: pointer;
    }

    .quiz-options input:checked+span {
        font-weight: 600;
        color: #1e293b;
    }

    /* ================= FEEDBACK SECTION ================= */
    .feedback-section {
        margin-top: 28px;
        padding: 16px;
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-radius: 16px;
        border: 2px solid #bae6fd;
        animation: slideIn 0.4s ease;
    }

    .feedback-section.hidden {
        display: none;
    }

    .feedback-text::before {
        content: "💡";
        font-size: 16px;
    }

    .feedback-text {
        font-size: 0.8rem;
        color: #0c4a6e;
        line-height: 1.7;
        margin: 0;
    }

    /* ================= USER FEEDBACK INPUT ================= */
    .user-feedback-section {
        margin-top: 32px;
        padding-top: 32px;
        border-top: 2px dashed #cbd5e1;
    }

    .user-feedback-section.hidden {
        display: none;
    }

    .user-feedback-title {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .user-feedback-title::before {
        content: "💬";
        font-size: 16px;
    }

    .feedback-textarea-container {
        position: relative;
        margin-bottom: 15px;
    }

    .feedback-textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #cbd5e1;
        border-radius: 12px;
        font-size: 15px;
        color: #1e293b;
        background: #ffffff;
        resize: vertical;
        min-height: 120px;
        font-family: inherit;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .feedback-textarea:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
    }

    .feedback-textarea::placeholder {
        color: #94a3b8;
        font-style: italic;
    }

    .char-counter {
        position: absolute;
        bottom: 10px;
        right: 15px;
        font-size: 12px;
        color: #64748b;
        background: rgba(255, 255, 255, 0.9);
        padding: 2px 8px;
        border-radius: 10px;
    }

    .feedback-actions {
        display: flex;
        gap: 16px;
        align-items: center;
        flex-wrap: wrap;
    }

    .feedback-submit {
        flex: 1;
        min-width: 200px;
        padding: 12px 16px;
        border-radius: 12px;
        border: none;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        color: #ffffff;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .feedback-submit:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .feedback-submit:active:not(:disabled) {
        transform: translateY(0);
    }

    .feedback-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
        box-shadow: none !important;
    }

    .whatsapp-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 16px;
        border-radius: 12px;
        background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3);
        border: none;
        cursor: pointer;
    }

    .whatsapp-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
    }

    .whatsapp-btn:active {
        transform: translateY(0);
    }

    .feedback-success {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 20px;
        background: rgba(34, 197, 94, 0.1);
        border-radius: 12px;
        border: 2px solid #16a34a;
        color: #166534;
        font-size: 15px;
        font-weight: 600;
        animation: fadeIn 0.5s ease;
        margin-top: 20px;
    }

    .feedback-success::before {
        content: "🎉";
        font-size: 20px;
    }

    /* ================= SUBMIT BUTTON ================= */
    .quiz-submit {
        width: 100%;
        padding: 18px;
        border-radius: 12px;
        border: none;
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        position: relative;
        overflow: hidden;
    }

    .quiz-submit::after {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }

    .quiz-submit:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    .quiz-submit:hover:not(:disabled)::after {
        left: 100%;
    }

    .quiz-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
        box-shadow: none !important;
    }

    .quiz-submit:disabled::after {
        display: none;
    }

    /* ================= UTILITY ================= */
    .hidden {
        display: none !important;
    }

    /* ================= ANIMATIONS ================= */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.7;
        }
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .live-interaction {
            padding: 40px 16px;
        }

        .live-interaction__title {
            font-size: 28px;
        }

        .quiz-list {
            gap: 24px;
        }

        .quiz-card {
            padding: 24px;
        }

        .quiz-question {
            font-size: 17px;
            padding-right: 0;
        }

        .feedback-actions {
            flex-direction: column;
        }

        .feedback-submit,
        .whatsapp-btn {
            width: 100%;
            min-width: auto;
        }
    }

    @media (max-width: 480px) {
        .live-interaction__title {
            font-size: 24px;
        }

        .quiz-card {
            padding: 20px;
        }

        .quiz-question {
            font-size: 16px;
            padding-right: 0;
        }

        .quiz-options label {
            padding: 16px;
        }
    }
</style>

<!-- Include SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const polls = [];
    let currentProgramId = null;
    let submitHandler = null;

    const StorageManager = {
        prefix: 'poll_',
        maxItemsPerProgram: 50,
        maxAgeDays: 7,

        getKey(programId, pollId, type = 'vote') {
            return `${this.prefix}${programId}_${pollId}_${type}`;
        },

        saveVote(programId, pollId, optionId) {
            const key = this.getKey(programId, pollId, 'vote');
            const data = {
                optionId,
                programId,
                pollId,
                timestamp: Date.now()
            };

            localStorage.setItem(key, JSON.stringify(data));
            this.cleanupOldData();
            this.enforceLimit(programId);
        },

        getSavedVote(programId, pollId) {
            const key = this.getKey(programId, pollId, 'vote');
            const raw = localStorage.getItem(key);
            return raw ? JSON.parse(raw) : null;
        },

        saveFeedback(programId, pollId) {
            const key = this.getKey(programId, pollId, 'feedback');
            const data = {
                submitted: true,
                timestamp: Date.now(),
                programId,
                pollId
            };

            localStorage.setItem(key, JSON.stringify(data));
            this.cleanupOldData();
        },

        getSavedFeedback(programId, pollId) {
            const key = this.getKey(programId, pollId, 'feedback');
            const raw = localStorage.getItem(key);
            return raw ? JSON.parse(raw) : null;
        },

        cleanupOldData() {
            const maxAge = this.maxAgeDays * 24 * 60 * 60 * 1000;
            const cutoffTime = Date.now() - maxAge;

            for (let i = localStorage.length - 1; i >= 0; i--) {
                const key = localStorage.key(i);
                if (key.startsWith(this.prefix)) {
                    try {
                        const data = JSON.parse(localStorage.getItem(key));
                        if (data.timestamp && data.timestamp < cutoffTime) {
                            localStorage.removeItem(key);
                        }
                    } catch (e) {
                        localStorage.removeItem(key);
                    }
                }
            }
        },

        enforceLimit(programId) {
            const programKeys = [];

            for (let i = 0; i < localStorage.length; i++) {
                const key = localStorage.key(i);
                if (key.startsWith(`${this.prefix}${programId}_`)) {
                    try {
                        const data = JSON.parse(localStorage.getItem(key));
                        if (data.timestamp) {
                            programKeys.push({
                                key,
                                timestamp: data.timestamp
                            });
                        }
                    } catch (e) {}
                }
            }

            programKeys.sort((a, b) => a.timestamp - b.timestamp);

            while (programKeys.length > this.maxItemsPerProgram) {
                const oldest = programKeys.shift();
                localStorage.removeItem(oldest.key);
            }
        }
    };

    /* ---------- SWEET ALERT FUNCTIONS ---------- */
    function showAlert(title, message, type = 'info', timer = 3000) {
        return Swal.fire({
            title: title,
            text: message,
            icon: type,
            timer: timer,
            showConfirmButton: false,
            toast: true,
            position: 'center',
            background: '#fff'
        });
    }

    function showSuccess(message, timer = 2000) {
        return Swal.fire({
            title: 'Success!',
            text: message,
            icon: 'success',
            timer: timer,
            showConfirmButton: false,
            toast: true,
            position: 'center',
            background: '#fff',
            customClass: {
                popup: 'poll-success-swal'
            }
        });
    }

    function showPollSuccess() {
        return Swal.fire({
            title: '🎉 Vote Submitted!',
            text: 'Your vote has been recorded successfully.',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            toast: true,
            position: 'center',
            background: '#fff',
            customClass: {
                popup: 'poll-success-swal'
            }
        });
    }

    function showFeedbackSuccess() {
        return Swal.fire({
            title: '✅ Feedback Submitted!',
            text: 'Thank you for sharing your thoughts!',
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            toast: true,
            position: 'center',
            background: '#fff',
            customClass: {
                popup: 'feedback-success-swal'
            }
        });
    }

    function showError(message, timer = 3000) {
        return showAlert('Error!', message, 'error', timer);
    }

    function showWarning(message, timer = 3000) {
        return showAlert('Warning!', message, 'warning', timer);
    }

    function showInfo(message, timer = 2000) {
        return showAlert('Info', message, 'info', timer);
    }

    /* ---------- WHATSAPP FUNCTION ---------- */
    function openWhatsApp(poll, feedbackText = '') {
        if (!poll.enable_whatsapp || !poll.whatsapp_number) {
            showWarning("WhatsApp is not enabled for this poll");
            return;
        }

        const message = feedbackText ?
            `Feedback about poll "${poll.question}": ${feedbackText.substring(0, 100)}...` :
            `Feedback about poll: ${poll.question}`;

        const encodedMessage = encodeURIComponent(message);
        const whatsappUrl = `https://wa.me/${poll.whatsapp_number}?text=${encodedMessage}`;

        window.open(whatsappUrl, '_blank');
        showInfo('Opening WhatsApp...');
    }

    /* ---------- CLEANUP FUNCTION ---------- */
    function cleanupPolls() {
        if (submitHandler) {
            document.removeEventListener("submit", submitHandler);
            submitHandler = null;
        }
        polls.length = 0;

        const list = document.getElementById("quizList");
        if (list) list.innerHTML = "";
    }

    /* ---------- PROGRAM CHANGE HANDLER ---------- */
    window.addEventListener("program:changed", async (e) => {
        const {
            programId
        } = e.detail;

        if (!programId || programId === currentProgramId) return;

        currentProgramId = programId;
        cleanupPolls();
        await fetchPolls(programId);
    });

    /* ---------- FETCH POLLS ---------- */
    async function fetchPolls(programId) {
        try {
            const res = await fetch(
                `${window.API_BASE_URL}/program-question/program/${programId}/active`
            );

            if (!res.ok) throw new Error("Polls API failed");

            const json = await res.json();
            // Filter only polls
            const activePolls = (json.data || []).filter(poll => poll.question_type === 'poll');
            polls.push(...activePolls);

            const header = document.getElementById("liveInteractionHeader");

            if (!polls.length) {
                if (header) header.style.display = "none";
                return;
            }

            if (header) header.style.display = "block";

            renderPolls();
            setupSubmitHandler();

        } catch (error) {
            console.error("Poll fetch error:", error);
            showError("Failed to load polls. Please refresh the page.");
        }
    }

    /* ---------- RENDER POLLS ---------- */
    function renderPolls() {
        const list = document.getElementById("quizList");
        if (!list) return;

        list.innerHTML = polls.map((poll) => {
            const showFeedbackSection = poll.enable_feedback;
            const showWhatsAppBtn = poll.enable_whatsapp && poll.whatsapp_number;

            return `
            <div class="quiz-card" data-poll-id="${poll.id}">
                <h3 class="quiz-question">${poll.question}</h3>

                <form data-quiz-id="${poll.id}" class="quiz-form">
                    <ul class="quiz-options">
                        ${poll.options
                            .map(
                                (opt) => `
                            <li>
                                <label data-option-id="${opt.id}">
                                    <input 
                                        type="radio" 
                                        name="poll-${poll.id}" 
                                        value="${opt.id}"
                                    >
                                    <span>${opt.option_text}</span>
                                </label>
                            </li>`
                            )
                            .join("")}
                    </ul>

                    <button type="submit" class="quiz-submit">
                        Submit Vote
                    </button>

                    <!-- Vote Acknowledgement / Poll Result -->
                    <div class="feedback-section hidden">
                        <div class="feedback-text"></div>
                    </div>

                    <!-- Optional Viewer Feedback -->
                    ${showFeedbackSection ? `
                    <div class="user-feedback-section hidden">
                        <div class="user-feedback-title">
                            Share Your Thoughts
                        </div>

                        <div class="feedback-textarea-container">
                            <textarea 
                                class="feedback-textarea"
                                placeholder="What did you think about this poll? Share your opinion..."
                                maxlength="500"
                            ></textarea>
                            <div class="char-counter">0/500</div>
                        </div>

                        <div class="feedback-actions">
                            <button type="button" class="feedback-submit">
                                Submit Feedback
                            </button>

                            ${showWhatsAppBtn ? `
                            <button type="button" class="whatsapp-btn">
                                <i class="fab fa-whatsapp"></i> Share as voice note
                            </button>
                            ` : ''}
                        </div>

                        <div class="feedback-success hidden">
                            Thank you for your feedback! We appreciate your input.
                        </div>
                    </div>
                    ` : ''}
                </form>
            </div>
            `;
        }).join('');

        // Initialize saved votes and setup event listeners
        polls.forEach(poll => {
            const savedVote = StorageManager.getSavedVote(currentProgramId, poll.id);
            if (savedVote) {
                loadSavedVote(poll.id, savedVote.optionId);
            } else {
                setupOptionSelection(poll.id);
            }
        });
    }

    /* ---------- LOAD SAVED VOTE ---------- */
    function loadSavedVote(pollId, optionId) {
        const form = document.querySelector(`form[data-quiz-id="${pollId}"]`);
        if (!form) return;

        const optionInput = form.querySelector(`input[value="${optionId}"]`);
        if (optionInput) {
            optionInput.checked = true;

            // Style the selected option
            const label = optionInput.closest('label');
            if (label) label.classList.add('selected');

            // Disable inputs
            const inputs = form.querySelectorAll("input");
            const submitBtn = form.querySelector(".quiz-submit");
            inputs.forEach(input => input.disabled = true);
            if (submitBtn) submitBtn.disabled = true;

            // Show feedback
            showFeedback(form, pollId, optionId);

            // Show feedback section if enabled and not submitted
            const poll = polls.find(p => p.id === pollId);
            if (poll && poll.enable_feedback) {
                const feedbackSubmitted = StorageManager.getSavedFeedback(currentProgramId, pollId);
                const feedbackSection = form.querySelector('.user-feedback-section');
                if (feedbackSection && !feedbackSubmitted) {
                    feedbackSection.classList.remove('hidden');
                    setupFeedbackHandler(form, pollId);
                }
            }
        }
    }

    /* ---------- SETUP OPTION SELECTION ---------- */
    function setupOptionSelection(pollId) {
        const form = document.querySelector(`form[data-quiz-id="${pollId}"]`);
        if (!form) return;

        const inputs = form.querySelectorAll('input[type="radio"]');
        inputs.forEach(input => {
            input.addEventListener('change', function() {
                // Remove selected class from all labels
                form.querySelectorAll('label').forEach(label => {
                    label.classList.remove('selected');
                });

                // Add selected class to current label
                if (this.checked) {
                    this.closest('label').classList.add('selected');
                }
            });
        });
    }

    /* ---------- SETUP FEEDBACK HANDLER ---------- */
    function setupFeedbackHandler(form, pollId) {
        const submitBtn = form.querySelector('.feedback-submit');
        const whatsappBtn = form.querySelector('.whatsapp-btn');
        const textarea = form.querySelector('.feedback-textarea');
        const charCounter = form.querySelector('.char-counter');
        const successMsg = form.querySelector('.feedback-success');

        if (!submitBtn || !textarea) return;

        // Character counter
        function updateCharCounter() {
            const length = textarea.value.length;
            charCounter.textContent = `${length}/500`;
            charCounter.style.color = length >= 480 ? '#ef4444' : '#64748b';
        }

        textarea.addEventListener('input', updateCharCounter);
        updateCharCounter(); // Initial update

        // Submit feedback
        submitBtn.addEventListener('click', async () => {
            const feedbackText = textarea.value.trim();

            if (!feedbackText) {
                showWarning("Please enter your feedback");
                textarea.focus();
                return;
            }

            if (feedbackText.length < 5) {
                showWarning("Feedback should be at least 5 characters");
                textarea.focus();
                return;
            }

            // No confirmation dialog - directly submit
            submitBtn.disabled = true;
            submitBtn.textContent = "Submitting...";

            try {
                const poll = polls.find(p => p.id === pollId);
                const response = await fetch(
                    `${window.API_BASE_URL}/program-question/feedback/${pollId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            answer_text: feedbackText
                        })
                    }
                );

                if (!response.ok) {
                    const error = await response.json();
                    throw new Error(error.message || 'Failed to submit feedback');
                }

                StorageManager.saveFeedback(currentProgramId, pollId);
                textarea.disabled = true;
                submitBtn.classList.add('hidden');
                if (whatsappBtn) whatsappBtn.classList.add('hidden');
                successMsg.classList.remove('hidden');

                showFeedbackSuccess();

            } catch (error) {
                console.error('Feedback error:', error);
                showError(error.message || "Failed to submit. Please try again.");
                submitBtn.disabled = false;
                submitBtn.textContent = "Submit Feedback";
            }
        });

        // WhatsApp button
        if (whatsappBtn) {
            whatsappBtn.addEventListener('click', () => {
                const poll = polls.find(p => p.id === pollId);
                if (!poll) return;

                const feedbackText = textarea.value.trim();
                openWhatsApp(poll, feedbackText);
            });
        }
    }

    /* ---------- SUBMIT HANDLER ---------- */
    function setupSubmitHandler() {
        submitHandler = async function(e) {
            const form = e.target;
            if (!form.dataset.quizId) return;

            e.preventDefault();

            const pollId = Number(form.dataset.quizId);
            const poll = polls.find(p => p.id === pollId);
            if (!poll) return;

            const selected = form.querySelector("input:checked");

            if (!selected) {
                showWarning("Please select an option");

                // Add shake animation to options
                const options = form.querySelectorAll('label');
                options.forEach(opt => {
                    opt.style.animation = 'pulse 0.5s ease';
                    setTimeout(() => {
                        opt.style.animation = '';
                    }, 500);
                });

                return;
            }

            const optionId = Number(selected.value);

            // No confirmation dialog - directly submit vote
            try {
                const voteRes = await fetch(`${window.API_BASE_URL}/program-question/vote`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        question_id: pollId,
                        option_id: optionId
                    })
                });

                if (!voteRes.ok) {
                    const err = await voteRes.json();
                    throw new Error(err.message || "Voting failed");
                }

                StorageManager.saveVote(currentProgramId, pollId, optionId);

                const inputs = form.querySelectorAll("input");
                const submitBtn = form.querySelector(".quiz-submit");
                inputs.forEach(input => input.disabled = true);
                if (submitBtn) submitBtn.disabled = true;

                // Show poll feedback
                showFeedback(form, pollId, optionId);

                // Show feedback section if enabled and not submitted
                if (poll.enable_feedback) {
                    const feedbackSubmitted = StorageManager.getSavedFeedback(currentProgramId, pollId);
                    const feedbackSection = form.querySelector('.user-feedback-section');
                    if (feedbackSection && !feedbackSubmitted) {
                        feedbackSection.classList.remove('hidden');
                        setupFeedbackHandler(form, pollId);
                    }
                }

                showPollSuccess();

            } catch (error) {
                console.error("Vote error:", error);
                showError(error.message || "Something went wrong. Please try again.");
            }
        };

        document.addEventListener("submit", submitHandler);
    }

    /* ---------- SHOW FEEDBACK (POLL ONLY) ---------- */
    function showFeedback(form, pollId, selectedOptionId) {
        if (!form) return;

        const poll = polls.find(p => p.id === pollId);
        if (!poll) return;

        const feedbackSection = form.querySelector('.feedback-section');
        const feedbackText = form.querySelector('.feedback-text');

        if (!feedbackSection || !feedbackText) return;

        const selectedOpt = poll.options.find(opt => opt.id === selectedOptionId);
        if (selectedOpt) {
            feedbackText.textContent = poll.feedback_poll ||
                `You voted for: "${selectedOpt.option_text}". Thank you for participating!`;
        }

        feedbackSection.classList.remove('hidden');
    }

    /* ---------- INITIAL SETUP ---------- */
    window.addEventListener('load', () => {
        StorageManager.cleanupOldData();
    });

    window.addEventListener('beforeunload', cleanupPolls);
</script>