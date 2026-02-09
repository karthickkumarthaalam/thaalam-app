<section class="bg-transparent">
    <div class="max-w-[1200px] mx-auto">
        <!-- Header -->
        <div id="liveInteractionHeader"
            class="text-center mt-12 mb-12 hidden">
            <h2 class="text-[1.6rem] font-semibold text-slate-800 tracking-tight mb-3">
                Live Program Interaction
            </h2>
            <p class="text-slate-500 font-medium max-w-[500px] mx-auto leading-relaxed">
                Vote & participate in the current show
            </p>
            <div
                class="w-20 h-1 mx-auto mt-5 rounded bg-gradient-to-r from-red-600 to-gray-100">
            </div>
        </div>

        <!-- Poll List -->
        <div
            id="quizList"
            class="grid gap-8 justify-center
             grid-cols-[repeat(auto-fit,minmax(400px,0.4fr))]
             max-[480px]:grid-cols-1">
        </div>
    </div>
</section>


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

    function pollCardTemplate(poll) {
        const showFeedback = poll.enable_feedback;
        const showWhatsApp = poll.enable_whatsapp && poll.whatsapp_number;

        return `
  <div class="bg-white rounded-2xl p-8 border border-slate-200
              shadow-[0_10px_5px_rgba(0,0,0,0.05)]
              transition hover:-translate-y-1 hover:shadow-xl">

    <h3 class="text-lg font-semibold text-slate-800 mb-7 leading-relaxed">
      ${poll.question}
    </h3>

    <form data-quiz-id="${poll.id}" class="space-y-7">

      <!-- OPTIONS -->
      <ul class="quiz-options space-y-4 transition-all">
        ${poll.options.map(opt => `
          <li>
            <label
              class="flex items-center gap-4 p-3 rounded-xl
                     bg-slate-50 border-2 border-slate-200
                     cursor-pointer text-sm font-medium text-slate-600
                     transition hover:bg-slate-100 hover:border-slate-300
                     hover:translate-x-1">

              <input type="radio"
                     name="poll-${poll.id}"
                     value="${opt.id}"
                     class="scale-125 accent-blue-500" />

              <span>${opt.option_text}</span>
            </label>
          </li>
        `).join("")}
      </ul>

      <!-- SUBMIT -->
      <button
        type="submit"
        class="quiz-submit w-full py-4 rounded-xl
               bg-gradient-to-br from-slate-800 to-slate-950
               text-white font-semibold shadow-md
               transition hover:-translate-y-1 hover:shadow-xl">
        Submit Vote
      </button>

      <!-- FEEDBACK -->
      <div class="feedback-section hidden mt-7 p-4 rounded-xl
                  bg-gradient-to-br from-sky-50 to-sky-100
                  border-2 border-sky-200 animate-[slideIn_0.4s_ease]">
        <p class="text-xs text-sky-900 leading-relaxed">
          <span class="mr-1">💡</span>
          <span class="feedback-text"></span>
        </p>
      </div>

      ${showFeedback ? feedbackTemplate(showWhatsApp) : ""}
    </form>
  </div>
  `;
    }

    function feedbackTemplate(showWhatsApp) {
        return `
  <div class="user-feedback-section hidden mt-8 pt-8 border-t-2 border-dashed border-slate-300">

    <h4 class="flex items-center gap-3 font-semibold text-slate-800 mb-3">
      💬 Share Your Thoughts
    </h4>

    <div class="relative mb-4">
      <textarea
        maxlength="500"
        placeholder="What did you think about this poll?"
        class="feedback-textarea w-full min-h-[120px] p-3
               border-2 border-slate-300 rounded-xl
               text-sm text-slate-800 resize-y
               shadow focus:outline-none focus:border-blue-500
               focus:ring-4 focus:ring-blue-500/20"></textarea>

      <div class="char-counter absolute bottom-2 right-3
                  text-xs text-slate-500 bg-white/90 px-2 rounded-full">
        0/500
      </div>
    </div>

    <div class="flex gap-4 flex-wrap">
      <button
        type="button"
        class="feedback-submit flex-1 min-w-[200px] py-3 rounded-xl
               bg-gradient-to-br from-blue-500 to-blue-700
               text-white font-semibold shadow
               transition hover:-translate-y-1 hover:shadow-lg">
        Submit Feedback
      </button>

      ${
        showWhatsApp
          ? `<button type="button"
                class="whatsapp-btn flex items-center gap-2
                       py-3 px-4 rounded-xl bg-gradient-to-br
                       from-green-500 to-green-700
                       text-white font-semibold shadow
                       transition hover:-translate-y-1 hover:shadow-lg">
                    <i class="fab fa-whatsapp"></i>
                       </button>`
          : ""
      }
    </div>

    <div class="feedback-success hidden mt-5 flex items-center gap-3
                p-5 rounded-xl border-2 border-green-600
                bg-green-100 text-green-800 font-semibold">
      🎉 Thank you for your feedback!
    </div>

  </div>
  `;
    }



    /* ---------- RENDER POLLS ---------- */
    function renderPolls() {
        const list = document.getElementById("quizList");
        if (!list) return;

        list.innerHTML = polls.map((poll) => {
            return pollCardTemplate(poll);
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

            const optionsList = form.querySelector(".quiz-options");
            const submitBtn = form.querySelector(".quiz-submit");

            if (optionsList) optionsList.classList.add("hidden");
            if (submitBtn) submitBtn.classList.add("hidden");

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
                            answer_text: feedbackText,
                            device_id: getDeviceId()
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
        if (submitHandler) {
            document.removeEventListener("submit", submitHandler);
        }

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
                        option_id: optionId,
                        device_id: getDeviceId(),
                    })
                });

                if (!voteRes.ok) {
                    const err = await voteRes.json();
                    throw new Error(err.message || "Voting failed");
                }

                StorageManager.saveVote(currentProgramId, pollId, optionId);

                const optionsList = form.querySelector(".quiz-options");
                const submitBtn = form.querySelector(".quiz-submit");

                if (optionsList) optionsList.classList.add("hidden");
                if (submitBtn) submitBtn.classList.add("hidden");


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