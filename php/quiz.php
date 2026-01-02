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
    /* ================= CLEAN MODERN QUIZ / POLL ================= */

    .live-interaction {
        background: transparent;
        padding: 40px 20px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .live-interaction__header {
        text-align: center;
        margin-bottom: 28px;
        display: none;
    }

    .live-interaction__header::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        margin: 14px auto 0;
        background: linear-gradient(90deg,
                #ef4444,
                #dc2626);
        border-radius: 2px;
    }


    .live-interaction__title {
        font-size: 22px;
        font-weight: 600;
        color: #111827;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }

    .live-interaction__subtitle {
        font-size: 14px;
        color: #6b7280;
        font-weight: 500;
    }


    /* ================= GRID ================= */
    .quiz-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, 380px);
        gap: 24px;
        justify-content: center;
    }


    /* ================= CARD ================= */

    .quiz-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 24px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .quiz-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, 0.08);
    }

    /* ================= QUESTION ================= */

    .quiz-question {
        font-size: 16px;
        font-weight: 600;
        color: #111827;
        line-height: 1.5;
        margin-bottom: 18px;
    }

    /* ================= OPTIONS ================= */

    .quiz-options {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .quiz-options li {
        margin-bottom: 12px;
    }

    .quiz-options label {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        border-radius: 10px;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        color: #374151;
        position: relative;
        overflow: hidden;
        transition: background 0.2s ease, border-color 0.2s ease;
    }

    .quiz-options label:hover {
        background: #f3f4f6;
        border-color: #d1d5db;
    }

    /* Radio */
    .quiz-options input {
        accent-color: #2563eb;
        transform: scale(1.1);
        z-index: 2;
    }

    /* ================= POLL BAR ================= */

    .poll-fill {
        position: absolute;
        inset: 0;
        width: 0%;
        background: rgba(37, 99, 235, 0.12);
        z-index: 0;
        transition: width 0.6s ease;
    }

    .poll-info {
        margin-left: auto;
        font-size: 12px;
        font-weight: 600;
        color: #2563eb;
        z-index: 2;
    }

    /* ================= QUIZ FEEDBACK ================= */

    .correct-option {
        background: #ecfdf5 !important;
        border-color: #10b981 !important;
    }

    .wrong-option {
        background: #fef2f2 !important;
        border-color: #ef4444 !important;
    }

    /* ================= BUTTON ================= */

    .quiz-submit {
        margin-top: 18px;
        width: 100%;
        padding: 14px;
        border-radius: 10px;
        border: none;
        background: #111827;
        color: #ffffff;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .quiz-submit:hover:not(:disabled) {
        background: #000000ff;
    }

    .quiz-submit:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* ================= UTILITY ================= */

    .hidden {
        display: none !important;
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 768px) {
        .live-interaction {
            padding: 24px 16px;
        }

        .quiz-card {
            padding: 20px;
        }
    }
</style>
<script>
    /* ================= QUIZ / POLL (OPTIMIZED) ================= */

    const quizzes = [];
    let currentProgramId = null;
    let submitHandler = null; // Keep reference for cleanup

    /* ---------- LOCAL STORAGE HELPERS ---------- */
    function getVotedKey(questionId) {
        return `program_question_voted_${questionId}`;
    }

    function saveVote(questionId, optionId) {
        localStorage.setItem(
            getVotedKey(questionId),
            JSON.stringify({
                optionId
            })
        );
    }

    function getSavedVote(questionId) {
        const raw = localStorage.getItem(getVotedKey(questionId));
        return raw ? JSON.parse(raw) : null;
    }

    /* ---------- CLEANUP FUNCTION ---------- */
    function cleanupQuizzes() {
        // Remove old event listener if it exists
        if (submitHandler) {
            document.removeEventListener("submit", submitHandler);
            submitHandler = null;
        }
        quizzes.length = 0;

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
        cleanupQuizzes();
        await fetchQuizzes(programId);
    });

    /* ---------- FETCH QUIZZES ---------- */
    async function fetchQuizzes(programId) {
        try {
            const res = await fetch(
                `${window.API_BASE_URL}/program-question/program/${programId}/active`
            );

            if (!res.ok) throw new Error("Questions API failed");

            const json = await res.json();
            quizzes.push(...(json.data || []));

            const header = document.getElementById("liveInteractionHeader");

            if (!quizzes.length) {
                if (header) header.style.display = "none";
                return;
            }

            if (header) header.style.display = "block";

            renderQuizzes();
            setupSubmitHandler();

        } catch (error) {
            console.error("Quiz fetch error:", error);
        }
    }


    /* ---------- BATCH RESULTS FETCH ---------- */
    async function fetchResultsForSavedVotes() {
        const savedQuizzes = quizzes.filter(quiz => getSavedVote(quiz.id));

        // Use Promise.all to fetch in parallel
        const resultsPromises = savedQuizzes.map(async (quiz) => {
            try {
                const res = await fetch(
                    `${window.API_BASE_URL}/program-question/results/${quiz.id}`
                );
                return res.ok ? res.json() : null;
            } catch (error) {
                console.error(`Failed to fetch results for quiz ${quiz.id}:`, error);
                return null;
            }
        });

        const results = await Promise.all(resultsPromises);

        // Apply results to each quiz
        savedQuizzes.forEach((quiz, index) => {
            const result = results[index];
            if (result) {
                const form = document.querySelector(`form[data-quiz-id="${quiz.id}"]`);
                if (form) {
                    const savedVote = getSavedVote(quiz.id);
                    applyResultsUI(form, quiz.id, savedVote.optionId, result);
                }
            }
        });
    }

    /* ---------- RENDER QUIZZES ---------- */
    function renderQuizzes() {
        const list = document.getElementById("quizList");
        if (!list) return;

        list.innerHTML = quizzes.map((quiz) => `
        <div class="quiz-card" data-type="${quiz.question_type}" data-quiz-id="${quiz.id}">
            <h3 class="quiz-question">${quiz.question}</h3>
            <form data-quiz-id="${quiz.id}">
                <ul class="quiz-options">
                    ${quiz.options.map(opt => `
                        <li>
                            <label data-option-id="${opt.id}">
                                ${quiz.question_type === "poll" ? '<div class="poll-fill"></div>' : ''}
                                <input type="radio" name="quiz-${quiz.id}" value="${opt.id}">
                                <span>${opt.option_text}</span>
                                ${quiz.question_type === "poll" ? '<span class="poll-info hidden"></span>' : ''}
                            </label>
                        </li>
                    `).join('')}
                </ul>
                <button type="submit" class="quiz-submit">Submit</button>
            </form>
        </div>
    `).join('');

        // Fetch results for saved votes in batch
        if (quizzes.some(quiz => getSavedVote(quiz.id))) {
            fetchResultsForSavedVotes();
        }
    }

    /* ---------- SUBMIT HANDLER ---------- */
    function setupSubmitHandler() {
        submitHandler = async function(e) {
            const form = e.target;
            if (!form.dataset.quizId) return;

            e.preventDefault();

            const questionId = Number(form.dataset.quizId);
            const selected = form.querySelector("input:checked");

            if (!selected) {
                showToast("Please select an option", "error");
                return;
            }

            const optionId = Number(selected.value);

            try {
                const voteRes = await fetch(`${window.API_BASE_URL}/program-question/vote`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        question_id: questionId,
                        option_id: optionId
                    }),
                });

                if (!voteRes.ok) {
                    const err = await voteRes.json();
                    showToast(err.message || "Voting failed", "error");
                    return;
                }

                saveVote(questionId, optionId);

                const resultsRes = await fetch(
                    `${window.API_BASE_URL}/program-question/results/${questionId}`
                );

                if (!resultsRes.ok) throw new Error("Failed to fetch results");

                const resultsData = await resultsRes.json();
                applyResultsUI(form, questionId, optionId, resultsData);

            } catch (error) {
                console.error("Vote error:", error);
                showToast("Something went wrong. Please try again.", "error");
            }
        };

        document.addEventListener("submit", submitHandler);
    }

    /* ---------- OPTIMIZED APPLY RESULTS UI ---------- */
    function applyResultsUI(form, questionId, selectedOptionId, resultsData) {
        if (!form) return;

        const quiz = quizzes.find(q => q.id === questionId);
        if (!quiz) return;

        // Disable all inputs and submit button
        const inputs = form.querySelectorAll("input");
        const submitBtn = form.querySelector(".quiz-submit");

        inputs.forEach(input => input.disabled = true);
        if (submitBtn) submitBtn.disabled = true;

        // Pre-cache DOM elements
        const labelMap = new Map();
        form.querySelectorAll('[data-option-id]').forEach(label => {
            const optionId = Number(label.dataset.optionId);
            labelMap.set(optionId, {
                element: label,
                fill: label.querySelector('.poll-fill'),
                info: label.querySelector('.poll-info')
            });
        });

        /* ===== QUIZ MODE ===== */
        if (quiz.question_type === "quiz" && resultsData.quiz) {
            const {
                correct_option_id,
                selected_option_id
            } = resultsData.quiz;

            quiz.options.forEach(opt => {
                const labelData = labelMap.get(opt.id);
                if (!labelData) return;

                const {
                    element
                } = labelData;

                if (opt.id === correct_option_id) {
                    element.classList.add("correct-option");
                }

                if (opt.id === selected_option_id && opt.id !== correct_option_id) {
                    element.classList.add("wrong-option");
                }
            });
        }

        /* ===== POLL MODE ===== */
        if (quiz.question_type === "poll") {
            resultsData.results?.forEach(r => {
                const labelData = labelMap.get(r.option_id);
                if (!labelData) return;

                const {
                    fill,
                    info
                } = labelData;

                if (fill) {
                    fill.style.width = `${r.percentage}%`;
                }

                if (info) {
                    info.textContent = `${r.percentage}%`;
                    info.classList.remove("hidden");
                }
            });
        }
    }

    /* ---------- INITIAL SETUP ---------- */
    // Clean up on page unload
    window.addEventListener('beforeunload', cleanupQuizzes);
</script>